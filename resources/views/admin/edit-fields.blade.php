@extends('layouts.admin')

@section('section')
<div class="col-md-12">
  @include('messages.all-messages')
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
