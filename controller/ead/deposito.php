<?php
if(isset($_GET['deposito'])){

  $resources = array_combine(array_keys($_POST['nome']), array_map(function ($nome, $conta, $banco, $agencia) {
    return compact('nome', 'conta', 'banco', 'agencia');
    },$_POST['nome'], $_POST['conta'], $_POST['banco'], $_POST['agencia']));
    $_POST['dtl'] = json_encode($resources, JSON_FORCE_OBJECT);

  $data = array(
    'titulo'       => post('titulo'),
    'descricao'    => post('descricao'),
    'instucoes'    => post('instucoes'),
    'descricao'    => post('descricao'),
    'detalhes'    => $_POST['dtl']
  );
  $query  = DBUpdate('ead_config_deposito', $data, "id = '1'");
  
    if ($query != 0) {
        Redireciona('?sucesso');
    } else {
        Redireciona('?erro');
    }
}


if(isset($_GET['statusDeposito'])){
  $status =$_GET['statusDeposito'];
  if($status == "true"){
    $callback = "checked";
  }else{ $callback = ""; }
  $query  = DBUpdate('ead_config_deposito', array('status' => $callback), "id = '1'");
}