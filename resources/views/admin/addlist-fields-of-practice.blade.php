@extends('layouts.admin')

@section('section')
<div class="row">
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