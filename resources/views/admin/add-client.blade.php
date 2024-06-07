@extends('layouts.admin')

@section('section')
<div class="col-md-12">
  @include('messages.all-messages')
  <div class="card card-user">
    <div class="card-header">
      <h5 class="card-title">Add Client</h5>
    </div>
    <div class="card-body">
      <form name="add-client-form" id="add-client-form" method="post" action="{{route('store-client')}}">
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
              <label>Practitioner</label>
              <select class="selectpicker form-control" id="practitioner_id" name="practitioner_id" data-live-search="true">
                <option disabled selected>Select Practitioner</option>
                @foreach ($practitioners as $practitioner)
                <option value="{{$practitioner->id}}" {{ old('practitioner_id') == $practitioner->id ? 'selected' : '' }}>{{$practitioner->first_name}} {{$practitioner->last_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Add Client</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
