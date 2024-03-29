<?php
if(!$_SESSION['node']['id']){ die(); exit(); }
require_once('database/upload.class.php');

if (!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'])) { Redireciona('./index.php'); }

$modulo = str_replace(['/'], [''], $_SERVER['SCRIPT_NAME']);
$queryAction = DBRead("modulos","*","WHERE url = '{$modulo}'");
if (is_array($queryAction) && empty($queryAction[0]['action'])) {
    $data = array(
        'acao' => '{\"professor\":[\"adicionar\",\"editar\",\"deletar\"],\"aluno\":[\"adicionar\",\"editar\",\"deletar\"],\"curso\":[\"adicionar\",\"editar\",\"deletar\"],\"modulo\":[\"adicionar\",\"editar\",\"deletar\"],\"aula\":[\"adicionar\",\"editar\",\"deletar\"],\"categoria\":[\"adicionar\",\"editar\",\"deletar\"],\"codigo\":[\"acessar\"],\"configuracao\":[\"acessar\"]}',
    );
    DBUpdate("modulos", $data, "url = '{$modulo}'");
}


require_once('ead/professor.php');

require_once('ead/categoria.php');

require_once('ead/usuario.php');

require_once('ead/curso.php');

require_once('ead/modulo.php');

require_once('ead/aula.php');

require_once('ead/email.php');

require_once('ead/pagseguro.php');

require_once('ead/deposito.php');

require_once('ead/geral.php');
