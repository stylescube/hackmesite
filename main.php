<?php
  session_start();
  header('X-XSS-Protection: 0');
  if (!isset($_SESSION["cid"])){
    header("Location: ./index.php");
  }
  include 'db.php';

   if(mysqli_connect_errno()) {
      die('Could not connect: ' . mysqli_error($conn));
   }

   $sql = 'SELECT * FROM custandprod, products, users where users.cid=custandprod.cid and products.pid=custandprod.pid and custandprod.cid='.$_GET['cid'];
   $retval = mysqli_query( $conn, $sql );

   if(! $retval ) {
      die('Could not get data: ' . mysqli_error($conn));
   }

   mysqli_close($conn);
?>


<!DOCTYPE html>
<!-- saved from url=(0076)index_files/styles/page-template/default/index.html -->
<html lang="en" class="govuk-template  flexbox">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0b0c0c">
  <meta name="robots" content="noindex, nofollow">

  <title>Super Secret Gov</title>

  <link rel="mask-icon" href="./index_files/govuk-mask-icon.svg" color="#0b0c0c">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <link href="./index_files/main-9a7f5765d2a7cb456c6298750b33db14.css" rel="stylesheet" media="all">
  <link href="./styles.css" rel="stylesheet">

  <script src="./index_files/modernizr.js"></script>
  <script src="./app.js"></script>
</head>

<body class="govuk-template__body js-enabled page-main">
  <script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>

  <?php include 'header.php' ?>
    <div class="govuk-width-container">
      <div class="welcome-msg">
        <span>Welcome, <?php echo $_SESSION['cfname']; ?> (#<?php echo $_SESSION['cid']; ?>)</span> <a href="./logout.php">logout</a>
      </div>
      <main class="govuk-main-wrapper " id="main-content" role="main">
        <div class="search-bar">
          <form method="GET">
            <input type="hidden" name="cid" value="<?php echo $_GET['cid']; ?>" />
            <input type="text" name="search" placeholder="Search..." />
          </form>
        </div>
        <h3 class="govuk-heading-m">Products: </h3>
        <div class="container">
          <table>
            <tr>
              <th>Name</th>
              <th>Customer ID</th>
              <th>Phone</th>
              <th>Product</th>
              <th>Description</th>
            </tr>
            <?php if ($_GET['search']): ?>
            <tr>
              <td colspan="5">No products matching <?php echo $_GET['search']; ?> were found.</td>
            </tr>
            <?php else: ?>
              <?php while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)): ?>
                <tr>
                  <td><?php echo $row['cfname']; ?> <?php echo $row->clname; ?></td>
                  <td><?php echo $row['cid']; ?></td>
                  <td><?php echo $row['cphone']; ?></td>
                  <td><?php echo $row['pname']; ?></td>
                  <td><?php echo $row['pdesc']; ?></td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
          </table>
        </div>
      </main>
    </div>
  </div>

  <?php include 'footer.php' ?>

  <script src="./index_files/iframeResizer.contentWindow.js"></script>
  <script src="./index_files/govuk-frontend-3fd20a144728dda255bb6e3fe8867904.js"></script>
</body>
</html>