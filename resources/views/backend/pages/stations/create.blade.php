@extends('backend.layouts.master')


@section('content')

<!-- row -->
<div class="row">
          <div class="col-md-12 mb-30">
              <div class="card card-statistics h-100">
                  <div class="card-body">
      
      
                      <form method="post" enctype="multipart/form-data" action="{{Route('stations.store')}}" autocomplete="off">
      
                          @csrf
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Name<span class="text-danger">*</span></label>
                                      <input  type="text" name="name"  class="form-control">
                                      @error('name')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
      
                               
                          </div> 
      
      
      
                          <div class="row">
                              
      
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label> Rank <span class="text-danger">*</span></label>
                                      <input  class="form-control" name="rank" type="text" >
                                      @error('rank')
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