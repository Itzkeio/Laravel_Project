@extends('layouts.app') 

@section('content')
    <h1>Category Details</h1>

    <p><strong>Name:</strong> {{ $category->category_name }}</p> 

    <a href="{{ route('categories.index') }}">Back to Category List</a>
@endsection
