<?php
  include 'db.php';
  $msg = '';
  session_start();
  if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM users where cusername="' . $username . '" AND cpassword="' . $password . '"';
    $result = mysqli_query( $conn, $sql );

    if(!$result) {
      die('Could not get data: ' . mysqli_error($conn));
    }

    // Associative array
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
      //Redirect
      $_SESSION["cid"] = $row['cid'];
      $_SESSION["cfname"] = $row['cfname'];

      setcookie("auth", "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IjFMVE16YWtpaGlSbGFfOHoyQkVKVlhlV01xbyJ9.eyJ2ZXIiOiIyLjAiLCJpc3MiOiJodHRwczovL2xvZ2luLm1pY3Jvc29mdG9ubGluZS5jb20vOTE4ODA0MGQtNmM2Ny00YzViLWIxMTItMzZhMzA0YjY2ZGFkL3YyLjAiLCJzdWIiOiJBQUFBQUFBQUFBQUFBQUFBQUFBQUFJa3pxRlZyU2FTYUZIeTc4MmJidGFRIiwiYXVkIjoiNmNiMDQwMTgtYTNmNS00NmE3LWI5OTUtOTQwYzc4ZjVhZWYzIiwiZXhwIjoxNTM2MzYxNDExLCJpYXQiOjE1MzYyNzQ3MTEsIm5iZiI6MTUzNjI3NDcxMSwibmFtZSI6IkFiZSBMaW5jb2xuIiwicHJlZmVycmVkX3VzZXJuYW1lIjoiQWJlTGlAbWljcm9zb2Z0LmNvbSIsIm9pZCI6IjAwMDAwMDAwLTAwMDAtMDAwMC02NmYzLTMzMzJlY2E3ZWE4MSIsInRpZCI6IjMzMzgwNDBkLTZjNjctNGM1Yi1iMTEyLTM2YTMwNGI2NmRhZCIsIm5vbmNlIjoiMTIzNTIzIiwiYWlvIjoiRGYyVVZYTDFpeCFsTUNXTVNPSkJjRmF0emNHZnZGR2hqS3Y4cTVnMHg3MzJkUjVNQjVCaXN2R1FPN1lXQnlqZDhpUURMcSFlR2JJRGFreXA1bW5PcmNkcUhlWVNubHRlcFFtUnA2QUlaOGpZIn0=.1AFWW-Ck5nROwSlltm7GzZvDwUkqvhSQpm55TQsmVo9Y59cLhRXpvB8n-55HCr9Z6G_31_UbeUkoz612I2j_Sm9FFShSDDjoaLQr54CreGIJvjtmS3EkK9a7SJBbcpL1MpUtlfygow39tFjY7EVNW9plWUvRrTgVk7lYLprvfzw-CIqw3gHC-T7IK_m_xkr08INERBtaecwhTeN4chPC4W3jdmw_lIxzC48YoQ0dB1L9-ImX98Egypfrlbm0IBL5spFzL6JDZIRRJOu8vecJvj1mq-IUhGt0MacxX8jdxYLP-KUu2d9MbNKpCKJuZ7p8gwTL5B7NlUdh_dmSviPWrw", time()+3600);

      header('Location:main.php?cid='.$row['cid']);
      mysqli_free_result($result);
      exit;
    }
    else {
      $msg = "Invalid username or password...<br/>";
      mysqli_free_result($result);
    }
    // Free result
  }
?>
</div> <!-- /container -->

<!DOCTYPE html>
<!-- saved from url=(0076)index_files/styles/page-template/default/index.html -->
<html lang="en" class="govuk-template flexbox">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0b0c0c">
  <meta name="robots" content="noindex, nofollow">

  <title>Super Secret Gov</title>

  <link rel="mask-icon" href="./index_files/govuk-mask-icon.svg" color="#0b0c0c">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="./index_files/main-9a7f5765d2a7cb456c6298750b33db14.css" rel="stylesheet" media="all">
  <link href="./styles.css" rel="stylesheet">

  <script src="./index_files/modernizr.js"></script>
  <script src="./app.js"></script>
</head>

<body class="govuk-template__body js-enabled page-index">
  <script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>

  <?php include 'header.php' ?>

  <div class="govuk-width-container">
    <main class="govuk-main-wrapper " id="main-content" role="main">
      <h3 class="govuk-heading-m">Secure Login: </h3>
      <div class="container form-signin">
        <div class="container">
          <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
            ?>"
            method="post">
            <h4 class="form-signin-heading">
              <?php echo $msg; ?>
            </h4>
            <input type="text" class="form-control" name="username" placeholder="Username " required autofocus><br />
            <input type="password" class="form-control" name="password" placeholder="Password " required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
          </form>
        </div>
    </main>
  </div>

  <?php include 'footer.php' ?>
  <script src="./index_files/iframeResizer.contentWindow.js"></script>
  <script src="./index_files/govuk-frontend-3fd20a144728dda255bb6e3fe8867904.js"></script>
</body>
</html>