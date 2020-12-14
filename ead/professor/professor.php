    <?php $status = $_GET['routeProf']; 
    if($status==0){ 
        $parametro = "{}"; 
    }else{
        $conect = DBRead('ead_prof','*' ,"WHERE id = '{$status}'")[0];
        $parametro = json_encode($conect);
        $icons= json_decode($conect['redes'], true);
    } ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css" integrity="sha512-0SX0Pen2FCs00cKFFb4q3GLyh3RNiuuLjKJJD56/Lr1WcsEV8sOtMSUftHsR6yC9xHRV7aS0l8ds7GVg6Xod0A==" crossorigin="anonymous" />
<form method="post" action="?prof=<?php echo $status;?>" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header  white">
            <strong>Adcionar Professor</strong>
        </div>
        <div class="card-body" v-for="ctrl in ctrls">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nome: </label>
                        <input class="form-control" v-model="ctrl.nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label>Cargo: </label>
                        <input class="form-control" v-model="ctrl.cargo" name="cargo" required>
                    </div>
                    <div class="form-group" >
                        <label>Rede Social: <i class="icon icon-question-circle" data-toggle="tooltip" data-placement="right" ></i></label>
                        <div id="input_group">
                            <div class="row">
                                <div class="col-md-12"><button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 15px;"><i class="fas fa-plus"></i></button></div>
                            </div>
                            <?php if($status !=0){foreach($icons as $icon){?>
                            <div class="row groupItens">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <div class="input-group iconinput">
                                            <span class="input-group-btn">
                                                <button name="icon_social[]" type="button" class="btn btn-default target" data-icon="<?php echo $icon['icon_social']; ?>" role="iconpicker" data-selected-class="btn-success" data-search-text="Pesquisar" data-label-footer="{0} - {1} de {2} ícones" data-rows="5" data-cols="10" data-arrow-class="btn-default" data-arrow-prev-icon-class="fa fa-angle-left" data-arrow-next-icon-class="fa fa-angle-right" data-iconset-version="5.3.1" data-iconset="fontawesome5"></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="link[]" value="<?php echo $icon['link']; ?>" placeholder="Texto Conteúdo">
                                </div>                                
                                <div class="col-md-1 pull-right">
                                    <button type="button" class="btn btn-danger btnRemove"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php }}else{ ?> 
                        <div class="row groupItens">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="input-group iconinput">
                                        <span class="input-group-btn">
                                            <button name="icon_social[]" type="button" class="btn btn-default target" data-icon="" role="iconpicker" data-selected-class="btn-success" data-search-text="Pesquisar" data-label-footer="{0} - {1} de {2} ícones" data-rows="5" data-cols="10" data-arrow-class="btn-default" data-arrow-prev-icon-class="fa fa-angle-left" data-arrow-next-icon-class="fa fa-angle-right" data-iconset-version="5.3.1" data-iconset="fontawesome5"></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="link[]"  placeholder="Texto Conteúdo">
                            </div>                                
                            <div class="col-md-1 pull-right">
                                <button type="button" class="btn btn-danger btnRemove"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row justify-content-md-center">
                        <div class="form-group offset-sm-1 text-center"><br>
                            <div>
                                <input onchange="readURL(this);"  style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; z-index: -1;" type="file" multiple accept='image/*' name="imagem" id="imagem">
                                <label multiple accept='image/*' class="btn btn-primary" for="imagem">
                                    <i class="icon icon-cloud-upload" aria-hidden="true"></i>Upload Foto
                                </lable>
                            </div>
                            <span id="preview"></span>
                            <span id="orie" ></span>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
        <div class="card-footer white">
            <button style="margin-bottom: 7px;" class="btn btn-primary float-right" type="submit">Salvar</button>
        </div>
    </div>                
</form>

<?php require_once('includes/footer.php'); ?>
<script src="css_js/jquery.multifield.min.js"></script>
<script type="text/javascript" src="assets/plugins/iconpicker/bootstrap-iconpicker.bundle.min.js"></script>

<script type="text/javascript">

new Vue({
    el: ".card",
    data: {
        
        ctrls: [<?php echo $parametro ?>]
    }
})

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$('.target').iconpicker();
});

$('#input_group').multifield({
    section: '.groupItens',
    btnAdd:'.btnAdd',
    btnRemove:'.btnRemove',
    locale:{
      "multiField": {
        "messages": {
          "removeConfirmation": "Deseja realmente remover estes campos?"
        }
      }
    }
  });

$('.btnAdd').on( "click", function(e) {
setTimeout(function(){
  $('.target').iconpicker(); 
}, 0);
});
let decide = document.getElementById('preview');
<?php if($status != 0 && !empty($conect['img'])){ ?>
    decide.innerHTML = '<img id="blah"  src="<?php echo ConfigPainel('base_url')."wa/ead/uploads/".$conect['img']; ?>" />'
<?php }else{ ?>
    decide.innerHTML = "Sua foto deve ter as mesmas dimensões de largura e altura";
<?php } ?>
    function readURL(input) {
        if (input.files && input.files[0]) {
            document.getElementById("orie").style.display = "none";
            var reader = new FileReader();

            reader.onload = function (e) {
                decide.innerHTML = '<img id="blah"  src="'+e.target.result+'"/>'
            };

            reader.readAsDataURL(input.files[0]);
        }
        
    }
  </script>
