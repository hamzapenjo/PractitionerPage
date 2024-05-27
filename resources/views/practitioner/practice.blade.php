@extends('layouts.dashboard')

@section('section')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex align-items-center justify-content-between px-3">
                            <h6 class="text-white text-capitalize ps-3">Practices Info</h6>
                            <a class="btn bg-gradient-success mb-0 toast-btn" href="{{ route('add-field') }}">New Field</a>
                        </div>
                    </div>
                    <ul class="align-items-center mb-0 pt-4 pb-4">
                        <li class="list-group-item border-0 ps-0 pt-0 text-lg"><strong class="text-dark">Practice Name:</strong> &nbsp; {{$practice->name}}
                        </li>
                        @foreach ($fields as $field)
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark"> Field of Practice:</strong> &nbsp; {{$field->name}}
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection