<x-app-layout>
    <div class="content">
        <div class="d-flex justify-content-between">
            <h3 class="mb-3 h3">Products</h3>
            <a href="/trash/products" class="custom-link fw-bold">Trash Bin<i class="fa-solid fa-right-long ms-2"></i></a>
        </div>
        <div class="header-table d-flex justify-content-between mb-3">
            <form action="/products/search" method="GET" class="d-flex align-items-center">
                <input id="search-input" class="me-2" name="query" type="search" placeholder="Search..." aria-label="Search">
                <button type="submit" class="btn btn-primary btn-nav">Search</button>
            </form>
            <div>
                <a href="/products/create" type="button" class="btn btn-nav create-product">Create</a>
            </div>
        </div>
        <table class="table table-bordered mt-2 table-content table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col"></th>
                    <th class="text-center" scope="col">
                        ID
                    </th>
                    <th class="text-center" scope="col">
                        Name
                    </th>
                    <th class="text-center" scope="col">
                        Description
                    </th>
                    <th class="text-center price" scope="col" colspan="1">
                        Price
                    </th>
                    <th class="text-center col-sm-1 action-col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1; // Bắt đầu chỉ mục từ 1
                @endphp
                @if($products->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">
                        You don't add courses yet.
                        <a href="/products/create">Add courses</a>
                    </td>
                </tr>
                @else  
                @foreach($products as $product)
             
                <tr class="">
                    <td class="align-middle text-center"><input class="form-check-input checkbox-index" type="checkbox" name="coursesID[]" value="" />
                    </td>
                    <td class="align-middle text-right">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $product->ID }}</td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle">{{ $product->description }}</td>
                    <td class="align-middle text-right">{{ $product->price }}</td>
                    <td> 
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('products.edit', $product->ID) }}" class="ms-1 me-1 p-1">
                                <i class="fa-regular fa-pen-to-square action-icon edit-icon"></i>
                            </a>
                            <a href="{{ route('products.details', $product->ID) }}" class="ms-1 me-1 p-1">
                                <i class="fa-solid fa-circle-info action-icon details-icon"></i>
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#delete-product-modal" class="ms-1 me-1 p-1 btn-delete" data-id="{{ $product->ID }}">
                                <i class="fa-solid fa-trash action-icon delete-icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center btn-crud-block">
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif  
    <div class="modal fade" id="delete-product-modal" tabindex="-1" aria-labelledby="delete-product-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-product-modal-label">Delete confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this course?
                </div>
                <div class="modal-footer">
                    <form id="delete-form" action="{{ route('products.delete', $product->ID) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="product-id" name="id" value="{{ $product->ID }}" />
                        <button id="confirm-delete" type="button" class="btn btn-secondary confirm-delete" data-bs-dismiss="modal">Yes</button>
                    </form>
    
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
<script>
     $(document).ready(function () {
        var productID;
        var deleteForm = $("#delete-form");
        var confirmDeleteBtn = $("#confirm-delete");
        var productIDInput = $("#product-id");

        $("#delete-product-modal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
             productID = button.data("id");
          
           
        });
        $("#confirm-delete").on("click", function () {
            $("#product-id").val(productID);
            var newAction = "{{ route('products.delete', ['id' => 'REPLACE_ID']) }}";
            newAction = newAction.replace('REPLACE_ID', productID);
            deleteForm.attr('action', newAction);
            console.log(productID)
            deleteForm.submit();
        });
       
    })
</script>