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
      <h1>Lista de usuarios</h1>

<table class="table table-striped table-hover">
  <tr>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Email</th>
    <th>F. nacimiento</th>
    <th></th>
  </tr>

  <?php foreach ($users as $user) { ?>
    <tr>
      <td><?php echo $user->name ?></td>
      <td><?php echo $user->surname ?></td>
      <td><?php echo $user->email ?></td>
      <td><?php echo $user->birthdate->format('d/m/Y')?></td>
      <td>
      <a href="/user/show/<?php echo $user->id ?>" class="btn btn-primary">Ver Usuario</a>
    </td>
    <td>
     <a href="/user/edit/<?php echo $user->id ?>" class="btn btn-primary">Actualizar Usuario</a>
     <a href="/user/delete/<?php echo $user->id ?>" onclick="return confirm('Estas seguro de borrar este usuario?')" class="btn btn-primary">Borrar Usuario</a>
     <a href="/user/resetpassword/<?php echo $user->id ?>" onclick="return confirm('Estas seguro de resetear la contraseña?')" class="btn btn-primary">ResetPassword</a>
    </td>
    </tr>
  <?php } ?>
</table>
<a href="/user/resetAllPassword/" onclick="return confirm('Estas seguro de resetear todas las contraseñas?')" class="btn btn-primary">ResetAllPassword</a>

    </main>
    <?php require "../views/common/footer.php" ?>
  </body>
</html>
