@extends('layouts.app')

@section('page-title', 'Edit '.$project->title)

@section('main-content')
<div class="d-flex justify-content-end pt-3">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-dark fw-bolder">
        <- Return to your projects
    </a>
</div>
<h1>
    Edit {{ $project->title }}
</h1>

<div class="row">
    <div class="col py-4">
        {{-- reindirizzamento ad update, ricordarsi di usare method PUT --}}
        <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST"> 
            @csrf

            {{-- grazie a blade, utilizzo il method PUT - altrimenti ritornerei a store --}}
            @method('PUT')

            <div class="mb-3">
                <label for="url" class="form-label fw-bolder">URL</label>
                <input value="{{ old('url', $project->url) }}" type="text" class="form-control" @error('url') is-invalid @enderror id="url" name="url" placeholder="Add your updated Project URL..." maxlength="1024">
                @error('url')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label fw-bolder">Title <span class="text-danger">*</span></label>
                <input value="{{ old('title', $project->title) }}" type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" placeholder="Add your updated Project Title..." maxlength="255" required>
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bolder">Content</label>
                <textarea class="form-control" @error('content') is-invalid @enderror id="content" name="content" rows="3" maxlength="4000" placeholder="Add your updated Project Content...">{{ old('content', $project->content) }}</textarea>
                @error('content')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="slug" class="form-label fw-bolder">SLUG</label>
                <input value="{{ old('slug', $project->slug) }}" type="text" class="form-control" @error('slug') is-invalid @enderror id="slug" name="slug" placeholder="Add your updated Project SLUG..." max="255">
                @error('slug')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div>
                <button type="submit" class="btn btn-dark w-100 fw-bolder">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection