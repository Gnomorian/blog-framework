<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32">
  <h1><b>William Cameron</b></h1>
  <p>Great things are done by a series of small things brought together.<br>
    <span class="w3-tag">-Vincent Van Gogh</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <img src="/w3images/woods.jpg" alt="Nature" style="width:100%">
    <div class="w3-container w3-padding-8">
      <h3><b>TITLE HEADING</b></h3>
      <h5>Title description, <span class="w3-opacity">April 7, 2014</span></h5>
    </div>

    <div class="w3-container">
      <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
        tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black"><b>READ MORE &raquo;</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments &nbsp;</b> <span class="w3-tag">0</span></span></p>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
  <img src="/w3images/bridge.jpg" alt="Norway" style="width:100%">
    <div class="w3-container w3-padding-8">
      <h3><b>BLOG ENTRY</b></h3>
      <h5>Title description, <span class="w3-opacity">April 2, 2014</span></h5>
    </div>

    <div class="w3-container">
      <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
        tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black"><b>READ MORE &raquo;</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments &nbsp;</b> <span class="w3-badge">2</span></span></p>
        </div>
      </div>
    </div>
  </div>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card-2 w3-margin w3-margin-top">
  <img src="image/profile.jpg" style="width:100%">
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
      <li class="w3-padding-16">
        <img src="image/project/gameboy.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">GameBoy Emulator</span><br>
        <span>A handheld GameBoy emulator powered by a Raspberry PI</span>
      </li>
      <li class="w3-padding-16">
        <img src="image/project/github.png" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Bazxus-Github Clone</span><br>
        <span>An alternative to github that uses Bazaar instead of Git.</span>
      </li>
      <li class="w3-padding-16">
        <img src="image/project/roster.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Roster Manager</span><br>
        <span>Program for tracking your staffs breaks so you dont call them when they are not avalable</span>
      </li>
      <li class="w3-padding-16 w3-hide-medium w3-hide-small">
        <img src="image/project/ide.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Wil's IDE</span><br>
        <span>An IDE to fit my needs.</span>
      </li>
    </ul>
  </div>
  <hr>

  <!-- Labels / tags -->
  <div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
      <h4>Tags</h4>
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
