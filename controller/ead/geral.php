<?php
if(isset($_GET['editaGeral'])){
    if($_FILES['img']['name'] == null){
       $keep = DBRead('ead_config_geral','*' ,"WHERE id = '1'")[0];
       $path = $keep['img'];
    }else{
        $upload_folder = 'wa/ead/uploads/';
        $handle = new Upload($_FILES['img']);
        $handle->file_new_name_body = md5(uniqid(rand(), true));
        $handle->Process($upload_folder);
        $path = $handle->file_dst_name;
    }
  $data = array(
      
        #LOGIN
    'lg_cor_fundo'              => post('lg_cor_fundo'),
    'lg_cor_texto'              => post('lg_cor_texto'),
    'lg_cor_texto_bt'           => post('lg_cor_texto_bt'),
    'lg_cor_texto_hover_bt'     => post('lg_cor_texto_hover_bt'),
    'lg_cor_fundo_bt'           => post('lg_cor_fundo_bt'),
    'logo'                      => post('logo'),
    'img'                       => $path,
    'lg_cor_fundo_hover_bt'     => post('lg_cor_fundo_hover_bt'),
    'destaque'                  => post('destaque'),
        #DASHBOARD
    'ds_cor_fundo'              => post('ds_cor_fundo'),
    'ds_cor_titulo'             => post('ds_cor_titulo'),
    'ds_descricao'              => post('ds_descricao'),
    'cor_primaria'              => post('cor_primaria'),
    'cor_secundaria'            => post('cor_secundaria')
        
    

);
  $query  = DBUpdate('ead_config_geral', $data, "id = '1'");
    if ($query != 0) {
        Redireciona('?sucesso');
      } else {
        Redireciona('?erro');
      }
}

if(isset($_GET['modo'])){

    $modo = $_GET['modo'];
    
    if($modo == 'dev'){
        $vue= '<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>';
    }else{
        $vue= '<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>';
    }
          
    $query  = DBUpdate('ead', array('modo' => $vue), "id = '1'");
    
    if ($query != 0) {
        Redireciona('?sucesso');
      } else {
        Redireciona('?erro');
      }
      
}

