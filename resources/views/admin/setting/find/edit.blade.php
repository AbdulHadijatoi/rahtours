@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Find-Us Details</h4>

                            <form class="forms-sample" action="{{ route('admin.setting.find.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                    <label for="image">Previous Image: </label><br>
                                    <img src="{{ asset($data->image) }}" alt="Image" class="img-fluid mb-3"
                                        width="100">
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Previous Header Image: </label><br>
                                    <img src="{{ asset($data->header_image) }}" alt="Image" class="img-fluid mb-3"
                                        width="100">
                                </div>

                                <div class="form-group">
                                    <label for="header_image">Header Image</label>
                                    <input type="file" class="form-control @error('header_image') is-invalid @enderror"
                                        name="header_image">
                                    @error('header_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="exampleInputPhone" placeholder="Phone" name="phone"
                                        value="{{ old('phone', $data->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Email" name="email"
                                        value="{{ old('email', $data->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputWhatsapp">WhatsApp</label>
                                    <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                        id="exampleInputWhatsapp" placeholder="WhatsApp" name="whatsapp"
                                        value="{{ old('whatsapp', $data->whatsapp) }}">
                                    @error('whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputAddress">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="exampleInputAddress" placeholder="Address" name="address"
                                        value="{{ old('address', $data->address) }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputTimeZone">Time Zone</label>
                                    <input type="text" class="form-control @error('time_zone') is-invalid @enderror"
                                        id="exampleInputTimeZone" placeholder="Time Zone" name="time_zone"
                                        value="{{ old('time_zone', $data->time_zone) }}">
                                    @error('time_zone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputBookingEmail">Booking Email</label>
                                    <input type="email" class="form-control @error('booking_email') is-invalid @enderror"
                                        id="exampleInputBookingEmail" placeholder="Booking Email" name="booking_email"
                                        value="{{ old('booking_email', $data->booking_email) }}">
                                    @error('booking_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputBusinessEmail">Business Email</label>
                                    <input type="email"
                                        class="form-control @error('business_email') is-invalid @enderror"
                                        id="exampleInputBusinessEmail" placeholder="Business Email" name="business_email"
                                        value="{{ old('business_email', $data->business_email) }}">
                                    @error('business_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPressEmail">Press Email</label>
                                    <input type="email" class="form-control @error('press_email') is-invalid @enderror"
                                        id="exampleInputPressEmail" placeholder="Press Email" name="press_email"
                                        value="{{ old('press_email', $data->press_email) }}">
                                    @error('press_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputGeneralEmail">General Email</label>
                                    <input type="email"
                                        class="form-control @error('general_email') is-invalid @enderror"
                                        id="exampleInputGeneralEmail" placeholder="General Email" name="general_email"
                                        value="{{ old('general_email', $data->general_email) }}">
                                    @error('general_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
