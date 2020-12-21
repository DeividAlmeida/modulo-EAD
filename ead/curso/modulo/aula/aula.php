<?php
$status = $_GET['routeModu'];
$modulo =  $_GET['modulo']; 
$default = '{"nome":"","descricao":"","campos":"","tipo":"","video":"","nome_arquivo":"","arquivo":"", "professor":"","tipo_prova":"", "questoes":"","gabarito":"", "modulo":"'.$modulo.'" }';
$query = json_encode(DBRead("ead_aula","*","WHERE modulo = '{$modulo}'"));
$b = DBRead("ead_modulo","*","WHERE id = '{$modulo}'")[0];
$a = DBRead("ead_curso","*","WHERE id = '{$b['curso']}'")[0];
?>
<div class="card" >
    
    <div id="control" v-if="!status">
        <div class="card-header white" >
            <strong>Adicionar Aula</strong>   
            <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
                <a class="adicionarListagemItem tooltips" data-tooltip="Adicionar" @click='move("0",<?php echo $default ?>)' >
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
                                            <a class="dropdown-item" :data-id="ctrl.id"  onclick="DeletarItem(getAttribute('data-id'), 'DeletarAula');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir </a>
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
               <?php echo $curso ?> <div class="alert alert-info">Nenhuma aula adicionada a essa listagem até o momento, <a class="adicionarListagemItem" href="#" @click='move("0",<?php echo $default ?>)' >clique aqui</a> para adicionar.</div>
            <?php } ?>
        </div>
    </div>
    <div class="card-body" v-else>
        <form method="post" :action="'?modu='+status" >
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Campos: </label>
                        <input class="form-control" v-model="idx.campos" name="campos" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tema: </label>
                        <input class="form-control" v-model="idx.nome" name="nome" required>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Professor: </label>
                        <select   required name='professor' v-model="idx.professor" class='form-control'  > 
                            <option v-for="prof in professor" :value="prof">
                                {{ prof }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Descrição: </label>
                        <textarea class="form-control" v-model="idx.descricao"  name="descricao" required>{{idx.descricao}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row"  >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo: </label>
                        <select id='tipo'  required name='tipo' class='form-control'  v-bind:value="idx.tipo" v-model='idx.tipo'> 
                            <option value='html'>Tag HTML</option>
                            <option value='local'>Arquivo Local</option></option>
                        </select>
                    </div> 
                </div>
                <div class="col-md-6" v-if="idx.tipo">
                    <div class="form-group">
                        <label>Vídeo: </label>
                        <textarea v-if='idx.tipo == "html"' class="form-control" v-model="idx.video"  name="video" required>{{idx.video}}</textarea>
                        <input v-if='idx.tipo == "local"' type='file' multiple accept='video/*'class='form-control'  name='video' required> 
                            <small v-if='idx.tipo == "local"'>{{idx.video}}</small>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="modulo" v-model="idx.modulo" required>
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
            professor: <?php echo $a['professor'] ?>,
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

<!-- separar o array em grupos https://pt.stackoverflow.com/questions/205872/separar-um-array-em-grupos#:~:text=Da%20pra%20otimizar%20um%20pouco%20a%20fun%C3%A7%C3%A3o%20usando%20Array%23slice.&text=A%20id%C3%A9ia%20%C3%A9%20%22cortar%22%20o,%C3%BAltimo%20do%20array%20de%20resultado.