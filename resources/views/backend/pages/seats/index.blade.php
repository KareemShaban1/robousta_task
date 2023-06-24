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
                                <th>User</th>
                                <th>Start Station</th>
                                <th>End Station</th>
                                <th>Seat Status</th>
                                <th>Trip Cost</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seats as $seat)
                                <tr>
                                    <td>{{ $seat->id }}</td>
                                    <td>{{ $seat->user_id }}</td>
                                    <td>{{ $seat->start_station ? $seat->start_station->name : '' }}</td>
                                    <td>{{ $seat->end_station ? $seat->end_station->name : '' }}</td>
                                    <td>
                                        @if ($seat->seat_status == 'reserved')
                                          <span class="text-success">محجوز</span>  
                                        @else
                                        <span class="text-danger"> غير محجوز </span> 
                                        @endif
                                    </td>
                                    <td>{{ $seat->trip_cost }}</td>

                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ Route('seats.edit', $seat->id) }}" class="btn btn-warning btn-sm">
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
