<?php
$pagseguro = json_encode(DBRead('ead_config_pagseguro','*'));
$deposito = json_encode(DBRead('ead_config_deposito','*'));
?>
<link rel="stylesheet" href="ead/src/checkbox.css">
<style>
    .text-primary{
        font-size:25px;
        margin-left: 10px;
    }
</style>
<div class="card  white table-responsive">
    <div class="card-header white ">
        <strong :key="status">Meios de Pagamento</strong> 
    </div>
    <div class="card-body white" v-if="status == 'listar'">  
        <table class="table table-hover table-striped">
            <thead style="font-weight: bold;">
                <tr >
                    <th style="font-weight: bold; font-size:16px;" scope="col">Tipo</th>
                    <th style="font-weight: bold; font-size:18px;" scope="col">Status</th>
                    <th style="font-weight: bold; font-size:18px;" scope="col">Editar</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                   <td>PagSeguro </td>
                   <td><div class="container"> <input v-model="pagseguro[0].status"  type="checkbox" id="cbtest pagseguro" onclick="status(this.checked,'Pagseguro')" />    <label for="cbtest pagseguro" class="check-box"></label> </div></td>
                   <td><a href="#!" @click="move('pagseguro')"><i class='text-center text-primary icon icon-pencil' aria-hidden='true'></i></a></td>
                </tr>
                <tr>
                   <td>Depósito em conta </td>
                   <td><div class="container"> <input v-model="deposito[0].status" type="checkbox" id="cbtest deposito" onclick="status(this.checked,'Deposito')" />    <label for="cbtest deposito" class="check-box"></label> </div></td>
                   <td><a href="#!" @click="move('deposito')"><i class='text-center text-primary icon icon-pencil' aria-hidden='true'></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body white" v-if="status == 'pagseguro'">  
        <form method="post" action="?pagseguro">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="token">Token do PagSeguro:</label>
                        <input type="text" name="token" v-model="pagseguro[0].token" class="form-control" placeholder="Coloque o token de configuração do PagSeguro">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="token">E-mail do PagSeguro:</label>
                        <input type="email" name="email" v-model="pagseguro[0].email" class="form-control" placeholder="Coloque o token de configuração do PagSeguro">
                    </div>
                </div>
            </div>
            <div class="card-footer white">
                <button style="margin-bottom: 7px;" class="btn btn-primary float-right" type="submit"><i class="icon icon-save" aria-hidden="true"></i> Salvar</button>
            </div>
        </form>
    </div>
    <div class="card-body white" v-if="status == 'deposito'">  
        <form method="post" action="?deposito">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input v-model="deposito[0].titulo" name="titulo" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input v-model="deposito[0].descricao" name="descricao" class="form-control" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="instucoes">Instruções:</label>
                        <textarea v-model="deposito[0].instucoes" type="text" name="instucoes" rows="3" class="md-textarea form-control" >{{deposito[0].instucoes}}</textarea>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-12">                
                <div class="form-group">
                    <label for="detalhes">Detalhes da Conta:</label>
                </div>
            </div>
            <div class="col-md-12">
                <button type="button" @click="add" class="btn btn-primary btnAdd" style="margin-bottom: 15px;"><i class="icons icon-plus"></i></button>
            </div>
            <div v-for="dtl, index of deposito[0].detalhes">
                <div class="row justify-content-md-center" > 
                    <div class=" col-md-5">                
                        <div class="form-group">
                            <label for="nome">Nome da Conta:</label>
                            <input v-model="deposito[0].detalhes[index].nome" name="nome[]" class="form-control">
                        </div>
                    </div>            
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="conta">Número da Conta:</label>
                            <input v-model="deposito[0].detalhes[index].conta" name="conta[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="banco">Banco:</label>
                            <input v-model="deposito[0].detalhes[index].banco" name="banco[]" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="agencia">Agência:</label>
                            <input v-model="deposito[0].detalhes[index].agencia" name="agencia[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1 align-self-center"  >
                        <button type="button" @click="remove(index)" class="btn btn-danger btnRemove"><i class="icon-trash"></i></button>
                    </div>                  
                </div>
            </div>
            <div class="card-footer white">
                <button style="margin-bottom: 7px;" class="btn btn-primary float-right" type="submit"><i class="icon icon-save" aria-hidden="true"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>
<script> 
  var pag =  new Vue({
        el:".card",
        data: {
        status:'listar',
        pagseguro: <?php echo $pagseguro ?>,
        deposito: <?php echo $deposito ?>
        }
    });
    pag.move = (a) => {
        pag.status = a;
        if(pag.deposito[0].detalhes == ""){
            pag.deposito[0].detalhes = []
        }else{
        pag.deposito[0].detalhes = JSON.parse(pag.deposito[0].detalhes)
        }
    }
    pag.remove = (a) =>{
        pag.deposito[0].detalhes.splice(a,1)
    }
    pag.add = () => {
        pag.deposito[0].detalhes.push(["","","",""])
    }
   function status(a,b){
        let request = new XMLHttpRequest();
        request.open('get', '?status'+b+'='+a, true);
        request.send();
    } 
</script>