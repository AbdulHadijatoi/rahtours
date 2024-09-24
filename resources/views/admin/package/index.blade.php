@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Activity</h1>
                        <a href="{{route('admin.packages.create')}}"
                            class="btn btn-primary btn-rounded btn-fw float-right">Add New</a>
                        <div class="table-responsive">

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

                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Activity</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Adult Price</th>
                                        <th>Child Price</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($package as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->activity->name}}</td>
                                        <td>{{$value->title}}</td>
                                        @if($value->category==='private')
                                        <td>{{$value->price}}</td>
                                        @else
                                        <td>Sharing</td>
                                        @endif
                                        @if($value->category==='sharing')
                                        <td>{{$value->adult_price}}</td>
                                        <td>{{$value->child_price}}</td>
                                        @else
                                        <td>Private</td>
                                        <td>Private</td>
                                        @endif
                                        <td>{{$value->highlight}}</td>
                                        <td>
                                            {{$value->category}}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="actionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.packages.edit', $value->id) }}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.packages.destroy', $value->id) }}"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this package?')) document.getElementById('delete-form-{{ $value->id }}').submit();">Delete</a>

                                                    <form id="delete-form-{{ $value->id }}"
                                                        action="{{ route('admin.packages.destroy', $value->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No data found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
