<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\EventDetail;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Space;
use App\Models\Payment;

class CalendarComponent extends Component
{


    public $clickedEvent = [];

    public $products;
    public $detail, $payment, $payments;
    public $event, $eventDetails, $eventPayment;
    public $customer;
    public $all_events;

    public $selectedDate;

    public $EventsDay;
    public $selectedDay;

    public $formattedDate;
    public $eventsDetails;

    protected $listeners = ['create','show','edit'];

    public function render()
    {

        $this->EventsDay = Event::query();
        $this->EventsDay = $this->EventsDay->where('start','like','%'.$this->selectedDay.'%');
        $this->EventsDay = $this->EventsDay->get();

        $this->products = Product::all();
        $this->customers = Customer::all();
        $this->customerss = Customer::all();
        $this->spaces = Space::all();


        $this->all_events = Event::with('Connection_Of_Event_To_EventDetail')->get();
        $this->all_details = EventDetail::with('Connection_Of_DetailEvent_To_Product')->get();
        $this->payments = Payment::all();


        $this->all_events = json_encode($this->all_events);
        $this->all_details = json_encode($this->all_details);
        $this->payments = json_encode($this->payments);
        $this->customers = json_encode($this->customers);

        return view('livewire.calendar-component')->layout('components.layout-BaseElements');

    }

    public function create()
    {

        
        $this->formattedDate = now()->parse($this->selectedDay)->format('Y-m-d\TH:i');
        $this->start = $this->formattedDate;

        $this->openCreateEventModal();  
        $this->ShowEvents = false;     

    }



    public function store($event, $details, $payments, $customer)
    {

        $this->customer = new Customer();
        $this->customer->first_name = $customer['first_name'];
        $this->customer->last_name = $customer['last_name'];
        $this->customer->email = $customer['email'];
        $this->customer->phone_number = $customer['phone_number'];
        $this->customer->tenant_id = Auth::user()->tenant_id;
        $this->customer->save();

        $this->event = new Event();
        $this->event->title = $event['title'];
        $this->event->description = $event['description'];
        $this->event->start = $event['start'];
        $this->event->end = $event['end'];
        $this->event->customer_id = $this->customer->id;
        $this->event->space_id = $event['space_id'];
        $this->event->paid = $event['paid'];
        $this->event->tenant_id = Auth::user()->tenant_id;
        $this->event->save();

        foreach($details as $key => $detail)
        {

            $this->eventDetails = new EventDetail();
            $this->eventDetails->event_id = $this->event->id;
            $this->eventDetails->product_id = $detail['id'];
            $this->eventDetails->price = $detail['price'];
            $this->eventDetails->quantity = $detail['quantity'];
            $this->eventDetails->total = $detail['price'] * $detail['quantity'];
            $this->eventDetails->tenant_id = Auth::user()->tenant_id;
            $this->eventDetails->save();

        }

        foreach($payments as $key => $payment)
        {

            $this->eventPayment = new Payment();
            $this->eventPayment->event_id = $this->event->id;
            $this->eventPayment->quantity = $payment['quantity'];
            $this->eventPayment->description = $payment['description'] ;
            $this->eventPayment->tenant_id = Auth::user()->tenant_id;
            $this->eventPayment->save();

        }

        $this->closeModals();

    }

   
    
    public function update($setEvent, $setDetails, $setPayments, $deleteDetails, $deletePayments)
    {

        $this->event = Event::find($setEvent['id']);
        $this->event->title = $setEvent['title'];
        $this->event->start = $setEvent['start'];
        $this->event->end = $setEvent['end'];
        $this->event->description = $setEvent['description'];
        $this->event->space_id = $setEvent['space_id'];
        $this->event->paid = $setEvent['paid'];
        $this->event->tenant_id = Auth::user()->tenant_id;
        $this->event->update();

        foreach ($setDetails as $key => $setDetail) {

            if(isset($setDetail['id'])){
                $this->detail = EventDetail::find($setDetail["id"]);
            }
            else{
                $this->detail = new EventDetail();
            }
            $this->detail->event_id = $setEvent['id'];
            $this->detail->product_id = $setDetail['product_id'];
            $this->detail->price = $setDetail['price'];
            $this->detail->quantity = $setDetail['quantity'];
            $this->detail->total = $setDetail['price'] * $setDetail['quantity'];
            $this->detail->tenant_id = Auth::user()->tenant_id;
            $this->detail->save();
        
        }
        
        
        foreach ($setPayments as $key => $setPayment) {

            if(isset($setPayment['id'])){
                $this->payment = Payment::find($setPayment["id"]);
            }
            else{
                $this->payment = new Payment();
            }

            $this->payment->event_id = $setEvent['id'];
            $this->payment->quantity = $setPayment['quantity'];
            $this->payment->description = $setPayment['description'];
            $this->payment->tenant_id = Auth::user()->tenant_id;
            $this->payment->save();

        }

        foreach ($deleteDetails as $key => $deleteDetail) {
            $detail = EventDetail::find($deleteDetail);
            if($detail) $detail->delete();
        }

        foreach ($deletePayments as $key => $deletePayment) {
            $payment = Payment::find($deletePayment);
            if($payment) $payment->delete();
        }

    }



    public function show($selectedDay)
    {
        $this->selectedDay = (new \DateTime($selectedDay))->format('Y-m-d');
    }

    public function destroy($setEvent)
    {

        Event::find($setEvent['id'])->delete();
        $this->closeModals();

    }

    protected function formatDateTimeLocal($dateTime)
    {
        return now()->parse($dateTime)->format('Y-m-d\TH:i');
    }


    public function closeModals()
    {

        $this->modalCalendar = false;
        $this->emit('closeModal');
        $this->emit('refreshCalendar');

        $this->id = "";
        $this->title = "";
        $this->start = "";
        $this->end = "";
        $this->description = "";
        $this->cost = "";
        $this->customer = "";

        $this->showEvents = false;
        $this->createEvent = false;
        $this->updateEvent = false;

        $this->selectedDate = "";
        $this->selectedDay = "";

    }

}