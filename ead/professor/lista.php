<?php
$query = json_encode(DBRead('ead_prof','*'));
?>
<div class="card"  >
    <div class="card-header white" >
        <strong>Adicionar Professor</strong>
        <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
            <a class="adicionarListagemItem tooltips" data-tooltip="Adicionar" href="?routeProf=0">
                <i class="icon-plus blue lighten-2 avatar"></i> 
            </a>
        <?php } ?>
    </div>
    <div class="card-body p-0" >
        <div>
            <div>
                <table id="DataTable" class="table m-0 table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th width="53px">Ações</th>
                    </tr>
                    <tr v-for="ctrl in ctrls">
                        <td>{{ctrl.id}}</td>
                        <td>{{ctrl.nome}}</td>
                        <td>
                            <div class="dropdown">
                                <a class="" href="#" data-toggle="dropdown">
                                    <i class="icon-apps blue lighten-2 avatar"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')) { ?>
                                        <a class="dropdown-item" :href="'?routeProf='+ctrl.id"><i class="text-primary icon icon-pencil"></i> Editar</a>
                                    <?php } ?>
                                    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'deletar')) { ?>
                                        <a class="dropdown-item" :data-id="ctrl.id"  onclick="DeletarItem(getAttribute('data-id'), 'DeletarProf');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'ite', 'adicionar')) { ?>
            <div class="alert alert-info">Nenhum professor adicionado a essa listagem até o momento, <a class="adicionarListagemItem" href="?routeProf=0" >clique aqui</a> para adicionar.</div>
        <?php } ?>
    </div>
</div>
<script>
    new Vue({
        el:".card",
        data: {
            ctrls:<?php echo $query ?>
        }
    })
</script>