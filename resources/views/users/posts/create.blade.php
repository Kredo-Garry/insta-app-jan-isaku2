@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
      @csrf
     {{-- Cross site Request Forgeries --}}
     {{-- The @csrf is laravel way to protect our form, to protext application from malicious request., it is layer of security --}}
      <div class="mb-3">
        <label for="category" class="form-label d-block fw-bold">
            Category<span class="text-muted fw-normal">(Up to 3)</span>
        </label>

        {{-- Loop over all the list of categories and display it in a checkboxes --}}
        @foreach ($all_categories as $category)
           <div class="form-check form-check-inline">
               <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input">
               <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
           </div>
            
        @endforeach
        {{-- Error Message Area --}}
        @error('category')
           <p class="text-danger small">{{ $message }}</p>        
        @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control" placeholder="What's on your mind">{{ old('description') }}</textarea>
        {{-- Error message area --}}
        @error('description')
           <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="image" class="form-label fw-bold">Image</label>
        <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
        <div class="form-text" id="image-info">
            The acceptable formats are jpeg, jpg, png and gif only.
            <br>
            Max file size is 1048kb
        </div>
        {{-- Error message area --}}
        @error('image')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary px-5">Post</button>
    </form>
@endsection