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
                    <form action="{{ route('send_mail_id') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <h3>Send to</h3> <hr>
                        <input type="hidden" value="{{ $id }}" name="client_id">
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <p class="form-control">Hi</p>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <p class="form-control">Hi</p>
                                </div>
                            </div>
                        </div>
                        <h3>Mail content</h3>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-1">
                                <label for="Title-input" class=" form-control-label">Title</label>
                            </div>
                            <div class="col-12 col-md-11">
                                <input type="text" id="Title-input" name="title" placeholder="Enter title"
                                    class="form-control">
                                <small class="help-block form-text">Enter the title of the email</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-1">
                                <label for="body-input" class=" form-control-label">Body</label>
                            </div>
                            <div class="col-12 col-md-11">
                                <textarea name="body" id="body-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
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
@endsection
