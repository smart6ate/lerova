@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Settings</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li class="active">Settings</li>
                </ol>


                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST"
                      action="{{ route('lerova.administrator.settings.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}



                    @foreach($settings as $setting)

                        <h5>{{ ucfirst($setting->name) }}<span class="pull-right label label-info">required</span></h5>

                        <div class="form-group{{ $errors->has($setting->name) ? ' has-error' : '' }}">

                            <div class="col-md-12">

                                <select title="{{ ucfirst($setting->name) }}" id="{{ $setting->name }}" class="form-control" name="{{ $setting->name }}">


                                        <option value="0"

                                                @if ($setting->status == false) selected @endif

                                        >False</option>

                                    <option value="1"

                                            @if ($setting->status == true) selected @endif

                                    >True</option>

                                </select>

                                @if ($errors->has($setting->name))
                                    <span class="help-block">
                                        <strong>{{ $errors->first($setting->name) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                    @endforeach



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
