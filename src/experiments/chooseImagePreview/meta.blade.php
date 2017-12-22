@extends('ressources.views.lerova.layouts.backend')


@section('styles')

@endsection


@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-8 col-md-offset-2">


                <h2>{{ $image->title }}</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.images.index') }}">Images</a></li>
                    <li class="active">{{ $image->title }}</li>
                </ol>

                <hr>


                <a href="{{ route('lerova.images.index') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.images.index') label-primary @else label-default @endif">All Images</span>
                </a>

                <a href="{{ route('lerova.images.archived') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.images.archived') label-primary @else label-default @endif">Archived</span>
                </a>


                <hr>

            </div>


            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('lerova.images.update.meta',$image) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <h5>Image-Cover</h5>

                    <div class="form-group{{ $errors->has('preview') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <div class="dropzone" data-resize="true" data-canvas="false" data-width="{{config('lerova.uploadcare.images_preview_image_width')}}" data-originalsize="false" data-height="{{config('lerova.uploadcare.images_preview_image_height')}}"
                                 data-ajax="false" style="width: 100%;" data-button-edit="false" data-button-cancel="false" data-button-del="false"
                                 data-image="{{$image->image }}"
                                 data-editstart="true" data-dimensionsonly="true">
                                <input type="file" id="preview" name="preview"/>
                            </div>


                            @if ($errors->has('preview'))
                                <span class="help-block">
                                                            <strong>{{ $errors->first('preview') }}</strong>
                                                        </span>
                            @endif

                        </div>
                    </div>


                    <div class="form-group">

                        <div class="col-md-12">

                            <button class="btn btn-block btn-success" type="submit">Save</button>

                        </div>


                    </div>
                </form>

            </div>


        </div>
    </div>


@endsection


@section('scripts')


    <script>

        $('.dropzone').html5imageupload({});

    </script>


@endsection