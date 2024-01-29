<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }

    public function Connection_Of_Event_To_Tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id')->withTrashed();
    }

    public function Connection_Of_Event_To_EventDetail()
    {
        return $this->hasMany(EventDetail::class);
    }

    public function Connection_Of_Event_To_Space()
    {
        return $this->belongsTo(Space::class,'space_id', 'id')->withTrashed();
    }

    public function Connection_Of_Event_To_Payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function Connection_Of_Event_To_Customer()
    {
        return $this->belongsTo(Customer::class,'customer_id', 'id')->withTrashed();
    }

}
