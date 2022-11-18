@extends('admin.layouts.layout')
@section('main_content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="col-md-12">

                <h3 class="title-5 m-b-35">Client table</h3>

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>no.</th>
                                <th>name</th>
                                <th>email</th>
                                <th>username</th>
                                {{-- <th>date</th> --}}
                                <th>avatar</th>
                                <th>status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data)
                                @php
                                    $d = 0;
                                @endphp
                                @foreach ($data as $item)
                                    @php
                                        $d += 1;
                                    @endphp
                                    <tr class="tr-shadow">
                                        <td style="vertical-align: middle !important">{{ $d }}</td>
                                        <td>{{ $item->client_name }}</td>
                                        <td>
                                            <span class="block-email">{{ $item->client_email }}</span>
                                        </td>
                                        <td>{{ $item->client_username }}</td>
                                        {{-- <td>2018-09-27 02:12</td> --}}
                                        <td><img width=50px height=50px
                                                src="{{ asset('upload/avatars/' . $item->client_avatar) }}" alt="">
                                        </td>
                                        @if ($item->client_status)
                                            <td><span class="status--process">Active</span></td>
                                        @else
                                            <td><span class="status--denied">Ban</span></td>
                                        @endif

                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{ route('send_mail',['id' => $item->client_id]) }}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                </a>
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                @if ($item->client_status)
                                                    <a href="{{ route('ban_client',['id' => $item->client_id])}}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Ban">
                                                            <i class="zmdi zmdi-block"></i>
                                                        </button>
                                                    </a>
                                                @else
                                                    <a href="{{ route('unban_client',['id' => $item->client_id]) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Unban">
                                                            <i class="zmdi zmdi-star"></i>
                                                        </button>
                                                    </a>
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
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
