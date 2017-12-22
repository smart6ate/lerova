@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Gallery <span class="badge">{{ $galleries->count() }}</span></h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Gallery</li>
                </ol>

                <hr>


                <hr>

            </div>


        </div>
    </div>

@endsection
