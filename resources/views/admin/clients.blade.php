@extends('layouts.admin')

@section('section')
<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span>{{ session()->get('message') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>  
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Clients</h4>
                <a class="btn btn-primary btn-round" href="{{ route('add-client') }}">New Client</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Practitioner ID</th>
                                <th class="text-right">Created at</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->practitioner_id }}</td>
                                <td class="text-right">{{ $client->created_at }}</td>
                                <td class="text-right">
                                    <a href="{{ route('show-client', ['id' => $client->id]) }}" class="btn btn-primary btn-round">View</a>
                                    <a href="{{ route('edit-client', ['id' => $client->id]) }}" class="btn btn-primary btn-round">Edit</a>
                                    <button type="button" class="btn btn-danger btn-round delete-client-btn"
                                            data-toggle="modal" data-target="#deleteClientModal-{{ $client->id }}"
                                            data-client-id="{{ $client->id }}" data-client-name="{{ $client->first_name }} {{ $client->last_name }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Client Modal -->
@foreach ($clients as $client)
<div class="modal fade" id="deleteClientModal-{{ $client->id }}" tabindex="-1" aria-labelledby="deleteClientModalLabel-{{ $client->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteClientModalLabel-{{ $client->id }}">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete client <strong>{{ $client->first_name }} {{ $client->last_name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Cancel</button>
                <form id="delete-client-form-{{ $client->id }}" method="post" action="{{ route('delete-client', ['id'=> $client->id]) }}">
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
