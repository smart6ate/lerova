@extends('lerova.layouts.backend')

@section('styles')



@endsection

@section('content')

    <div class="container">

        <div class="row">


            <div class="col-md-8 col-md-offset-2">

                <h2>Contact Details</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.settings.index') }}">Settings</a></li>
                    <li class="active">Contact Details</li>
                </ol>

                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">


                <form class="form-horizontal" method="POST" action="{{ route('lerova.settings.contacts.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <h5>E-Mail</h5>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="email" id="email" name="email" class="form-control" value="{{ $contacts->email }}"
                                   required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
                      </span>
                            @endif

                        </div>

                    </div>

                    <h5>Phone</h5>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                        <div class="col-md-12">

                            <input type="tel" id="phone" placeholder="Phone" name="phone" class="form-control" value="{{ $contacts->phone }}">

                            @if ($errors->has('phone'))
                                <span class="help-block">
                     <strong>{{ $errors->first('phone') }}</strong>
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