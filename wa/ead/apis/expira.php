<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$expira = json_encode($_POST);
$id = $_GET['id'];
if(isset($_GET['id'])){
    $query =  DBUpdate('ead_usuario', ['expira'   => $expira], "id = '{$id}'");
    if ($query != 0) {
        echo 1;
    } else {
        echo "Erro no Banco de Dados";
    }
}