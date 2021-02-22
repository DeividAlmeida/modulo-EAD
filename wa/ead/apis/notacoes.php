<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$notas = json_encode($_POST);
$id = $_GET['id'];
$token = md5(session_id());
if(isset($_GET['salvarnotas']) && isset($_GET['token']) ){
    $data = array(
        'notas'           => $notas
    );
    $query =  DBUpdate('ead_usuario', $data, "id = '{$id}'");
    if ($query != 0) {
        echo 1;
    } else {
        echo "Erro no Banco de Dados";
    }

}