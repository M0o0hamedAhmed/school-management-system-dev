@extends('layouts.master')

@section('title')
    empty
@endsection

@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    {{--<div class="page-title">--}}
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main.to-do-lists')}} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main.main_page')}}</a></li>
                <li class="breadcrumb-item active">{{trans('main.to-do-lists')}}</li>
            </ol>
        </div>
    </div>
    {{--</div>--}}
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h4 class="card-title">Admins Data</h4>
                            <p class="card-title-desc">

                            </p>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" id="addBtn"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> Add New
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2 flex justify-content-between">
                        <table id="main-datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>created_at</th>
                                <th>actions</th>
                            </tr>
                            </thead>
                        </table>
{{--                        <table id="done-datatable" class="table table-bordered dt-responsive nowrap "--}}
{{--                               style="width: 49%">--}}
{{--                            <thead class="table-light">--}}
{{--                            <tr>--}}
{{--                                <th>id</th>--}}
{{--                                <th>Title</th>--}}
{{--                                <th>Description</th>--}}
{{--                                <th>created_at</th>--}}
{{--                                <th>actions</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Large modal example -->
    <div class="modal fade bs-example-modal-lg mainModal" id="editOrCreate" data-bs-backdrop="static"
         data-bs-keyboard="false"
         tabindex="-1" role="dialog" aria-labelledby="mainModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="operationType"></span> Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="addForm"  method="POST"  action="{{route('toDoList.store')}}"  enctype="multipart/form-data">
                    @csrf
                    <input  type="hidden" name="id" class="form-control" >
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">Title
                                :</label>
                            <input id="title" type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="exampleFormControlTextarea1">description
                            :</label>
                        <input id="title" type="text" name="description" class="form-control">
{{--                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"--}}
{{--                                  rows="3"></textarea>--}}
                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('grades.Close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('grades.submit') }}</button>
                    </div>
                </form>



            </div>
        </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')

    <script>
        // Show Data Using YAJRA
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            // {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'actions', name: 'actions'},
        ];
    </script>
    @include('layouts.yajraHelper',['url'=>'toDoList']);
@endsection
