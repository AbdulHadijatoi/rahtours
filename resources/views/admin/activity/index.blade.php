@extends('admin.layouts.main')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Activity</h1>
                            <a href="{{ route('admin.activities.create') }}"
                                class="btn btn-primary btn-rounded btn-fw float-right mb-2">Add New</a>
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
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Instructions</th>
                                            <th>Packages</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($activity as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->category->name }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#instructionModal"
                                                        data-instruction-base-url="{{ route('admin.instruction.destroy', ['id' => 0]) }}"
                                                        data-instruction="{{ $value->instructions }}">
                                                        Instructions
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#packageModal"
                                                        data-base-url="{{ route('admin.packages.destroy', ['id' => 0]) }}"
                                                        data-package="{{ $value->packages }}">
                                                        Packages
                                                    </button>
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
                                                                href="{{ route('admin.activities.edit', $value->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.activities.destroy', $value->id) }}"
                                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this activity?')) document.getElementById('delete-form-{{ $value->id }}').submit();">Delete</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.activityimages', $value->id) }}">Images</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                                data-target="#detailsModal" data-activity='@json($value)'>
                                                                View Details
                                                            </a>
                                                            <form id="delete-form-{{ $value->id }}"
                                                                action="{{ route('admin.activities.destroy', $value->id) }}"
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


<!-- Modal -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:80%; max-width: 80%; height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Activity Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center lead" id="modalDescriptionContent">
                    <!-- Description will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="instructionModal" tabindex="-1" role="dialog" aria-labelledby="instructionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:80%; max-width: 80%; height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instructionModalLabel">Activity Instructions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="dataTable2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="modalInstructionContent">
                            <!-- Instructions will be loaded here -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:80%; max-width: 80%; height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageModalLabel">Activity Packages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="dataTable3" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Adult Price</th>
                                    <th>Child Price</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="modalPackageContent">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 80%; max-width: 80%; height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Activity Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody id="modalDetailsContent">
                            <!-- Details will be loaded here -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#descriptionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var description = button.data('description')
                var modal = $(this)
                modal.find('.modal-body').html(description)
            })

            $('#instructionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var instructions = button.data('instruction');
                var baseUrl = button.data('instruction-base-url');
                var modal = $(this);
                var modalBody = modal.find('.modal-body');

                modalBody.find('#modalInstructionContent').empty();

                $.each(instructions, function(index, instruction) {
                    var deleteUrl = baseUrl.replace('/0', '/' + instruction.id);
                    var row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + instruction.instruction_title + '</td>' +
                        '<td style="white-space:normal">' + instruction.instruction_description +
                        '</td>' +
                        '<td><a href="' + deleteUrl + '" class="btn btn-danger">Delete</a></td>' +
                        '</tr>';
                    modalBody.find('#modalInstructionContent').append(row);
                });
            });

            $('#packageModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var packages = button.data('package');
                var baseUrl = button.data('base-url');
                var modal = $(this);
                var modalBody = modal.find('.modal-body');

                modalBody.find('#modalPackageContent').empty();

                $.each(packages, function(index, package) {
                    var deleteUrl = baseUrl.replace('/0', '/' + package.id);
                    var row = '<tr>' +
                        '<td>' + package.id + '</td>' +
                        '<td>' + package.title + '</td>' +
                        (package.category === 'private' ? '<td>' + package.price + '</td>' :
                            '<td>Sharing</td>') +
                        (package.category === 'sharing' ? '<td>' + package.adult_price +
                            '</td><td>' + package.child_price + '</td>' :
                            '<td>Private</td><td>Private</td>') +
                        '<td style="white-space:normal">' + package.highlight + '</td>' +
                        '<td>' + package.category + '</td>' +
                        '<td><a href="' + deleteUrl + '" class="btn btn-danger">Delete</a></td>' +
                        '</tr>';
                    modalBody.find('#modalPackageContent').append(row);
                });
            });

            $('#detailsModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var activity = button.data('activity');
                var modal = $(this);
                var modalBody = modal.find('.modal-body tbody');

                var detailsContent = `
                    <tr><th>ID</th><td>${activity.id}</td></tr>
                    <tr><th>URL</th><td>${activity.slug}</td></tr>
                    <tr><th>Name</th><td>${activity.name}</td></tr>
                    <tr><th>Page Title</th><td>${activity.page_title}</td></tr>
                    <tr><th>Category</th><td>${activity.category.name}</td></tr>
                    <tr><th>Duration</th><td>${activity.duration}</td></tr>
                    <tr><th>Start Time</th><td>${activity.start_time}</td></tr>
                    <tr><th>Cancellation Duration</th><td>${activity.cancellation_duration}</td></tr>
                    <tr><th>Features</th><td>${Array.isArray(activity.features) ? activity.features.join(', ') : activity.features}</td></tr>
                    <tr><th>Description</th><td><div style="text-wrap:wrap;">${activity.description}</div></td></tr>
                `;

                modalBody.html(detailsContent);
            });
        });
    </script>

    <style>
        /* Custom styles to make the modal body scrollable */
        .modal-body {
            overflow-y: auto;
        }

        /* Custom styles to display data vertically */
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
@endsection
