<?php 
    $query = json_encode(DBRead('ead_config_geral','*')[0]);
    
    $cod = '<iframe onload="frame(this)"  src="'.ConfigPainel('base_url').'wa/ead/login/" ></iframe>';

    
?>
<style>
    .text-center img{
        max-width:50% !important;
    }
</style>

<div class="card"  >
    <div class="card-header white" >
        <strong>Configuração Geral</strong>
    </div>
    <div class="card-body">
        <form method="post" action="?editaGeral" enctype="multipart/form-data">
            <button id="btnCopiarCodSite1" class="btn btn-primary btn-xs m-1" onclick="CopiadoCodSite(1)" data-clipboard-text='<?php echo $cod; ?>' type="button">
                <i class="icon icon-code"></i> Copiar Código de Implementação
            </button>
    
            <hr/>

            <h4>Configuração Login</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor do Fundo:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                          <input v-model="idx.lg_cor_fundo" class="form-control" name="lg_cor_fundo" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Cor Texto Login:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx.lg_cor_texto" class="form-control" name="lg_cor_texto" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor Texto Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                          <input v-model="idx.lg_cor_texto_bt" class="form-control" name="lg_cor_texto_bt" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Cor Texto Hover Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx.lg_cor_texto_hover_bt" class="form-control" name="lg_cor_texto_hover_bt" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor Fundo Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                          <input v-model="idx.lg_cor_fundo_bt" class="form-control" name="lg_cor_fundo_bt" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Cor Fundo Hover Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx.lg_cor_fundo_hover_bt" class="form-control" name="lg_cor_fundo_hover_bt" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Logotipo:</label>
                        <select class="form-control" name="logo" :value="idx.logo">
                            <option v-for="op of opcao">{{op}} </option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6 ">
                    <div class="row justify-content-md-center" >
                        <div class="form-group ">
                            <div>
                                <input  @change="capa(this);"  style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; z-index: -1;" type="file"  multiple accept='image/*' name="img" id="capa">
                                <label multiple accept='image/*' class="btn btn-primary" for="capa">
                                    <i class="icon icon-cloud-upload" aria-hidden="true"></i>Upload Foto de Capa
                                </lable>
                            </div>
                            <img  :src="[idx.img ? folder+idx.img : preview]"  />
                        </div>
                    </div>
                </div>
            </div>
              <!--<hr/>

            <h4>Configurações Área do Cliente</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor do Fundo:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                          <input v-model="idx.ds_cor_fundo" class="form-control" name="ds_cor_fundo" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Cor Título:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx.ds_cor_titulo" class="form-control" name="ds_cor_titulo" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor Descrição:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                          <input v-model="idx.ds_descricao" class="form-control" name="ds_descricao" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Cor Primária:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx.cor_primaria" class="form-control" name="cor_primaria" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor Fundo Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                          <input v-model="idx.cor_secundaria" class="form-control" name="cor_secundaria" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>-->

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
            preview: [],
            folder: "<?php echo ConfigPainel('base_url')."wa/ead/uploads/"; ?>",
            opcao: ['Sim','Não'],
            idx:<?php echo $query ?>
        }, 
        methods: {
            capa: function(a){
                var input = event.target;
                var reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview = e.target.result;
                        this.idx.img = "";
                    }
                reader.readAsDataURL(input.files[0]);
            }
        }
    })
</script>