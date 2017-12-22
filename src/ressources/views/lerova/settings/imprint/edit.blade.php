@extends('lerova.layouts.backend')

@section('styles')

    @include('lerova.layouts.partials.styles.redactor')

@endsection


@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>Imprint</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.settings.index') }}">Settings</a></li>
                    <li class="active">Imprint</li>
                </ol>


                <hr>

            </div>


            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST" action="{{ route('lerova.settings.imprint.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}


                    <h5>Titel</h5>

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input title="title" type="text" id="title" name="title" class="form-control" value="{{ $imprint->title }}"
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
                                      required>{{ $imprint->body }}</textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                     <strong>{{ $errors->first('body') }}</strong>
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


    @include('lerova.layouts.partials.scripts.redactor')
    @include('lerova.layouts.components.redactor')


@endsection