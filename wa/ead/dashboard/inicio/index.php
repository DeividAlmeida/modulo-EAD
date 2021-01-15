<?php
header('Access-Control-Allow-Origin: *');
session_start();
require_once('../../../../includes/funcoes.php');
require_once('../../../../database/config.database.php');
require_once('../../../../database/config.php');
$id = $_SESSION['Wacontrol'][0];
$senha = $_SESSION['Wacontrol'][1];
$valida = DBRead('ead_usuario','*',"WHERE id = '{$id}' AND  senha = '{$senha}' ")[0];
 if(!empty($valida)){
$config = json_encode(DBRead('ead_config_geral','*'));
$curso = json_encode(DBRead('ead_curso','*'));
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0,minimal-ui">
    <base target="_blank">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,900">
    <link rel="stylesheet" href="<?php echo ConfigPainel('base_url'); ?>wa/ead/dashboard/inicio/src/style/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <?php echo DBRead('ead','*',"WHERE id = '1'")[0]['modo']; ?>

    <link rel="icon" href="https://app.leadlovers.com/content/images/icon.png" data-react-helmet="true">
</head>

<body >
    <div id="root">
        <div class="MuiBox-root jss23 jss22">
            <?php require_once('../menu/horizontal.php'); ?>
            <div v-if="status == 'curso'">
                <div class="MuiBox-root jss44 jss43" >
                    <h6 class="MuiTypography-root title MuiTypography-subtitle2">Cursos</h6>
                    <div class="MuiBox-root jss45 jss42">
                        <button class="MuiButtonBase-root MuiIconButton-root view-mode-toggle" tabindex="0" type="button"  onclick="view(document.getElementById('iview').innerHTML)" title="Visualização em lista">
                            <span class="MuiIconButton-label">
                                <span class="material-icons MuiIcon-root" id="iview"aria-hidden="true">view_list</span>
                            </span>
                            <span class="MuiTouchRipple-root"> </span>
                        </button>
                        <div class="MuiBox-root jss48 jss46 ">
                            <button class="MuiButtonBase-root MuiIconButton-root jss47" tabindex="0" type="button" title="Pesquisar">
                                <span class="MuiIconButton-label">
                                    <span   class="material-icons MuiIcon-root" aria-hidden="true">search</span>
                                </span>
                                <span class="MuiTouchRipple-root">   </span>
                            </button>
                            <div class="MuiBox-root jss49 input-container">
                                <input class="input" type="text" name="search">
                            </div>
                            <button class="MuiButtonBase-root MuiIconButton-root jss47 btn-close" tabindex="0" type="button">
                                <span class="MuiIconButton-label">
                                    <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall"  aria-hidden="true">close</span>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="MuiBox-root jss50 jss41" >
                    <div :class="'MuiBox-root content '+lista" >
                        <div :class="'MuiBox-root jss92 jss87  jss64 jss59 curso '+lista"  @click="acessar(curso.id)" v-for="curso, index of cursos">
                            <a  class="MuiTypography-root MuiLink-root MuiLink-underlineNone img MuiTypography-colorInherit" id="59383" >
                                <img src="https://blob.contato.io/machines-bonus-images/bonus-20191104164653.jpg" alt="">
                            </a>
                                <a class="MuiTypography-root MuiLink-root MuiLink-underlineNone progress MuiTypography-colorInherit" id="59383">
                                <div class="MuiBox-root jss65 progress-bar">
                                    <div class="MuiBox-root jss66 progress-bar-fill"></div>
                                </div>
                            </a>
                            <a class="MuiTypography-root MuiLink-root MuiLink-underlineNone content MuiTypography-colorInherit"  id="59383" >
                                <p class="MuiTypography-root title MuiTypography-body2">{{curso.nome}}</p>
                                <span class="MuiTypography-root instructor MuiTypography-caption">
                                    <span v-for="prof of curso.professor">
                                        <i>{{prof}}</i><br>
                                    </span>
                                </span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div v-if="status == 'geral'">
                <div class="MuiBox-root jss85 jss83">
                    <div class="MuiBox-root jss97 jss86 section progress-container"><span class="MuiTypography-root section-title MuiTypography-overline">Progresso</span>
                        <div class="MuiBox-root jss88 progress-content">
                            <div class="MuiPaper-root MuiAccordion-root jss89 Mui-expanded jss91 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                <div class="MuiButtonBase-root MuiAccordionSummary-root course-header Mui-expanded" tabindex="0" role="button" aria-disabled="false" aria-expanded="true">
                                    <div class="MuiAccordionSummary-content jss92 Mui-expanded">
                                        <div class="MuiButtonBase-root course-header-button" tabindex="0" role="button" aria-disabled="false">
                                            <div class="MuiBox-root jss125 jss123 jss124 course-header-chart" size="48">
                                                <svg viewBox="0 0 36 36" class="chart-circle">
                                                    <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                    <path class="chart-circle-fill is-active false" stroke-dasharray="4 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831">   </path>
                                                </svg>
                                                <span class="chart-text false">4%</span>
                                            </div>
                                            <div class="MuiBox-root jss126 course-header-text-container">
                                                <h6 class="MuiTypography-root course-header-text-title  MuiTypography-subtitle2">Curso de Web Acappella Grid</h6>
                                                <i class="MuiTypography-root course-header-text-teacher MuiTypography-caption">Vinícius Von Dentz</i>
                                            </div>
                                            <span class="material-icons MuiIcon-root course-header-icon-expand" aria-hidden="true">expand_less</span>
                                            <span class="MuiTouchRipple-root"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="MuiCollapse-container MuiCollapse-entered" style="min-height: 0px;">
                                    <div class="MuiCollapse-wrapper">
                                        <div class="MuiCollapse-wrapperInner">
                                            <div role="region">
                                                <div class="MuiAccordionDetails-root course-body">
                                                    <div class="MuiBox-root jss127 course-body-content">
                                                        <label class="MuiTypography-root course-body-list-title MuiTypography-overline">Próxima  aula:</label>
                                                        <div class="MuiBox-root jss133 course-body-list-content next">
                                                            <a class="jss129 next" href="/course/59383/555781">
                                                                <div class="MuiBox-root jss134 lesson-content">
                                                                    <span class="material-icons MuiIcon-root lesson-icon MuiIcon-fontSizeSmall" aria-hidden="true">radio_button_unchecked</span>
                                                                    <div class="MuiBox-root jss135 lesson-text-container">
                                                                        <span class="MuiTypography-root lesson-text-title MuiTypography-caption MuiTypography-noWrap">AULA 2 - TRABALHANDO COM AS BOXES</span>
                                                                    </div>
                                                                    <span class="material-icons MuiIcon-root lesson-infos-icon-go" aria-hidden="true">chevron_right</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="MuiBox-root jss97 jss86 section tabs-container">
                        <div class="MuiTabs-root">
                            <div class="MuiTabs-scroller MuiTabs-fixed" style="overflow: hidden;">
                                <div class="MuiTabs-flexContainer jss84" role="tablist">
                                    <button class="MuiButtonBase-root MuiTab-root MuiTab-textColorPrimary Mui-selected MuiTab-fullWidth" tabindex="0" type="button" role="tab" aria-selected="true" id="dash-tab-0" aria-controls="dash-tabpanel-0" active="0">
                                        <span class="MuiTab-wrapper">
                                            <div class="MuiBox-root jss100 jss98 jss99">
                                                <div class="MuiBox-root jss101 tab-content">
                                                    <span class="MuiTypography-root tab-text MuiTypography-overline">Anotações</span>
                                                </div>
                                            </div>
                                        </span>
                                        <span class="MuiTouchRipple-root"></span>
                                    </button>
                                </div>
                                <span class="jss102 jss103 MuiTabs-indicator" style="left: 0px; width: 100%;"></span>
                            </div>
                        </div>
                        <div class="MuiBox-root jss106 tabs-content">
                            <div class="MuiBox-root jss107 tabs-panel" role="tabpanel" id="dash-tabpanel-0" aria-labelledby="dash-tab-0">
                                <div class="MuiBox-root jss109 jss108">
                                    <p class="MuiTypography-root annotations-message MuiTypography-body2">Você ainda não fez nenhuma anotação</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="presentation" class="MuiPopover-root jss30" id="help-menu" aria-hidden="true" style="position: fixed; z-index: 1300; inset: 0px; visibility: hidden;">
            <div tabindex="0" data-test="sentinelStart"></div>
            <div class="MuiPaper-root MuiPopover-paper MuiPaper-elevation8 MuiPaper-rounded" tabindex="-1" style="opacity: 0; transform: scale(0.75, 0.5625); visibility: hidden;">
                <div class="MuiBox-root jss55 help-email-container">
                    <span class="MuiTypography-root help-email-label MuiTypography-overline">E-mail para ajuda:</span>
                    <a class="MuiTypography-root MuiLink-root MuiLink-underlineHover help-email-link MuiTypography-colorPrimary" href="mailto:contato@wacontrol.com.br">
                        <p class="MuiTypography-root help-email-text MuiTypography-body2">contato@wacontrol.com.br</p>
                    </a>
                </div>
                <hr class="MuiDivider-root">
                <li class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss31 MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button"    tabindex="-1" role="menuitem" aria-disabled="false">
                    <p class="MuiTypography-root help-menu-item-text MuiTypography-body2">Introdução</p>
                    <span class="MuiTouchRipple-root"></span>
                </li>
                <li class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss31 MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button"     tabindex="-1" role="menuitem" aria-disabled="false">
                    <p class="MuiTypography-root help-menu-item-text MuiTypography-body2">Suporte</p>
                    <span class="material-icons MuiIcon-root help-menu-item-icon MuiIcon-fontSizeSmall" aria-hidden="true">launch</span>
                    <span class="MuiTouchRipple-root"></span>
                </li>
            </div>
            <div tabindex="0" data-test="sentinelEnd"></div>
        </div>
        <?php require_once('../menu/vertical.php'); ?>
    </div>
    <script>
        const origin = '<?php echo ConfigPainel('base_url'); ?>';
        const val = new Vue({
            el:"#root",
            data: {
                status: '<?php echo $_GET['status']?>',
                lista: 'grid',
                config:<?php echo $config ?>,
                cursos:<?php echo  $curso ?>
            },
            methods:{
                acessar: function (a) {
                    window.location.href=origin+'wa/ead/dashboard/curso/?posicao=voltar&id='+a
                }
            }
        });
        
    </script>
    <script src="src/script/main.js"></script>
    <script src="../menu/src/script/main.js"></script>
</body>

</html>
<?php } ?>