@extends('layouts.dashboard')

@section('section')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex align-items-center justify-content-between px-3">
                            <h6 class="text-white text-capitalize ps-3">Clients List</h6>
                            <a class="btn bg-gradient-success mb-0 toast-btn" href="{{ route('add-client-practitioner') }}">New Client</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            @if ($clients->isEmpty())
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">No clients found</h6>
                                    </div>
                                </div>
                            @else
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                First name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Last name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $client->first_name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $client->last_name }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $client->email }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href="{{ route('client-show', ['id' => $client->id]) }}" class="btn bg-gradient-success w-100 mb-0 toast-btn">View</a>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href="{{ route('edit-client-practitioner', ['id' => $client->id]) }}" class="btn bg-gradient-info w-100 mb-0 toast-btn">Edit</a>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <button type="button" class="btn bg-gradient-danger w-100 mb-0 toast-btn delete-client-btn"
                                                                data-client-id="{{ $client->id }}" data-client-name="{{ $client->first_name }} {{ $client->last_name }}">
                                                            Delete
                                                        </button>
                                                        <div id="deleteModal-{{ $client->id }}" class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $client->id }}" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $client->id }}">Confirm Delete</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete <strong>{{ $client->first_name }} {{ $client->last_name }}</strong>?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form>
                                                                        <button type="button" class="btn btn-info mb-1" data-bs-dismiss="modal">Cancel</button>
                                                                        </form>
                                                                        <form id="delete-client-form-{{ $client->id }}" method="post" action="{{ route('delete-client-practitioner', ['id'=> $client->id]) }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger mb-1">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $clients->links() }}
                                </div> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
