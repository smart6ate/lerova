@extends('lerova.layouts.backend')


@section('styles')

    @include('lerova.layouts.partials.styles.datetimepicker')
    @include('lerova.layouts.partials.styles.select2')
    @include('lerova.layouts.partials.styles.redactor')

@endsection


@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>{{ $blog->title }}</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.blog.index') }}">Overview</a></li>
                    <li class="active">{{ $blog->title }}</li>
                </ol>

                <hr>

            </div>


            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST" action="{{ route('lerova.blog.events.update',$blog) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <h5>Page <span class="pull-right label label-info">required</span></h5>
                    <div class="form-group{{ $errors->has('page_id') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <select style="width:100%;" title="page_id" id="page_id" name="page_id" class="form-control" required>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}" @if ($page->id == $blog->page_id) selected @endif>{{ $page->title }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('page_id'))
                                <span class="help-block">
                                                            <strong>{{ $errors->first('page_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Time<span class="pull-right label label-info">required</span></h5>


                    <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <div class="input-group date form_datetime" data-date="{{ \Carbon\Carbon::now() }}" >
                                <input  title="time" id="time" name="time" class="form-control" size="16" type="text" value="{{ $blog->time }}" readonly required>
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>


                            @if ($errors->has('time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Title</h5>

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="title"
                                   placeholder="Title - Max. {{ config('lerova.core.events.title.max') }}  Characters"
                                   name="title"
                                   value="{{ $blog->title }}"
                                   class="form-control" required>

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
                            <textarea id="body" placeholder="Body" name="body"
                                      class="form-control" required>{{ $blog->body }}</textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Tags</h5>
                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <select name="tags[]" title="tags" id="tags" class="form-control" multiple required>
                                @if (is_array($blog->tags))
                                @foreach ($blog->tags as $tag)
                                    <option value="{{ $tag }}" selected="selected">{{ $tag }}</option>
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

                    <h5>Images</h5>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input style="" id="image" value="{{ $blog->image }}" name="image" type="hidden"
                                   data-public-key="{{env('UPLOADCARE_PUBLIC_KEY')}}" data-images-only
                                   data-crop="{{config('lerova.core.uploadcare.image_ratio')}}" data-clearable
                                   data-image-shrink="{{config('lerova.core.uploadcare.image_shrink')}}"
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
    @include('lerova.layouts.partials.scripts.select2')
    @include('lerova.layouts.partials.scripts.redactor')
    @include('lerova.layouts.partials.scripts.datetimepicker')
    @include('lerova.layouts.components.redactor')
    @include('lerova.layouts.components.datetimepicker')

    <script>

        $('#tags').select2({
            tags: true,
            placeholder: "Tags",
            multiple: true,
            tokenSeparators: [',']
        });

    </script>



@endsection