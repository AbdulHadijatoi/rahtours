@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Activity</h1>
                            {{--  <a href="{{route('admin.menus.create')}}"
                            class="btn btn-primary btn-rounded btn-fw float-right">Add New</a>  --}}
                            <div class="table-responsive">

                                <div class="container mx-auto mt-4">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            
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
            
        </div>
    @endif
</div>

                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Route</th>
                                            <th>Page Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($menus as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->route }}</td>
                                                <td>{{ $value->page_title }}</td>
                                                @if ($value->status == true)
                                                    <td class="text-success">Active</td>
                                                @elseif ($value->status == false)
                                                    <td class="text-danger">InActive</td>
                                                @endif
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="actionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.menus.edit', $value->id) }}">Edit</a>
                                                            <!-- <a class="dropdown-item"
                                                                                href="{{ route('admin.menus.destroy', $value->id) }}"
                                                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this package?')) document.getElementById('delete-form-{{ $value->id }}').submit();">Delete</a>

                                                                            <form id="delete-form-{{ $value->id }}"
                                                                                action="{{ route('admin.menus.destroy', $value->id) }}"
                                                                                method="POST" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form> -->
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
