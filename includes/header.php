<?php

function login_check() {
  session_start();
  if(isset($_SESSION["auth"])){
    if($_SESSION["auth"]==true) {
      return true;
    }else{
      return false;
    }
  }
}

/**
 * @param string $title Title of the page
 * @param string $description Description of the page
 */
function get_header($title,$description ){

$relative_path = get_relative_root();


echo <<<EOT
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>{$title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{$description}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{$relative_path}/css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
EOT;
//error handeling meldingen maken hier voor elke error massage even het volgende nummer gebruiken
if (isset($_GET['message_code'])) {
  switch($_GET['message_code']) {
    case 1:
      echo"<div class='alert alert-success'>";
      echo '<strong>Success!</strong> Indicates a successful or positive action.';
      break;
    case 2:
      echo '<div class="alert alert-danger">';
      echo '<strong>Warning!</strong> somthing whent wrong please contact support.';
      break;
    case 3:
      echo '<div class="alert alert-info">';
      echo '<strong>oops!</strong> the combination of email and email and password isn`t correct.';
      break;
  }
 echo "</div>";
}
echo <<<EOT
<body>
  <nav class="navbar navbar-expand-lg navbar-light sticky-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/kaasch">Kaasch</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
EOT;
if (login_check()) {
  echo "<a class='nav-link js-scroll-trigger' href='#'>welcom {$_SESSION['first_name']}</a> ";
} else {
    echo '<a class="nav-link js-scroll-trigger" href="./pages/login_form.php">login</a>';
}


echo <<<EOT
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#shop">shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
EOT;
}

?>
