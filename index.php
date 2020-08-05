 <?php
  error_reporting(0);
  $get = json_decode(file_get_contents('http://ip.api.com/json/'),true);

  date_default_timezone_set($get['timezone']);
  $city = $_GET['city'];
  $country = $_GET['country'];

  $string = "https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=4c311ef6f718be1803cacd517477643e";
  $data = json_decode(file_get_contents($string), true);

  $tempK = $data['main']['temp'];
  $temp = $tempK - 273.15;
  $icon = $data['weather'][0]['icon'];
  $visibility = $data['visibility'];
  $visibilitykm = $visibility / 1000;
  $desc = $data['weather'][0]['description'];
  $clouds = $data['clouds']['all'];
  $humidity = $data['main']['humidity'];
  $windspeed = $data['wind']['speed'];
  $pressure = $data['main']['pressure'];
  $sunrise = date('h:i A', $data['sys']['sunrise']);
  $sunset = date('h:i A', $data['sys']['sunset']);



?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Weather App</title>

   

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">MyWeather</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Weather Report App</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-6">
        <form action="" method="get">
          <h4>Search for weather report</h4>
          <div class="form-group">
            <label >City Name</label>
            <input type="text" name="city" class="form-control "placeholder="City name..." >
          </div>
          <div class="form-group">
            <label >Country</label>
            <input type="text" name="country" class="form-control" placeholder="Country name..." >
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
       <hr>
      <div class="col-md-6">
        <div class="card" style="width: 23rem;">
          
          <div class="card-body">
            <h5 class="card-title">Location: <?php echo $city?></h5>
            <p class="card-text"><?php echo $desc; ?></p>
            
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Temperature: <?php echo $temp?> C </b></li>
            <li class="list-group-item"><b>Cloud:  <?php echo $clouds?></b></li>
            <li class="list-group-item"><b>Humidity:  <?php echo $humidity?> </b></li>
            <li class="list-group-item"><b>Wind Speed:  <?php echo $windspeed?></b> </li>
            <li class="list-group-item"><b>Pressure:  <?php echo $pressure?> hPa </b></li>
            <li class="list-group-item"><b>Visibility:  <?php echo $visibilitykm?></b> </li>
            <li class="list-group-item"><b>Sunrise:  <?php echo $sunrise?> </b></li>
            <li class="list-group-item"><b>Sunset:  <?php echo $sunset?> </b></li>
          </ul>
         
        </div>
      </div>
      
      
    </div>

   

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; Developed by Istiak Jaman</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

</html>
