<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

class Space extends Model
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

        $spaces = Space::query();
        $spaces = $spaces->where('tenant_id','like','%'.Auth::user()->tenant_id.'%');
        $spaces = $spaces->get();

        foreach($spaces as $space)
        {
            $space;
            $quantity++;
        }

        return $quantity;

    }

    public function Connection_Of_Space_To_Tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id', 'id')->withTrashed();
    }
    
    public function Connection_Of_Space_To_Event()
    {
        return $this->hasMany(Event::class);
    }

}
