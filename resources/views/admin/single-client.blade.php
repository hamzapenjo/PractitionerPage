@extends('layouts.admin')

@section('section')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title"> {{$client->first_name}}</h4>
      </div>
      <div class="card-body text-primary">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li>
                <h6>ID: {{$client->id}}</h6>
              </li>
              <li>
                <h6>FIRST NAME: {{$client->first_name}}</h6>
              </li>
              <li>
              <h6>LAST NAME: {{$client->last_name}}</h6>
              </li>
              <li>
                <h6>EMAIL: {{$client->email}}</h6>
                </li>
              <li>
                <h6>PRACTITIONER ID: {{$client->practitioner_id}}</h6>
              </li>
              <li>
                <h6>CREATED AT: {{$client->created_at}}</h6>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection