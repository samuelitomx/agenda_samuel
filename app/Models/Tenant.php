<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Connection_Of_Tenant_To_User()
    {
        return $this->hasMany(User::class);
    }

    public function Connection_Of_Tenant_To_Space()
    {
        return $this->hasMany(Space::class);
    }

    public function Connection_Of_Tenant_To_Customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function Connection_Of_Tenant_To_Event()
    {
        return $this->hasMany(Event::class);
    }

    public function Connection_Of_Tenant_To_EventDetail()
    {
        return $this->hasMany(EventDetail::class);
    }
    
    public function Connection_Of_Tenant_To_Product()
    {
        return $this->hasMany(Product::class);
    }

    public function Connection_Of_Tenant_To_Payment()
    {
        return $this->hasMany(Payment::class);
    }

}
