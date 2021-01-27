<?php
$status = $_GET['routeModu'];
$modulo =  $_GET['modulo']; 
$default = '{"nome":"","descricao":"","tipo":"","video":"","arquivo":"", "professor":"","tipo_prova":"", "questoes":"[]","gabarito":"[]","qtd_alternativas":"0","alternativas":"[]", "modulo":"'.$modulo.'" }';
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
                                            <a class="dropdown-item" :data-id="ctrl.id"  onclick="DeletarItem(getAttribute('data-id'), 'modulo=<?php echo $_GET['modulo'] ?>&DeletarAula');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir </a>
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
               <div class="alert alert-info">Nenhuma aula adicionada a essa listagem até o momento, <a class="adicionarListagemItem" href="#" @click='move("0",<?php echo $default ?>)' >clique aqui</a> para adicionar.</div>
            <?php } ?>
        </div>
    </div>
    <div class="card-body" v-else>
        <form method="post" :action="'?aula='+status" enctype="multipart/form-data">
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome aula: </label>
                        <input class="form-control" v-model="idx.nome" name="nome" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Descrição: </label>
                        <textarea class="form-control" v-model="idx.descricao"  name="descricao" required>{{idx.descricao}}</textarea>
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
                        <label>Arquivo da Aula: </label>
                        <input  type='file' multiple class='form-control' accept=".zip,.rar,.7zip,video/*,image/*,audio/*,.doc,.txt,.odt,.odf,.docx,.pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"  name='arquivo' > 
                            <small >{{idx.arquivo}}</small>
                    </div>
                </div>
            </div>
            <div class="row"  >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de Vídeo: </label>
                        <select required name='tipo' class='form-control'  v-bind:value="idx.tipo" v-model='idx.tipo'> 
                            <option value='html'>Tag HTML</option>
                            <option value='local'>Arquivo Local</option></option>
                        </select>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Prova: </label>
                        <select  required name='tipo_prova' class='form-control'  v-bind:value="idx.tipo_prova" v-model='idx.tipo_prova'> 
                            <option value='discursiva'>Discursiva</option>
                            <option value='multipla'>Múltipla Escolha</option></option>
                        </select>
                    </div> 
                </div>
            </div>
            <div class="row"  >
                <div class="col-md-6" v-if="idx.tipo">
                    <div class="form-group">
                        <label>Vídeo: </label>
                        <textarea v-if='idx.tipo == "html"' class="form-control" v-model="idx.video"  name="video" required>{{idx.video}}</textarea>
                        <input v-if='idx.tipo == "local"' type='file' multiple accept='video/*'class='form-control'  name='video'> 
                            <small v-if='idx.tipo == "local"'>{{idx.video}}</small>
                    </div>
                </div>
                <div class="col-md-6" v-if="idx.tipo_prova == 'multipla'">
                    <div class="form-group">
                        <label>Quantidade de Alternativas: </label>
                        <input  type='number' min="1" class='form-control'  name='qtd_alternativas' v-model='idx.qtd_alternativas'> 
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="modulo" v-model="idx.modulo" required>
            <hr>
            <div class="row justify-content-md-center">
                <div class="col col-md-1">
                    <strong>PROVA</strong> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12"><button type="button" @click="add" class="btn btn-primary btnAdd" style="margin-bottom: 15px;"><i class=" icon-plus"></i></button></div>
                    </div>
                </div>
            </div>
            <div v-for="ask, index of idx.questoes" >
                <div class="row"  >
                    <div class="col-md-11" >
                        <div class="form-group" >
                            <span >{{(index*1)+1}}° Questão</span>
                            <input    v-model="idx.questoes[index]" class='form-control'  name='questoes[]' :key="index">
                        </div>
                    </div>
                    <div class="col align-self-center pull-right"  >
                        <button type="button" @click="remove(index)" class="btn btn-danger btnRemove"><i class="icon-trash"></i></button>
                    </div>
                </div>
                <div class="row justify-content-md-center" v-for="alter, ix of idx.alternativas[index]" >
                     <div class="col col-md-1">
                        <div class="form-group">
                            <label>Resposta: </label>
                            <input class='form-control' :name='"gabarito["+index+"]"' v-model='idx.gabarito[index]' :value="ix"    type="radio"> 
                        </div>
                    </div>  
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label>Alternativa: </label>
                            <input class='form-control' :name='"alternativas["+index+"]["+ix+"]"' v-model="idx.alternativas[index][ix]"   :key="ix"> 
                        </div>
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
            professor: <?php echo $a['professor'] ?>,
            idx: <?php echo $default ?>,
            status:"<?php echo $status ?>",
            ctrls:<?php echo $query ?>,
        },
        methods:{
            move: function(a, b){
                this.status = a
                this.idx = b
                this.idx.questoes = JSON.parse(this.idx.questoes)
                this.idx.alternativas = JSON.parse(this.idx.alternativas)
                this.idx.gabarito = JSON.parse(this.idx.gabarito)
            },
            add: function(){
                let a = []
                for(let i=0; i<this.idx.qtd_alternativas; i++){
                    a.push('')
                }
                
                this.idx.gabarito.push(a[0])
                this.idx.alternativas.push(a)
                this.idx.questoes.push('')
            },
            remove: function(a){
                this.idx.alternativas.splice(a,1)
                this.idx.questoes.splice(a,1)
                this.idx.gabarito.splice(a,1)
            }
        }
    })
</script>

<!-- separar o array em grupos https://pt.stackoverflow.com/questions/205872/separar-um-array-em-grupos#:~:text=Da%20pra%20otimizar%20um%20pouco%20a%20fun%C3%A7%C3%A3o%20usando%20Array%23slice.&text=A%20id%C3%A9ia%20%C3%A9%20%22cortar%22%20o,%C3%BAltimo%20do%20array%20de%20resultado.-->