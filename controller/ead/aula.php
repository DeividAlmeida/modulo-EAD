<?php

$id = $_GET['aula'];

if(isset($_GET['aula'])){
    if($_FILES['arquivo']['name'] == null && $id != "0"){
       $keep = DBRead('ead_aula','*' ,"WHERE id = '{$id}'")[0];
       $arquivo = $keep['arquivo'];
    }else{
        $upload_folder = 'wa/ead/uploads/';
        $handle = new Upload($_FILES['arquivo']);
        $handle->file_new_name_body = md5(uniqid(rand(), true));
        $handle->Process($upload_folder);
        $arquivo = $handle->file_dst_name;
    }
    if($_POST['tipo'] == "local" && $_FILES['arquivo']['name'] == null && $id != "0"){
       $keep = DBRead('ead_aula','*' ,"WHERE id = '{$id}'")[0];
       $video = $keep['video'];
    }else if($_POST['tipo'] == "local" && $_FILES['arquivo']['name'] != null ) {
        $upload_folder = 'wa/ead/uploads/';
        $handle = new Upload($_FILES['arquivo']);
        $handle->file_new_name_body = md5(uniqid(rand(), true));
        $handle->Process($upload_folder);
        $video = $handle->file_dst_name;
    }else{
        $video = $_POST['video'];
    }
    $questoes = json_encode($_POST['questoes'], JSON_FORCE_OBJECT);
    $alternativas = json_encode($_POST['alternativas'], JSON_FORCE_OBJECT);
    $gabarito = json_encode($_POST['gabarito'], JSON_FORCE_OBJECT);
}
if(isset($_GET['aula']) && $id == "0"){ 
    
      $data = array(
        'modulo'            => post('modulo'),
        'campos'            => post('campos'),
        'nome'              => post('nome'),
        'descricao'         => post('descricao'),
        'tipo'              => post('tipo'),
        'video'             => $video,
        'arquivo'           => $arquivo,
        'gabarito'          => $gabarito,
        'questoes'          => $questoes,
        'alternativas'      => $alternativas,
        'professor'         => post('professor'),
        'tipo_prova'        => post('tipo_prova'),
        'qtd_alternativas'  => post('qtd_alternativas')
      );
      $query = DBCreate('ead_aula', $data, true);
      
        if ($query != 0) {
            Redireciona('?routeAula&modulo='.$_POST['modulo'].'&sucesso');
        } else {
            Redireciona('?routeAula&modulo='.$_POST['modulo'].'&erro');
        }
  
  }
  if(isset($_GET['aula']) && $id != "0"){

    $data = array(
        'modulo'            => post('modulo'),
        'campos'            => post('campos'),
        'nome'              => post('nome'),
        'descricao'         => post('descricao'),
        'tipo'              => post('tipo'),
        'video'             => $video,
        'arquivo'           => $arquivo,
        'gabarito'          => $gabarito,
        'questoes'          => $questoes,
        'alternativas'      => $alternativas,
        'professor'         => post('professor'),
        'tipo_prova'        => post('tipo_prova'),
        'qtd_alternativas'  => post('qtd_alternativas')
      );
      $query =  DBUpdate('ead_aula', $data, "id = '{$id}'");
      
        if ($query != 0) {
            Redireciona('?routeAula&modulo='.$_POST['modulo'].'&sucesso');
        } else {
            Redireciona('?routeAula&modulo='.$_POST['modulo'].'&erro');
        }
  }
  if(isset($_GET['DeletarAula'])){
    $id     = get('DeletarAula');
    $query  = DBDelete('ead_aula',"id = '{$id}'");
      
        if ($query != 0) {
            Redireciona('?routeAula&modulo='.$_POST['modulo'].'&sucesso');
        } else {
            Redireciona('?routeAula&modulo='.$_POST['modulo'].'&erro');
        }
  }