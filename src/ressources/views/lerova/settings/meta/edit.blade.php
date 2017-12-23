@extends('lerova.layouts.backend')

@section('styles')

    @include('lerova.layouts.partials.styles.select2')

@endsection


@section('content')

    <div class="container">

        <div class="row">


            <div class="col-md-8 col-md-offset-2">

                <h2>{{ $page->title }}</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.settings.index') }}">Settings</a></li>
                    <li><a href="{{ route('lerova.settings.meta.index') }}">Metadata</a></li>
                    <li class="active">{{ $page->title }}</li>
                </ol>


                <hr>

            </div>



                <div class="col-md-8 col-md-offset-2">



                    <form class="form-horizontal" method="POST"
                          action="{{ route('lerova.settings.meta.update', $page)}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                            <label for="title" class="col-md-10 col-md-offset-1">Title</label>

                            <div class="col-md-10 col-md-offset-1">

                                <input type="text" id="title" placeholder="Title" value="{{ $page->title }}"
                                       class="form-control" name="title"
                                       required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                            <label for="description" class="col-md-10 col-md-offset-1">Description</label>

                            <div class="col-md-10 col-md-offset-1">

                                <textarea rows="3" id="description" placeholder="Description" class="form-control" name="description"
                                          required>{{ $page->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">

                            <label for="keywords" class="col-md-10 col-md-offset-1">Keywords</label>

                            <div class="col-md-10 col-md-offset-1">

                                <select style="width:100%;" id="keywords" name="keywords[]" class="form-control" multiple required>
                                    @if (is_array($page->keywords))
                                        @foreach ($page->keywords as $keyword)
                                            <option value="{{ $keyword }}" selected="selected">{{ $keyword }}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                                            <strong>{{ $errors->first('keywords') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

                            <label for="keywords" class="col-md-10 col-md-offset-1">Image</label>

                            <div class="col-md-10 col-md-offset-1">

                                <input style="" id="image" value="{{ $page->image }}" name="image" type="hidden" data-public-key="{{env('UPLOADCARE_PUBLIC_KEY')}}" data-images-only
                                       data-image-shrink="{{config('lerova.core.pages.image_shrink')}}" data-crop="{{config('lerova.core.pages.image_ratio')}}" data-clearable data-image-shrink
                                       role="uploadcare-uploader" class="form-control" required>

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                                            <strong>{{ $errors->first('image') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-block btn-success">
                                    Save
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


    <script>

        $('#keywords').select2({
            tags: true,
            placeholder: "Keywords",
            multiple: true,
            tokenSeparators: [',']

        });

    </script>



@endsection
