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
                                <th>Cost</th>
                                <th>Start Station</th>
                                <th>End Station</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trips_cost as $trip_cost)
                                <tr>
                                    <td>{{ $trip_cost->id }}</td>
                                    <td>{{ $trip_cost->cost }}</td>
                                    <td>{{ $trip_cost->start_station->name }}</td>
                                    <td>{{ $trip_cost->end_station->name }}</td>


                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{Route('trip_cost.edit',$trip_cost->id)}}" class="btn btn-warning btn-sm">
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
