<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'proyecto_nomina');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// VALIDACIONES DE CAMPO  
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // VALIDACIÓN NOMBRE1
        $input_nombre1 = trim($_POST['nombre1']); 
        if(empty($input_nombre1)){
            $nombre1_error ="Por favor ingrese el nombre del empleado.";
        }elseif(!filter_var($input_nombre1,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $nombre1_error = "por favor ingrese un nombre valido. ";
        }else{
            $Nombre1 = $input_nombre1;
        }

        //VALIDACIÓN NOMBRE 2
        $input_nombre2 = trim($_POST["nombre2"]);
        if(empty($input_nombre2)){
            $nombre2_error ="Por favor ingrese el nombre del empleado.";
        }elseif(!filter_var($input_nombre2,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $nombre2_error = "por favor ingrese un nombre valido. ";
        }else{
            $Nombre2 = $input_nombre2;
        }
        //VALIDACIÓN APELLIDO PATERNO
        $input_apellido1 = trim($_POST["apellido1"]); 
        if(empty($input_apellido1)){
            $apellido1_error ="Por favor ingrese el primer apellido del empleado.";
        }elseif(!filter_var($input_apellido1,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $apellido1_error = "por favor ingrese un apellido valido. ";
        }else{
            $apellido1 = $input_apellido1;
        }
        //VALIDACIÓN APELLIDO MATERNO
        $input_apellido2 = trim($_POST["apellido2"]); 
        if(empty($input_apellido2)){
            $apellido2_error ="Por favor ingrese el segundo apellido del empleado.";
        }elseif(!filter_var($input_apellido2,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $apellido2_error = "por favor ingrese un apellido valido. ";
        }else{
            $apellido2 = $input_apellido2;
        }
        //VALIDACIÓN CEDULA
        $input_cedula = trim($_POST["Cedula"]);
        if(empty($input_cedula)){
            $cedula_error = "Por favor ingrese la cedula del empleado.";     
        } elseif(!ctype_digit($input_cedula)){
            $cedula_error = "Por favor ingrese un valor correcto y positivo.";
        } else{
            $cedula = $input_cedula;
        }
        //VALIDACION CORREO
        $input_correo = trim($_POST["Correo"]); 
        if(empty($input_correo)){
            $correo_error ="Por favor ingrese el correo del empleado.";
        }elseif(!filter_var($input_correo,FILTER_VALIDATE_EMAIL)){
            $correo_error = "por favor ingrese un correo valido. ";
        }else{
            $correo = $input_correo;
        }
        
        // VALIDACIÓN BANCO
        $input_banco = trim($_POST["Banco"]); 
        if(empty($input_banco)){
            $banco_error ="Por favor ingrese el banco del empleado.";
        }elseif(!filter_var($input_banco,FILTER_VALIDATE_EMAIL)){
            $banco_error = "por favor ingrese un banco valido. ";
        }else{
            $banco = $input_banco;
        }
        //VALIDACIÓN NUMERO DE CUENTA
        $input_nrocuenta = trim($_POST["nrocuenta"]);
        if(empty($input_nrocuenta)){
            $nrocuenta_error = "Por favor ingrese el N° de cuenta del empleado.";     
        } elseif(!ctype_digit($input_nrocuenta)){
            $nrocuenta_error = "Por favor ingrese un valor de N° de cuenta, correcto y positivo.";
        } else{
            $cuenta = $input_nrocuenta;
        }
        //VALIDACIÓN NUMERO DE CONTRATO
        $input_nrocontrato = trim($_POST["Numerocontrato"]);
        if(empty($input_nrocontrato)){
            $nrocontrato_error = "Por favor ingrese el N° de contrato del empleado.";     
        } elseif(!ctype_digit($input_nrocontrato)){
            $nrocontrato_error = "Por favor ingrese un valor de N° de contrato, correcto y positivo.";
        } else{
            $numerocontrato = $input_nrocontrato;
        }
        
        //VALIDACIÓN SALARIO
        $input_salario = trim($_POST["Salario"]);
        if(empty($input_salario)){
            $salario_error = "Por favor ingrese el monto del salario del empleado.";     
        } elseif(!ctype_digit($input_salario)){
            $salario_error = "Por favor ingrese un valor correcto y positivo.";
        } else{
            $salario = $input_salario;
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){

// TABLA EMPLEADO
    $Nombre1 = $_POST['nombre1'];
    $Nombre2 = $_POST["nombre2"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $correo = $_POST["Correo"];
    $cedula = $_POST["Cedula"];
    $sqlempleado= "INSERT INTO empleado(Nombre1,Nombre2,Apellido1,Apellido2,Correo,Cedula)
    VALUES('".$Nombre1."','".$Nombre2."','".$apellido1."','".$apellido2."','".$correo."',".$cedula .");";

    // TABLA DEVENGADO
    $salario = $_POST["Salario"];
    $sqldevengado="INSERT INTO devengado(Salario)VALUES(".$salario.");"; 

    //  TABLA CONTRATO
    $numerocontrato = $_POST["Numerocontrato"];
    $sqlcontrato="INSERT INTO contrato(IdContrato)VALUES(".$numerocontrato.");"; 

    // TABLA CARGO
    $tipocargo = $_POST["TipoCargo"];
    $sqlcargo="INSERT INTO cargo(TipoCargo)VALUES('".$tipocargo."');"; 

    //TABLA CUENTAS
    $banco = $_POST["Banco"];
    $cuenta = $_POST["nrocuenta"];
    $sqlcuentas = "INSERT INTO cuentas(Banco,NumeroCuenta) VALUES (".$banco.",".$cuenta.");";

     // TABLA JORNADA
     //$jornada = $_POST["jornada"];
     $sqljornada="SELECT IdJornada, TipoJornada FROM jornadas"; 
     $jornad = mysqli_query($con,$sqljornada);

     /* TABLA MES
    $sqlmes ="SELECT IdMes, Mes FROM aux_mes";
    $meses = mysqli_query($con,$sqlmes);*/

    //INSERCION DE DATOS
    mysqli_query($con,$sqlempleado);
    mysqli_query($con,$sqldevengado);
    mysqli_query($con,$sqlcontrato);   
    mysqli_query($con,$sqlcargo);
    mysqli_query($con,$sqljornada);
    mysqli_query($con,$sqlcuentas);
}


/*  QUERY PARA PASAR LLAVE PRIMARIA A FORANEA A LAS DEMAS TABLAS
   $pasaridcontrato = "INSERT INTO contrato(IdEmpleado) SELECT MAX(IdEmpleado) FROM empleado";
   $pasaridtelefono = "INSERT INTO telefono(IdEmpleado) SELECT MAX(IdEmpleado) FROM empleado";
   $pasaridcuentas = "INSERT INTO cuentas(IdEmpleado) SELECT MAX(IdEmpleado) FROM empleado";
   $pasaridjornadat = "INSERT INTO jornada_trabajada(IdEmpleado) SELECT MAX(IdEmpleado) FROM empleado";
   $pasariddeducciones = "INSERT INTO deducciones(IdEmpleado) SELECT MAX(IdEmpleado) FROM empleado";
   $pasariddevengado = "INSERT INTO devengado(IdEmpleado) SELECT MAX(IdEmpleado) FROM empleado";
   $pasaridapropiaciones = "INSERT INTO apropiaciones(IdEmpleado) SELECT MAX(IdEmpleado) FROM empleado";
   mysqli_query($con,$pasaridcontrato);
   mysqli_query($con,$pasaridtelefono);
   mysqli_query($con,$pasaridcuentas);
   mysqli_query($con,$pasaridjornadat);
   mysqli_query($con,$pasariddeducciones);
   mysqli_query($con,$pasariddevengado);
   mysqli_query($con,$pasaridapropiaciones);*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AGREGAR EMPLEADOS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                        <h1>Agregar Empleados</h1>
                        </div>
                              <p>Favor diligenciar el siguiente formulario, para agregar el empleado.</p>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    
                                 <!-- ESPACIO primer nombre-->
                                <div class="form-group <?php echo (!empty($nombre1_error)) ? 'has-error' :''; ?>">
                                    <label for="PrimerNombre">Primer Nombre</label>
                                    <input id="PrimerNombre" type="text" name="nombre1" class="form-control" value="<?php echo $Nombre1;?>">
                                    <span class="help-block"><?php echo $nombre1_error; ?> </span>
                                </div>
                                <!-- ESPACIO SEGUNDO NOMBRE -->
                                <div class="form-group <?php echo (!empty($nombre2_error)) ? 'has-error' :''; ?>">
                                    <label for="Segundo_Nombre">Segundo Nombre</label>
                                    <input id="Segundo_Nombre" type="Text" name="nombre2" class="form-control" value="<?php echo $Nombre2;?>">
                                    <span class="help-block"> <?php echo $nombre2_error; ?> </span>
                                </div>
                                <!-- ESPACIO PRIMER APELLIDO -->
                                <div class="form-group <?php echo (!empty($apellido1_error)) ? 'has-error' :''; ?>">
                                    <label for="Primer_Apellido">Primer apellido</label>
                                    <input id="Primer_Apellido"type="Text" name="apellido1" class="form-control" value="<?php echo $apellido1; ?>">
                                    <span class="help-block"> <?php echo $apellido1_error; ?> </span>
                                </div>
                                <!-- ESPACIO SEGUNDO APELLIDO -->
                                <div class="form-group <?php echo (!empty($apellido2_error)) ? 'has-error' :''; ?>">
                                    <label for="Segundo_Apellido">Segundo apellido</label>
                                    <input id="Segundo_Apellido" type="Text" name="apellido2" class="form-control" value="<?php echo $apellido2; ?>">
                                    <span class="help-block"> <?php echo $apellido2_error; ?> </span>
                                </div>
                                <!-- ESPACIO CEDULA -->
                                <div class="form-group <?php echo (!empty($cedula_error)) ? 'has-error' :''; ?>">
                                    <label for="Cedula">Cedula</label>
                                    <input id="Cedula" type="text" name="Cedula" class="form-control" value="<?php echo $cedula; ?>">
                                    <span class="help-block"> <?php echo $cedula_error; ?> </span>
                                <!-- ESPACIO CORREO -->
                                <div class="form-group <?php echo (!empty($correo_error)) ? 'has-error' :''; ?>">
                                    <label for="Correo">Correo</label>
                                    <input id="Correo" type="Text" name="Correo" class="form-control" value="<?php echo $correo; ?>">
                                    <span class="help-block"> <?php echo $correo_error; ?> </span>
                                </div>
                                <!-- ESPACIO BANCO -->
                                <div class="form-group <?php echo (!empty($banco_error)) ? 'has-error' :''; ?>">
                                    <label for="Banco">Banco</label>
                                    <input id="Banco" type="Text" name="Banco" class="form-control" value="<?php echo $banco; ?>" >
                                    <span class="help-block"> <?php echo $banco_error; ?> </span>
                                </div>
                                <!-- ESPACIO NUMERO CUENTA-->
                                <div class="form-group <?php echo (!empty($nrocuenta_error)) ? 'has-error' :''; ?>">
                                    <label for="nrocuenta">N° cuenta bancaria</label>
                                    <input id="nrocuenta" type="Text" name="nrocuenta" class="form-control" value="<?php echo $cuenta; ?>" > 
                                    <span class="help-block"> <?php echo $nrocuenta_error; ?> </span>
                                </div>
                                <!-- ESPACIO NUMERO CONTRATO -->
                                <div class="form-group <?php echo (!empty($nrocontrato_error)) ? 'has-error' :''; ?>">
                                    <label for="Numero_Contrato">N° Contrato</label>
                                    <input id="Numero_Contrato" type="Text" name="Numerocontrato" class="form-control" value="<?php echo $numerocontrato; ?>">
                                    <span class="help-block"> <?php echo $nrocontrato_error; ?> </span>
                                </div>

                                <!-- ESPACIO TIPO CARGO -->
                        <label for="TipoCargo">Cargo del empleado</label>
                        <input id="TipoCargo" type="Text" name="TipoCargo"><br><br>

                                <!-- ESPACIO JORNADA TRABAJADA -->
                                <div class="form-group">
                                    <select name="jornada" >
                                        <?php 
                                            while ($jorna = mysqli_fetch_array($jornada)){
                                        ?>
                                            <option  class="form-control" value="<?php echo $jorna['IdJornada']?>"> <?php echo $jorna['TipoJornada']?> </option>
                                        <?php
                                        }
                                        ?> 
                                </div>
                        <label for="jornada">Jornada</label>
                        <input id="jornada"type="Text" name="jornada"><br><br>

                        <!-- ESPACIO SALARIO -->
                        <div class="form-group <?php echo(!empty($salario_error)) ? 'has-error': ''; ?>">
                                    <label for="Salario">Salario</label>
                                    <input id="Salario" type="Text" name="Salario" class="form-control" value="<?php echo $salario;?>">
                                    <span class="help-block"> <?php echo $salario_error; ?> </span>
                                </div>

                        <input type="submit" class="btn btn-primary" name="Enviar" >
                        <a class="btn btn-default">Cancelar</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>