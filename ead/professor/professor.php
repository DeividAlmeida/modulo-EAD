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
<link rel="stylesheet" href="ead/professor/style.css">
<style>
        .custom-shadow {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.custom-shadow-sm {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

/* In FontawesomePicker.vue <style scoped lang="scss" /> */
.icon-preview-fade-enter-active, .icon-preview-fade-leave-active {
  -webkit-transition: opacity .25s;
  transition: opacity .25s;
}

.icon-preview-fade-enter, .icon-preview-fade-leave-to {
  opacity: 0;
}

.preview-container {
  width: 300px;
  height:150px;
  position:absolute;
  z-index:1;
}

.previewer {
  width: 100%;
  min-height: 50px;
  height: 200px;
  overflow: auto;
  background: white;
  top: 10px;
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
          flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-around;
  -webkit-box-align: center;
          align-items: center;
  -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.icon-preview {
  width: 15;
  padding-top: 20%;
  position: relative;
}
@media (max-width: 800px) {
  .icon-preview {
    width: 33%;
    padding-top: 33%;
  }
}
.icon-preview .icon-wrapper {
  position: absolute;
  height: 80%;
  width: 80%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
          justify-content: center;
  -webkit-box-align: center;
          align-items: center;
  cursor: pointer;
  -webkit-transition: ease-in-out all .25s;
  transition: ease-in-out all .25s;
}
.icon-preview .icon-wrapper:hover, .icon-preview .icon-wrapper.selected {
  background: var(--blue);
  color: #fbfbfb;
}
.icon-preview .icon-wrapper i {
  font-size: 2vw;
}


</style>
<form method="post" action="?prof=<?php echo $status;?>" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header  white" >
            
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
                                <div class="col-md-12"><button type="button" @click="add" class="btn btn-primary btnAdd" style="margin-bottom: 15px;"><i class="fas fa-plus"></i></button></div>
                            </div>
                            
                            <div class="row" v-for="field in fields">
                                <div class="col" v-if="field.status == true">
                                    <fontawesome-picker  v-model="field.icon"></fontawesome-picker>
                                </div>        
                                <div class="col-md-10" v-if="field.status == true">
                                    <input class="form-control" type="text" name="link[]"  v-model="field.link" placeholder="Texto Conteúdo">
                                </div>                                
                                <div class="col-md-1 pull-right" v-if="field.status == true">
                                    <button type="button" @click="remove" class="btn btn-danger btnRemove"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    
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
    </div>                
</form>
<?php require_once('includes/footer.php'); ?>


<script type="text/javascript">
<?php require_once('ead/src/icon_picker.php'); ?>
new Vue({
    el: ".card",
      components: { 'fontawesome-picker': FontawesomePicker },
      
    data: {
         fields: [{"icon":"fab fa-500px","status":true},{"icon":"fab fa-500px","status":false}],
        ctrls: [<?php echo $parametro ?>]
    },
    methods: {
        add: function(a){
            this.fields.push({"link":"", "icon":"","status":true})
        },
        remove: function(){
            this.fields.status == false;
        }
    }
})
</script>
<script type="text/javascript">


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