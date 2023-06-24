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

        .bus-seat {
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .seat:nth-child(2) {
            margin-right: 14.28571%;
        }
    </style>
@endsection

@section('content')
    @php
        $rowCount = ceil(count($seats) / 3); // Calculate the number of rows needed
        $seatIndex = 0; // Initialize the seat index
    @endphp
    <div class="bus-seat">
        @for ($i = 0; $i < $rowCount; $i++)
            <div class="row">
                @for ($j = 0; $j < 3; $j++)
                    @if ($seatIndex < count($seats))
                        @php
                            $seat = $seats[$seatIndex];
                            $seatIndex++;
                        @endphp
                        <div class="seat"
                            @if ($seat->seat_status == 'reserved') style="background-color: green; pointer-events: none;" @endif
                            data-toggle="modal" data-target="#editModal{{ $seat->id }}">
                            <label for="">
                                {{ $seat->seat_number }}
                                {{-- {{$loop->count}} --}}
                            </label>
                        </div>
                    @endif
                @endfor
            </div>
        @endfor
    </div>
    <!-- Edit Modal -->
    @foreach ($seats as $seat)
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Seat Number <span class="text-danger">*</span></label>
                                        <input class="form-control" disabled type="text"
                                            value="{{ $seat->seat_number }}" name="seat_number">
                                        @error('trip_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Start Station
                                        </label>
                                        <select name="start_station_id" class="custom-select mr-sm-2"
                                            id="start-station-select[{{ $seat->seat_number }}]">
                                            <option value="" disabled selected> أختار من القائمة </option>
                                            @foreach ($stations as $station)
                                                <option value="{{ $station->id }}" @selected($station->id == $seat->start_station_id)>
                                                    {{ $station->name }} </option>
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
                                        <select name="end_station_id" class="custom-select mr-sm-2"
                                            id="end-station-select[{{ $seat->seat_number }}]">
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
                                        <input class="form-control" type="text" id="trip-cost-input[{{ $seat->seat_number }}]" name="trip_cost">
                                        @error('trip_cost')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">حجز</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    @push('js')
        <script>
            $(document).ready(function() {


                $('[id^="start-station-select"], [id^="end-station-select"]').on('change', function() {
                    var seatNumber = $(this).attr('id').match(/\d+/)[0];
                    var startStationId = $('#start-station-select\\[' + seatNumber + '\\]').val();
                    var endStationId = $('#end-station-select\\[' + seatNumber + '\\]').val();

                    console.log(startStationId);
                    console.log(endStationId);

                    var tripCostInput = $('#trip-cost-input\\[' + seatNumber + '\\]');

                    // Perform an AJAX request to get the trip cost based on the selected stations
                    $.ajax({
                        url: '/get-trip-cost', // Replace with your backend route to fetch trip cost
                        type: 'GET',
                        data: {
                            start_station_id: startStationId,
                            end_station_id: endStationId
                        },
                        success: function(response) {
                            console.log(response.trip_cost);
                            // Update the trip cost input field with the received value
                            tripCostInput.val(response.trip_cost);
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
