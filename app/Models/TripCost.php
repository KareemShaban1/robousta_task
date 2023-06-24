<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_station_id','end_station_id','cost'
    ];

    protected $table = 'trip_cost';

    public function start_station()
    {
        return  $this->belongsTo(Station::class,'start_station_id','id');
    }

    public function end_station()
    {
        return  $this->belongsTo(Station::class,'end_station_id','id');
    }
}
