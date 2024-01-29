<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Form;

class FormComponent extends Component
{

    public $forms, $quantity;

    public function render()
    {

        $this->forms = Form::all();

        $this->quantity = Form::getQuantity();

        return view('livewire.form-component')->layout('components.layout-BaseElements');

    }

    public function destroy($deleteForm)
    {

        SForm::find($deleteForm['id'])->delete();

    }

}
