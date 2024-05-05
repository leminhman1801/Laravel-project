<x-app-layout>
    <div class="container">
        <h3 class="h3">Create</h3>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="mb-1" for="name">Name:</label>
                <input type="text" class="form-control mb-3" id="name" name="name">
            </div>
            <div class="form-group">
                <label class="mb-1" for="description">Description:</label>
                <textarea class="form-control mb-3" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label class="mb-1" for="price">Price:</label>
                <input type="text" class="form-control mb-3" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    
</x-app-layout>