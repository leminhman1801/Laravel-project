<x-app-layout>
    <div class="container">
        <div class="mb-3"><a href="/products" class="fw-bold mb-2"><i class="fa-solid fa-left-long me-2"></i>Back to List</a></div>
        <h2 class="mb-3 h3">Product Details</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-1" for="id">ID</label>
                    <input type="text" class="form-control mb-3" value="{{ $product->ID }}" id="id" readonly>
                </div>
                <div class="form-group">
                    <label class="mb-1" for="name">Name</label>
                    <input type="text" class="form-control mb-3" id="name" value="{{ $product->name }}" readonly>
                </div>
                <div class="form-group">
                    <label class="mb-1" for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" readonly>{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-1" for="price">Price</label>
                    <input type="text" class="form-control mb-3  text-right" value="{{ $product->price }}" id="price" readonly>
                </div>
                <div class="form-group">
                    <label class="mb-1" for="created_at">Create Date</label>
                    <input type="text" class="form-control mb-3" value="{{ $product->created_at }}" id="created_at" readonly>
                </div>
                <div class="form-group">
                    <label class="mb-1" for="updated_at">Update Date</label>
                    <input type="text" class="form-control mb-3" value="{{ $product->updated_at }}" id="updated_at" readonly>
                </div>
                <div class="form-group">
                    <label class="mb-1" for="deleted_at">Delete Date</label>
                    <input type="text" class="form-control mb-3" value="{{ $product->deleted_at }}" id="deleted_at" readonly>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>