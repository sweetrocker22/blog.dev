<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand hover" href="/posts">Daily Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <!--Left NavBar-->
        {{ Form::open(array('action' => 'PostsController@index', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
        <div class="form-group">
          {{ Form::text('search', Input::get('search'), array('class' => 'form-control', 'placeholder' => 'Search By Title')) }}
        </div>
        {{ Form::submit('Submit', array('class' =>'btn btn-default')) }}
        {{ Form::close() }}
       <!--Right NavBar-->     
      <ul class="nav navbar-nav navbar-right hover">
       @if (Auth::check())
        <li>{{ Auth::user()->email }}</li>  
        <li>{{ link_to_action('PostsController@create', 'Create Post') }}</li>
        <li>{{ link_to_action('HomeController@logout', 'Log Out') }}</li>
       @else  
        <li>{{ link_to_action('HomeController@showLogin', 'Login') }}</li>
       @endif  
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>