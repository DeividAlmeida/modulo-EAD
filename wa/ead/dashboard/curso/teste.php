<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../../includes/funcoes.php');
require_once('../../../../database/config.database.php');
require_once('../../../../database/config.php');
$notas = json_encode($_POST);
$id = $_GET['id'];
if(isset($_GET['salvarnotas'])){
    $data = array(
        'notas'           => $notas
    );
    $query =  DBUpdate('ead_usuario', $data, "id = '{$id}'");
}