<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListaUsuarios</title>
</head>
<body>
    <h1>Lista general de usuarios</h1>
    <table>
        <tr>
            <th>Identificador</th>
            <th>Nombre Usuario</th>
        </tr>
        <?php foreach($arrusers as $user){?>
            <tr>
                <td><?php echo $user[0]?></td>
                <td><?php echo $user[1]?></td>
                <td><a href="?method=show&id=<?php echo $user[0]?>">Ver usuario</td>
            </tr>

        <?php }?> 

    </table>
</body>
</html>