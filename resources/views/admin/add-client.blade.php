@extends('layouts.admin')

@section('section')
<div class="col-md-12">
  @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show">
      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="nc-icon nc-simple-remove"></i>
      </button>
      <span>{{ session()->get('message') }}</span>
    </div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="nc-icon nc-simple-remove"></i>
      </button>
      <ul>
        @foreach ($errors->all() as $error )
          <li>
            <span>{{$error}}</span>
          </li>
        @endforeach
      </ul>
    </div>  
  @endif
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
              <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" id="email" name="email">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Practitioner ID</label>
              <input type="number" class="form-control" placeholder="ID" id="practitioner_id" name="practitioner_id">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Add client</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

@endsection