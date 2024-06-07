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
            <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th class="text-right">
                Created at
              </th>
              <th class="text-right">
                Action
              </th>
            </thead>
            <tbody>
              @foreach ($fields as $field)
              <tr>
                <td>
                  {{$field->id}}
                </td>
                <td>
                  {{$field->name}}
                </td>
                <td class="text-right">
                  {{$field->created_at}}
                </td>
                <td class="text-right d-flex justify-content-around">
                  <a href="{{ route('show-field', ['id' => $field->id]) }}" class="btn btn-primary btn-round">View</a>
                  <a href="{{ route('edit-field', ['id' => $field->id]) }}" class="btn btn-primary btn-round">Edit</a>
                  <button type="button" class="btn btn-danger btn-round" data-toggle="modal" data-target="#deleteFieldModal-{{ $field->id }}">Delete</button>
                </td>
              </tr>
              <div class="modal fade" id="deleteFieldModal-{{ $field->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteFieldModalLabel-{{ $field->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteFieldModalLabel-{{ $field->id }}">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete <strong>{{ $field->name }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Cancel</button>
                            <form action="{{ route('delete-field', ['id' => $field->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-round">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
            </tbody>
          </table> 
          {{ $fields->links() }} 
        </div>
      </div>
    </div>
  </div>
@endsection