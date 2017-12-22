@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Add a new Page</h2>


                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li><a href="{{ route('lerova.administrator.pages.index') }}">Pages</a></li>
                    <li class="active">Add a new Page</li>
                </ol>



                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">


                <form class="form-horizontal" method="POST"
                      action="{{ route('lerova.administrator.pages.store')}}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        <div class="col-md-10 col-md-offset-1">

                            <input type="text" id="title" placeholder="Title" value="{{ old('title') }}"
                                   class="form-control" name="title"
                                   required autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-block btn-success">
                                Add a new Page
                            </button>
                        </div>
                    </div>


                </form>

            </div>


        </div>

    </div>
@endsection
