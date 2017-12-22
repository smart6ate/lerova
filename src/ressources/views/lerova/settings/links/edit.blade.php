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


                    <h5>Facebook</h5>

                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="facebook" placeholder="Facebook" name="facebook" class="form-control" value="{{ $links->facebook }}">

                            @if ($errors->has('facebook'))
                                <span class="help-block">
                     <strong>{{ $errors->first('facebook') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>

                    <h5>Instagram</h5>

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

                    <h5>Twitter</h5>

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


                    <h5>Pinterest</h5>

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