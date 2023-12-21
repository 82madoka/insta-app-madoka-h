@extends('layouts.app')

@section('title','Create Post')
@section('content')

<div class="container">
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- dd($all_categories) --}}
        <div class="mb-3">
            <label for="category" class="form-label d-block fw-bold">
                Category <span class="text-muted fw-normal">(up to 3)</span>
            </label>
             @foreach ($all_categories as $category)
               <div class="form-check form-check-inline">
                 <input type="checkbox" name="category[]" id="{{$category->name}}" class="form-check-input" value="{{$category->id}}">
                 <label for="{{$category->name}}" class="form-check-label">{{$category->name}}</label>
               </div>
             @endforeach

        @error('category')
        <div class="text-danger small">{{$message}}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="What's on your mind?">{{old('description')}}</textarea>
        @error('description')
        <div class="text-danger small">{{$message}}</div>
        @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" class="form-control" name="image" id="image" aria-describedby="image-info">
            <div id="image-info" class="form-text">
                The acceptable formats are jpeg, jpg, png, gif only <br>
                Maximum file size is 1048kb.
            </div>
            @error('image')
            <div class="small text-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-5">POST</button>



    </form>

</div>

@endsection
