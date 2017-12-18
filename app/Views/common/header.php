<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=APP_TITLE?></title>
    <base href="<?=BASE_HREF?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="assets/css/vendors/bootstrap.css" media="screen">
    <link rel="stylesheet" href="assets/css/main.css">

    <script src="assets/js/vendors/jquery.min.js"></script>
    <script src="assets/js/vendors/popper.min.js"></script>
    <script src="assets/js/vendors/bootstrap.min.js"></script>
    <script src="assets/js/vendors/vue.min.js"></script>
    <script>
      $(
        function() {
          $(".navbar a").removeClass('active');
          var location = window.location.pathname.split('/');
          location = location[location.length-1];
          
          $(".navbar a[href='" + location + "']").addClass('active');
        }
      );
    </script>

  </head>
  <body>
  <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a href="" class="navbar-brand"><?=APP_TITLE?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sql">SQL Queries</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="numbers">JS Number App</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="self">PHP Script that shows itself</a>
            </li>
          </ul>

<?php if ($GLOBALS['isLoggedIn']): ?>
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="logout">Logout</a>
            </li>
          </ul>
<?php endif; ?>

        </div>

      </div>
    </div>

<br>
<br>
<br>

    <div class="container">
    <div class="jumbotron">