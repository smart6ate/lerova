@extends('lerova.layouts.backend')

@section('styles')

    @include('lerova.layouts.partials.styles.redactor')


@endsection

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h1>About</h1>

                <hr>


                <form class="form-horizontal" method="POST" action="{{ route('lerova.about.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}


                    <h5>Titel</h5>

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input title="title" type="text" id="title" name="title" class="form-control" value="{{ $about->title }}"
                                      required>

                            @if ($errors->has('title'))
                                <span class="help-block">
                     <strong>{{ $errors->first('title') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>



                    <h5>Body</h5>

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                        <div class="col-md-12">


                            <textarea id="body" name="body" rows="5" class="form-control" placeholder="Your message..."
                                      required>{{ $about->body }}</textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                     <strong>{{ $errors->first('body') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>

                    <h5>Images</h5>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input style="" id="image" value="{{ $about->image }}" name="image" type="hidden"
                                   data-public-key="{{env('UPLOADCARE_PUBLIC_KEY')}}" data-images-only
                                   data-crop="{{config('lerova.core.about.image_ratio')}}" data-clearable
                                   data-image-shrink="{{config('lerova.core.about.image_shrink')}}"
                                   role="uploadcare-uploader" class="form-control" required>

                            @if ($errors->has('image'))
                                <span class="help-block">
                                                            <strong>{{ $errors->first('image') }}</strong>
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

    @include('lerova.layouts.partials.scripts.uploadcare')
    @include('lerova.layouts.partials.scripts.redactor')
    @include('lerova.layouts.components.redactor')

@endsection