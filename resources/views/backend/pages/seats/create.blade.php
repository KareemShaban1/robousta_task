@extends('backend.layouts.master')


@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

 
                    <form method="post" enctype="multipart/form-data" action="{{ Route('seats.store') }}" autocomplete="off">

                        @csrf
                        <div class="row">
 
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Bus Number
                                    </label>
                                    <select name="bus_id" class="custom-select mr-sm-2">
                                        <option value="" disabled> أختار من القائمة </option>

                                        @foreach ($buses as $bus)
                                            <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                                        @endforeach
                                    </select>
                                    @error('bus_id')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                        </div>



                        <div class="row">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Start Station
                                    </label>
                                    <select name="start_station_id" class="custom-select mr-sm-2">
                                        <option value="" disabled> أختار من القائمة </option>
                                        @foreach ($stations as $station)
                                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('start_station_id')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">End Station
                                    </label>
                                    <select name="end_station_id" class="custom-select mr-sm-2">
                                        <option value="" disabled> أختار من القائمة </option>

                                        @foreach ($stations as $station)
                                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('end_station_id')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Trip Date <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="trip_date">
                                    @error('trip_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">Add</button>


                    </form>




                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
