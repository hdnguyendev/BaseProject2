@extends('admin.layouts.layout')
@section('main_content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="col-lg-12">
            <div class="card">



                <div class="card-header">
                    <strong>Send Mail Form</strong>
                </div>
                <div class="card-body card-block">

                    @if (session('failed'))
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Failed</span>
                            Send Email Failed.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            Send Email Success.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('send_mail_id') }}" method="post" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        <h3>Send to</h3>
                        <hr>
                        <input type="hidden" value="{{ $data->client_id }}" name="client_id">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Client Profile</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" style="width:100px;height:100px"
                                                src="{{ asset('upload/avatars/' . $data->client_avatar) }}"
                                                alt="Card image cap">
                                            <h3 class="text-sm-center mt-2 mb-1">{{ $data->client_name }}</h3>
                                            <div class="text-sm-center">
                                                <i class="fa fa-user"></i> Username: {{ $data->client_username }}
                                            </div>
                                            <div class="text-sm-center">
                                                <i class="fa fa-envelope"></i> Email: {{ $data->client_email }}
                                            </div>

                                        </div>
                                        <hr>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <h3>Mail content</h3>
                        <hr>
                        <div class="col-12">
                            <i class="fa fa-pencil-square-o"></i>
                            <label for="title-input" class=" form-control-label font-weight-bold">Title</label>

                        </div>

                        <div class="row form-group">

                            <div class="col-12">
                                <input type="text" id="Title-input" name="title" placeholder="Enter title"
                                    class="form-control p-3">
                            </div>


                        </div>
                        <div class="col-12 ">
                            <i class="fa fa-list-alt"></i>
                            <label for="body-input" class=" form-control-label font-weight-bold">Body</label>

                        </div>

                        <div class="row form-group">

                            <div class="col-12">
                                <textarea id="body" name="body" id="body-input" rows="10" placeholder="Content..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm mx-1">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
    <!-- END MAIN CONTENT-->
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
