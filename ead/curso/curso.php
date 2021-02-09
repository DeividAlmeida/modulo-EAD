<?php
$status = $_GET['routeCurs'];
if($status > 0):$default = json_encode(DBRead("ead_curso","*","WHERE id = '{$status}'")[0]); else: $default = '{"id":"0","nome":"","descricao_curta":"","descricao_longa":"","vender":"","categoria":"","valor":"","tempo":"","exibi_professor":"","professor":"","capa":"", "palavras_chave":""}'; endif;
$query = json_encode(DBRead('ead_curso','*'));
$categorias = DBRead('ead_categoria','*');
$professores = DBRead('ead_prof','*');
?>
<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
  <script src='https://cdn.jsdelivr.net/npm/vue-mce@1.5.2/dist/vue-mce.web.js'></script>
<style>
    .multiselect__tag, .multiselect__option--highlight, .multiselect__tag-icon, .multiselect__tag-icon:after{ background: #86939e !important}
    .mce-notification {display: none !important;}
    .text-center img{
        max-width:50% !important;
    }
</style>
<div class="card"  >
    <div id="control" v-if="!status">
        <div class="card-header white" >
            <strong>Adicionar Curso</strong>
            <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
                <a class="adicionarListagemItem tooltips" data-tooltip="Adicionar" @click='move("0",{"id":"0","nome":"","descricao_curta":"","descricao_longa":"","vender":"","categoria":"","valor":"","tempo":"","exibi_professor":"","professor":"","capa":""})' >
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
                            <th>Módulos</th>
                            <th width="53px">Ações</th>
                        </tr>
                        <tr v-for="ctrl, index in ctrls">
                            <td>{{index+1}}</td>
                            <td>{{ctrl.nome}}</td>
                            <td>                    
                                <a class="tooltips" data-tooltip="Adicionar" :href="'?routeModu=0&curso='+ctrl.id">
                                    <i class="icon-plus blue lighten-2 avatar"></i>
                                </a>
                                    <a class="tooltips" data-tooltip="Visualizar" :href="'?routeModu&curso='+ctrl.id"><i class="icon-eye blue lighten-2 avatar"></i>
                                </a>
                            </td>
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
                                            <a class="dropdown-item" :data-id="ctrl.id"  onclick="DeletarItem(getAttribute('data-id'), 'DeletarCurs');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir </a>
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
                <div class="alert alert-info">Nenhum curso adicionado a essa listagem até o momento, <a class="adicionarListagemItem" href="?routeCurs=0" >clique aqui</a> para adicionar.</div>
            <?php } ?>
        </div>
    </div>
    <div class="card-body" v-else>
        <form method="post" :action="'?curs='+status" enctype="multipart/form-data">
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome do Curso: </label>
                        <input class="form-control" v-model="idx.nome" name="nome" required>
                    </div>
                </div>
                <div class="col-md-6">    
                    <div class="form-group">
                        <div>
                            <label>Categorias do Curso: </label>
                            <multiselect  :show-labels="false"  :hide-selected="true" v-model="categoria"  placeholder=""   :options="categorias"   :multiple="true" :taggable="true"  ></multiselect>
                            <input type="hidden" name="categoria[]" v-for="cat of categoria" :value="cat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Descrição Longa do Curso: </label>
                        <vue-mce :config="config" v-model="idx.descricao_longa"  name="descricao_longa"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Descrição Curta do Curso: </label>
                        <input class="form-control" v-model="idx.descricao_curta" name="descricao_curta" >
                    </div>
                    <div class="form-group">
                        <label>Vender Curso: </label>
                        <multiselect   :show-labels="false"   v-model="idx.vender"  placeholder=""   :options="exibe"  :taggable="true"  ></multiselect>
                        <input class="form-control" type="hidden" v-model="idx.vender"  name="vender" required>
                    </div>
                    <div class="form-group">
                        <label>Valor do Curso: </label>
                        <input class="form-control" v-model="idx.valor"  name="valor" required>
                    </div>
                    <div class="form-group">
                        <label>Tempo do curso: </label>
                        <multiselect   :show-labels="false"   v-model="idx.tempo"  placeholder=""   :options="tempo"  :taggable="true"  ></multiselect>
                        <input type="hidden" class="form-control" v-model="idx.tempo"  name="tempo" required>
                    </div>
                    <div class="form-group">
                          <label>Exibir Professores: </label>
                        <multiselect   :show-labels="false"   v-model="idx.exibi_professor"  placeholder=""   :options="exibe"  :taggable="true"  ></multiselect>
                        <input type="hidden" name="exibi_professor" :value="idx.exibi_professor">
                    </div>
                    <div v-if="idx.exibi_professor == 'Sim'">
                        <div class="form-group">
                            <label>Professores: </label>
                            <multiselect  required  :show-labels="false"   v-model="professor"  placeholder=""   :options="professores"  :taggable="true"  :multiple="true" ></multiselect>
                            <input type="hidden" name="professor[]" v-for="pro of professor" :value="pro">
                        </div>
                    </div>
                    <div class="row justify-content-md-center" >
                        <div class="form-group offset-sm-0 text-center">
                            <div>
                                <input  @change="capa(this);"  style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; z-index: -1;" type="file" multiple accept='image/*' name="capa" id="capa">
                                <label multiple accept='image/*' class="btn btn-primary" for="capa">
                                    <i class="icon icon-cloud-upload" aria-hidden="true"></i>Upload Foto de Capa
                                </lable>
                            </div>
                            <img  :src="[idx.capa ? folder+idx.capa : preview]"  />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Palavras Chave: </label>
                        <textarea class="form-control" v-model="idx.palavras_chave" name="palavras_chave">{{idx.palavras_chave}}</textarea>
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
    const config = {
        height: 500,
        inline: false,
        theme: 'modern',
        language:'pt_BR',
        fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 34px 38px 42px 48px 54px 60px",
        plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help emoticons',
        toolbar1: 'formatselect fontsizeselect | bold italic strikethrough forecolor backcolor link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | emoticons | image | video | preview | toc | charmap | codesample | pagebreak | media | searchreplace | directionality | fullscreen | imagetools ',
        image_advtab: true,
        templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }],
    };
    new Vue({
        el:".card",
        components: { Multiselect: window.VueMultiselect.default },

        data: {
            tempo: ['1 mês', '2 meses', '3 meses', '4 meses', '5 meses', '6 meses', '1 ano', '2 anos', 'Vitalício'],
            config,
            categoria:[],
            categorias: [<?php foreach($categorias as $nome){ echo '"'.$nome['nome'].'",';} ?>],
            exibe: ["Sim", "Não"],
            professor:[],
            professores:[<?php foreach($professores as $nome){ echo '"'.$nome['nome'].'",';} ?>],
            preview:  [],
            folder: "<?php echo ConfigPainel('base_url')."wa/ead/uploads/"; ?>",
            idx:<?php echo $default ?>,
            status:"<?php echo $status ?>",
            ctrls:<?php echo $query ?>
        },
        methods:{
            move: function(a, b){
                this.status = a;
                this.idx = b;
                if(this.status != '0'){
                    this.categoria =JSON.parse(this.idx.categoria);
                    this.professor =JSON.parse(this.idx.professor);
                }
            },
            capa: function(a){
                var input = event.target;
                var reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview = e.target.result;
                        this.idx.capa = "";
                    }
                reader.readAsDataURL(input.files[0]);
            },
            prof: function(a){
                this.idx.exibi_professor = a;
            }
        }
    })
    tinymce.init({
        selector:'textarea',
        language: 'pt_BR',
    });
</script>