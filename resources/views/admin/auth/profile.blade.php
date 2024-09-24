@php
    $user=Auth::user();
@endphp
@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="row">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Profile Setting</h4>
        <form class="forms-sample" action="{{route('admin.updateProfile',$user->id)}}"  method="post" id="profile-form">
            @csrf
            <div class="container mx-auto mt-4">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="w-5 h-5 absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M10 9l3.5-3.5L15 7l-3.5 3.5L15 14l-1.5 1.5L10 12l-3.5 3.5L5 14l3.5-3.5L5 7l1.5-1.5L10 9z"/></svg>
            </span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">Please fix the following errors:</span>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <span class="w-5 h-5 absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M10 9l3.5-3.5L15 7l-3.5 3.5L15 14l-1.5 1.5L10 12l-3.5 3.5L5 14l3.5-3.5L5 7l1.5-1.5L10 9z"/></svg>
            </span>
        </div>
    @endif
</div>

          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" name="first_name" value="{{$user->first_name ?? ''}}" required>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail3" placeholder="Email" name="email" value="{{$user->email ?? ''}}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
    </div>
</div>
@endsection
@include('admin.layouts.components.scripts')
<script src="{{asset('admin/plugins/validation/validate.min.js') }}"></script>
<script>
    var Profileform = $("#profile-form");
    $(document).ready(function() {
        loginform.validate({
        ignore: "",
        rules: {
            name: {
            required: true
          },
          email: {
            required: true
          },
        },
        messages: {
            name: {
          required: "Please enter the name",
          },
          email: {
          required: "Please enter the email",
          },
        },
        highlight: function(element) {
          $(element).addClass("is-invalid");
        },
        unhighlight: function(element) {
          $(element).removeClass("is-invalid");
        },
        errorPlacement: function(error, element) {
          error.addClass("invalid-feedback");
          error.insertAfter(element);
        },
        submitHandler: function(form) {
          form.preventDefault()
          return false
          // Handle form submission
        }
      });
    });
    $.validator.addMethod("strongPassword", function(value, element) {
        return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/.test(value);
    }, "Password must be a combination of letters, digits, symbols, and both lowercase and uppercase letters. It should be at least 8 characters long.");
</script>
