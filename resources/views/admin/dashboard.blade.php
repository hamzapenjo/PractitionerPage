@extends('layouts.admin')

@section('section')

<div class="content">
    <form method="GET" action="{{route('admin-dashboard')}}">
        <div class="col-md-2">
            <div class="form-group">
               <label for="filter">Filter by Days</label>
                  <select class="form-control" name="filter" id="filter">
                   <option value=""{{$filter == 'all' ? 'selected' : ''}}>All</option>
                   <option value="today"{{$filter == 'today' ? 'selected' : ''}}>Today</option>
                   <option value="30"{{$filter == '30' ? 'selected' : ''}}>30 days</option>
                   <option value="60"{{$filter == '60' ? 'selected' : ''}}>60 days</option>
                   <option value="90"{{$filter == '90' ? 'selected' : ''}}>90 days</option>
                </select>   
               <button type="submit" class="btn btn-primary btn-round">Search</button>               
            </div>         
         </div>
    </form>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-bullet-list-67 text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Practices</p>
                  <p class="card-title">{{$countPractice}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <a href="{{ route('admin-practice') }}">
                Practices
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-bullet-list-67 text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Fields of practices</p>
                  <p class="card-title">{{$countFieldsOfPractice}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <a href="{{ route('admin-fields') }}">
                Fields of Practice
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-single-02 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Clients</p>
                  <p class="card-title">{{$countClient}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <a href="{{ route('admin-clients') }}">
                Clients
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-single-02 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Practitioners</p>
                  <p class="card-title">{{$countPractitioner}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <a href="{{ route('admin-practitioners') }}">
                Practitioners
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection