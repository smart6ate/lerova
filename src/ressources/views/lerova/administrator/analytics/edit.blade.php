@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Analytics</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li class="active">Analytics</li>
                </ol>


                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST"
                      action="{{ route('lerova.administrator.analytics.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}


                    <h5>Google Analytics <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('google_analytics') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input type="text" id="google_analytics" placeholder="Google Analytics" name="google_analytics"
                                   value="{{ $analytics->google_analytics }}"
                                   class="form-control" autofocus>

                            @if ($errors->has('google_analytics'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('google_analytics') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <h5>Facebook Pixel<span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('facebook_pixel') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input type="text" id="facebook_pixel" placeholder="Facebok Pixel" name="facebook_pixel"
                                   value="{{ $analytics->facebook_pixel }}"
                                   class="form-control">

                            @if ($errors->has('facebook_pixel'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('facebook_pixel') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
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
