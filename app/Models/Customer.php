<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // option-1 turn off the guard facility
    // protected $guarded = [];

    // option-2 fillable way, explicitly addressing the fields
        protected $fillable = ['name', 'email', 'active'];

    use HasFactory;
    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeInactive($query){
        return $query->where('active', 0);
    }
}
