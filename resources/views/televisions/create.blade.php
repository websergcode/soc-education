@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Television</h1>

        <form id="createTelevisionForm" action="{{ route('televisions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" name="brand" id="brand" required>
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" name="model" id="model" required>
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <input type="number" class="form-control" name="size" id="size" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="price" id="price" step="1" required>
            </div>

            <div class="form-group">
                <label for="is_smart">Is Smart:</label>
                <select class="form-control" name="is_smart" id="is_smart">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>

            <button type="submit" class="btn btn-primary">Add Television</button>
        </form>

        <div id="message" class="mt-4" style="display: none;"></div>
    </div>

    <script>
        document.getElementById('createTelevisionForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var form = this;
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open(form.method, form.action, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    document.getElementById('message').innerHTML = response.message;
                    document.getElementById('message').style.display = 'block';
                    form.reset();
                } else if (xhr.readyState === XMLHttpRequest.DONE) {
                    document.getElementById('message').innerHTML = 'An error occurred';
                    document.getElementById('message').style.display = 'block';
                }
            };
            xhr.send(formData);
        });
    </script>
@endsection
