<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

class Form extends Model
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

        $forms = Form::query();
        $forms = $forms->where('tenant_id','like','%'.Auth::user()->tenant_id.'%');
        $forms = $forms->get();

        foreach($forms as $form)
        {
            $form;
            $quantity++;
        }

        return $quantity;

    } 
}
