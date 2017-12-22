@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">



            <div class="col-md-8 col-md-offset-2">


                <h2>Pages <span class="badge">{{ $pages->count() }}</span></h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li class="active">Pages</li>
                </ol>


                <hr>

                <a href="{{ route('lerova.administrator.pages.index') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.administrator.pages.index') label-primary @else label-default @endif">All pages</span>
                </a>

                <a href="{{ route('lerova.administrator.pages.create') }}" class="pull-right btn btn-xs btn-success">Add a new Page</a>



            </div>


            @if($pages->count())

                <div class="col-md-8 col-md-offset-2">

                    <hr>

                    <div class="panel panel-default">

                        <div class="panel-body">


                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Page</th>
                                    <th class="text-center">Published</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($pages as $page)
                                    <tr>

                                        <td>{{ $page->id }}</td>
                                        <td>
                                           {{ $page->title }}
                                        </td>
                                        <td class="text-center">

                                            @if($page->published)



                                                <form id="withdraw" class="" role="form" method="POST"
                                                      action="{{ route('lerova.administrator.pages.withdraw', $page) }}">

                                                    {{ csrf_field() }}

                                                    <button type="submit" style="color:indianred; padding: 0; border: none; background: none; ">
                                                      Withdraw
                                                    </button>

                                                </form>




                                            @else


                                                <form id="withdraw" class="" role="form" method="POST"
                                                      action="{{ route('lerova.administrator.pages.publish', $page) }}">

                                                    {{ csrf_field() }}

                                                    <button type="submit" style="color:limegreen; padding: 0; border: none; background: none; ">
                                                       Publish
                                                    </button>

                                                </form>





                                            @endif
                                        </td>

                                        <td class="text-center">

                                            <form id="withdraw" class="" role="form" method="POST"
                                                  action="{{ route('lerova.administrator.pages.delete', $page) }}">

                                                {{ csrf_field() }}

                                                <button type="submit" style="color:white; padding: 0; border: none; background: none; ">
                                                    <i style="color:indianred;" class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>
            @endif


        </div>

    </div>









@endsection
