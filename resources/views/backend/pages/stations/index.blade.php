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
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stations as $station)
                                <tr>
                                    <td>{{ $station->id }}</td>
                                    <td>{{ $station->name }}</td>
                                    <td>{{ $station->rank }}</td>

                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{Route('stations.edit',$station->id)}}" class="btn btn-warning btn-sm">
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
