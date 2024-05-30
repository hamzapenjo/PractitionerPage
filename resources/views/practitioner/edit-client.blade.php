@extends('layouts.dashboard')

@section('section')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible text-white" role="alert">
    <span class="text-sm">{{ session()->get('message') }}</span>
    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  
@endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex align-items-center justify-content-between px-3">
                            <h6 class="text-white text-capitalize ps-3">Edit client</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                    <div class="card">
                        <div class="card-body">
                            <form name="edit-client-form" id="edit-client-form" method="post" action="{{route('store-edit-client-practitioner', ['id'=> $user->id]) }}" class="w-full">
                                @csrf
                                @method('PUT')
                                <div class="input-group input-group-outline my-3 w-50">
                                    <input type="text" id="first-name" name="first_name" class="form-control" required="" value="{{$user->first_name}}" style="color: black;">
                                </div>
                                <div class="input-group input-group-outline my-3 w-50">
                                    <input type="text" id="last-name" name="last_name" class="form-control" required="" value="{{$user->last_name}}" style="color: black;">
                                </div>
                                <div class="input-group input-group-outline my-3 w-50">
                                    <input type="email" id="email" name="email" class="form-control" required="" value="{{$user->email}}" style="color: black;">
                                </div>
                                <div class="input-group input-group-outline my-3 w-50">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control"  style="color: black;">
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-success w-10 mb-0 toast-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
