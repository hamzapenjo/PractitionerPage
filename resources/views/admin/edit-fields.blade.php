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
      <h5 class="card-title">Edit Fields of Practice</h5>
    </div>
    <div class="card-body">
      <form name="edit-field-form" id="edit-field-form" method="post" action="{{route('store-field-edit', ['id'=> $field->id]) }}" class="w-full">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ old('name', $field->name) }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Edit Field</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
