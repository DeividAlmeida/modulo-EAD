<?php
$status = $_GET['routeModu'];
$curso =  $_GET['curso']; 
$default = '{"nome":"","descricao":"","ordem":"", "curso":"'.$curso.'" }';
$query = json_encode(DBRead("ead_modulo","*","WHERE curso = '{$curso}'"));
?>
<div class="card" >
    <div id="control" v-if="!status">
        <div class="card-header white" >
            <strong>Adicionar Módulo</strong>   
            <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
                <a class="adicionarListagemItem tooltips" data-tooltip="Adicionar" @click='move("0",<?php echo $default ?>)'>
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
                            <th>Aulas</th>
                            <th width="53px">Ações</th>
                        </tr>
                        <tr v-for="ctrl, index in ctrls">
                            <td>{{index+1}}</td>
                            <td>{{ctrl.nome}}</td>
                            <td>                    
                                <a class="tooltips" data-tooltip="Adicionar" :href="'?routeAula=0&modulo='+ctrl.id">
                                    <i class="icon-plus blue lighten-2 avatar"></i>
                                </a>
                                    <a class="tooltips" data-tooltip="Visualizar" :href="'?routeAula&modulo='+ctrl.id"><i class="icon-eye blue lighten-2 avatar"></i>
                                </a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="" href="#" data-toggle="dropdown">
                                        <i class="icon-apps blue lighten-2 avatar"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                        <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')) { ?>
                                            <a class="dropdown-item"  @click="move(ctrl.id, ctrl, index)" href="#!"><i class="text-primary icon icon-pencil" ></i> Editar</a>
                                        <?php } ?>
                                        <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')) { ?>
                                            <a class="dropdown-item" :data-id="ctrl.id"  onclick="DeletarItem(getAttribute('data-id'), 'DeletarModu');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir </a>
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
               <div class="alert alert-info">Nenhum módulo adicionado a essa listagem até o momento, <a class="adicionarListagemItem" href="#" @click='move("0",<?php echo $default ?>)' >clique aqui</a> para adicionar.</div>
            <?php } ?>
        </div>
    </div>
    <div class="card-body" v-else>
        <form method="post" :action="'?modu='+status" >
            <div class="row" >
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nome: </label>
                        <input class="form-control" v-model="idx.nome" name="nome" required>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Descrição: </label>
                        <textarea class="form-control" v-model="idx.descricao"  name="descricao" required>{{idx.descricao}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="form-group col-md-12">
                    <label>Ordem: </label>
                    <input class="form-control" v-model="idx.ordem" type="number" min="0" name="ordem" required>
                </div>
            </div>
            <input type="hidden" name="curso" v-model="idx.curso" required>
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