<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Gallery App - @yield('title') </title>
    
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    
    <style>
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
      text-align: center;
      }
      .modal.and.carousel {
          position: fixed; 
        }
    </style>
  </head>
  <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Awesome Albums</a>
                <div class="nav-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="{{URL::route('upload')}}">Create New Album</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
      
      <div class="container">
          @yield('content')
      </div>
      
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
      
  </body>
</html>