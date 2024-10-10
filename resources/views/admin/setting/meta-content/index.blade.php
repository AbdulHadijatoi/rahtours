@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Meta Title and Description for All Pages</h4>

                        <form class="forms-sample" action="{{ route('admin.setting.metaContent.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

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

                            @foreach($pages as $page)
                                <h4 class="my-4" style="font-size: 18px;">{{ $page->name }}</h4>
                                <div class="form-group">
                                    <label for="metaTitle-{{ $page->id }}">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle-{{ $page->id }}" name="pages[{{ $page->id }}][meta_title]" value="{{ old('pages.' . $page->id . '.meta_title', $page->meta_title) }}" placeholder="Meta Title">
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label for="metaDescription-{{ $page->id }}">Meta Description</label>
                                    <input type="text" class="form-control" id="metaDescription-{{ $page->id }}" name="pages[{{ $page->id }}][meta_description]" value="{{ old('pages.' . $page->id . '.meta_description', $page->meta_description) }}" placeholder="Meta Description">
                                </div>

                                <br>
                            @endforeach

                            <button type="submit" class="btn btn-primary mt-3">Update Meta Content</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
