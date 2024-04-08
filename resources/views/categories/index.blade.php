@extends('layouts.app')  {{-- Assuming you have a main app layout --}}

@section('content')
    <h1>All Categories</h1>

    @if($categories->count() > 0) 
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category->id) }}"> 
                        {{ $category->category_name }}
                    </a> 
                </li>
            @endforeach
        </ul>
    @else 
        <p>No categories found.</p>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create New Category</a>
    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
    <a href="{{ route('categories.show', $category->id) }}">View Details</a>

    <form action="{{ route('categories.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search by category name...">
    <button type="submit">Search</button>
</form>


    <form method="POST" action="{{ route('categories.destroy', $category->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
    @method('DELETE') 
    @csrf 
    <button type="submit">Delete</button>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif


@endsection 
