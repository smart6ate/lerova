<div class="col-md-2">

    <ul class="list-group">

        <li class="list-group-item @if(Route::currentRouteName() === 'lerova.blog.index') active @endif">
            <a @if(Route::currentRouteName() === 'lerova.blog.index') style="color:white;" @else style="color:black;"
               @endif  href="{{ route('lerova.blog.index') }}"><i style="margin-right: 15px;" class="fa fa-globe"
                                                                  aria-hidden="true"></i> Overview </a>
        </li>
        <li class="list-group-item @if(Route::currentRouteName() === 'lerova.blog.archived') active @endif">
            <a @if(Route::currentRouteName() === 'lerova.blog.archived') style="color:white;" @else style="color:black;"
               @endif style="color:black;" href="{{ route('lerova.blog.archived') }}"><i style="margin-right: 15px;"
                                                                                         class="fa fa-file-archive-o"
                                                                                         aria-hidden="true"></i>
                Archived</a>
        </li>
    </ul>


    <ul class="list-group">
        @if(getBlogStatus('posts'))
            <li class="list-group-item @if(Route::currentRouteName() === 'lerova.blog.posts.create') active @endif">
                <a style="color:black;" href="{{ route('lerova.blog.posts.create') }}"><i
                            style="margin-right: 15px;" class="fa fa-newspaper-o" aria-hidden="true"></i>
                    Create Posts</a></li>
        @endif
        @if(getBlogStatus('images'))

            <li class="list-group-item @if(Route::currentRouteName() === 'lerova.blog.images.create') active @endif"><a
                        style="color:black;"
                        href="{{ route('lerova.blog.images.create') }}"><i
                            style="margin-right: 15px;" class="fa fa-file-image-o" aria-hidden="true"></i>
                    Create Images</a></li>
        @endif
        @if(getBlogStatus('events'))

            <li class="list-group-item @if(Route::currentRouteName() === 'lerova.blog.events.create') active @endif"><a
                        style="color:black;"
                        href="{{ route('lerova.blog.events.create') }}"><i
                            style="margin-right: 15px;" class="fa fa-calendar" aria-hidden="true"></i>
                    Create Events</a></li>@endif
        @if(getBlogStatus('links'))

            <li class="list-group-item @if(Route::currentRouteName() === 'lerova.blog.links.create') active @endif"><a
                        style="color:black;"
                        href="{{ route('lerova.blog.links.create') }}"><i
                            style="margin-right: 15px;" class="fa fa-link" aria-hidden="true"></i> Create
                    Links</a></li>@endif
    </ul>
</div>
