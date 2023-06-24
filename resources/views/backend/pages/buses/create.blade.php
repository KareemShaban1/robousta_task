@extends('backend.layouts.master')


@section('content')

<!-- row -->
<div class="row">
          <div class="col-md-12 mb-30">
              <div class="card card-statistics h-100">
                  <div class="card-body">
      
      
                      <form method="post" enctype="multipart/form-data" action="{{Route('buses.store')}}" autocomplete="off">
      
                          @csrf
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Bus Number<span class="text-danger">*</span></label>
                                      <input  type="text" name="bus_number"  class="form-control">
                                      @error('bus_number')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
      
                              
                          </div> 
      
      
      
                          <div class="row">
                              
      
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label> Number of Seats <span class="text-danger">*</span></label>
                                      <input  class="form-control" name="number_of_seats" type="text" >
                                      @error('number_of_seats')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
      
                            
                          </div>
      
                        
      
                         <button type="submit" class="btn btn-success btn-md nextBtn btn-lg " >Add</button>
      
      
                      </form>
      
      
      
                      
                  </div>
              </div>
          </div>
      </div>
      <!-- row closed -->

@endsection