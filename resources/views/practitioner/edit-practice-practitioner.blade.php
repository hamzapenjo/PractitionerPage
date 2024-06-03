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
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
          <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
          <div class="row gx-4 mb-2">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="{{$practice->logo ? asset('storage/' . $practice->logo) : Vite::asset('resources/img/placeholder.jpg') }}" alt="practice_logo" class="w-100 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">
                  {{ $practice->name }}
                </h5>
              </div>
            </div>
            <div class="container-fluid py-1">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-1">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            </div>
                            <div class="card-body px-0 pb-0">
                                <div class="table-responsive p-0">
                            <div class="card">
                                <div class="card-body">
                                    <form name="edit-practice-form" id="edit-practice-form" method="post" action="{{ route('store-practice-practitioner') }}" enctype="multipart/form-data" class="w-full">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group input-group-outline my-3 w-50">
                                          <input type="text" class="form-control" placeholder="Name" id="name" name="name" required value="{{ old('name', $practice->name) }}">
                                        </div>
                                        <div class="input-group input-group-outline my-3 w-50">
                                          <input type="email" class="form-control" placeholder="Email" id="email" name="email" required value="{{ old('email', $practice->email) }}">
                                        </div>
                                        <div class="input-group input-group-outline my-3 w-50">
                                          <input type="text" class="form-control" placeholder="Url" id="url" name="url" required value="{{ old('url', $practice->website_url) }}">
                                        </div>
                                        <div>
                                            <label for="logo" class="form-label">Practice Logo</label>
                                            <br>
                                            <input type="file" id="logo" name="logo" style="color: black;">
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
