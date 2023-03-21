<?php
//la conexion con la base de datos y paginas addicionales
include_once 'config/dataBase.php';
    class Usuario{
        public static function addUser($email,$nombre,$apellido,$password){
            $con = dataBase::connect();
            $stmt = $con->prepare("INSERT INTO cliente (email,nombre,apellido,password) VALUES (?,?,?,?)");
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss",$email,$nombre,$apellido,$password);
            //Execute statement
            $stmt->execute();
            $con->close();
        }

        public static function accessUser($email,$password){
            $con = dataBase::connect();
            $email = $_POST['email'];	
	        $password = $_POST['password'];	
            $stmt = $con->prepare("SELECT email password FROM cliente WHERE email=? AND password=? ");
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss",$email,$password);
            //Execute statement
            $stmt->execute();
            $result = $stmt->get_result();

            if(mysqli_num_rows($result) == 1){
                return True;

            }else{
                return False;
            }



        }
        
        public static function miPerfil($email,$password){
            $con = dataBase::connect();
            $stmt = $con->prepare("SELECT email password FROM cliente WHERE email=? AND password=? ");
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss",$email,$password);
            //Execute statement
            $stmt->execute();
            $result = $stmt->get_result();

            if(mysqli_num_rows($result) == 1){
                return True;

            }else{
                return False;
            }

        }
        // SELECT pedido.codigo_pedido FROM pedido WHERE email_cliente='dani@dani.com' AND pedido.codigo_pedido=1 AND pedido.codigo_pedido NOT IN (SELECT pedido.codigo_pedido FROM valoracion WHERE pedido.email_cliente='dani@dani.com');
        public static function allListPedidos(){
            $con = dataBase::connect();
            $stmt = $con->prepare("SELECT p.codigo_pedido FROM pedido p WHERE email_cliente=? 
            AND p.codigo_pedido NOT IN (SELECT v.codigo_pedido FROM valoracion v WHERE v.email=?);");
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss",$_SESSION['user']['email'],$_SESSION['user']['email']);
            //Execute statement
            $stmt->execute();
            $stmt->bind_result($id);
            $valoracion= [];

            while($stmt->fetch()){
                $valoracion [] = $id;

            }
            $con->close();
            return $valoracion;
        }

  


    }

?>  