@extends('lerova.layouts.backend')

@section('styles')

    @include('lerova.layouts.partials.styles.select2')
    @include('lerova.layouts.partials.styles.redactor')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>Add a new Post</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.blog.index') }}">Overview</a></li>
                    <li class="active">Add a new Post</li>
                </ol>

                <hr>


                <form class="form-horizontal" method="POST" action="{{ route('lerova.blog.posts.store') }}">
                    {{ csrf_field() }}

                    <h5>Page <span class="pull-right label label-info">required</span></h5>
                    <div class="form-group{{ $errors->has('page_id') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <select style="width:100%;" title="page_id" id="page_id" name="page_id" class="form-control" required>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}" @if ($page->id == old('page_id')) selected @endif>{{ $page->title }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('page_id'))
                                <span class="help-block">
                                                            <strong>{{ $errors->first('page_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <h5>Title <span class="pull-right label label-info">required</span></h5>

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="title"
                                   placeholder="Title - Max. {{ config('lerova.core.blog.title_max') }} Characters"
                                   name="title"
                                   value="{{ old('title') }}"
                                   class="form-control" required autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <h5>Teaser <span class="pull-right label label-info">required</span></h5>

                    <div class="form-group{{ $errors->has('teaser') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <textarea rows="2" style="resize: none;" id="teaser"
                                      placeholder="Teaser - Max. {{ config('lerova.core.blog.teaser_max') }} Characters"
                                      name="teaser"
                                      class="form-control" required>{{ old('teaser') }}</textarea>

                            @if ($errors->has('teaser'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('teaser') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Body <span class="pull-right label label-info">required</span></h5>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <textarea id="body" placeholder="Body" name="body"
                                      class="form-control" required>{{ old('body') }}</textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Tags <span class="pull-right label label-info">required</span></h5>
                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">


                        <div class="col-md-12">

                            <select title="tags" style="width:100%;" id="tags" name="tags[]" class="form-control" multiple required>
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


                    <h5>Images</h5>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input style="" id="image" value="{{ old('image') }}" name="image" type="hidden"
                                   data-public-key="{{env('UPLOADCARE_PUBLIC_KEY')}}" data-images-only
                                   data-crop="{{config('lerova.core.blog.image_ratio')}}" data-clearable
                                   data-image-shrink="{{config('lerova.core.blog.image_shrink')}}"
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
                                a new Post
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