@extends('layouts.admin')

@section('section')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title"> {{$practice->name}}</h4>
      </div>
      <div class="card-body text-primary">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li>
                <h6>ID: {{$practice->id}}</h6>
              </li>
              <li>
                <h6>NAME: {{$practice->name}}</h6>
              </li>
              <li>
              <h6>EMAIL: {{$practice->email}}</h6>
              </li>
              <li>
                <h6>WEBSITE URL: {{$practice->website_url}}</h6>
              </li>
              <li>
                <h6>CREATE AD: {{$practice->created_at}}</h6>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection