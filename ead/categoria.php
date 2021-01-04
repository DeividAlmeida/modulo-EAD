<?php
$id = $_GET['cate'];

if(isset($_GET['cate']) && $id == "0"){   
    $data = array(
    'nome'            => post('nome'),
    'descricao'       => post('descricao')
    );
    $query = DBCreate('ead_categoria', $data, true);
        if ($query != 0) {
            Redireciona('?routeCate&sucesso');
        } else {
            Redireciona('?routeCate&erro');
        }
  
  }
if(isset($_GET['cate']) && $id != "0"){
    $data = array(
        'nome'            => post('nome'),
        'descricao'           => post('descricao')
    );
    $query =  DBUpdate('ead_categoria', $data, "id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeCate&sucesso');
    } else {
        Redireciona('?routeCate&erro');
    }
}
if(isset($_GET['DeletarCate'])){
    $id     = get('DeletarCate');
    $query  = DBDelete('ead_categoria',"id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeCate&sucesso');
    } else {
        Redireciona('?routeCate&erro');
    }
}