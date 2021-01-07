<?php 
    $query = json_encode(DBRead('ead_config_geral','*'));
    
    $cod_carrinho  = '<div id="EADCarrinho" ></div>'."\n";
    $cod_carrinho .= '<script type="text/javascript">EADCarrinho();</script>';
    
    $cod_btn_carrinho  = '<div id="EADBtnCarrinho" ></div>'."\n";
    $cod_btn_carrinho .= '<script type="text/javascript">EADBtnCarrinho();</script>';
    
    $cod_checkout  = '<div id="EADCheckout" ></div>'."\n";
    $cod_checkout .= '<script type="text/javascript">EADCheckout();</script>';
    
    $cod_busca_buscador  = '<div id="EADBuscador" ></div>'."\n";
    $cod_busca_buscador .= '<script type="text/javascript">EADBuscador();</script>';
    
    $cod_busca_resultado  = '<div id="EADBuscaResultado" ></div>'."\n";
    $cod_busca_resultado .= '<script type="text/javascript">EADBuscaResultado();</script>';
?>
<div class="card"  >
    <div class="card-header white" >
        <strong>Configuração Geral</strong>
    </div>
    <div class="card-body">
        <form method="post" action="?editaGeral" >
            <button id="btnCopiarCodSite1" class="btn btn-primary btn-xs m-1" onclick="CopiadoCodSite(1)" data-clipboard-text='<?php echo $cod_carrinho; ?>' type="button">
                <i class="icon icon-code"></i> Copiar Código Página Carrinho
            </button>
            
            <button id="btnCopiarCodSite2" class="btn btn-primary btn-xs m-1" onclick="CopiadoCodSite(2)" data-clipboard-text='<?php echo $cod_btn_carrinho; ?>' type="button">
                <i class="icon icon-code"></i> Copiar Código Botão Carrinho
            </button>
            
            <button id="btnCopiarCodSite3" class="btn btn-primary btn-xs m-1" onclick="CopiadoCodSite(3)" data-clipboard-text='<?php echo $cod_checkout; ?>' type="button">
                <i class="icon icon-code"></i> Copiar Código Página Checkout
            </button>
            
            
            <button id="btnCopiarCodSite4" class="btn btn-primary btn-xs m-1" onclick="CopiadoCodSite(4)" data-clipboard-text='<?php echo $cod_busca_buscador; ?>' type="button">
                <i class="icon icon-code"></i> Copiar Código Campo de Busca
            </button>
            
            <button id="btnCopiarCodSite5" class="btn btn-primary btn-xs m-1" onclick="CopiadoCodSite(5)" data-clipboard-text='<?php echo $cod_busca_resultado; ?>' type="button">
                <i class="icon icon-code"></i> Copiar Código Página Resultado Busca
            </button>
            
            <hr/>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pagina_carrinho">Página do Carrinho:</label>
                        <input v-model="idx[0].link_carrinho"  name="link_carrinho" class="form-control" >
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pagina_carrinho">Página do Resultado da Busca:</label>
                        <input v-model="idx[0].link_busca" name="link_busca" class="form-control" >
                    </div>
                </div>
            </div>
      
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pagina_carrinho"> Página do Checkout:</label>
                        <input v-model="idx[0].link_checkout" name="link_checkout" class="form-control" >
                    </div>
                </div>
            </div>
            
            <hr/>
                
            <h4>Configuração Carrinho</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cor Botões:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                          <input v-model="idx[0].carrinho_cor_btn" class="form-control" name="carrinho_cor_btn" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>Cor Botão Finalizar:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].carrinho_cor_btn_finalizar" class="form-control" name="carrinho_cor_btn_finalizar" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>

            <h4>Configuração Botão Carrinho</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor Botão 'Meu Carrinho':</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].icon_carrinho_cor_icon" class="form-control" name="icon_carrinho_cor_icon" >
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
                        <label>Cor Fundo: </label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].icon_carrinho_cor_fundo" class="form-control" name="icon_carrinho_cor_fundo" >
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
                    <label>Cor do Texto:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].icon_carrinho_cor_texto" class="form-control" name="icon_carrinho_cor_texto" >
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
                    <label>Cor do Botão 'Ver Carrinho':</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].icon_carrinho_cor_btn_ver" class="form-control" name="icon_carrinho_cor_btn_ver" >
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
                    <label>Cor Hover do Botão 'Ver Carrinho':</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].icon_carrinho_cor_btn_ver_hover" class="form-control" name="icon_carrinho_cor_btn_ver_hover" >
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
                    <label>Cor do Texto do Botão 'Ver Carrinho':</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].icon_carrinho_cor_btn_ver_texto" class="form-control" name="icon_carrinho_cor_btn_ver_texto" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>

            <h4>Configuração Busca</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Limite de Resultado por Página:</label>
                        <input v-model="idx[0].busca_limite_resultado" type="number" name="busca_limite_resultado" class="form-control" >
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tipo do Botão:</label>
                        <select v-model="idx[0].busca_tipo_btn" name="busca_tipo_btn" class="form-control custom-select">
                            <option value="texto" >Texto</option>
                            <option value="icone" >Ícone</option>
                            <option value="ambos" >Ambos</option>
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tamanho do Botão:</label>
                        <select v-model="idx[0].busca_tamanho_btn" name="busca_tamanho_btn" class="form-control custom-select">
                            <option value="pequeno" >Pequeno</option>
                            <option value="normal" >Normal</option>
                            <option value="grande" >Grande</option>
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cor do Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].busca_cor_btn" class="form-control" name="busca_cor_btn" >
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
                        <label>Cor do Hover do Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].busca_cor_btn_hover" class="form-control" name="busca_cor_btn_hover" >
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
                        <label>Cor do Texto do Botão:</label>
                        <div class="color-picker input-group colorpicker-element focused">
                            <input v-model="idx[0].busca_cor_btn_texto" class="form-control" name="busca_cor_btn_texto" >
                            <span class="input-group-append">
                                <span class="input-group-text add-on white">
                                    <i class="circle"></i>
                                </span>
                            </span>
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
            idx:<?php echo $query ?>
        }
    })
</script>