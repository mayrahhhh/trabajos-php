<?php
//es lo que aparecera en el navegador mediante el include
//echo "hola";

function consulta(){ // nombre de la funcion
    $salida=0; //inicializa la variable
    $salida=10*2/2; //calcula el area del triangulo
    $conexion=mysqli_connect("localhost","root","root","db_factura"); //conexion con el servidor y la base de datos
    $sql="SELECT 20+10 "; //slecciona algo de la base de datos
    $sql.="as suma"; //selecciona algo de la base de tados
    $resultado =$conexion->query($sql); //ejecuta una consulta
    while($fila=mysqli_fetch_assoc($resultado)) //recorre el recordset
{
    $salida+=$fila['suma']; //inicio la columna
}
    return $salida; //retorna la operación
}

function aprender(){ //nombre de la funcion
    $salida=0; //inicializacion
    $salida=2+45; //operacion de suma

    return $salida; //retorna la operación
}
function calculo_version2() {//nombre de la funcion
    $salida = 0;//inicializacion de la variable
    $conexion = mysqli_connect("localhost", "root", "root", "db_factura");//cpnexion de la base de datos
    $sql = "SELECT 10 as n1, 20 as n2";
    $resultado = $conexion->query($sql); //ejecuta una consulta

    while ($fila = mysqli_fetch_assoc($resultado)) {//recoge el recorset
        $salida += $fila['n1']; // Acumula el valor de 'n1'
        $salida += $fila['n2']; // Acumula el valor de 'n2'
    }

    return $salida;//retorna la operación
}



function conteo() {//nombre de la funcion
    $salida = 0;//inicializacion de la variable
    $conexion = mysqli_connect("localhost", "root", "root", "db_factura"); // Conexión a la base de datos
    $sql = "SELECT COUNT(*) as usuario_count FROM usuario"; // Consulta para contar el número de registros en la tabla 'usuarios'
    $resultado = $conexion->query($sql);// la variable sql, ejecuta una consulta

    if ($resultado) {
        $fila = $resultado->fetch_assoc();//recoge el recorset
        $salida = $fila['usuario_count'];//inicio la columna
    } else {
      
    }

    return $salida;//retorna la operación
}

function insertarPersonas($ID_usuario, $nombre, $edad, $telefono)//nombre de la funcion
{
    $salida = 0;//inicializacion de la variable
    $conexion = mysqli_connect("localhost", "root", "root", "db_factura"); // Conexión a la base de datos

    if ($conexion === false) {//verifica la conexion de la base de datos
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Comprobamos si el ID ya existe
    $sql = "SELECT * FROM usuario WHERE ID_usuario = '$ID_usuario'";//selecciona el usuario que uno tenga en la base de datos
    $resultado = mysqli_query($conexion, $sql);//envía la consulta SQL al servidor

    if (mysqli_num_rows($resultado) > 0) {//resultado de la conexion query
        // El ID ya existe
        $salida = 0;
    } else {
        // El ID no existe
        $sql = "INSERT INTO usuario(ID_usuario, nombre, edad, telefono) ";
        $sql .= "VALUES ('$ID_usuario', '$nombre', '$edad', '$telefono')";

        try {
            if ($conexion->query($sql) === true) {//verificar una consulta
                $salida = 'usuario insertado con exito';//es un mensaje que se proporciona si se desea
            } else {
                $salida = 'error al insertar';//otro mensaje
            }
        } catch (mysqli_sql_exception $e) {//tomar excepciones especificas
            
            $e->getMessage();//es para ver el mensaje de error
        }
    }

    $conexion->close(); // Cierre de la conexión
    return $salida; // Retorna el resultado
}






function borrarUsuario($ID_usuario) {
    $salida = 0; // Inicialización de la variable
    $conexion = mysqli_connect("localhost", "root", "root", "db_factura"); // Conexión a la base de datos

    if ($conexion === false) {//verificar la conexion de la base de datos
        die("Error de conexión: " . mysqli_connect_error());// si falla la base de datos esta linea se ejecuta
    }

    // Comprobamos si el usuario existe
    $sql = "SELECT * FROM usuario WHERE ID_usuario = '$ID_usuario'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) { //verificacion de la consulta que devuelve un resultado
        
        $sql = "DELETE FROM usuario WHERE ID_usuario = '$ID_usuario'";// eliminacion de usuario que ya existe

        try {
            if ($conexion->query($sql) === true) {//verificar una consulta
                $salida = "usuario eliminado"; //este mensaje sale cuando el usuario ah sido eliminado con exito
            } else {
                $salida = "usuario no eliminado"; //esto aparece cuando se produce error al eliminar
            }
        } catch (mysqli_sql_exception $e) {
            // Manejo de excepciones
            $e->getMessage();
        }
    } else {
        // El usuario no existe
        $salida = 0;
    }

    $conexion->close(); // Cierre de la conexión
    return $salida; // Retorna el resultado
}


function actualizacionDeDatos(){
    
}




















