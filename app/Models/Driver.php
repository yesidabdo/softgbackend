<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Driver extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'ssd',
        "dob",
        "phone",
        "address",
        "city",
        "zip",
        "active"
        
    ];
    
    protected $hidden = [
            
        'created_at',
        'updated_at'
        
    ];
    
}
