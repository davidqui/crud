<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $curso = $_POST['txtCurso'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?, curso = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $curso, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>