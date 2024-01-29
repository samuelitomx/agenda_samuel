<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Space;

class SpaceComponent extends Component
{

    public $spaces, $quantity;

    public function render()
    {

        $this->spaces = Space::all();

        $this->quantity = Space::getQuantity();

        return view('livewire.space-component')->layout('components.layout-BaseElements');

    }

    public function store($space)
    {

        $this->space = new Space();
        $this->space->name = $space['name'];
        $this->space->description = $space['description'];
        $this->space->dimensions = $space['dimensions'];
        $this->space->capacity = $space['capacity'];
        $this->space->theme = $space['theme'];
        $this->space->days_for_settlement = $space['days_for_settlement'];
        $this->space->price_for_hour = $space['price_for_hour'];
        $this->space->minimum_amount = $space['minimum_amount'];
        $this->space->tenant_id = Auth::user()->tenant_id;
        $this->space->save();

    }
    
    public function update($setSpace)
    {
        
        $this->space = Space::find($setSpace['id']);
        $this->space->name = $setSpace['name'];
        $this->space->description = $setSpace['description'];
        $this->space->dimensions = $setSpace['dimensions'];
        $this->space->capacity = $setSpace['capacity'];
        $this->space->theme = $setSpace['theme'];
        $this->space->days_for_settlement = $setSpace['days_for_settlement'];
        $this->space->price_for_hour = $setSpace['price_for_hour'];
        $this->space->minimum_amount = $setSpace['minimum_amount'];
        $this->space->update();

    }



    public function destroy($deleteSpace)
    {

        Space::find($deleteSpace['id'])->delete();

    }

}

