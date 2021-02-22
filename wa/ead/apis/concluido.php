<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$concluido = json_encode($_POST);
$id = $_GET['id'];
$token = md5(session_id());
if(isset($_GET['id']) && isset($_GET['token']) && $_GET['token'] === $token){
    $query =  DBUpdate('ead_usuario', ['concluidos'   => $concluido], "id = '{$id}'");
    if ($query != 0) {
        echo 1;
    } else {
        echo "Erro no Banco de Dados";
    }
}