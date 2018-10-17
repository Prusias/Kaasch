<!DOCTYPE html>
<html>
<head>
    <?php
      $path = $_SERVER["DOCUMENT_ROOT"];
      require($path . "/includes/head.php");
    ?>
    <title>Kaasch Home</title>
</head>
<body>
    <?php require($path . "/includes/nav.php"); ?>
    <header class="masthead text-center text-white d-flex">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Kaasch Webshop</strong>
            </h1>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="height: 1200px;">Homepage</h1>
            </div>
        </div>
    <div>
    <?php require($path . "/includes/footer.php"); ?>
</body>
</html>


