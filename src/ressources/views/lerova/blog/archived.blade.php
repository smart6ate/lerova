@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-10 col-md-offset-2">

                <h2>Archived Blog Entries</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Blog</li>
                </ol>

                <hr>


            </div>

            <div class="col-md-12">

                @include('lerova.blog.sidebar')

                @if($blogs->count())


                    <div class="col-md-10">
{{--
                        @include('lerova.blog.searchbar')
--}}
                        <div class="panel panel-default">

                            <div class="panel-body">


                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="">Title</th>
                                        <th class="text-center">Restore</th>

                                        @role('administrator')
                                        <th class="text-center">Delete</th>
                                        @endrole

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($blogs as $blog)

                                        <tr>
                                            <td class="text-center"><i class="fa {{ $blog->getFontAwesomeIcon() }}" aria-hidden="true"></i></td>
                                            <td >{{ $blog->title }}</td>

                                            <td class="text-center">

                                                <form id="restore" class=“” role="form" method="POST"
                                                      action="{{ route('lerova.blog.restore', $blog) }}">

                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}


                                                    <button type="submit" style="color:white; padding: 0; border: none; background: none; ">
                                                        <i style="color:darkorange;" class="fa fa-undo" aria-hidden="true"></i>
                                                    </button>

                                                </form>

                                            </td>


                                            @role('administrator')
                                            <td class="text-center">

                                                <form id="delete" role="form" method="POST"
                                                      action="{{ route('lerova.blog.destroy', $blog) }}">

                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" style="color:white; padding: 0; border: none; background: none; ">
                                                        <i style="color:indianred;" class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>

                                                </form>

                                            </td>
                                            @endrole


                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @else

                            <div class="col-md-10">
                        <div class="alert alert-warning">
                            <span class="pull-right label label-warning">Info</span> No Archived Content available
                        </div>
                            </div>

                    @endif


                </div>
            </div>

        </div>
    </div>

@endsection
