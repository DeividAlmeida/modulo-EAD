<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');

$email = $_POST['email'];
$senha = md5($_POST['senha']);
$valida = DBRead('ead_usuario','*',"WHERE email = '{$email}' AND  senha = '{$senha}' ", "LIMIT 1")[0];
if(empty($valida)){
   echo 'erro';
}else{
    session_start();
    $id = $valida['id'];
    $_SESSION['Wacontrol'] = [$id, $senha];
    echo 1;
}

