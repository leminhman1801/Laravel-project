<x-app-layout>
    <div class="container">
        <h2 class="mb-3">Edit</h2>
        <div class="row">
        
            <form action="{{ route('products.update', $product->ID) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="mb-1" for="id">ID</label>
                        <input type="text" class="form-control mb-3" value="{{ $product->ID }}" id="id" readonly>
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="name">Name</label>
                        <input type="text" class="form-control mb-3" id="name" name="name" value="{{ $product->name }}" >
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" >{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="mb-1" for="price">Price</label>
                        <input type="text" class="form-control mb-3  text-right" name="price" value="{{ $product->price }}" id="price" >
                    </div>
                </div>
                <button id="update-btn" type="submit" class="btn btn-secondary confirm-delete">Update</button>
            </form>

        </div>
    </div>
</x-app-layout>