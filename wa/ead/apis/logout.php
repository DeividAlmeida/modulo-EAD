<?php
session_start();
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');

$token = md5(session_id());
if(isset($_GET['token']) && $_GET['token'] === $token) {
    session_destroy();
    setcookie('Wacontrolid', null, -1, '/');
    setcookie('Wacontroltoken', null, -1, '/');
    header("location:".ConfigPainel('base_url').'wa/ead/login/index.php');
   exit();
} else {
   echo 'ERRO';
}