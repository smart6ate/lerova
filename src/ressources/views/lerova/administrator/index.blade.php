@extends('lerova.layouts.backend')

@section('content')



    <div class="container">

        <div class="row">


            <div class="col-md-8 col-md-offset-2">
                <h2>Administrator</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Dashboard</li>
                </ol>

                <hr>
            </div>


            <div class="col-md-8 col-md-offset-2">
                <div class="row text-center">


                    <div class="col-md-4">

                        <a style="color: black;" href="{{ route('lerova.administrator.modules.edit') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa fa-flask fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Modules</strong>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-4">

                        <a style="color: black;" href="{{ route('lerova.administrator.settings.edit') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa fa-sliders fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Settings</strong>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-4">

                        <a style="color: black;" href="{{ route('lerova.administrator.users.index') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Users</strong>
                                </div>
                            </div>
                        </a>

                    </div>


                    <div class="col-md-4">

                        <a style="color: black;" href="{{ route('lerova.administrator.pages.index') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-sitemap fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Pages</strong>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-4">

                        <a style="color: black;" href="{{ route('lerova.administrator.analytics.edit') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Analytics</strong>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>

            </div>


            <div class="col-md-8 col-md-offset-2">
                <h2>Modules</h2>

                <hr>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="row text-center">


                    <div class="col-md-4">

                        <a style="color: black;" href="{{ route('lerova.administrator.modules.blog.edit') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-rss fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Blog</strong>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">

                        <a style="color: black;" href="{{ route('lerova.administrator.modules.notifications.edit') }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                                    <hr>
                                    <strong>Notifications</strong>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>


        </div>

    </div>





@endsection
