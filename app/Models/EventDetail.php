<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

class EventDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }

    public function Connection_Of_DetailEvent_To_Tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id')->withTrashed();
    }

    public function Connection_Of_DetailEvent_To_Event()
    {
        return $this->belongsTo(Event::class,'event_id', 'id')->withTrashed();
    }

    public function Connection_Of_DetailEvent_To_Product()
    {
        return $this->belongsTo(Product::class,'product_id', 'id')->withTrashed();
    }

}
