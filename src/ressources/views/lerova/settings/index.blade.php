@extends('lerova.layouts.backend')

@section('styles')

    <style>

        hr {
            color: black;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:visited {
            color: black;
        }

        /* visited link */
        a:hover {
            color: black;
        }

        /* mouse over link */
        a:active {
            color: black;
        }

        /* selected lin

</style>

@endsection

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <h2>Settings</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Overview</li>
                </ol>

                <hr>

            </div>

            <div class="col-md-12">

                @if(config('lerova.settings.general'))
                    <div class="col-md-6">

                        <h3>General</h3>

                        <hr>

                        <div class="row text-center">


                            @if(config('lerova.settings.contact_details'))
                                <div class="col-md-4">

                                    <a href="{{ route('lerova.settings.contacts.edit') }}">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <i class="fa fa-volume-control-phone fa-2x" aria-hidden="true"></i>
                                                <hr>
                                                <strong>Contact Details</strong>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endif

                                @if(config('lerova.settings.contact_form'))
                                    <div class="col-md-4">

                                        <a href="{{ route('lerova.settings.form.edit') }}">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                                    <hr>
                                                    <strong>Contact Form</strong>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                @endif


                        </div>

                    </div>
                @endif

                @if(config('lerova.settings.pages'))
                    <div class="col-md-6">

                        <h3>Pages</h3>

                        <hr>

                        <div class="row text-center">

                            @if(config('lerova.settings.metadata'))
                                <div class="col-md-4">

                                    <a href="{{ route('lerova.settings.meta.index') }}">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <i class="fa fa-sitemap fa-2x" aria-hidden="true"></i>
                                                <hr>
                                                <strong>Metadata</strong>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endif



                        </div>

                    </div>
                @endif

                @if(config('lerova.settings.social_medias'))

                    <div class="col-md-6">

                        <h3>Social Medias</h3>

                        <hr>

                        <div class="row text-center">
                            @if(config('lerova.settings.links'))

                                <div class="col-md-4">

                                    <a href="{{ route('lerova.settings.links.edit') }}">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <i class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
                                                <hr>
                                                <strong>Links</strong>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endif


                        </div>

                    </div>

                @endif

                @if(config('lerova.settings.legal'))

                    <div class="col-md-6">

                        <h3>Legal</h3>

                        <hr>

                        <div class="row text-center">
                            @if(config('lerova.settings.imprint'))

                                <div class="col-md-4">

                                    <a href="{{ route('lerova.settings.imprint.edit') }}">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <i class="fa fa-id-card-o fa-2x" aria-hidden="true"></i>
                                                <hr>
                                                <strong>Imprint</strong>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endif

                            @if(config('lerova.settings.privacy'))

                                <div class="col-md-4">

                                    <a href="{{ route('lerova.settings.privacy.edit') }}">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <i class="fa fa-user-secret fa-2x" aria-hidden="true"></i>
                                                <hr>
                                                <strong>Privacy</strong>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endif

                        </div>

                    </div>
                @endif

            </div>

        </div>

    </div>

@endsection
