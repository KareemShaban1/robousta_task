@extends('backend.layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Trip Date</th>
                                <th>Bus Number</th>
                                <th>Start Station</th>
                                <th>End Station</th>
                                <th>Seat Count</th>
                                <th>Reserved Seats</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trips as $trip)
                                <tr>
                                    <td>{{ $trip->id }}</td>
                                    <td>{{ $trip->trip_date }}</td>
                                    <td>{{ $trip->bus->bus_number }}</td>
                                    <td>{{ $trip->start_station->name }}</td>
                                    <td>
                                        {{ $trip->end_station->name }}
                                    </td>
                                    <td>
                                        <a href="{{Route('seats.show_seats',$trip->id)}}" class="btn btn-warning btn-sm">
                                        {{$trip->seats_count}}
                                        </a>
                                    </td>

                                    <td>
                                        {{$trip->reseved_seats_count}}
                                    </td>


                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{Route('trips.edit',$trip->id)}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
