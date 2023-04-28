<script>

    var loader = `<div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>`;

    var newUrl = location.href;


    $(function () {
        // show data using yajra (Not Yet -datatable)
        $('#main-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: newUrl,
            columns: columns,
            order: [
                [0, "DESC"]
            ],
            // "lengthMenu": [ 10, 25, 50, "All" ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "sProcessing": "Loading...",
                "sLengthMenu": "Show_MENU_records",
                "sZeroRecords": "There is no data",
                "sInfo": "Show _START_ To  _END_ From _TOTAL_ record",
                "sInfoEmpty": "There is no data",
                "sInfoFiltered": "to search",
                "sSearch": "Search  :  ",
                "oPaginate": {
                    "sPrevious": "Previous",
                    "sNext": "Next",
                },
                buttons: {
                    copyTitle: 'Copied To Clipboard <i class="fa fa-check-circle text-success"></i>',
                    copySuccess: {
                        1: "1 Row Has Copied",
                        _: "Copied %d Rows Successfully"
                    },
                }
            },

            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'copy',
                },
                {
                    extend: 'print',
                    text: 'print',
                },
                {
                    extend: 'excel',
                    text: 'excel',
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                },
                {
                    extend: 'colvis',
                    text: 'show',
                    className: 'btn-primary'
                },
            ],
        });


       // console.log(newUrl+'/done');
        // show data using yajra  (done-datatable)
        $('#done-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: newUrl,
            columns: columns,
            order: [
                [0, "DESC"]
            ],
            // "lengthMenu": [ 10, 25, 50, "All" ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "sProcessing": "Loading...",
                "sLengthMenu": "Show_MENU_records",
                "sZeroRecords": "There is no data",
                "sInfo": "Show _START_ To  _END_ From _TOTAL_ record",
                "sInfoEmpty": "There is no data",
                "sInfoFiltered": "to search",
                "sSearch": "Search  :  ",
                "oPaginate": {
                    "sPrevious": "Previous",
                    "sNext": "Next",
                },
                buttons: {
                    copyTitle: 'Copied To Clipboard <i class="fa fa-check-circle text-success"></i>',
                    copySuccess: {
                        1: "1 Row Has Copied",
                        _: "Copied %d Rows Successfully"
                    },
                }
            },

            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'copy',
                },
                {
                    extend: 'print',
                    text: 'print',
                },
                {
                    extend: 'excel',
                    text: 'excel',
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                },
                {
                    extend: 'colvis',
                    text: 'show',
                    className: 'btn-primary'
                },
            ],
        });


        // Show Add Modal
        $(document).on('click', '#addBtn', function () {
            $('#modal-body').html(loader)
            $('#operationType').text('Add');
            $('#editOrCreate').modal('show')
            setTimeout(function () {
                $('#modal-body').load("{{route("$url.create")}}")
            }, 500)
        });

        // Create New Data By Ajax
        $(document).on('submit', 'Form#addForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#addForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#addButton').html('<span style="margin-right: 4px;">Loading</span><i class="bx bx-loader bx-spin"></i>');
                },
                success: function (data) {
                    if (data.status == 200) {
                        $('#main-datatable').DataTable().ajax.reload(null, false);
                        // show custom message or use the default
                        toastr.success((data.message) ?? 'Data Added Successfully');
                    } else
                        toastr.error('Oops .. There is an error');
                    $('#addButton').html(`Submit`).attr('disabled', false);
                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('Oops .. There is an error');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
                                });
                            }
                        });
                    } else
                        toastr.error('Oops .. There is an error');
                    $('#addButton').html(`Submit`).attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });


        // Show Edit Modal
        $(document).on('click', '.editBtn', function () {
            var id = $(this).data('id');
            $('#modal-body').html(loader)
            $('#operationType').text('Edit');
            $('#editOrCreate').modal('show')
            var editUrl = "{{route("$url.edit",':id')}}";
            editUrl = editUrl.replace(':id', id)
            setTimeout(function () {
                $('#modal-body').load(editUrl)
            }, 500)
        });

        // Update Script using Ajax
        $(document).on('submit', 'Form#updateForm', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#updateForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#updateButton').html('<span style="margin-right: 4px;">Loading</span><i class="bx bx-loader bx-spin"></i>');
                },
                success: function (data) {
                    $('#updateButton').html(`Update`).attr('disabled', false);
                    if (data.status == 200) {
                        $('#main-datatable').DataTable().ajax.reload();
                        toastr.success((data.message) ?? 'Data Updated Successfully');
                    } else
                        toastr.error('Oops .. There is an error');

                    $('#editOrCreate').modal('hide')
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('Oops .. There is an error');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value, 'Error');
                                });
                            }
                        });
                    } else
                        toastr.error('Oops .. There is an error');
                    $('#updateButton').html(`Update`).attr('disabled', false);
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        //  Change status
        $(document).on('click', '.change_status', function () {
            var id = $(this).data('id');
            swal.fire({
                title: "Done",
                text: "The task has been completed successfully",
                icon: "success",
                showCancelButton: true,
                confirmButtonColor: "#a3dd82",
                confirmButtonText: "Yes, it`s done!",
                cancelButtonText: "Not Yet",
                okButtonText: "Submit",
            }).then((result) => {
                if (!result.isConfirmed) {
                    return true;
                }
                var url = '{{ route("toDoList.changeStatus",":id") }}';
                url = url.replace(':id', id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    beforeSend: function () {
                        $('#loader-overlay').show()
                    },
                    success: function (data) {
                        console.log($(this));
                        window.setTimeout(function () {
                            $('#loader-overlay').hide()
                                console.log(data)
                            if (data.status == 200) {
                                toastr.success((data.message) ?? 'Data Deleted Successfully')
                                $('#main-datatable').DataTable().ajax.reload(null, false);
                            } else if (data.status == 405) {
                                toastr.warning("Can't Delete Your Account !")
                            } else {
                                toastr.error('Oops .. There is an error');
                            }

                        }, 300);
                    }, error: function (data) {
                        console.log(url);
                        if (data.status === 500) {
                            toastr.error('Oops .. There is an error');
                        }
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        toastr.error(value)
                                    });
                                }
                            });
                        }
                    }

                });
            });
        });


        // Show Delete SweetAlert & Delete Using Ajax
        $(document).on('click', '.delete', function () {
            var id = $(this).data('id');
            swal.fire({
                title: "Delete Data",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc5339",
                confirmButtonText: "Yes, Delete it!",
                cancelButtonText: "Cancel",
                okButtonText: "Submit",
                closeOnConfirm: false
            }).then((result) => {
                if (!result.isConfirmed) {
                    return true;
                }
                var url = '{{ route("$url.destroy",":id") }}';
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    beforeSend: function () {
                        $('#loader-overlay').show()
                    },
                    success: function (data) {
                        con
                        window.setTimeout(function () {
                            $('#loader-overlay').hide()
                            if (data.status == 200) {
                                toastr.success((data.message) ?? 'Data Deleted Successfully')
                                $('#main-datatable').DataTable().ajax.reload(null, false);
                            } else if (data.status == 405) {
                                toastr.warning("Can't Delete Your Account !")
                            } else {
                                toastr.error('Oops .. There is an error');
                            }

                        }, 300);
                    }, error: function (data) {

                        if (data.status === 500) {
                            toastr.error('Oops .. There is an error');
                        }
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        toastr.error(value)
                                    });
                                }
                            });
                        }
                    }

                });
            });
        });
    });


</script>
