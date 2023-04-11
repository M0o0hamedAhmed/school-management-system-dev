@extends('layouts.master')

@section('title')
    {{trans('main.proMina')}}
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/basic.min.css" rel="stylesheet">
@endsection


@section('page-header')
    <!-- breadcrumb -->
    {{--<div class="page-title">--}}
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main.proMina')}} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main.main_page')}}</a></li>
                <li class="breadcrumb-item active">    {{trans('main.proMina')}} </li>
            </ol>
        </div>
    </div>
    {{--</div>--}}
    <!-- breadcrumb -->
@endsection
@section('content')
    <form action="{{ route("dropzone.store") }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name/Description fields, irrelevant for this article --}}


        <div class="form-group">
            <label for="document">Documents</label>
            <div class="needsclick dropzone" id="document-dropzone">

            </div>

        </div>
        <div class="d-flex justify-content-center mb-3">
            <input class="btn btn-danger" type="submit">
        </div>
    </form>


@endsection
@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.min.js"></script>

    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                    {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
    <script>
        Dropzone.discover();
    </script>
@endsection
