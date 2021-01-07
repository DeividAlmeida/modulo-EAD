<?php
if(isset($_GET['editaGeral'])){
  $data = array(
      
        #CARRINHO
    'carrinho_cor_btn'                  => post('carrinho_cor_btn'),
    'carrinho_cor_btn_finalizar'        => post('carrinho_cor_btn_finalizar'),
    
        #ICON CARINHO  MENU
    'icon_carrinho_cor_icon'            => post('icon_carrinho_cor_icon'),
    'icon_carrinho_cor_fundo'           => post('icon_carrinho_cor_fundo'),
    'icon_carrinho_cor_texto'           => post('icon_carrinho_cor_texto'),
    'icon_carrinho_cor_btn_ver'         => post('icon_carrinho_cor_btn_ver'),
    'icon_carrinho_cor_btn_ver_texto'   => post('icon_carrinho_cor_btn_ver_texto'),
    'icon_carrinho_cor_btn_ver_hover'   => post('icon_carrinho_cor_btn_ver_hover'),
    
        #LINK DO CARRINHO
    'link_carrinho'                     => post('link_carrinho'),
    
        #BUSCA
    'busca_limite_resultado'            => post('busca_limite_resultado'),
    'busca_tipo_btn'                    => post('busca_tipo_btn'),
    'busca_tamanho_btn'                 => post('busca_tamanho_btn'),
    'busca_cor_btn'                     => post('busca_cor_btn'),
    'busca_cor_btn_hover'               => post('busca_cor_btn_hover'),
    'busca_cor_btn_texto'               => post('busca_cor_btn_texto'),
    
        #LINK DO RESULTADO DA BUSCA
    'link_busca'                        => post('link_busca'),
    
        #LINK CHECKOUT
    'link_checkout'                     => post('link_checkout')
);
  $query  = DBUpdate('ead_config_geral', $data, "id = '1'");
    if ($query != 0) {
        Redireciona('?sucesso');
      } else {
        Redireciona('?erro');
      }
}