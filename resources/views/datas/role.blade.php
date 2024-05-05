@extends('layouts/main')
@section('content')
    <div class="content mt-2">
        <h3 class="mt-2">Role</h3>
        <div class="header-table d-flex justify-content-between">
            <div>
                <button type="button" class="btn btn-primary btn-sm btn-nav">Export Excel</button>
                <button type="button" class="btn btn-primary btn-sm btn-nav">Print</button>
            </div>
            <input class=" me-2" type="search" placeholder="Search" aria-label="Search">
        </div>
        <table class="table mt-2 table-content table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No.</th>
                    <th scope="col">
                        Role Name
                    </th>
                    <th scope="col">
                        Permission
                    </th>


                    <th colspan="2" class="col-sm-1 text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><input class="form-check-input checkbox-index" type="checkbox" name="coursesID[]" value="" />
                    </td>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td><a href="/courses//edit" class="btn btn-link">Edit</a></td>
                    <td><a href="" class="btn btn-link" data-id="" data-toggle="modal"
                            data-target="#delete-course-modal">Delete</a></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-center row-no-hover">
                        You don't add courses yet.
                        <a href="">Add courses</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center btn-crud-block">
            <button type="button" class="btn btn-primary btn-nav ms-2 me-2">Add</button>
            <button type="button" class="btn btn-primary btn-nav ms-2 me-2">Edit</button>
            <button type="button" class="btn btn-primary btn-nav ms-2 me-2">Delete</button>

        </div>
    </div>
@endsection
