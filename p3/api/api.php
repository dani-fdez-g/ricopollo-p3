

<?php
include_once '../config/dataBase.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

	
	if($method == "GET"){

        $con = dataBase::connect();
        $stmt = $con->prepare("SELECT * FROM valoracion ");
        //Bind variables to the prepared statement as parameters
        //Execute statement
        $stmt->execute();
        $valoracionDB = array();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $valoracionDB[] = $row;
        }
        echo json_encode($valoracionDB);
        $con->close();

		
	}
		

	
	if($method == "POST"){
            $datosJSON = file_get_contents('php://input');
            $datos = json_decode($datosJSON);
            $codigo_pedido = $datos->codigo_pedido;
            $testimonio = $datos->descripcion;
            $rating = $datos->rating;
            $email = $datos->email;
            $con = dataBase::connect();
            $stmt = $con->prepare("INSERT INTO valoracion (codigo_pedido,email,descripcion,rating) VALUES (?,?,?,?)");
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("issi",$codigo_pedido ,$email,$testimonio, $rating);
            //Execute statement
            $stmt->execute();
            $con->close();


	}
	
	
    


?>