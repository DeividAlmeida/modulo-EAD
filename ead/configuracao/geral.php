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
                        <input type="text" name="token" v-model="deposito[0].token" class="form-control" placeholder="Coloque o token de configuração do PagSeguro">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="token">E-mail do PagSeguro:</label>
                        <input type="email" name="token" v-model="pagseguro[0].token" class="form-control" placeholder="Coloque o token de configuração do PagSeguro">
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
        pag.status = a
    }
   function status(a,b){
        let request = new XMLHttpRequest();
        request.open('get', '?status'+b+'='+a, true);
        request.send();
    } 
</script>