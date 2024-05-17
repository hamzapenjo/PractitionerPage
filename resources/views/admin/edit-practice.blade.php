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
      <h5 class="card-title">Edit Practice</h5>
    </div>
    <div class="card-body">
      <form name="edit-practice-form" id="edit-practice-form" method="post" action="{{route('store-edit', ['id'=> $practice->id]) }}" class="w-full">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ old('name', $practice->name) }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email', $practice->email) }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Website URL</label>
              <input type="url" class="form-control" placeholder="URL" id="website_url" name="website_url" value="{{ old('website_url', $practice->website_url) }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Edit practice</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="card card-user">
    <div class="card-header">
      <h5 class="card-title">Add Field of Practice</h5>
    </div>
    <div class="card-body">
      <form name="add-field-practice-form" id="add-field-practice-form" method="post" action="{{route('store-field-practice', ['id'=> $practice->id]) }}" class="w-full">
        @csrf
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" name="name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Add field</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection