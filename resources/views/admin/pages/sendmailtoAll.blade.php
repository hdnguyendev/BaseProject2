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
                    <form action="{{ route('send_mail_all') }}" method="post" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        <h3><i class="zmdi zmdi-account-box-mail"></i> Send notifications to all clients</h3>




                        <div class="card-body card-block">
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
