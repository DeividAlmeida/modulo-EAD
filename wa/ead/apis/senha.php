<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
require_once('../../../database/upload.class.php');
session_start();
$token = md5(session_id());
if(isset($_GET['token']) && $_GET['token'] === $token) {
    if(isset($_SESSION['Wacontrol'])){
        $id = $_SESSION['Wacontrol'][0];
        $senha = $_SESSION['Wacontrol'][1];
    }
    else if(isset($_COOKIE['Wacontroltoken'])){
        $id =  $_COOKIE['Wacontrolid'];
        $senha =  $_COOKIE['Wacontroltoken'];
    }
    $valida = DBRead('ead_usuario','*' ,"WHERE id = '{$id}'")[0];
    
    if(!isset($_POST['senha_atual']) || md5($_POST['senha_atual']) != $valida['senha'] ){ echo 'Senha atual inválida'; exit;}
    
    foreach($_POST as $chave => $vazio){
        $erro ="campo ".$chave." está vazio";
        if(empty($vazio)){$empty = 1; echo $erro; exit;}else{$empty = 0;}
    }
    
    if($empty == 0){
        $senha = md5(post('nova_senha'));
        $query = DBUpdate('ead_usuario',['senha'=> $senha]," id = '{$id}'");
        if ($query != 0) {
            if(isset($_SESSION['Wacontrol'])){
                $_SESSION['Wacontrol'] = [$id, $senha];
            }
            else if(isset($_COOKIE['Wacontroltoken'])){
                setcookie('Wacontrolid', $id, time() + (86400 * 30), "/");
                setcookie('Wacontroltoken', $senha, time() + (86400 * 30), "/");
            }
            echo 1;
        } else {
            echo "Erro no Banco de Dados";
        }
    }
}