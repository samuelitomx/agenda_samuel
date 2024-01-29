<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerComponent extends Component
{
    public $customers, $quantity;

    public function render()
    {

        $this->customers = Customer::all();

        $this->quantity = Customer::getQuantity();

        return view('livewire.customer-component')->layout('components.layout-BaseElements');

    }

    public function store($customer)
    {

        $this->customer = new Customer();
        $this->customer->first_name = $customer['first_name'];
        $this->customer->last_name = $customer['last_name'];
        $this->customer->email = $customer['email'];
        $this->customer->phone_number = $customer['phone_number'];
        $this->customer->tenant_id = Auth::user()->tenant_id;
        $this->customer->save();

    }
    
    public function update($setCustomer)
    {
        
        $this->customer = Customer::find($setCustomer['id']);
        $this->customer->first_name = $setCustomer['first_name'];
        $this->customer->last_name = $setCustomer['last_name'];
        $this->customer->email = $setCustomer['email'];
        $this->customer->phone_number = $setCustomer['phone_number'];
        $this->customer->update();

    }



    public function destroy($deleteCustomer)
    {

        Customer::find($deleteCustomer['id'])->delete();

    }

}
