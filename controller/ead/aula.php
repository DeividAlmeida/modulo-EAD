<?php

$id = $_GET['aula'];

if(isset($_GET['prof5'])){
    if($_FILES['imagem']['name'] == null && $id != "0"){
       $keep = DBRead('ead_aula','*' ,"WHERE id = '{$id}'")[0];
       $path = $keep['img'];
    }else{
        $upload_folder = 'wa/ead/uploads/';
        $handle = new Upload($_FILES['imagem']);
        $handle->file_new_name_body = md5(uniqid(rand(), true));
        $handle->Process($upload_folder);
        $path = $handle->file_dst_name;
    }

    $resources = array_combine(array_keys($_POST['link']), array_map(function ($icon_social, $link) {
        return compact('icon_social', 'link');
    },$_POST['icon_social'], $_POST['link']));
    $_POST['social'] = json_encode($resources, JSON_FORCE_OBJECT);
}
if(isset($_GET['aula']) && $id == "0"){   
      $data = array(
        'modulo'            => post('modulo'),
        'campos'            => post('campos'),
        'nome'              => post('nome'),
        'descricao'         => post('descricao'),
        'tipo'              => post('tipo'),
        'video'             => post('video'),
        'nome_arquivo'      => post('nome_arquivo'),
        'professor'         => post('professor'),
        'tipo_prova'        => post('tipo_prova'),
        'questoes'          => post('questoes'),
        'gabarito'          => post('gabarito')
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
        'video'             => post('video'),
        'nome_arquivo'      => post('nome_arquivo'),
        'professor'         => post('professor'),
        'tipo_prova'        => post('tipo_prova'),
        'questoes'          => post('questoes'),
        'gabarito'          => post('gabarito')
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