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
          <h4 class="card-title">Practitioners</h4>
          <a class="btn btn-primary btn-round" href="{{ route('add-practitioner') }} ">New Practitioner</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  ID
                </th>
                <th>
                  First Name
                </th>
                <th>
                  Last Name
                </th>
                <th>
                  Email
                </th>
                <th>
                  Practice
                </th>
                <th class="text-right">
                  Created at
                </th>
                <th class="text-right">
                  Action
                </th>
              </thead>
              <tbody>
                @foreach ($practitioners as $practitioner)
                <tr>
                  <td>
                    {{$practitioner->id}}
                  </td>
                  <td>
                    {{$practitioner->first_name}}
                  </td>
                  <td>
                    {{$practitioner->last_name}}
                  </td>
                  <td>
                    {{$practitioner->email}}
                  </td>
                  <td>
                    {{$practitioner->practice->name}}
                  </td>
                  <td class="text-right">
                    {{$practitioner->created_at}}
                  </td>
                  <td class="text-right d-flex justify-content-around">
                    <a href="{{ route('show-practitioner', ['id' => $practitioner->id]) }}" class="btn btn-primary btn-round">View</a>
                    <a href="{{ route('edit-practitioner', ['id' => $practitioner->id]) }}" class="btn btn-primary btn-round">Edit</a>
                    <form name="delete-practitioner" id="delete-practitioner" method="post" action="{{route('delete-practitioner', ['id'=> $practitioner->id]) }}">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-round">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            {{ $practitioners->links() }}
          </div>
        </div>
      </div>
    </div>

@endsection