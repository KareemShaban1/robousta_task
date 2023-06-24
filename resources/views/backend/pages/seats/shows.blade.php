@extends('backend.layouts.master')

@section('css')
    <style>
        .seat {
            height: 40px;
            width: 40px;
            background-color: red;
            border-radius: 30px;
            margin: 10px;
            text-align: center;
            vertical-align: middle;



        }

        .seat label {
            display: block;
            font-size: 14px;
            line-height: 40px;
            color: #ffffff;

        }
    </style>
@endsection

@section('content')
    {{-- <div>
          <label>Choose Seat</label>
          <div class="bus seat2-2 border-0 p-0">
              <div class="seat-row-1">
                  <ol class="seats">
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-1" value="1"
                              required="" type="radio">
                          <label for="seat-radio-1-1">
                              1 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-2" value="2"
                              required="" type="radio">
                          <label for="seat-radio-1-2">
                              2 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-3" value="3"
                              required="" type="radio">
                          <label for="seat-radio-1-3">
                              3 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-4" value="4"
                              required="" type="radio">
                          <label for="seat-radio-1-4">
                              4 </label>
                      </li>
                  </ol>
              </div>
      
              <div class="seat-row-2">
                  <ol class="seats">
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-5" value="5"
                              required="" type="radio">
                          <label for="seat-radio-1-5">
                              5 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-6" value="6"
                              required="" type="radio">
                          <label for="seat-radio-1-6">
                              6 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-7" value="7"
                              required="" type="radio">
                          <label for="seat-radio-1-7">
                              7 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-8" value="8"
                              required="" type="radio">
                          <label for="seat-radio-1-8">
                              8 </label>
                      </li>
                  </ol>
              </div>
      
              <div class="seat-row-3">
                  <ol class="seats">
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-9" value="9"
                              required="" type="radio">
                          <label for="seat-radio-1-9">
                              9 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-10" value="10"
                              required="" type="radio">
                          <label for="seat-radio-1-10">
                              10 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-11" value="11"
                              required="" type="radio">
                          <label for="seat-radio-1-11">
                              11 </label>
                      </li>
                      <li class="seat">
                          <input role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-12" value="12"
                              required="" type="radio">
                          <label for="seat-radio-1-12">
                              12 </label>
                      </li>
                  </ol>
              </div>
      
          </div>
      
          <div class="text-left mt-2">
              <button class="btn btn-primary btn-xs mb-2">Available</button>
              <button class="btn btn-success btn-xs mb-2">Choosen</button>
              <button class="btn btn-danger btn-xs mb-2">Booked</button>
          </div>
   </div> --}}


    <div class="row">
        @foreach ($seats as $seat)
          <div class="row">
            <div class="seat"
                @if ($seat->seat_status == 'reserved') style="background-color: green; pointer-events: none;" @endif
                data-toggle="modal" data-target="#editModal{{ $seat->id }}">
                <label for="">
                    {{ $seat->seat_number }}
                    {{-- {{$loop->count}} --}}
                </label>
            </div>
          </div>

          
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $seat->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editModalLabel{{ $seat->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $seat->id }}">Edit Seat
                                {{ $seat->seat_number }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your form fields here to edit seat data -->
                            <form method="post" enctype="multipart/form-data"
                                action="{{ Route('seats.reserve_seat', $seat->id) }}" autocomplete="off">

                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Trip Date <span class="text-danger">*</span></label>
                                            <input class="form-control" disabled type="date"
                                                value="{{ $seat->trip->trip_date }}" name="trip_date">
                                            @error('trip_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Bus Number
                                            </label>
                                            <select name="bus_id" class="custom-select mr-sm-2">

                                                <option value="{{ $seat->bus_id }}" selected disabled>{{ $seat->bus_id }}
                                                </option>

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
                                            <select name="start_station_id"
                                                class="custom-select mr-sm-2 start-station-select">
                                                <option value="" disabled selected> أختار من القائمة </option>
                                                @foreach ($stations as $station)
                                                    <option value="{{ $station->id }} " @selected($station->id == $seat->start_station_id)>
                                                        {{ $station->name }}</option>
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
                                            <select name="end_station_id" class="custom-select mr-sm-2 end-station-select">
                                                <option value="" disabled selected> أختار من القائمة </option>

                                                @foreach ($stations as $station)
                                                    <option value="{{ $station->id }}" @selected($station->id == $seat->end_station_id)>
                                                        {{ $station->name }}</option>
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
                                            <label> Trip Cost <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="trip-cost-input"
                                                name="trip_cost">
                                            @error('trip_cost')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">حجز</button>


                            </form>
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    @push('js')
        <script>
            $(document).ready(function() {
                $('.start-station-select, .end-station-select').on('change', function() {
                    var startStationId = $('.start-station-select').val();
                    var endStationId = $('.end-station-select').val();

                    // Perform an AJAX request to get the trip cost based on the selected stations
                    $.ajax({
                        url: '/get-trip-cost', // Replace with your backend route to fetch trip cost
                        type: 'GET',
                        data: {
                            start_station_id: startStationId,
                            end_station_id: endStationId
                        },
                        success: function(response) {
                            // Update the trip cost input field with the received value
                            $('#trip-cost-input').val(response.trip_cost);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
