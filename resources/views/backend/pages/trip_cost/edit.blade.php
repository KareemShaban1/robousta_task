@extends('backend.layouts.master')


@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <form method="post" enctype="multipart/form-data" action="{{ Route('trip_cost.update',$trip_cost->id) }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                    
                        <div class="row">

 
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Start Station
                                    </label>
                                    <select name="start_station_id" class="custom-select mr-sm-2">
                                        <option value="" disabled> أختار من القائمة </option>

                                        @foreach ($stations as $station)
                                            <option value="{{ $station->id }}" @selected($station->id == $trip_cost->start_station_id)>{{ $station->name }}</option>
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
                                          <option value="{{ $station->id }}" @selected($station->id == $trip_cost->end_station_id)>{{ $station->name }}</option>
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
                                            <label> Cost <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{$trip_cost->cost}}" name="cost" >
                                            @error('cost')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                        </div>



                        <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">Edit</button>


                    </form>




                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
