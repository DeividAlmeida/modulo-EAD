<?php
if(isset($_GET['editaEmail'])){
  $data = array(
    'nome'                  => post('nome'),
    'email_usuario'         => post('email_usuario'),
    'email_senha'           => post('email_senha'),
    'email_porta'           => post('email_porta'),
    'email_servidor'        => post('email_servidor'),
    'email_protocolo_seguranca' => post('email_protocolo_seguranca')

  );
  $query  = DBUpdate('ead_config_email', $data, "id = '1'");
    if ($query != 0) {
        Redireciona('?sucesso');
      } else {
        Redireciona('?erro');
      }
}