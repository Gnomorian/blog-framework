<!DOCTYPE html>
<html>
<title>Portfolio - William Cameron</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/me-profile/css/main.css">
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
  <h1><b>William Cameron</b></h1>
  <p><?PHP echo($quote[0]->text);?><br>
    <span class="w3-tag">-<?PHP echo($quote[0]->person);?></span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
<?php
  if(isset($posts) && !empty($posts)) {
    foreach ($posts as $post) {
      $date = date('F j<\s\up>S</\s\up>, Y', $post->date);
      echo("
        <div class='w3-card-4 w3-margin w3-white'>
          <img src='$post->icon' alt='Nature' style='width:100%'>
          <div class='w3-container w3-padding-8'>
            <h3><b>$post->title</b></h3>
            <h5>$post->subtitle, <span class='w3-opacity'>$date</span></h5>
          </div>

          <div class='w3-container'>
            <p>$post->body</p>
            <div class='w3-row'>
              <div class='w3-col m8 s12'>
                <p><button class='w3-btn w3-padding-large w3-white w3-border w3-hover-border-black'><b>READ MORE &raquo;</b></button></p>
              </div>
              <div class='w3-col m4 w3-hide-small'>
                <p><span class='w3-padding-large w3-right'><b>Comments &nbsp;</b> <span class='w3-tag'>$post->num_comments  </span></span></p>
              </div>
            </div>
          </div>
        </div>
        <hr>
      ");
    }
  }
?>
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card-2 w3-margin w3-margin-top">
  <img src="/me-profile/image/profile.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>William Cameron</b></h4>
      <p>Hi, I'm Wil. I am a mostly self taught programmer. I like learning new
        things so I have tinkered with many languages like c++, Java, php and
        with many projects such as making a github clone, mods for games i like
        and a roster manager for my current workplace. While not doing that I
        work at The Warehouse managing the Footwear Department. <br>
        I can make and design websites for you along with desktop applications,
        I am told i am conscientious, kind and always eger to help.<br>
        I'm an avid computer gamer and consumer of doctor who.
    </p>
    </div>
  </div><hr>

  <!-- Posts -->

  <div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
      <h4>My Projects</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">

      <?php
      if(isset($projects) && !empty($projects)) {
        foreach ($projects as $project) {
          echo("
          <a href='http://localhost/me-profile/index.php/project/$project->id'><li class='w3-padding-16'>
            <img src='$project->icon' alt='Image' class='w3-left w3-margin-right' style='width:50px'>
            <span class='w3-large'>$project->title</span><br>
            <span>$project->description</span>
          </li></a>
          ");
        }
      }
      ?>
    </ul>
  </div>
  <hr>

  <!-- Labels / tags -->
  <div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
      <h4>Tags - Dont work, placeholder</h4>
    </div>
    <div class="w3-container w3-white">
    <p>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">C++</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Java</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">HTML</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">CSS</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Gaming</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Mobile</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Finished</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Not Done</span>
    </p>
    </div>
  </div>

<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <button class="w3-btn w3-disabled w3-padding-large w3-margin-bottom">Previous</button>
  <button class="w3-btn w3-padding-large w3-margin-bottom">Next &raquo;</button>
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>
