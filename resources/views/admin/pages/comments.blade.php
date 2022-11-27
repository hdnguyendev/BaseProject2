@extends('admin.layouts.layout')
@section('main_content')
    <!-- MAIN CONTENT-->

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="col-md-12">

                <h3 class="title-5 m-b-35">Comments table</h3>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="table_comments">
                        <thead>
                            <tr>
                                <th>date</th>
                                <th>movie name</th>
                                <th>rate</th>
                                <th>email</th>
                                {{-- <th>date</th> --}}
                                <th>content</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data)
                                @foreach ($data as $item)
                                    <tr class="tr-shadow">
                                        <td style="vertical-align: middle !important">{{ $item->comment_date }}</td>
                                        <td><a href="{{ URL::to('/detail/' . $item->movie_name) }}"
                                                target="_blank">{{ $item->movie_name }}</a></td>
                                        <td>
                                            @php
                                                for ($i = 1; $i <= $item->comment_rating; $i++) {
                                                    echo "<i class='fa fa-star'></i>";
                                                }
                                                for ($i = 1; $i <= 5 - $item->comment_rating; $i++) {
                                                    echo "<i class='fa fa-star-o'></i>";
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            <span class="block-email">{{ $item->client_email }}</span>
                                            {{-- <a href="{{ route('send_mail', ['id' => $item->client_id]) }}">
                                                <button type="button" title="Send mail"
                                                    class="btn btn-primary btn-sm btn-block">{{ $item->client_email }}</button>
                                            </a> --}}

                                        </td>
                                        <td>
                                            {{ $item->comment_content }}
                                        </td>
                                        @if ($item->comment_status)
                                            <td><span class="status--process status_{{ $item->comment_id }}">Show</span>
                                            </td>
                                        @else
                                            <td><span class="status--denied status_{{ $item->comment_id }}">Hide</span></td>
                                        @endif

                                        <td>
                                            <div class="table-data-feature">

                                                {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button> --}}
                                                @if ($item->comment_status)
                                                    {{-- <a href="{{ route('change_comment_ajax', ['id' => $item->comment_id]) }}"> --}}
                                                    <button class="item btn_status btn_status_{{ $item->comment_id }}"
                                                        data-id={{ $item->comment_id }}>
                                                        <i class="zmdi zmdi-block"></i>
                                                    </button>
                                                    {{-- </a> --}}
                                                @else
                                                    {{-- <a href="{{ route('change_comment_ajax', ['id' => $item->comment_id]) }}"> --}}
                                                    <button class="item btn_status btn_status_{{ $item->comment_id }}"
                                                        data-id={{ $item->comment_id }}>
                                                        <i class="zmdi zmdi-star"></i>
                                                    </button>
                                                    {{-- </a> --}}
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                @endforeach
                            @endif

                        </tbody>


                    </table>


                </div>


            </div>
            <div class="col-lg-6"> {{ $data->links() }}</div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            // $('#table_comments').DataTable();

            $(".btn_status").click(function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    type: 'GET',
                    url: "http://127.0.0.1:8000/admin/change-status-comment/" + id,
                    success: function(data) {
                        let status = $('.status_' + id).text();
                        if (status == 'Show') {
                            $('.status_' + id).text('Hide');
                            $('.status_' + id).removeClass('status--process');
                            $('.status_' + id).addClass('status--denied');
                            $('.btn_status_' + id).html('<i class="zmdi zmdi-star"></i>');
                        } else {
                            $('.status_' + id).text('Show');
                            $('.status_' + id).removeClass('status--denied');
                            $('.status_' + id).addClass('status--process');
                            $('.btn_status_' + id).html('<i class="zmdi zmdi-block"></i>');
                        }
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            });
        });
    </script>

    <!-- END MAIN CONTENT-->
@endsection
