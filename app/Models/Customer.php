<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }

    public static function getQuantity()
    {

        $quantity = 0;

        $customers = Customer::query();
        $customers = $customers->where('tenant_id','like','%'.Auth::user()->tenant_id.'%');
        $customers = $customers->get();

        foreach($customers as $customer)
        {
            $customer;
            $quantity++;
        }

        return $quantity;

    } 

    public function Connection_Of_Customer_To_Tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id')->withTrashed();
    }

    public function Connection_Of_Customer_To_Event()
    {
        return $this->hasMany(Event::class);
    }

}
