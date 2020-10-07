<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // option-1 turn off the guard facility
    // protected $guarded = [];

    // option-2 fillable way, explicitly addressing the fields
        protected $fillable = ['name', 'email', 'active', 'company_id'];

        protected $attributes = [
            'active'=> 1
        ];

    use HasFactory;

    public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeInactive($query){
        return $query->where('active', 0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function activeOptions(){
        return [
            1=> 'Active',
            0=>'Inactive',
            2=>'In-Progress'
        ];
    }

}
