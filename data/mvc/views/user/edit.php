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
  <h1>Edición de usuario</h1>

<form method="post" action="/user/update">

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="name" value="<?= $user->name?>" class="form-control">
</div>
<div class="form-group">
    <label>Apellidos</label>
    <input type="text" name="surname" value="<?= $user->surname?>"  class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" value="<?= $user->email?>"  class="form-control">
</div>
<div class="form-group">
    <label>F. cumpleaños</label>
    <input type="date" name="birthdate" value="<?= $user->birthdate?>" class="form-control" required>
</div>
<button type="submit" class="btn btn-default">Enviar</button>
<input type="hidden" name="id" value="<?= $user->id?>">
</form>
    </main>
    <?php require "../views/common/footer.php" ?>
  </body>
</html>
