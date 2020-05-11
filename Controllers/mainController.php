<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$opt=$_GET['opt'];
	include_once('mainClass.php');
	$conn = new ConnectionDB();
	$arrayResponse = array();
	switch ($opt) {
		case 'login':
			//$user = $_GET['username'];
			//$password = md5($_GET['password']);

			$user = $_POST['username'];
			$password = md5($_POST['password']);

			if($result = $conn->getData("id_user, nombre, apellidos, matricula, curp, username, user_type, status", "user", 'username="'.$user.'" and password="'.$password.'" and status="1"')){
				foreach ($result as $value) {
					array_push($arrayResponse, array(
						'id_user' => $value['id_user'],
						'nombre' => $value['nombre'],
						'apellidos' => $value['apellidos'],
						'matricula' => $value['matricula'],
						'curp' => $value['curp'],
						'username' => $value['username'],
						'user_type' => $value['user_type'],
						'status' => $value['status'],
					));
				}
				if(sizeof($arrayResponse)==1){
					session_start();
					$_SESSION['id_user']=$arrayResponse[0]['id_user'];
					$_SESSION['name']=$arrayResponse[0]['nombre']." ".$arrayResponse[0]['apellidos'];
					echo "EXITO";
				}else{
					echo "FRACASO";
				}
			}else{
				echo "FRACASO";
			}
			
			break;

		case "logout":
			session_start();
			session_destroy();
		break;
		
		default:
			echo "codigo default";
			break;
	}
?>