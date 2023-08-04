@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $television->brand }} {{ $television->model }}</h1>
        <p>Size: {{ $television->size }}</p>
        <p>Description: {{ $television->description }}</p>
        <p>Price: {{ $television->price }}</p>
        <p>Is Smart: {{ $television->is_smart ? 'Yes' : 'No' }}</p>
        @if ($television->image)
            <img src="{{ route('image', $television->image) }}" alt="Television Image" class="img-fluid">
        @endif
    </div>
@endsection
