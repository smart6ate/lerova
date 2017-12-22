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



                </div>

            </div>

        </div>

    </div>





@endsection
