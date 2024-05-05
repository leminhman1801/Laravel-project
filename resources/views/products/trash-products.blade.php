<x-app-layout>
    <div class="content">
        <div class="d-flex justify-content-between">
            <a href="/products" class="fw-bold mb-2"><i class="fa-solid fa-left-long me-2"></i>Back to List</a>
        </div>
        <h3 class="mb-3 h3">Trash Bin</h3>
        <div class="header-table d-flex justify-content-between mb-3">
            <form action="/products/search" method="GET" class="d-flex align-items-center">
                <input id="search-input" class="me-2" name="query" type="search" placeholder="Search..." aria-label="Search">
                <button type="submit" class="btn btn-primary btn-nav">Search</button>
            </form>
            
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
                                No product was deleted.
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
                            <form action="{{ route('products.restore', $product->ID) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-restore" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-trash-arrow-up"></i>
                                </button>  
                            </form>
                            <a data-bs-toggle="modal" data-bs-target="#destroy-product-modal" class="ms-1 me-1 p-1 btn-destroy" data-id="{{ $product->ID }}">
                                <i class="fa-solid fa-xmark destroy-icon"></i>
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
    <div class="modal fade" id="destroy-product-modal" tabindex="-1" aria-labelledby="destroy-product-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-product-modal-label">destroy confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to destroy permanent this course?
                </div>
                <div class="modal-footer">
                    @if(isset($product))
                    <form id="destroy-form" action="{{ route('products.destroy', $product->ID) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="product-id" name="id" value="{{ $product->ID }}" />
                        <button id="confirm-destroy" type="button" class="btn btn-secondary confirm-destroy" data-bs-dismiss="modal">Yes</button>
                    </form>
                    @endif
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
<script>
     $(document).ready(function () {
        var productID;
        var destroyForm = $("#destroy-form");
        var confirmdestroyBtn = $("#confirm-destroy");
        var productIDInput = $("#product-id");

        $("#destroy-product-modal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
             productID = button.data("id");
          
           
        });
        $("#confirm-destroy").on("click", function () {
            $("#product-id").val(productID);
            var newAction = "{{ route('products.destroy', ['id' => 'REPLACE_ID']) }}";
            newAction = newAction.replace('REPLACE_ID', productID);
            destroyForm.attr('action', newAction);
            console.log(productID)
            destroyForm.submit();
        });
       
    })
</script>