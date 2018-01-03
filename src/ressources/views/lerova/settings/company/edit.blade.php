@extends('lerova.layouts.backend')

@section('styles')



@endsection

@section('content')

    <div class="container">

        <div class="row">


            <div class="col-md-8 col-md-offset-2">

                <h2>Company Details</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.settings.index') }}">Settings</a></li>
                    <li class="active">Company Details</li>
                </ol>

                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">


                <form class="form-horizontal" method="POST" action="{{ route('lerova.settings.company.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <h5>E-Mail <span class="pull-right label label-info">required</span></h5>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="email" id="email" placeholder="E-Mail" name="email" class="form-control" value="{{ $company->email }}"
                                   required autofocus>

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

                            <input type="tel" id="phone" placeholder="Phone" name="phone" class="form-control" value="{{ $company->phone }}">

                            @if ($errors->has('phone'))
                                <span class="help-block">
                     <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>


                    <h5>Web <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('web') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="web" placeholder="Web" name="web" class="form-control" value="{{ $company->web }}">

                            @if ($errors->has('web'))
                                <span class="help-block">
                     <strong>{{ $errors->first('web') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>

                    <h5>Google Maps <span class="pull-right label label-info">optional</span></h5>

                    <div class="form-group{{ $errors->has('google_maps') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="url" id="google_maps" placeholder="Google Maps" name="google_maps" class="form-control" value="{{ $company->google_maps }}">

                            @if ($errors->has('google_maps'))
                                <span class="help-block">
                     <strong>{{ $errors->first('google_maps') }}</strong>
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