<!--
  UReview Header Template
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->
<!-- <!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="en"> -->

<!-- <head>
  <link rel="icon" href="./assets/images/logo.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</head> -->

<!-- Navbar -->
<!-- The navbar expands and shrinks according to screen resizing.
          It is also of a dark theme, and stick to the top of the user's screen

        'navbar' denote this is Bootstrap's navbar system which allows creation of navbar headers
        'container' is Bootstrap's simple layout element with default 15px padding 
      
        'navbar-expand-lg' just means the navbar will expand at the given break point (large >=992px)
        'bg-dark' and 'navbar-dark' just means the fill color will be the dark color-->

<header id="uReviewHeader">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a href="./index.php" class="navbar-brand">
        <!-- The Logo itself is a button to the home page.-->
        <img src="./assets/images/logo.svg" alt="UReview Logo">
      </a>

      <!-- This search form is for fuller screens, and disappears when the width gets too small
                  The search is xl (larger size) and disappears when it cannot be its desired length 
                  'form-inline' places the search bar inline horizontally.
                  'd-xl-flex' means the search will expand to the xl size and 'd-none' means it disappear 
                  when it cannot be this size-->
      <form id="headerSearchMainNoLog" class="form-inline d-xl-flex d-none" action="results_sample.php" method="GET">
        <div class="d-flex">
          <input id="searchBigNoLog" type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search for something...">
          <button class="btn btn-outline-warning" type="submit" aria-label="Main Search Button"><i class="bi bi-search"></i></button>
        </div>
      </form>

      <!-- These buttons take you to various core features of the website
                      These buttons get compressed into a hamburger on smaller screens
                    The actual burger icon is from font-icon as indicated by 'fas' and 'fa-bars'-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-label="Hamburger for Navbar Menu">
        <span class="navbar-toggler-icon fas fa-bars"></span>
      </button>

      <!-- Each button has a link for its respective page.-->
      <!-- m and p classes determine margin and padding, while navbar-nav class has CSS pertaining to navbar
                    This is the navbar's main buttons. 'nav-item' indicates its an option in the navbar (that gets hamburgered)
                    'ms-auto' automatically sets margins, and 'align-self-end' means the thing it self is getting pushed to the right
                  -->
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-self-end">
          <li class="nav-item px-3">
            <a href="./index.php" class="nav-link text-white">Home</a>
          </li>
          <!-- Sample Results page will be removed when we create backend. -->
          <li class="nav-item px-3">
            <a href="./results_sample.php" class="nav-link text-white">Sample Results</a>
          </li>
          <!-- <li class="nav-item px-3">
              <a href="./submission.php" class="nav-link text-white">Add a Location</a>
            </li>
            <li class="nav-item px-3">
              <a href="./writereview.php" class="nav-link text-white">Write a Review</a>
            </li> -->
          <li class="nav-item px-3">
            <a href="./login.php" class="nav-link text-white">Log In</a>
          </li>
          <li class="nav-item px-3">
            <a href="./registration.php" class="btn btn-warning">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Search bar for smaller screens, for when the full one disappears 
              d-xl-none means the navbar will show when it is smaller than xl size, but not larger
              we want this because the main navbar search will be shown at xl size-->
<div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark d-xl-none">
    <div class="container d-flex justify-content-center align-items-center">
      <form id="searchSmallNoLog" class="form-inline d-flex" action="results_sample.php" method="GET">
        <div class="d-flex" >
          <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search for something...">
          <button class="btn btn-outline-warning" type="submit" aria-label="Main Search Button"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
  </nav>
</div>