<?php
$id = $_GET['usua'];
if(isset($_GET['usua'])){
    $senha =  md5(post('senha'));
    $cursos = json_encode($_POST['cursos']);
    
    if($id == "0"){   
        $data = array(
            'nome'          => post('nome'),
            'cpf'           => post('cpf'),
            'endereco'      => post('endereco'),
            'email'         =>post('email'),
            'senha'         =>$senha,
            'cursos'        =>$cursos,
            'data'          => post('data')
        );
        $query = DBCreate('ead_usuario', $data, true);
            if ($query != 0) {
                Redireciona('?routeUsua&sucesso');
            } else {
                Redireciona('?routeUsua&erro');
            }
      
      }
      
        $compatibilidade = DBRead("ead_usuario","*","WHERE id = '{$id}'")[0];
        if($compatibilidade['senha'] == $_POST['senha']){$senha = $compatibilidade['senha'];}
    if($id != "0"){
        $data = array(
            'nome'          => post('nome'),
            'cpf'           => post('cpf'),
            'endereco'      => post('endereco'),
            'email'         =>post('email'),
            'senha'         =>$senha,
            'cursos'        =>$cursos,
            'data'          => post('data')
            
        );
        $query =  DBUpdate('ead_usuario', $data, "id = '{$id}'");
      
        if ($query != 0) {
            Redireciona('?routeUsua&sucesso');
        } else {
            Redireciona('?routeUsua&erro');
        }
    }
}
if(isset($_GET['DeletarUsua'])){
    $id     = get('DeletarUsua');
    $query  = DBDelete('ead_usuario',"id = '{$id}'");
  
    if ($query != 0) {
        Redireciona('?routeUsua&sucesso');
    } else {
        Redireciona('?routeUsua&erro');
    }
}