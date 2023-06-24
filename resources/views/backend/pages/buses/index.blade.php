@extends('backend.layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Bus Number</th>
                                <th>Number Of Seats</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buses as $bus)
                                <tr>
                                    <td>{{ $bus->id }}</td>
                                    <td>{{ $bus->bus_number }}</td>
                                    <td>{{ $bus->number_of_seats }}</td>

                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{Route('buses.edit',$bus->id)}}" class="btn btn-warning btn-sm">
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
