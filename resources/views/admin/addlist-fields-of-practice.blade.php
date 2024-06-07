@extends('layouts.admin')

@section('section')
<div class="row">
  @include('messages.all-messages')
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h4 class="card-title"> Fields of Practice</h4>
      <a class="btn btn-primary btn-round" href="{{ route('add-fields') }} ">New Field</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <form action="{{route('store-field-practice', ['id'=>$id])}}" method="post">
          @csrf
          <select class="selectpicker form-control" id="field" name="field" data-live-search="true">
            <option disabled selected>Select Field</option>
            @foreach ($fields as $field)
            <option value="{{$field->id}}">{{$field->name}}</option>
            @endforeach
          </select>
          <div class="update ml-auto mr-auto">
            <button class="btn btn-primary btn-round">Add field</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection