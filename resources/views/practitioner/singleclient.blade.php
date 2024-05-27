@extends('layouts.dashboard')
@section('section')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex align-items-center justify-content-between px-3">
                            <h6 class="text-white text-capitalize ps-3">Singe Client Info</h6>
                        </div>
                    </div>
                    <ul class="align-items-center mb-0 pt-3 pb-3">
                        <li class="list-group-item border-0 ps-0 pt-0 text-md"><strong class="text-dark">ID:</strong> &nbsp; {{$client->id}}
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-1 text-md"><strong class="text-dark">First Name</strong> &nbsp; {{$client->first_name}}
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-1 text-md"><strong class="text-dark">Last Name</strong> &nbsp; {{$client->last_name}}
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-1 text-md"><strong class="text-dark">Email</strong> &nbsp; {{$client->email}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection