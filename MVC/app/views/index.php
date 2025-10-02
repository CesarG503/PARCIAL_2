<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>INICIO</h1>

<form action="./" method="post">

    <label for="">NOMBRE</label>
    <input type="text" name="nombre" id=""> <br>
    
    <label for="">CORREO</label>
    <input type="text" name="correo" id=""> <br>
    
    <label for="">DUI</label>
    <input type="text" name="dui" id=""> <br>

    <input type="submit" value="ACEPTAR">
</form>

<?php if(isset($error)){echo $error;} ?>

<?php if(isset($exito)){echo $exito;} ?>


<?php if(isset($nombre)):?>

<h4><?= $nombre ?></h4>
<h4><?= $correo ?></h4>
<h4><?= $dui ?></h4>

    
<?php endif; ?>

<br><br>


<form action="./calculo" method="post">
    <label for="">Ingrese la cuota</label>
    <input type="number" name="capital" id="">

    <input type="submit" value="CALCULAR">
</form>

<table border="1">
    <thead>
        <tr>
            <th>Mes</th>
            <th>Cuota</th>
            <th>Interes</th>
            <th>Capital</th>
            <th>Saldo pendiente</th>
        </tr>
    </thead>

    <tbody>

        <?php if(isset($transacciones)):?>

            <?php foreach($transacciones as $trasaccion):?>
        
                <tr>
                    <td><?php echo $trasaccion["mes"] ?></td>
                    <td><?php echo $trasaccion["cuota"] ?></td>
                    <td><?php echo $trasaccion["capital"] ?></td>
                </tr>
         <?php endforeach;?>
        <?php else: ?>

         <tr>
            <td colspan="5">Ingrese una cuota para calcular la tabla </td>
        </tr>
        <?php endif; ?>

    </tbody>

</table>




    
</body>
</html>