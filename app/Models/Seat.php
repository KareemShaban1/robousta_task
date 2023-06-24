<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id','bus_id','user_id','start_station_id','end_station_id','seat_status','seat_number'
        ,'trip_cost'
    ];
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function start_station()
    {
        return  $this->belongsTo(Station::class, 'start_station_id', 'id');
    }

    public function end_station()
    {
        return  $this->belongsTo(Station::class, 'end_station_id', 'id');
    }

}
