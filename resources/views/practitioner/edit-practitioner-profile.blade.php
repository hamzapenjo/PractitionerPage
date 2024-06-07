@extends('layouts.dashboard')

@section('section')
@include('messages.all-messages')  
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
          <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
          <div class="row gx-4 mb-2">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="{{$user->profile_picture ? asset('storage/' . $user->profile_picture) : Vite::asset('resources/img/placeholder.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">
                  {{ $user->first_name }} {{ $user->last_name }}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                  {{ $practice->name }}
                </p>
              </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                            <div class="card">
                                <div class="card-body">
                                    <form name="edit-practitioner-profile-form" id="edit-practitioner-profile-form" method="post" action="{{ route('store-practitioner-profile') }}" enctype="multipart/form-data" class="w-full">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group input-group-outline my-3 w-50">
                                            <input type="text" id="first-name" name="first_name" class="form-control" required value="{{ $user->first_name }}" style="color: black;">
                                        </div>
                                        <div class="input-group input-group-outline my-3 w-50">
                                            <input type="text" id="last-name" name="last_name" class="form-control" required value="{{ $user->last_name }}" style="color: black;">
                                        </div>
                                        <div class="input-group input-group-outline my-3 w-50">
                                            <input type="email" id="email" name="email" class="form-control" required value="{{ $user->email }}" style="color: black;">
                                        </div>
                                        <div class="input-group input-group-outline my-3 w-50">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" style="color: black;">
                                        </div>
                                        <div>
                                            <label for="profile_picture" class="form-label">Profile Picture</label>
                                            <br>
                                            <input type="file" id="profile_picture" name="profile_picture" style="color: black;">
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
