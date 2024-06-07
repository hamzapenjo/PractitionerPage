@extends('layouts.admin')

@section('section')
<div class="row">
    <div class="col-md-12">
      @include('messages.all-messages')
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h4 class="card-title">Practitioners</h4>
          <div>
            <a class="btn btn-success btn-round" href="{{ route('add-practitioner') }} ">New Practitioner</a>
            <a class="btn btn-warning btn-round" target="_blank" href="{{ route('admin-export-practitioners') }} ">Export Practitioners</a>
          </div>
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
                    <button type="button" class="btn btn-danger btn-round delete-practitioner-btn"
                            data-toggle="modal" data-target="#deletePractitionerModal-{{ $practitioner->id }}"
                            data-practitioner-id="{{ $practitioner->id }}" data-practitioner-name="{{ $practitioner->first_name }} {{ $practitioner->last_name }}">
                        Delete
                    </button>
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
</div>

<!-- Delete Practitioner Modal -->
@foreach ($practitioners as $practitioner)
<div class="modal fade" id="deletePractitionerModal-{{ $practitioner->id }}" tabindex="-1" aria-labelledby="deletePractitionerModalLabel-{{ $practitioner->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePractitionerModalLabel-{{ $practitioner->id }}">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete practitioner <strong>{{ $practitioner->first_name }} {{ $practitioner->last_name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Cancel</button>
                <form id="delete-practitioner-form-{{ $practitioner->id }}" method="post" action="{{ route('delete-practitioner', ['id'=> $practitioner->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-round">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
