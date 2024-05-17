@extends('layouts.admin')

@section('section')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title"> {{$practitioner->first_name}}</h4>
      </div>
      <div class="card-body text-primary">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li>
                <h6>ID: {{$practitioner->id}}</h6>
              </li>
              <li>
                <h6>FIRST NAME: {{$practitioner->first_name}}</h6>
              </li>
              <li>
              <h6>LAST NAME: {{$practitioner->last_name}}</h6>
              </li>
              <li>
                <h6>EMAIL: {{$practitioner->email}}</h6>
                </li>
              <li>
                <h6>PRACTICE: {{$practitioner->practice->name}}</h6>
              </li>
              <li>
                <h6>CREATED AT: {{$practitioner->created_at}}</h6>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection