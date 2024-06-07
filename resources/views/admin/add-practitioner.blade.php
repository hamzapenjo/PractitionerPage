@extends('layouts.admin')

@section('section')
<div class="col-md-12">
  @include('messages.all-messages')
  <div class="card card-user">
    <div class="card-header">
      <h5 class="card-title">Add Practitioner</h5>
    </div>
    <div class="card-body">
      <form name="add-client-form" id="add-client-form" method="post" action="{{route('store-practitioner')}}">
        @csrf
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name" value="{{ old('first_name') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" value="{{ old('last_name') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Practice</label>
              <select class="selectpicker form-control" id="practices" name="practices" data-live-search="true">
                <option disabled selected>Select Practice</option>
                @foreach ($practices as $practice)
                <option value="{{$practice->id}}" {{ old('practices') == $practice->id ? 'selected' : '' }}>{{$practice->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Add practitioner</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

@endsection
