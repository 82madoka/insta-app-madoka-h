@extends('layouts.app')

@section('title', 'Edit Post')
@section('content')
    <div class="container">
        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{-- dd($all_categories) --}}
            <div class="mb-3">
                <label for="category" class="form-label d-block fw-bold">
                    Category <span class="text-muted fw-normal">(up to 3)</span>
                </label>

                {{-- check --}}
                @foreach ($all_categories as $category)
                    {{-- {{dd($selected_categories)}} --}}
                    <div class="form-check form-check-inline">
                        @if (in_array($category->id, $selected_categories))
                            <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input"
                                value="{{ $category->id }}" checked>
                        @else
                            <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input"
                                value="{{ $category->id }}">
                        @endif
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                    </div>
                @endforeach


                {{-- in array (a,b) --}}
                {{-- in array it will check if value a is inside value b(array) --}}

                {{-- --a value you want to check --}}
                {{-- --b array that you want to see if a is inside --}}

                @error('category')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                {{-- image data --}}
                <a href="{{ route('post.show', $post->id) }}">
                    <img src="{{ $post->image }}" alt="{{ $post->id }}" class="w-50">
                </a>
                <br>
                <label for="image" class="form-label fw-bold mt-3">Image</label>
                <input type="file" class="form-control" name="image" id="image" aria-describedby="image-info">
                <div id="image-info" class="form-text">
                    The acceptable formats are jpeg, jpg, png, gif only <br>
                    Maximum file size is 1048kb.
                </div>
                @error('image')
                    <div class="small text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning px-5">Save</button>



        </form>

    </div>

@endsection
