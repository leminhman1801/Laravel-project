<x-app-layout>
    <div class="content">
        <h3 class="mb-3">Products</h3>
        <div class="header-table d-flex justify-content-between">
            <input class=" me-2" type="search" placeholder="Search" aria-label="Search">
            <div>
                <button type="button" class="btn btn-primary btn-nav">Export Excel</button>
                <button type="button" class="btn btn-primary btn-nav">Print</button>
            </div>
        </div>
        <table class="table mt-2 table-content table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">
                        Customer Name
                    </th>
                    <th scope="col">
                        Phone
                    </th>
                    <th scope="col" colspan="1">
                        Point
                    </th>
                    <th colspan="2" class="col-sm-1 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
             
                <tr class="">
                    <td><input class="form-check-input checkbox-index" type="checkbox" name="coursesID[]" value="" />
                    </td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle"></td>
                    <td class="align-middle"></td>
                    <td><a href="/courses//edit" class="btn btn-link">Edit</a></td>
                    <td><a href="" class="btn btn-link" data-id="" data-toggle="modal"
                        data-target="#delete-course-modal">Delete</a></td>
                </tr>
                @endforeach
                <tr>
                        <td colspan="5" class="text-center">
                            You don't add courses yet.
                            <a href="">Add courses</a>
                        </td>
                </tr>
                </tbody>
            </table>
        <div class="d-flex justify-content-center btn-crud-block">

        </div>
    </div>
</x-app-layout>