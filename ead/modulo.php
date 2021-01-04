<?php
$id = $_GET['modu'];

if(isset($_GET['modu']) && $id == "0"){   
    $data = array(
        'nome'          => post('nome'),
        'descricao'     => post('descricao'),
        'ordem'         => post('ordem'),
        'curso'         => post('curso')
    );
    $query = DBCreate('ead_modulo', $data, true);
        if ($query != 0) {
            Redireciona('?routeModu&curso='.$_POST['curso'].'&sucesso');
        } else {
            Redireciona('?routeModu&curso='.$_POST['curso'].'&erro');
        }
  
  }
if(isset($_GET['modu']) && $id != "0"){
    $data = array(
        'nome'          => post('nome'),
        'descricao'     => post('descricao'),
        'ordem'         => post('ordem'),
        'curso'         => post('curso')
        
    );
    $query =  DBUpdate('ead_modulo', $data, "id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeModu&curso='.$_POST['curso'].'&sucesso');
    } else {
        Redireciona('?routeModu&curso='.$_POST['curso'].'&erro');
    }
}
if(isset($_GET['DeletarModu'])){
    $id     = get('DeletarModu');
    $query  = DBDelete('ead_modulo',"id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeModu&curso='.$_POST['curso'].'&sucesso');
    } else {
        Redireciona('?routeModu&curso='.$_POST['curso'].'&erro');
    }
}