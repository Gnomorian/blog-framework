<!DOCTYPE html>
<html>
<title>Portfolio - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
a {text-decoration: none}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32">
  <h1><a href="/"><b>Dashboard</b></a></h1>
</header>

<!-- Grid -->
<div class="w3-row">
<a href="/post_add">
<div class="w3-col m4 l3">
     <div class="w3-card-12 w3-hover-shadow w3-center">
      <img src="/image/plus.ico" alt="plus image">
      <div class="w3-container w3-center">
        <h2>Add Post</h2>
      </div>
    </div>
</div>
</a>

</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <a href="<?php if(isset($pages['previous'])) echo($pages['previous']); ?>"><button class="w3-btn <?php if(!isset($pages['previous'])) echo('w3-disabled'); ?> w3-padding-large w3-margin-bottom">Previous</button></a>
  <a href="<?php if(isset($pages['next'])) echo($pages['next']); ?>"><button class="w3-btn <?php if(!isset($pages['next'])) echo('w3-disabled'); ?> w3-padding-large w3-margin-bottom">Next &raquo;</button></a>
  <?php
  if(empty($user)) {
    echo('<p><a href="/authenticate/login">Login</a></p>');
  }
  else {
    echo("<p>Logged in as <a href='/dashboard'>$user</a> <a href='/authenticate/logout'> - Logout</a></p>");
  }
  ?>
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>
