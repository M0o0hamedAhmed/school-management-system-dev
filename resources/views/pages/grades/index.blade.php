@extends('layouts.master')

@section('title')
    {{trans('main_trans.Grades')}}
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('main_trans.Grades')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main_trans.main_page')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('main_trans.Grades')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <!-- main body -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="button" class="button x-small " data-toggle="modal" data-target="#addModel">
                        {{ trans('Grades_trans.add_Grade') }}
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> {{trans('Grades_trans.Name')}}</th>
                                <th> {{trans('Grades_trans.Notes')}}</th>
                                <th> {{trans('Grades_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            {{--                            <tbody>--}}
                            {{--                            @foreach($grades as $grade)--}}
                            {{--                            <tr>--}}

                            {{--                                <td>{{$loop->index+1}}</td>--}}
                            {{--                                <td>{{$grade->Name}} </td>--}}
                            {{--                                <td>{{$grade->Notes}} </td>--}}


                            {{--                            </tr>--}}
                            {{--                            @endforeach--}}
                            {{--                            </tbody>--}}


                        </table>
                    </div>


                    <!-- add_modal_Grade -->
                    <div class="modal fade" id="addModel" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('Grades_trans.add_Grade') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form id="myFormAdd"  method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                                    :</label>
                                                <input id="Name" type="text" name="Name" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                                    :</label>
                                                <input type="text" class="form-control" name="Name_en" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                                                :</label>
                                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                                      rows="3"></textarea>
                                        </div>
                                        <br><br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    {{--                    Edit Model --}}

                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('Grades_trans.edit_Grade') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- edit_form -->
                                    <form id="myFormEdit"  method="POST">
                                        @csrf
                                                <input  type="hidden" name="id" class="form-control" >
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                                    :</label>
                                                <input id="Name" type="text" name="Name" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                                    :</label>
                                                <input type="text" class="form-control" name="Name_en" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                                                :</label>
                                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                                      rows="3"></textarea>
                                        </div>
                                        <br><br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        // Show All Data
        $(function () {
            let table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('Grades.index') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Name.' + "{{ app()->getLocale() }}", name: 'Name'},
                    {data: 'Notes', name: 'Notes'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
            table.draw();

        });

        // Store
        $(function () {
            $('#myFormAdd').submit(function (event) {
                event.preventDefault();
                const formData = $(this).serializeArray();

                $.ajax({
                    url: "{{ route('Grades.store') }}",
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        $('#myFormAdd').trigger('reset');
                        $('#dataTable').DataTable().ajax.reload();
                        $('.close').click()

                        toastr.success('{{ trans('toastr.added_successfully')}}');

                    },
                    error: function (xhr, status, error) {
                        toastr.error('{{trans('toastr.error_occurred')}}}');

                    }
                })
            });
        })

        //Edit
        $('#dataTable').on('click', '.edit', function (e) {
            e.preventDefault();
            let id = $(this).data('id')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "{{ route('Grades.edit',"id") }}".replace("id", id),
                success: function (data) {
                    $('input[name="Name"]').val(data.Name.ar)
                    $('input[name="Name_en"]').val(data.Name.en)
                    $('textarea[name="Notes"]').val(data.Notes)
                    $('input[name="id"]').val(data.id)
                },
                error: function (data) {
                    toastr.error('{{trans('toastr.error_occurred')}}}');

                }

            })

        })

        // Update
        $(function () {
            $('#myFormEdit').submit(function (event) {
                event.preventDefault();
                const formData = $(this).serializeArray();
                let id = $('input[name="id"]').val()
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    url: "{{ route('Grades.update',"") }}" + '/' + id,
                    {{--url: "{{ route('Grades.update', ['id' => '']) }}" + '/' + id,--}}
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        $('#myFormEditphp').trigger('reset');
                        $('#dataTable').DataTable().ajax.reload();
                        $('.close').click()

                        toastr.success('{{ trans('toastr.added_successfully')}}');

                    },
                    error: function (xhr, status, error) {
                        toastr.error('{{trans('toastr.error_occurred')}}}');
                    }
                })
            });
        })


        //  Delete item
        $('#dataTable').on('click', '.delete', function () {
            var id = $(this).data("id");
            // confirm("Are You sure want to delete this Post!");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: "{{ route('Grades.destroy',"") }}" + '/' + id,
                success: function (data) {
                    $('#dataTable').DataTable().ajax.reload();
                    // toastr.success('تم الحذف  بنجاح');
                    toastr.success('{{ trans('toastr.deleted_successfully')}}');
                },
                error: function (data) {
                    toastr.error('{{trans('toastr.error_occurred')}}');
                }
            });
        });

    </script>
@endsection
