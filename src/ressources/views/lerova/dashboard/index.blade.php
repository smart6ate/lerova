@extends('lerova.layouts.backend')

@section('styles')

    <style>


        hr
        {
            color: black;
        }

        a {
            text-decoration: none;
            color: black;
        }
        a:visited {color: black;}  /* visited link */
        a:hover {color: black;}  /* mouse over link */
        a:active {color: black;}  /* selected lin

    </style>

@endsection

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>{{ env('APP_NAME') }}</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Dashboard</li>
                </ol>


                <hr>

            </div>




            <div class="col-md-8 col-md-offset-2">

                <div class="row text-center">



                    @if(config('lerova.modules.blog'))
                    <div class="col-md-4">

                        <a href="{{ route('lerova.blog.index') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-rss fa-2x" aria-hidden="true"></i>
                                     <hr>
                                    <strong>Blog</strong>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endif

                        @if(config('lerova.modules.gallery'))
                            <div class="col-md-4">

                                <a href="{{ route('lerova.gallery.index') }}">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i>
                                            <hr>
                                            <strong>Gallery</strong>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endif


                    @if(config('lerova.modules.about'))
                    <div class="col-md-4">

                        <a href="{{ route('lerova.about.edit') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>About me</strong>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endif

                        @if(config('lerova.modules.members'))
                            <div class="col-md-4">

                                <a href="{{ route('lerova.members.index') }}">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                                            <hr>
                                            <strong>Members</strong>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endif

                    @if(config('lerova.modules.notifications'))
                    <div class="col-md-4">

                        <a href="{{ route('lerova.notifications.index') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Notifications</strong>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endif

                        @if(!config('lerova.settings.status'))
                        @role('administrator')
                        @endif

                        <div class="col-md-4">

                        <a href="{{ route('lerova.settings.index', Auth()->user()) }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Settings</strong>
                                </div>
                            </div>
                        </a>

                         </div>

                        @if(!config('lerova.settings.status'))
                        @endrole
                        @endif

                    <div class="col-md-4">

                        <a href="{{ route('lerova.profile.index', Auth()->user()) }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Your profile</strong>
                                </div>
                            </div>
                        </a>

                    </div>



                    @role('administrator')
                    <div class="col-md-4">

                        <a href="{{ route('lerova.administrator.index') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Administrator</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endrole

                </div>

            </div>

        </div>

    </div>









@endsection
