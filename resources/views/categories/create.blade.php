@extends('layouts.app') 

@section('content')
    <h1>Create New Category</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf 

        <div>
            <label for="category_name">Category Name:</label>
            <input type="text" name="category_name" id="category_name" value="{{ old('category_name') }}">

            @error('category_name') 
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Create Category</button>
    </form>
@endsection
