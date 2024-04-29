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
          <h4 class="card-title"> Practices</h4>
          <a class="btn btn-primary btn-round" href="{{ route('add-practice') }} ">New Practice</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  ID
                </th>
                <th>
                  Name
                </th>
                <th>
                  Email
                </th>
                <th class="text-right">
                  Created at
                </th>
                <th class="text-right">
                  Action
                </th>
              </thead>
              <tbody>
                @foreach ($practices as $practice)
                <tr>
                  <td>
                    {{$practice->id}}
                  </td>
                  <td>
                    {{$practice->name}}
                  </td>
                  <td>
                    {{$practice->email}}
                  </td>
                  <td class="text-right">
                    {{$practice->created_at}}
                  </td>
                  <td class="text-right d-flex justify-content-around">
                    <a href="{{ route('show-practice', ['id' => $practice->id]) }}" class="btn btn-primary btn-round">View</a>
                    <a href="{{ route('edit-practice', ['id' => $practice->id]) }}" class="btn btn-primary btn-round">Edit</a>
                    <form name="delete-practice" id="delete-practice" method="post" action="{{route('delete-practice', ['id'=> $practice->id]) }}">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-round">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            {{ $practices->links() }}
          </div>
        </div>
      </div>
    </div>

@endsection