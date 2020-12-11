<?php
if(!$_SESSION['node']['id']){ die(); exit(); }

if (!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'])) { Redireciona('./index.php'); }

$modulo = str_replace(['/'], [''], $_SERVER['SCRIPT_NAME']);
$queryAction = DBRead("modulos","*","WHERE url = '{$modulo}'");
if (is_array($queryAction) && empty($queryAction[0]['action'])) {
    $data = array(
        'acao' => '{"listagem":["adicionar","editar","deletar"],"categoria":["adicionar","editar","deletar"],"produto":["adicionar","editar","deletar"],"codigo":["acessar"],"configuracao":["acessar"]}',
    );
    DBUpdate("modulos", $data, "url = '{$modulo}'");
}
require_once('database/upload.class.php');
require_once('ead/professor.php');


