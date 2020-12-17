<?php
$status = $_GET['routeUsua'];
if($status > 0):$default = json_encode(DBRead("ead_usuario","*","WHERE id = '{$status}'")[0]); else: $default = '{"nome":"","cpf":"","endereco":"", "data":"" }'; endif;
$query = json_encode(DBRead('ead_usuario','*'));
?>
<div class="card"  >
    <div id="control" v-if="!status">
        <div class="card-header white" >
            <strong>Adicionar Usuário</strong>
            <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
                <a class="adicionarListagemItem tooltips" data-tooltip="Adicionar" @click='move("0",{"nome":"","cpf":"","endereco":"", "data":"" })' >
                    <i class="icon-plus blue lighten-2 avatar"></i> 
                </a>
            <?php } ?>
        </div>
        <div class="card-body p-0" v-if="ctrls">
            <div>
                <div>
                    <table id="DataTable" class="table m-0 table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th width="53px">Ações</th>
                        </tr>
                        <tr v-for="ctrl, index in ctrls">
                            <td>{{index+1}}</td>
                            <td>{{ctrl.nome}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="" href="#" data-toggle="dropdown">
                                        <i class="icon-apps blue lighten-2 avatar"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                        <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')) { ?>
                                            <a class="dropdown-item"  @click="move(ctrl.id, ctrl)" href="#!"><i class="text-primary icon icon-pencil" ></i> Editar</a>
                                        <?php } ?>
                                        <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')) { ?>
                                            <a class="dropdown-item" :data-id="ctrl.id"  onclick="DeletarItem(getAttribute('data-id'), 'DeletarUsua');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-body" v-else>
            <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
                <div class="alert alert-info">Nenhum usuário adicionado a essa listagem até o momento, <a class="adicionarListagemItem" href="?routeUsua=0" >clique aqui</a> para adicionar.</div>
            <?php } ?>
        </div>
    </div>
    <div class="card-body" v-else>
        <form method="post" :action="'?usua='+status" >
            <div class="row" >
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nome: </label>
                        <input class="form-control" v-model="idx.nome" name="nome" required>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>CPF: </label>
                        <input class="form-control" v-model="idx.cpf" min="0" type="number" name="cpf" required>
                    </div>
                </div>
                <div class="col-md-6">    
                    <div class="form-group">
                        <label>Data de Nascimento: </label>
                        <input class="form-control" v-model="idx.data" type="date" name="data" required>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Endereço: </label>
                        <input class="form-control" v-model="idx.endereco"  name="endereco" required>
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
    new Vue({
        el:".card",
        data: {
            idx: <?php echo $default ?>,
            status:"<?php echo $status ?>",
            ctrls:<?php echo $query ?>
        },
        methods:{
            move: function(a, b){
                this.status = a;
                this.idx = b;
            }
        }
    })
</script>