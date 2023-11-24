<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <?php require "../views/common/header.php" ?>
  <body>
    <br>
    <br>
    <br>
      <h1>Detalle del usuario <?php echo $user->id ?></h1>
<ul>
    <li><strong>Nombre: </strong><?php echo $user->name ?></li>
    <li><strong>Apellidos: </strong><?php echo $user->surname ?></li>
    <li><strong>Email: </strong><?php echo $user->email ?></li>
    <li><strong>F. nacimiento: </strong><?php echo $user->birthdate ?></li>
</ul>
    
    </main>
    <?php require "../views/common/footer.php" ?>
  </body>
</html>