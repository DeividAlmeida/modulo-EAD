<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../../includes/funcoes.php');
require_once('../../../../database/config.database.php');
require_once('../../../../database/config.php');
session_start();
if(isset($_SESSION['Wacontrol'])){
    $id = $_SESSION['Wacontrol'][0];
    $senha = $_SESSION['Wacontrol'][1];
}
else if(isset($_COOKIE['Wacontroltoken'])){
    $id =  $_COOKIE['Wacontrolid'];
    $senha =  $_COOKIE['Wacontroltoken'];
}
$valida = DBRead('ead_usuario','*',"WHERE id = '{$id}' AND  senha = '{$senha}' ")[0];
 if($valida['senha'] == $senha){

$id_curos = $_GET['id'];
$config = json_encode(DBRead('ead_config_geral','*'));
$curso_at = DBRead('ead_curso','*',"WHERE id = '{$id_curos}'")[0];
$curso = json_encode(DBRead('ead_curso','*'));
$mdls = DBRead('ead_modulo','*',"WHERE curso = '{$id_curos}'");
if(is_array($mdls)){
    foreach($mdls as $ky => $vls){
       $aula[$vls['id']] =  DBRead('ead_aula','*',"WHERE modulo = '{$vls['id']}'");
    }
    $key = count($aula);
    $aulas = json_encode($aula);
}

$modulos = json_encode($mdls);
?>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0,minimal-ui">
    <base target="_blank">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ConfigPainel('base_url'); ?>wa/ead/dashboard/curso/src/style/main.css">
    <?php echo DBRead('ead','*',"WHERE id = '1'")[0]['modo']; ?>
    <title>AULA 2 - TRABALHANDO COM AS BOXES - Curso de Web Acappella Grid</title>
</head>

<body>
    <div id="root">
        <div class="MuiBox-root jss23 jss22">
            <?php require_once('../menu/horizontal.php'); ?>
            <div class="MuiBox-root jss69 jss67">
                <div :class="'MuiBox-root jss70 content false '+main_width">
                    <div class="MuiBox-root jss160 jss71 undefined">
                        <div class="MuiBox-root jss161 btn-icon-right-wrapper">
                            <a  class="MuiButtonBase-root MuiIconButton-root" tabindex="0" role="button"   aria-disabled="false" onclick="curso('voltar')">
                                <span class="MuiIconButton-label">
                                    <span class="material-icons MuiIcon-root" aria-hidden="true">arrow_back</span>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </a>
                        </div>
                        <div class="MuiBox-root jss162 text-title-container">
                            <span class="MuiTypography-root text-title-course MuiTypography-caption MuiTypography-noWrap">Curso <?php echo $curso_at['nome'] ?></span>
                            <h6 class="MuiTypography-root text-title-title MuiTypography-subtitle1 MuiTypography-noWrap">AULA {{idx.tag}} - {{idx.nome}}</h6>
                        </div>
                        <div class="MuiBox-root jss163 pagination">
                            <a onclick="anterior()" class="MuiButtonBase-root MuiIconButton-root pagination-back" tabindex="0" role="button" aria-disabled="false">
                                <span class="MuiIconButton-label">
                                    <span class="material-icons MuiIcon-root" aria-hidden="true">chevron_left</span>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </a>
                            <span  class="MuiTypography-root pagination-text MuiTypography-caption">{{id_aula}}/<?php echo $key+1 ?></span>
                            <a onclick="proximo(<?php echo $key+1 ?>)" class="MuiButtonBase-root MuiIconButton-root pagination-next" tabindex="0" role="button" aria-disabled="false">
                                <span class="MuiIconButton-label">
                                    <span class="material-icons MuiIcon-root" aria-hidden="true">chevron_right</span>
                                </span>
                                <span  class="MuiTouchRipple-root"></span>
                            </a>
                        </div>
                        <button class="MuiButtonBase-root btn-conclusion false" tabindex="0" type="button">
                            <span  class="MuiTypography-root btn-conclusion-text MuiTypography-caption">Marcar como concluída</span>
                            <span class="material-icons MuiIcon-root btn-conclusion-icon"  aria-hidden="true">check_circle</span>
                            <span class="MuiTouchRipple-root"></span>
                        </button>
                    </div>
                    <div  :class="'MuiDrawer-root MuiDrawer-docked jss77 '+nav">
                        <div class="MuiPaper-root MuiDrawer-paper jss78 MuiDrawer-paperAnchorRight MuiDrawer-paperAnchorDockedRight MuiPaper-elevation0" id="jss78" style="transition: all 0.4s ease 0s;">
                            <div class="MuiBox-root jss164 header-bar">
                                <button class="MuiButtonBase-root toggle-side-menu" tabindex="0" onclick="navegar()"  type="button">
                                    <span  class="MuiTypography-root toggle-side-menu-text MuiTypography-caption MuiTypography-noWrap">{{texto}}</span>
                                    <span :class="'material-icons MuiIcon-root toggle-side-menu-icon '+icon"  aria-hidden="true">menu_open</span>
                                    <span class="MuiTouchRipple-root"></span>
                                </button>
                            </div>
                            <div  class="MuiBox-root jss169 modules-container" id="container">
                                <div  v-for="modulo, id of modulos" class="MuiPaper-root MuiAccordion-root jss170 Mui-expanded jss171 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div  @click="navaula(id, modulo.id)" class="MuiButtonBase-root MuiAccordionSummary-root content Mui-expanded jss171" tabindex="0" role="button" aria-disabled="false" aria-expanded="true">
                                        <div class="MuiAccordionSummary-content jss172 Mui-expanded jss171">
                                            <div class="MuiBox-root jss173 progress">
                                                <div class="MuiBox-root jss176 jss174 jss175 undefined" size="32" style="width:32px; height:32">
                                                    <svg  viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                        <path class="chart-circle-fill is-active false" stroke-dasharray="14.285714285714285 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"> </path>
                                                    </svg>
                                                    <span class="chart-text false">1</span>
                                                </div>
                                            </div>
                                            <div class="MuiBox-root jss177 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO {{id+1}} - {{modulo.nome}}</p>
                                                <span class="MuiTypography-root amount MuiTypography-overline">{{aulas[modulo.id].length}} aulas</span>
                                            </div>
                                            <span :id="'arrow'+id" class="material-icons MuiIcon-root icon" aria-hidden="true">keyboard_arrow_down</span>
                                        </div>
                                    </div>
                                    <div :id="'child'+id"  class="MuiCollapse-container MuiCollapse-entered" style="transition: height 0.3s ease 0s; min-height: 0px; height: 0px; visibility:hidden ">
                                        <div class="MuiCollapse-wrapper">
                                            <div class="MuiCollapse-wrapperInner">
                                                <div role="region">
                                                    <div class="MuiAccordionDetails-root content-children" >
                                                        <a @click="pular(licao.tag)" v-for="licao, ident of aulas[modulo.id]" class="MuiButtonBase-root jss205 jss218 resting" :id="+id_aula == licao.tag? 'destaque':'' " tabindex="0" role="button" aria-disabled="false">
                                                            <div class="MuiBox-root jss219 marker">
                                                                <div class="MuiBox-root jss220 marker-circle"></div>
                                                                <div class="MuiBox-root jss221 marker-line" ></div>
                                                            </div>
                                                            <div class="MuiBox-root jss222 title">
                                                                <span class="MuiTypography-root title-text MuiTypography-caption">AULA {{ident+1}} - {{licao.nome}}</span>
                                                            </div>
                                                            <div class="MuiBox-root jss223 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall"  aria-hidden="true"></span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="MuiBox-root jss202 course-progress-container" id="progresso">
                                <div class="MuiBox-root jss203 course-progress-bar">
                                    <div class="MuiBox-root jss204 course-progress-bar-fill"></div>
                                </div>
                                <span class="MuiTypography-root course-progress-text MuiTypography-overline">4% Concluído</span>
                            </div>
                        </div>
                    </div>
                    <div class="MuiBox-root jss79 content-wrapper">
                        <div class="MuiBox-root jss80 content-scrollable ">
                            <div class="MuiBox-root jss83 jss82 container-section" id="content">
                                <div class="MuiBox-root jss159 jss81 light">
                                    <div>{{idx.descricao}}
                                        <video v-if="idx.tipo == 'local'" :src="'<?php echo ConfigPainel('base_url'); ?>wa/ead/uploads/'+idx.video" controls>  
                                            Your browser does not support the video tag.
                                        </video>
                                        <div  v-html="idx.video" v-else>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="MuiBox-root jss103 jss82 container-section" id="notes">
                                <span class="MuiTypography-root section-title MuiTypography-overline">Anotações</span>                                
                                <div class="MuiBox-root jss248 jss100">
                                    <div class="MuiBox-root jss252 jss249 ">
                                        <div class="MuiFormControl-root MuiTextField-root notes-new-input">
                                            <div class="MuiInputBase-root MuiOutlinedInput-root jss250 MuiInputBase-formControl MuiInputBase-multiline MuiOutlinedInput-multiline">
                                                <textarea rows="1" aria-invalid="false" id="notes-new-input" name="annotation"  placeholder="Escreva sua anotação sobre o conteúdo..." class="MuiInputBase-input MuiOutlinedInput-input MuiInputBase-inputMultiline MuiOutlinedInput-inputMultiline" style="height: 20px; overflow: hidden;"></textarea>
                                                <textarea aria-hidden="true" class="MuiInputBase-input MuiOutlinedInput-input MuiInputBase-inputMultiline MuiOutlinedInput-inputMultiline"  readonly="" tabindex="-1" style="visibility: hidden; position: absolute; overflow: hidden; height: 0px; top: 0px; left: 0px; transform: translateZ(0px); width: 892px;"></textarea>
                                                <fieldset aria-hidden="true" class="jss253 MuiOutlinedInput-notchedOutline" style="padding-left: 8px;">
                                                    <legend class="jss254" style="width: 0.01px;">
                                                        <span>&#8203;</span>
                                                    </legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="MuiBox-root jss257 notes-new-actions">
                                            <button class="MuiButtonBase-root MuiButton-root jss251 MuiButton-text MuiButton-textPrimary"  tabindex="0" type="button">
                                                <span class="MuiButton-label">Salvar</span>
                                                <span  class="MuiTouchRipple-root"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php require_once('../menu/vertical.php'); ?>
    </div>
</body>
<script>
    const origin = '<?php echo ConfigPainel('base_url'); ?>';
    const val = new Vue({
        el:"#root",
        data: {
            id_aula: 1,
            idx: <?php echo json_encode($aula[$mdls[0]['id']][0]) ?>,
            nav: 'close', 
            main_width:'without-sidemenu',
            icon: '',
            texto: "Mostrar navegação",
            config:<?php echo $config ?>,
            cursos:<?php echo  $curso ?>,
            modulos:<?php echo  $modulos ?>, 
            aulas:<?php echo  $aulas ?>
        },
        methods:{
            navaula: function(a,b){
                let filho = document.getElementById('child'+a);
                let flecha = document.getElementById('arrow'+a);
                let altura = this.aulas[b].length*48;
                if(filho.style.height == '0px'){ 
                    filho.style.height = altura+'px';
                    filho.style.visibility= 'visible';
                    flecha.innerHTML = 'keyboard_arrow_up';
                }else{ 
                    filho.style.height = '0px';
                    filho.style.visibility= 'hidden';
                    flecha.innerHTML = 'keyboard_arrow_down';
                }
            },
            pular: function(a){
                this.id_aula = a;
                for(let i= 0; i < val.modulos.length; i++){
                    val.aulas[val.modulos[i].id].forEach((a, b)=>{
                         if(val.aulas[val.modulos[i].id][b].tag == this.id_aula){
                            return val.idx = val.aulas[val.modulos[i].id][b];
                        }
                    })
                }
                
            }
            
        }
    });
    window.onload = () => {
        let count = 0;
        for(let i= 0; i < val.modulos.length; i++){
            val.aulas[val.modulos[i].id].forEach((a, b)=>{
                val.aulas[val.modulos[i].id][b].tag = count +=1;
            })
        }
    }
    anterior = () => {
       val.id_aula > 1 ? val.id_aula = val.id_aula - 1: val.id_aula = val.id_aula ;
        for(let i= 0; i < val.modulos.length; i++){
            val.aulas[val.modulos[i].id].forEach((a, b)=>{
                 if(val.aulas[val.modulos[i].id][b].tag == val.id_aula){
                    return val.idx = val.aulas[val.modulos[i].id][b];
                }
            })
        }
    }; 
    proximo = (a) => {
       val.id_aula < a ? val.id_aula = val.id_aula + 1: val.id_aula = val.id_aula ;
        for(let i= 0; i < val.modulos.length; i++){
            val.aulas[val.modulos[i].id].forEach((a, b)=>{
                 if(val.aulas[val.modulos[i].id][b].tag == val.id_aula){
                    return val.idx = val.aulas[val.modulos[i].id][b];
                }
            })
        }
    }
</script>
<script src="../menu/src/script/main.js"></script>
<script src="src/script/main.js"></script>
</html>
<?php } ?>