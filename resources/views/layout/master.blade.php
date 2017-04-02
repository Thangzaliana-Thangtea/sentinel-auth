<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <script type="text/javascript" src="js/bootstrap.min.js"/>
  
</head>
<body>
<div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
            <a class="btn btn-primary" href="/note">note</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              @if(Sentinel::check())
                  <form action="/logout" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" name="submit" value="logout"/>
                  </form>
              @else
                  <li><a href="/login">login</a></li>
                  <li><a href="/register">register</a></li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        @if(Sentinel::check())
           <h1> hello {{ Sentinel::getUser()->first_name}}</h1>
        @else
          <h2> welcome guest</h2>
        @endif
        @yield('content')
      </div>

    </div> <!-- /container -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>
