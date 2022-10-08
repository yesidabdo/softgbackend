<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;


    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }


    protected $fillable=[
        'description',
        'driver_id',
        'vehicle_id',
        'active'
    ];

    protected $hidden = [
            
        'created_at',
        'updated_at'
        
    ];    
}
    