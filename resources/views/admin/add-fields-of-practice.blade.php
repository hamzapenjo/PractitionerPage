@extends('layouts.admin')

@section('section')
<div class="col-md-12">
  @include('messages.all-messages')
  <div class="card card-user">
    <div class="card-header">
      <h5 class="card-title">Add Field of Practice</h5>
    </div>
    <div class="card-body">
      <form name="add-practice-form" id="add-practice-form" method="post" action="{{route('store-fields')}}">
        @csrf
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ old('name') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Add practice</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
