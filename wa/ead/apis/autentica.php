<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$manter = $_POST['manter'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$valida = DBRead('ead_usuario','*',"WHERE email = '{$email}' AND  senha = '{$senha}' ", "LIMIT 1")[0];
if(empty($valida)){
   echo 'ERRO';
}else{
    session_start();
    $id = $valida['id'];
    if($manter == true){
        setcookie('Wacontrolid', $id, time() + (86400 * 30), "/");
        setcookie('Wacontroltoken', $senha, time() + (86400 * 30), "/");
        echo 1;
    }else{
        $_SESSION['Wacontrol'] = [$id, $senha];
        echo 1;
    }
}

