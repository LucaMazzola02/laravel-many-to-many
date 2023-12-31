@extends('layouts.app')

@section('content')
<div class="container" id="projects-container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" placeholder="Insert your post's title" name="title"  value="{{ old('title', '') }}">
                </div>

                @error('type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="type_id" class="form-label">
                        Type
                    </label>
                    <select class='form-select' name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                @error('technology_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-5">
                <label for="technologies" class="form-label">
                    Technologies
                </label>
                <div>
                    @foreach ($technologies as $technology)
                        <input type="checkbox" name="technologies[]" class="form-check-input" id="technologies" value="{{ $technology->id }}"
                            @if( in_array($technology->id, old('technologies', []))) checked @endif>
                        <label for="technologies" class="form-check-label me-3">
                            {{ $technology->name }}
                        </label>
                    @endforeach
                </div>
            </div>



                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="image" class="form-label">
                        Image
                    </label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="Upload your image" value="{{ old('image', '') }}">
                </div>

                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="content" class="form-label">
                        Content
                    </label>
                    <textarea class="form-control" id="content" rows="7" name="content">{{ old('content', '') }}</textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="me-3">
                        Create new project
                    </button>
                    <button type="reset">
                        Reset
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
