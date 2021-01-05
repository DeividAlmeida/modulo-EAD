<?php
if(isset($_GET['pagseguro'])){
  $data = array(
    'email'         => post('email'),
    'token'         => post('token')
  );
  $query  = DBUpdate('ead_config_pagseguro', $data, "id = '1'");
  
    if ($query != 0) {
        Redireciona('?sucesso');
    } else {
        Redireciona('?erro');
    }
}

if(isset($_GET['statusPagseguro'])){
  $status =$_GET['statusPagseguro'];
  if($status == "true"){
    $callback = "checked";
  }else{ $callback = ""; }
  $query  = DBUpdate('ead_config_pagseguro', array('status' => $callback), "id = '1'");
}