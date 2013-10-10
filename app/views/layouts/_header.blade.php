<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::action('PagesController@home')}}">Wq Space</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{URL::action('PagesController@home')}}">Home</a>
                </li>
                <li>
                    <a href="{{URL::action('ProductsController@index')}}">Products</a>
                </li>
                <li>
                    <a href="{{URL::action('PagesController@privacy')}}">Privacy</a>
                </li>
                <li>
                    <a href="{{URL::action('CartController@index')}}">Cart</a>
                </li>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{URL::action('SessionsController@destroy')}}">Log out</a></li>
                        </ul>
                  </li>
                @else
                    <li>
                        <a href="{{URL::action('SessionsController@create')}}">Log in</a>
                    </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>