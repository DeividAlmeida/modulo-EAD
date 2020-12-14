<?php require_once('includes/_epack.php'); ?>
<?php $uniqid = uniqid(); ?>
<style type="text/css">
  [class*="tc-member-"] img {width: 100%;}
  .tc-member-style1 {box-shadow: 0 10px 40px 0 rgba(0, 0, 0, 0.08);-webkit-transform: translateY(0);transform: translateY(0);-webkit-transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);}
  .tc-member-style1 .member-photo {position: relative;}
  .tc-member-style1 .member-icons {position: absolute;bottom: 0;background: rgba(255,255,255,0.1);width: 100%;padding: 7px 10px;left: 0;}
  .tc-member-style1 .member-light .member-icons {background: rgba(0,0,0,0.4);}
  .tc-member-style1 .member-icon i {font-size: 11px;color: <?php echo $categoria['cor_icone']; ?>;margin: 0 6px;height: 26px;border: 1px solid <?php echo $categoria['cor_borda']; ?>;width: 26px;line-height: 26px;text-align: center;border-radius: 50%;background: transparent;-webkit-transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);transition: all .25s cubic-bezier(0.43, 0.44, 0.63, 0.61);}
  .tc-member-style1 .member-icon i:hover {color: <?php echo $categoria['cor_hover_icone']; ?> !important;}
  .tc-member-style1 .member-info {padding: 20px 20px;}
  .tc-member-style1 .member-name {font-size: 18px;margin: 0;}
  .tc-member-style1 span.member-role {font-size: 12px;color: #999;display: block;}
  .tc-member-style1:hover { animation: tc-shake 0.5s;animation-iteration-count: 0.1s;}
  .tc-member-style1 .member-icon i:hover {background: <?php echo $categoria['cor_hover_botao']; ?>;color: #444;}
  .tc-member-style1 .member-align-right {text-align: right;}
  .tc-member-style1 .member-align-center {text-align: center;}
 
  <?php if($categoria['efeito_hover'] === 'Não'){echo "/*";}?>
  .member-align-center:hover {-webkit-box-shadow: -600px 0px 0 <?php echo $categoria['cor_icone']; ?> inset !important;-moz-box-shadow: -600px 0px 0 <?php echo $categoria['cor_icone']; ?> inset !important;box-shadow: -600px 0px 0 <?php echo $categoria['cor_icone']; ?> inset !important;}
  button :hover {background-color: <?php echo $categoria['cor_hover_icone']; ?> !important; color: <?php echo $categoria['cor_hover_txt']; ?>;border-radius: 20px;}
.fds:focus,.fds:hover {color:<?php echo $categoria['cor_hover_txt']; ?> !important; text-decoration: underline;}
.zxc:hover {transition-delay: 2s; background-color: <?php echo $categoria['cor_icone']; ?> !important;  }
#zxc:hover {transition-delay: 2s; background-color: <?php echo $categoria['cor_icone']; ?> !important;  }
.member-icon:hover {transition-delay: 2s; background-color: <?php echo $categoria['cor_icone']; ?> !important;}
 .member-photo:hover {background-color: <?php echo $categoria['cor_borda']; ?> !important; border-radius: 100%; }
*/</style>

                                                <!--  ALL -->
<section  style="background-color: transparent;padding: 100px 0;" class="wow <?php echo $categoria['efeito']; ?> sec-spacer sec-color">
  <div class="col-md-12">
    <div class="row">
      <?php foreach ($itens as $i): ?>
        <?php $social = json_decode($i['social'], true); ?>
      <div class="col-sm-<?php echo (12/$categoria['colunas']); ?> "  style="<?php if ($i['featured'] === 'margin-top: 25%'){echo "margin-top: -3%"; }?>;padding-bottom: 40px;" > 
        <div class="member-align-center  <?php if($categoria['efeito_hover'] === 'Sim'){echo "tc-member-style1";}?>" id="fds"  style="background-color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_bg_ft'];}else{echo $categoria['cor_botao']; }?>;margin-bottom: 33px;-webkit-box-shadow: 0 2px 7px 0px rgba(0, 0, 0, 0.1);-webkit-transition-duration: 0.5s;-webkit-transition-timing-function: linear;-moz-box-shadow: 0 2px 7px 0px rgba(0, 0, 0, 0.1);-moz-transition-duration: 0.5s;-moz-transition-timing-function: linear;transition-timing-function: linear;
        transition-duration: 0.5s;min-height: 300px;box-shadow: 0 0 1px #ccc;box-shadow: 0px 0 0 #fff inset;">

                                                    <!--  HEAD -->
            <center> <div style="min-height: 130px;"><div class="badge" style="position: absolute; top: 0;left: 50%;padding: 4px 8px;background-color:<?php echo $i['cor_tg_ft'];?>;color: <?php echo $i['cor_txt_tg_ft'];?>; border-radius: 0 0 5px 5px;font-size: 11px;-webkit-transform: translateX(-50%);transform: translateX(-50%);<?php if ($i['featured'] === 'margin-top: 25%'){}else{echo "display: none"; }?>"><?php echo $i['tg_txt']; ?></div><br><br>
                    

              <h1 class="member-name" style=" color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_txt_ft'];}else{echo $categoria['cor_titulo']; }?>; font-size: 28px;letter-spacing: 1px ;position: relative; "><?php echo $i['titulo']; ?>           
                    </h1><br>
                <div class="member-photo" style=" border-radius: 100%;background-color:<?php echo $categoria['cor_bg_botao']; ?>;-webkit-box-shadow: 0 2px 7px 0px rgba(0, 0, 0, 0.1);box-shadow: 0 2px 7px 0px rgba(0, 0, 0, 0.1);width: 150px;height: 150px; ">
                    <div style="width: 150px;height: 150px; "><div class="badge" style="position: absolute; top: 0;left: 50%;padding: 4px 8px;background: #fff;color: #34495e;border-radius: 0 0 5px 5px;font-size: 11px;-webkit-transform: translateX(-50%);transform: translateX(-50%);display: none;>"> 
                    </div><br>
                    
                    <span class="member-role" style="color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_txt_ft'];}else{echo $categoria['cor_subtitulo']; }?>; margin-top: 1%;display: block;font-size: 26px; line-height: normal;font-weight: 600;margin-top: 15%;width: 90%;"><?php echo $i['subtitulo']; ?></span><span class="duration" style="color: <?php if ($i['featured'] === 'margin-top: 25%'){ echo $i['cor_txt_ft'];}else{echo $categoria['cor_subtitulo']; }?>;    display: block;font-size: 11px;margin-top: 0px;color: "><?php echo $i['auxiliar'];?></span>
                        </div>
                </div>
            </center>
                                                        <!-- BODY -->
            <div  class="member-info" style="background-color: transparent; min-height: 100px; height: auto;">
              <?php foreach($social as $s): ?> 
                <ul  class="member-icon" style="text-decoration: none; position: relative; color: <?php if ($i['featured'] === 'margin-top: 25%'){echo $i['cor_txt_ft']; }else{echo $categoria['cor_bg'];}?>; font-size: 12px; padding: 0; text-align: center; margin-top: 8%;  "><li id="zxc" style=" position: relative; display: inline-block; white-space: nowrap;"  class="<?php echo $s['icon_social']; ?>"></li>
                     <li class="zxc" style="  list-style-type: none; display: inline-block;  overflow-wrap: break-word; background-color: transparent; " > <?php echo $s['link']; ?> </li> 
                              
                </ul>
                    <?php endforeach; ?>
            </div>
            
                                                       <!--  FOOTER -->
      <center style="<?php echo $i['featured'];?>;background-color:transparent;<?php $av = $i['txt_bt']; $bv = strlen($av); if ( $bv < 1){ echo "visibility:hidden"; }; ?>
      ">
        <button  type="button"   class="button.list-group-item" style="margin: 10%;background-color: <?php echo $categoria['cor_hover_botao']; ?>; padding: 0px; border-color: <?php echo $categoria['cor_hover_botao']; ?>; border: 1px solid <?php echo $categoria['cor_hover_icone']; ?>;border-radius: 20px;" >
                <a <?php if ($i['guia'] === "Sim"){echo "target='_blank'";}?> href="<?php echo $i['bt_link'];?>" class="fds" style="display: inline-block;line-height: normal; font-size: 13px; min-width: 130px; text-transform: uppercase; text-decoration: none;-webkit-transition: .3s all ease; transition: .3s all ease; padding: 10px 20px 7px 20px; color:<?php echo $categoria['cor_bg_titulo']; ?>; "> <?php echo $i['txt_bt'];?>
                </a>
          </button>
      </center>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
  