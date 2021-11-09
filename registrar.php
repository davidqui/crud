<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtCurso"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    //include_once 'model/conexion.php';
    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $curso = $_POST["txtCurso"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,edad,curso) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$edad,$curso]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>