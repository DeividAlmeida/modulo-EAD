<?php
$status = $_GET['routeUsua'];
if($status > 0):$default = json_encode(DBRead("ead_usuario","*","WHERE id = '{$status}'")[0]); else: $default = '{"nome":"","cpf":"","endereco":"", "data":"","email":"","senha":"","cursos":""  }'; endif;
$query = json_encode(DBRead('ead_usuario','*'));
$cursos = DBRead('ead_curso','*');
?>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
<script src="https://cdn.jsdelivr.net/npm/vue-swal@1/dist/vue-swal.min.js"></script>
<style>
    .multiselect__tag, .multiselect__option--highlight, .multiselect__tag-icon, .multiselect__tag-icon:after{ background: #86939e !important}
</style>
<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<script src="ead/src/mask.js"></script>
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
                        <input-mask v-model="idx.cpf" mask="###.###.###-##" masked class="form-control" name="cpf" required></input-mask>
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
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email: </label>
                        <input class="form-control" v-model="idx.email" min="0" type="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">    
                    <div class="form-group">
                        <label >Senha: <i data-bs-toggle="tooltip" data-bs-placement="top" title="Critérios: Uma letra maiúscula, um número, mais de 5 dígitos." style="cursor:pointer" class="icon icon-info-circle" aria-hidden="true"></i></label>
                        <input  class="form-control" :value="idx.senha" type="text" name="senha" required>
                        <small> <i class="icon icon-lock" aria-hidden="true"></i> Senha criptografada</small> 
                    </div>
                </div>
            </div>
            <div  class="row justify-content-md-center" >
                <div class="col-md-8" >
                    <div class="form-group">
                        <label>Cursos: </label>
                        <multiselect  required  :show-labels="false"   v-model="idx.cursos"  placeholder=""   :options="cursos"  :taggable="true"  :multiple="true" ></multiselect>
                        <input type="hidden" name="cursos[]" v-for="curso of idx.cursos" :value="curso">
                    </div>
                </div>
            </div>
            <div class="card-footer white">
                <button style="margin-bottom: 7px;" onclick="senha_forte()" class="btn btn-primary float-right" type="submit"><i class="icon icon-save" aria-hidden="true"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>
<script>
   const val = new Vue({
        el:".card",
        components: { Multiselect: window.VueMultiselect.default },
        data: {
            idx: <?php echo $default ?>,
            status:"<?php echo $status ?>",
            ctrls:<?php echo $query ?>,
            cursos: [<?php foreach($cursos as $nome){ echo '"'.$nome['nome'].'",';} ?>]
        },
        methods:{
            move: function(a, b){
                this.status = a;
                this.idx = b;
                if(this.status != 0){
                    this.idx.cursos =JSON.parse(this.idx.cursos);
                }
            }
        }
    })
    senha_forte = ()=>{
        let senha = document.getElementsByName('senha')[0].value;
        if(senha != val.idx.senha){
            let a  = senha.match(/[0-9]/);
            let b  = senha.match(/[A-Z]/);
            let c = senha.length > 5;
            if(a && b && c){
                document.getElementsByClassName('float-right')[0].type='submit'
            }else{
                document.getElementsByClassName('float-right')[0].type='button'
                swal({title:"Senha muito fraca!",html:true, text:"Critérios mínimos: \n 1° Uma letra maiúscula \n 2° Um número \n 3° mais de 5 dígitos.", icon:"error"});
            }
        }
    }
</script>