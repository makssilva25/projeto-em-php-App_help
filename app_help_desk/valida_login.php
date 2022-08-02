<?php


   session_start();

   if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
   	header('location:index.php?login=erro2');
   }
 	
 






$usuario_autenticado = false;
$usuario_id = null;
$perfil_usuarioID = null;

$perfis = array(1 =>'Administrativo', 2 => 'usuario');

//usuario do sistema
$usuario_app = array(
   array( 'id'=>1, 'email'=> 'adm@teste.com', 'senha'=>'123456', 'peril_id' => 1),
   array( 'id'=>1, 'email'=> 'user@teste.com', 'senha'=>'abcd', 'peril_id' => 2),

);


foreach ($usuario_app as $user) {
	
	if ($user['email']==$_POST['email'] && $user['senha']==$_POST['senha']) {
		$usuario_autenticado = true;
		$usuario_id = $user['id'];
		$perfil_usuarioID = $user['peril_id'];
	}
}

if($usuario_autenticado) {
	echo 'usuario autenticado';
	$_SESSION['autenticado'] = 'SIM';
	$_SESSION['id'] = $usuario_id ;
	$_SESSION['peril_id'] = $perfil_usuarioID;
	header('location:home.php');
} else {
	$_SESSION['autenticado'] = 'NAO';
	header('location:index.php?login=erro');

	
}