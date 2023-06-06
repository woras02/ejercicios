<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h2 id="centrado">Formulario de registro de empleados</h2>
        <img src="bannerEmpleados.jpg" alt="">
    </header>

    <?php
    error_reporting(5);
    $apellidos = $_POST["txtApellidos"];
    $nombre = $_POST['resultado'];
    $fecnac = $_POST['resultado'];
    $estado = $_POST['resultado'];
    $sexo = $_POST['resultado'];

    $mNombre = '';
    $mApellidos = '';
    $mFecha = '';
    $permitidos = '/[A-Za]{1,100}$/i';
    if (!preg_match($permitidos, $apellidos) || !is_string($apellidos))
        $mApellidos = 'Registre apellidos..!';
    if (!preg_match($permitidos, $nombre) || !is_string($nombre)) {
        $mNombre = 'Resgistre nombre..!';
    }
    if (!preg_match('', $fecnac)) {
        $mFecha = 'fecha no valida';
    }

    if ($estado = 'Soltero') $selS = 'SELECTED';
    else $selS = "";
    if ($estado = 'Casado') $selC = 'SELECTED';
    else $selC = "";
    if ($estado = 'Viudo') $selV = 'SELECTED';
    else $selV = "";
    if ($estado = 'Divorciado') $selD = 'SELECTED';
    else $selD = "";
    switch ($estado) {
        case 'Soltero':
            $cEstado = 1;
            break;
        case 'Casado':
            $cEstado = 2;
            break;

        case 'Viudo':
            $cEstado = 3;
            break;
        case 'Divorciado':
            $cEstado = 4;
            break;
    }
    if ($sexo == 'M') $cSexo = 1;
    if ($sexo == 'F') $cSexo = 2;

    $aFecha = explode('/', $fecnac);
    $año = $aFecha[2];
    $edad = date('Y') - $año;


    ?>
</body>
<form action="registro_empleado.php" name="frmRegistro" method="POST">
    <table border="0" width="750" cellspacing="0">
        <tr>
            <td>Apellidos</td>
            <td><input type="text" name="txtApellidos" size="70" placeholder="Ingrese apellido" value="<?php echo $apellidos; ?>"></td>
            <td id="error"><?php echo $mApellidos; ?> </td>
            <td>CODIGO GENERADO</td>
        </tr>
        <br>
        <tr>
            <td>Nombres</td>
            <td><input type="text" name="txtNombres" size="70" placeholder="Ingrese nombres" value="<?php echo $nombre; ?>"></td>
            <td id="error"><?php echo $mNombre; ?> </td>
            <td id="codigo">
                <?php
                if (isset($_POST['btnGenerar']))
                    $codigo = substr(date('Y'), 2) . $cEstado . $cSexo . $edad;
                else
                    $codigo = "";
                echo $codigo;
                ?>
            </td>
        </tr>
        <br>
        <tr>
            <td>Fecha de Nacimiento</td>
            <td><input type="text" name="txtFecnac" size="30" placeholder="dd/mm/yyyy" value="<?php echo $fecnac; ?>"></td>
            <td id="error"><?php echo $mFecha; ?> </td>
        </tr>



        <tr>
            <td>Estado Civil</td>
            <td><select name="selEstado" id="">
                    <option value="Soltero" <?php echo $selS; ?>>Soltero</option>
                    <option value="Casado" <?php echo $selC; ?>>Casado</option>
                    <option value="Viudo" <?php echo $selV; ?>>Viudo</option>
                    <option value="Divorciado" <?php echo $selD; ?>>Divorciado</option>
                </select></td>
            <td></td>
            <td></td>
        </tr><br>

        <tr>
            <td>Sexo</td>
            <td><input type="radio" name="rdSexo" value="M">Maculino</td>
            <td><input type="radio" name="rdSexo" value="F">Femenino</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnGenerar" value="Autogenerar codigo" /></td>
            <td></td>
            <td></td>
        </tr>


    </table>
</form>

</html>