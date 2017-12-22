@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">


            <div class="col-md-8 col-md-offset-2">

                <h2>Metadata</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.settings.index') }}">Settings</a></li>
                    <li class="active">Metadata</li>
                </ol>


                <hr>

            </div>

            @if($pages->count())


                <div class="col-md-8 col-md-offset-2">


                    <div class="row">


                @foreach($pages as $page)

                    <div class="col-xs-6 col-sm-4 text-center">


                            <div class="panel panel-default">
                                <a href="{{ route('lerova.settings.meta.edit', $page) }}">
                                    <div class="panel-body">
                                        <img style="margin: 0 auto;" src="{{ $page->image }}" alt="{{ $page->title }}" width="250px" height="auto" class="img-responsive img-rounded">
                                    </div>
                                </a>
                                <div class="panel-footer"><strong>{{ $string = substr($page->title,0,20) }}</strong></div>
                            </div>

                    </div>

                @endforeach


                    </div>

                </div>


            @else

                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-danger">
                        <div class="panel-body">

                            <span class="pull-right label label-danger">Info</span> No
                            Pages available
                        </div>

                    </div>

                </div>

            @endif


        </div>
    </div>

@endsection
