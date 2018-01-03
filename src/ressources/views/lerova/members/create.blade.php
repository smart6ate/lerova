@extends('lerova.layouts.backend')

@section('styles')

    @include('lerova.layouts.partials.styles.select2')
    @include('lerova.layouts.partials.styles.redactor')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>Add a new Member</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.members.index') }}">Overview</a></li>
                    <li class="active">Add a new Member</li>
                </ol>

                <hr>


                <form class="form-horizontal" method="POST" action="{{ route('lerova.members.store') }}">
                    {{ csrf_field() }}


                    <h5>Name <span class="pull-right label label-info">required</span></h5>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="name"
                                   placeholder="Name - Max. {{ config('lerova.core.blog.title_max') }}   Characters"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="form-control" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <h5>Teaser <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('teaser') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <textarea rows="2" style="resize: none;" id="teaser"
                                      placeholder="Teaser - Max. {{ config('lerova.core.blog.teaser_max') }} Characters"
                                      name="teaser"
                                      class="form-control">{{ old('teaser') }}</textarea>

                            @if ($errors->has('teaser'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('teaser') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Education <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="education"
                                   type="text" placeholder="Education"
                                   name="education"
                                   value="{{ old('education') }}"
                                   class="form-control">

                            @if ($errors->has('education'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>E-Mail <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="email"
                                   type="email"
                                   placeholder="E-Mail"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <h5>Phone <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="phone"
                                   type="tel"
                                   placeholder="Phone"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   class="form-control">

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <h5>Tags <span class="pull-right label label-info">required</span></h5>
                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">


                        <div class="col-md-12">

                            <select title="tags" style="width:100%;" id="tags" name="tags[]" class="form-control" multiple>
                                @if (is_array(old('tags')))
                                    @foreach (old('tags') as $keyword)
                                        <option value="{{ $keyword }}" selected="selected">{{ $keyword }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @if ($errors->has('tags'))
                                <span class="help-block">
                                                            <strong>{{ $errors->first('tags') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>

                    <h5>LinkedIn <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="linkedin"
                                   type="text"
                                   placeholder="LinkedIn"
                                   name="linkedin"
                                   value="{{ old('linkedin') }}"
                                   class="form-control">

                            @if ($errors->has('linkedin'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <h5>Xing <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('xing') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="xing"
                                   type="text"
                                   placeholder="Xing"
                                   name="xing"
                                   value="{{ old('xing') }}"
                                   class="form-control">

                            @if ($errors->has('xing'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('xing') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Google + <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('google_plus') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="google_plus"
                                   type="text"
                                   placeholder="Google +"
                                   name="google_plus"
                                   value="{{ old('google_plus') }}"
                                   class="form-control">

                            @if ($errors->has('google_plus'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('google_plus') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Web<span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('web') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="web"
                                   type="text"
                                   placeholder="Web"
                                   name="web"
                                   value="{{ old('web') }}"
                                   class="form-control">

                            @if ($errors->has('web'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('web') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Images</h5>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input style="" id="image" value="{{ old('image') }}" name="image" type="hidden"
                                   data-public-key="{{env('UPLOADCARE_PUBLIC_KEY')}}" data-images-only
                                   data-crop="{{config('lerova.core.members.image_ratio')}}" data-clearable
                                   data-image-shrink="{{config('lerova.core.members.image_shrink')}}"
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

                            <button class="btn btn-block btn-success" type="submit">Add
                                a new Member
                            </button>

                        </div>


                    </div>


                </form>


            </div>
        </div>

    </div>


@endsection


@section('scripts')

    @include('lerova.layouts.partials.scripts.uploadcare')
    @include('lerova.layouts.partials.scripts.select2')
    @include('lerova.layouts.partials.scripts.redactor')
    @include('lerova.layouts.components.redactor')

    <script>

        $('#tags').select2({
            tags: true,
            placeholder: "Tags",
            multiple: true,
            tokenSeparators: [',']
        });

    </script>


@endsection