@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Modules</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li class="active">Modules</li>
                </ol>


                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST"
                      action="{{ route('lerova.administrator.modules.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}



                    @foreach($modules as $module)

                        <h5>{{ ucfirst($module->name) }}<span class="pull-right label label-info">required</span></h5>

                        <div class="form-group{{ $errors->has($module->name) ? ' has-error' : '' }}">

                            <div class="col-md-12">

                                <select title="{{ ucfirst($module->name) }}" id="{{ $module->name }}" class="form-control" name="{{ $module->name }}">


                                        <option value="0"

                                                @if ($module->status == false) selected @endif

                                        >False</option>

                                    <option value="1"

                                            @if ($module->status == true) selected @endif

                                    >True</option>

                                </select>

                                @if ($errors->has($module->name))
                                    <span class="help-block">
                                        <strong>{{ $errors->first($module->name) }}</strong>
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
