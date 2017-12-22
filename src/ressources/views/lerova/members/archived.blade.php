@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>Members</h2>

                <a href="{{ route('lerova.members.create')}}" class="btn btn-xs btn-success pull-right">Add a Member</a>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Members</li>
                </ol>

                <hr>

                <a href="{{ route('lerova.members.index') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.members.index') label-primary @else label-default @endif">All Members</span>
                </a>

                <a href="{{ route('lerova.members.archived') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.members.archived') label-primary @else label-default @endif">Archived</span>
                </a>

                <hr>


            </div>

            @if(!empty($members))

                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-default">

                        <div class="panel-body">

                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th class="">Name</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($members as $member)

                                    <tr>
                                        <td class=""><a href="{{ route('lerova.members.edit', $member) }}">{{ $member->name }}</a></td>


                                        <td class="text-center">

                                            @if($blog->published)

                                                <form id="withdraw" role="form" method="POST"
                                                      action="{{ route('lerova.members.withdraw', $member) }}">

                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}


                                                    <button type="submit"
                                                            style=" padding: 0; border: none; background: none; ">
                                                        Withdraw
                                                    </button>

                                                </form>

                                            @else

                                                <form id="publish" role="form" method="POST"
                                                      action="{{ route('lerova.members.publish', $member) }}">

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
                                                  action="{{ route('lerova.members.archive', $member) }}">

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

                <div class="col-md-8 col-md-offset-2">

                    <div class="alert alert-warning">
                        <span class="pull-right label label-warning">Info</span> No Member available
                    </div>

                </div>

            @endif


        </div>
    </div>

@endsection
