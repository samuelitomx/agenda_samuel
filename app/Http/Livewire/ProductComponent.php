<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductComponent extends Component
{

    public $products;
    public $product;

    public function render()
    {

        $this->products = Product::all();

        return view('livewire.product-component')->layout('components.layout-BaseElements');

    }


    public function store($product){

        $this->product = new Product();
        $this->product->name = $product['name'];
        $this->product->description = $product['description'];
        $this->product->cost = $product['cost'];
        $this->product->stock = $product['stock'];
        $this->product->tenant_id = Auth::user()->tenant_id;
        $this->product->save();

        $this->product->name = "";
        $this->product->description = "";
        $this->product->cost = ""; 
        $this->product->stock = "";

    }
    
    public function update($setProduct)
    {
        
        $this->product = Product::find($setProduct['id']);
        $this->product->name = $setProduct['name'];
        $this->product->description = $setProduct['description'];
        $this->product->cost = $setProduct['cost'];
        $this->product->stock = $setProduct['stock'];
        $this->product->update();

    }



    public function destroy($deleteProduct)
    {

        Product::find($deleteProduct['id'])->delete();

    }



    

}