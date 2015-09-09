<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/users">Users</a></li>
                <li><a href="{{ route('questions.index') }}" title="Questions">Questions</a></li>
                <li><a href="{{ route('questions.create') }}" title="+ New question">+ New question</a></li>
                <li><a href="{{ route('tags.index') }}" title="tags">Tags</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if($latest)
                    <li>{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>
                @endif

                @if(auth()->check())
                    <li><a href="{{ url('users', auth()->user()->id)}}">{{ auth()->user()->name }}</a></li>
                    <li><a href="{!! url('auth/logout') !!}">Logout</a></li>
                @else
                    <li><a href="{!! url('auth/login') !!}">Login</a></li>
                    <li><a href="{!! url('auth/register') !!}">Register</a></li>
                @endif


            </ul>



        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>