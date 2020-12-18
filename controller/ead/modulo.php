<?php
$id = $_GET['modu'];

if(isset($_GET['modu']) && $id == "0"){   
    $data = array(
        'nome'          => post('nome'),
        'descricao'     => post('descricao'),
        'ordem'         => post('ordem')
    );
    $query = DBCreate('ead_modulo', $data, true);
        if ($query != 0) {
            Redireciona('?routeMode&sucesso');
        } else {
            Redireciona('?routeMode&erro');
        }
  
  }
if(isset($_GET['modu']) && $id != "0"){
    $data = array(
        'nome'          => post('nome'),
        'descricao'     => post('descricao'),
        'ordem'         => post('ordem')
        
    );
    $query =  DBUpdate('ead_modulo', $data, "id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeMode&sucesso');
    } else {
        Redireciona('?routeMode&erro');
    }
}
if(isset($_GET['DeletarModu'])){
    $id     = get('DeletarModu');
    $query  = DBDelete('ead_modulo',"id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeMode&sucesso');
    } else {
        Redireciona('?routeMode&erro');
    }
}