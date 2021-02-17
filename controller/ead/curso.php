<?php


$id = $_GET['curs'];

if(isset($_GET['curs'])){
    if($_FILES['capa']['name'] == null && $id != "0"){
       $keep = DBRead('ead_curso','*' ,"WHERE id = '{$id}'")[0];
       $path = $keep['capa'];
    }else{
        $upload_folder = 'wa/ead/uploads/';
        $handle = new Upload($_FILES['capa']);
        $handle->file_new_name_body = md5(uniqid(rand(), true));
        $handle->Process($upload_folder);
        $path = $handle->file_dst_name;
    }
    $professor = json_encode($_POST['professor']);
    $categoria = json_encode($_POST['categoria']);
}
if(isset($_GET['curs']) && $id == "0"){   
      $data = array(
        'nome'                  => post('nome'),
        'descricao_curta'       => post('descricao_curta'),
        'descricao_longa'       => post('mce_0'),
        'tempo'                 => post('tempo'),
        'exibi_professor'       => post('exibi_professor'),
        'palavras_chave'        => post('palavras_chave'),
        'professor'             => $professor,
        'categoria'             => $categoria,
        'capa'                  => $path
      );

      $query = DBCreate('ead_curso', $data, true);
      
        if ($query != 0) {
            Redireciona('?routeCurs&sucesso');
        } else {
            Redireciona('?routeCurs&erro');
        }
  
  }
if(isset($_GET['curs']) && $id != "0"){

$data = array(
    'nome'                  => post('nome'),
    'descricao_curta'       => post('descricao_curta'),
    'descricao_longa'       => post('mce_0'),
    'tempo'                 => post('tempo'),
    'exibi_professor'       => post('exibi_professor'),
    'palavras_chave'        => post('palavras_chave'),
    'professor'             => $professor,
    'categoria'             => $categoria,
    'capa'                  => $path
  );

  $query =  DBUpdate('ead_curso', $data, "id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeCurs&sucesso');
    } else {
        Redireciona('?routeCurs&erro');
    }
}
  if(isset($_GET['DeletarCurs'])){
    $id     = get('DeletarCurs');
    $query  = DBDelete('ead_curso',"id = '{$id}'");
      
        if ($query != 0) {
            Redireciona('?routeCurs&sucesso');
        } else {
            Redireciona('?routeCurs&erro');
        }
  }