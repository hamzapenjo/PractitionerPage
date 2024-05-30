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
            <div class="card-header">
                <h4 class="card-title">Practices</h4>
                <a class="btn btn-primary btn-round" href="{{ route('add-practice') }}">New Practice</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-right">Created at</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($practices as $practice)
                            <tr>
                                <td>{{ $practice->id }}</td>
                                <td>{{ $practice->name }}</td>
                                <td>{{ $practice->email }}</td>
                                <td class="text-right">{{ $practice->created_at }}</td>
                                <td class="text-right">
                                    <a href="{{ route('show-practice', ['id' => $practice->id]) }}" class="btn btn-primary btn-round">View</a>
                                    <a href="{{ route('edit-practice', ['id' => $practice->id]) }}" class="btn btn-primary btn-round">Edit</a>
                                    <button type="button" class="btn btn-danger btn-round delete-practice-btn"
                                            data-practice-id="{{ $practice->id }}" data-practice-name="{{ $practice->name }}">
                                        Delete
                                    </button>
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
</div>

<!-- Delete Practice Modal -->
@foreach ($practices as $practice)
<div class="modal fade" id="deletePracticeModal-{{ $practice->id }}" tabindex="-1" aria-labelledby="deletePracticeModalLabel-{{ $practice->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePracticeModalLabel-{{ $practice->id }}">Confirm Delete</h5>
                <button type="button" class="nc-icon nc-simple-remove" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong>{{ $practice->name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form>
                  <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Cancel</button>
                </form>
                <form id="delete-practice-form-{{ $practice->id }}" method="post" action="{{ route('delete-practice', ['id'=> $practice->id]) }}">
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