@extends('layouts.app')

@section('page-title', 'New Project')

@section('main-content')
<h1>
    Create your new Project!
</h1>

<div class="row">
    <div class="col py-4">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="url" class="form-label fw-bolder">URL</label>
                <input value="{{ old('url') }}" type="text" class="form-control" @error('url') is-invalid @enderror id="url" name="url" placeholder="Add your Project URL..." maxlength="1024">
                @error('url')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label fw-bolder">Title <span class="text-danger">*</span></label>
                <input value="{{ old('title') }}" type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" placeholder="Add your Project Title..." maxlength="255" required>
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bolder">Content</label>
                <textarea class="form-control" @error('content') is-invalid @enderror id="content" name="content" rows="3" maxlength="4000" placeholder="Add your Project Content...">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="slug" class="form-label fw-bolder">SLUG</label>
                <input value="{{ old('slug') }}" type="text" class="form-control" @error('slug') is-invalid @enderror id="slug" name="slug" placeholder="Add your Project SLUG..." max="255">
                @error('slug')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div>
                <button type="submit" class="btn btn-dark w-100 fw-bolder">
                    + ADD
                </button>
            </div>
        </form>
    </div>
</div>
@endsection