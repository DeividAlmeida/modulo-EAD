<?php
require_once('database/upload.class.php');

$id = $_GET['prof'];

if(isset($_GET['prof'])){
    if($_FILES['imagem']['name'] == null && $id != "0"){
       $keep = DBRead('ead_prof','*' ,"WHERE id = '{$id}'")[0];
       $path = $keep['imagem'];
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
if(isset($_GET['prof']) && $id == "0"){   
      $data = array(
        'nome'            => post('nome'),
        'cargo'           => post('cargo'),
        'redes'           => $_POST['social'],
        'img'             => $path
      );
      $query = DBCreate('ead_prof', $data, true);
      
        if ($query != 0) {
            Redireciona('?sucesso');
        } else {
            Redireciona('?erro');
        }
  
  }else if(isset($_GET['prof']) && $id != "0"){
    $data = array(
        'nome'            => post('nome'),
        'cargo'           => post('cargo'),
        'redes'           => post('altura'),
        'img'             => $path
      );
      $query =  DBUpdate('ead_prof', $data, "id = '{$id}'");
      
        if ($query != 0) {
            Redireciona('?sucesso');
        } else {
            Redireciona('?erro');
        }
  }else if(isset($_GET['DeletarProf'])){
    $id     = get('DeletarBackground');
    $query  = DBDelete('ead_prof',"id = '{$id}'");
      
        if ($query != 0) {
            Redireciona('?sucesso');
        } else {
            Redireciona('?erro');
        }
  }