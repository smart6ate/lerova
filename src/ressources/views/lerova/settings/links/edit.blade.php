@extends('lerova.layouts.backend')

@section('styles')

@endsection

@section('content')

    <div class="container">

        <div class="row">


            <div class="col-md-8 col-md-offset-2">

                <h2>Links</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.settings.index') }}">Settings</a></li>
                    <li class="active">Links</li>
                </ol>


                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">


                <form class="form-horizontal" method="POST" action="{{ route('lerova.settings.links.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}


                    <h5>Facebook <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="facebook" placeholder="Facebook" name="facebook" class="form-control" value="{{ $links->facebook }}" autofocus>

                            @if ($errors->has('facebook'))
                                <span class="help-block">
                     <strong>{{ $errors->first('facebook') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>

                    <h5>Twitter <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="twitter" placeholder="Twitter" name="twitter" class="form-control" value="{{ $links->twitter }}">

                            @if ($errors->has('twitter'))
                                <span class="help-block">
                     <strong>{{ $errors->first('twitter') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>

                    <h5>Instagram <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="instagram" placeholder="Instagram" name="instagram" class="form-control" value="{{ $links->instagram }}">

                            @if ($errors->has('instagram'))
                                <span class="help-block">
                     <strong>{{ $errors->first('instagram') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>


                    <h5>Pinterest <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('pinterest') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="pinterest" placeholder="Pinterest" name="pinterest" class="form-control" value="{{ $links->pinterest }}">

                            @if ($errors->has('pinterest'))
                                <span class="help-block">
                     <strong>{{ $errors->first('pinterest') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>


                    <h5>LinkedIn <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="linkedin" placeholder="LinkedIn" name="linkedin" class="form-control" value="{{ $links->linkedin }}">

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

                            <input type="url" id="xing" placeholder="Xing" name="xing" class="form-control" value="{{ $links->xing }}">

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

                            <input type="url" id="google_plus" placeholder="Google +" name="google_plus" class="form-control" value="{{ $links->google_plus }}">

                            @if ($errors->has('google_plus'))
                                <span class="help-block">
                     <strong>{{ $errors->first('google_plus') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>


                    <h5>RSS <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('rss') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="rss" placeholder="RSS" name="rss" class="form-control" value="{{ $links->rss }}">

                            @if ($errors->has('rss'))
                                <span class="help-block">
                     <strong>{{ $errors->first('rss') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>


                    <h5>Github <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('github') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="github" placeholder="Github" name="github" class="form-control" value="{{ $links->github }}">

                            @if ($errors->has('github'))
                                <span class="help-block">
                     <strong>{{ $errors->first('github') }}</strong>
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


@endsection