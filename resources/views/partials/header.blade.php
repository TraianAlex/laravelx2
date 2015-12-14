<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravelx2</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @if(Request::path() == "tweets") class="active" @endif><a href="{{ route('tweets.index') }}">Home</a></li>
                <li @if(Request::path() == "about") class="active" @endif><a href="about">About</a></li>
                <li @if(Request::path() == "contact") class="active" @endif><a href="contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>