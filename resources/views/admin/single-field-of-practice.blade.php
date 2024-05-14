@extends('layouts.admin')

@section('section')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title"> {{$field->name}}</h4>
      </div>
      <div class="card-body text-primary">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li>
                <h6>ID: {{$field->id}}</h6>
              </li>
              <li>
                <h6>NAME: {{$field->name}}</h6>
              </li>
              <li>
                <h6>CREATED AT: {{$field->created_at}}</h6>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection