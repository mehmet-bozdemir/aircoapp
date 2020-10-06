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

    use HasFactory;

    public function getActiveAttribute($attribute){
        return [
            0=>'Inactive',
            1=> 'Active'
        ][$attribute];
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

}
