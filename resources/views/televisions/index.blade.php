@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Television List</h1>

        <!-- Форма для фильтрации -->
        <form action="{{ route('televisions.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tv"></i></span>
                        </div>
                        <label for="brand"></label><input type="text" class="form-control" name="brand" id="brand" value="{{ request('brand') }}" placeholder="Brand">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                        </div>
                        <label for="model"></label><input type="text" class="form-control" name="model" id="model" value="{{ request('model') }}" placeholder="Model">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <label for="price"></label><input type="number" class="form-control" name="price" id="price" value="{{ request('price') }}" placeholder="Price">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-expand"></i></span>
                        </div>
                        <label for="size"></label><input type="number" class="form-control" name="size" id="size" value="{{ request('size') }}" placeholder="Size">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                        </div>
                        <label for="is_smart"></label><select class="form-control" name="is_smart" id="is_smart">
                            <option value="">All</option>
                            <option value="1" {{ request('is_smart') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ request('is_smart') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter</button>
                </div>
            </div>
        </form>

        <!-- Таблица со списком телевизоров -->
        <table class="table">
            <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Size</th>
                <th>Description</th>
                <th>Price</th>
                <th>Is Smart</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($televisions as $television)
                <tr>
                    <td>{{ $television->brand }}</td>
                    <td>{{ $television->model }}</td>
                    <td>{{ $television->size }}</td>
                    <td>{{ $television->description }}</td>
                    <td>{{ $television->price }}</td>
                    <td>{{ $television->is_smart ? 'Yes' : 'No' }}</td>
                    <td>
                        @if ($television->image)
                            <img src="{{ route('image', $television->image) }}" alt="Television Image" class="img-fluid">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('televisions.show', $television->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('televisions.edit', $television->id) }}" class="btn btn-secondary">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
