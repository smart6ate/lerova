@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-10 col-md-offset-2">

                <h2>Blog Entries</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Blog Entries</li>
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
                                        <th class="text-center">Type</th>
                                        <th class="">Title</th>
                                        <th class="text-center">Page</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Archive</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($blogs as $blog)

                                        <tr>
                                            <td class="text-center"><i class="fa {{ $blog->getFontAwesomeIcon() }}"
                                                                       aria-hidden="true"></i></td>
                                            <td class=""><a
                                                        href="{{ url('/lerova/blog/' . $blog->type .'/edit', $blog) }}">{{ $blog->title }}</a>
                                            </td>
                                            <td class="text-center">{{ $blog->page->title }}</td>
                                            <td class="text-center">

                                                @if($blog->published)

                                                    <form id="withdraw" role="form" method="POST"
                                                          action="{{ route('lerova.blog.withdraw', $blog) }}">

                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}


                                                        <button type="submit"
                                                                style=" padding: 0; border: none; background: none; ">
                                                            Withdraw
                                                        </button>

                                                    </form>

                                                @else

                                                    <form id="publish" role="form" method="POST"
                                                          action="{{ route('lerova.blog.publish', $blog) }}">

                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}


                                                        <button type="submit" style=" padding: 0; border: none; background: none;">
                                                            Publish
                                                        </button>

                                                    </form>

                                                @endif

                                            </td>

                                            <td class="text-center">

                                                <form id="delete" role="form" method="POST"
                                                      action="{{ route('lerova.blog.archive', $blog) }}">

                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}


                                                    <button type="submit"
                                                            style="padding: 0; border: none; background: none; ">
                                                        <i style="color:darkgray;" class="fa fa-archive"
                                                           aria-hidden="true"></i>
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

                @else

                    <div class="col-md-10">

                        <div class="alert alert-warning">
                            <span class="pull-right label label-warning">Info</span> No Content available
                        </div>

                    </div>

                @endif


            </div>
        </div>

    </div>
@endsection
