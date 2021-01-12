<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../../includes/funcoes.php');
require_once('../../../../database/config.database.php');
require_once('../../../../database/config.php');
$db = json_encode(DBRead('ead_config_geral','*'));
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
            <div class="MuiBox-root jss27 jss26 app-toolbar">
                <button class="MuiButtonBase-root MuiIconButton-root icon-toolbar menu" onclick="abrir()" tabindex="0" type="button">
                    <span class="MuiIconButton-label">
                        <span class="material-icons MuiIcon-root" aria-hidden="true">menu</span>
                    </span>
                    <span class="MuiTouchRipple-root"></span>
                </button>
                <a class="logo-toolbar" href="/">
                    <img  src="https://llbr.blob.core.windows.net/machine-user-images/Logotipo-Curso-de-Web-Acappella-vermelho.png"  alt="">
                </a>
                <button class="MuiButtonBase-root MuiIconButton-root icon-toolbar MuiIconButton-sizeSmall" tabindex="0" type="button">
                    <span class="MuiIconButton-label">
                        <span class="material-icons MuiIcon-root"  aria-hidden="true">help_outline</span>
                    </span>
                    <span class="MuiTouchRipple-root"></span>
                </button>
                <button class="MuiButtonBase-root MuiIconButton-root jss32" tabindex="0" type="button"  aria-controls="profile" aria-haspopup="true" onclick="perfil()">
                    <span class="MuiIconButton-label">
                        <div class="MuiBox-root jss37 undefined jss35 jss36" avatar="" name="Vinícius Von Dentz">
                            <span  class="material-icons MuiIcon-root avatar-icon" aria-hidden="true">person</span>
                        </div>
                    </span>
                    <span class="MuiTouchRipple-root"></span>
                </button>
            </div>
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
                <div class="MuiBox-root jss50 jss41">
                    <div :class="'MuiBox-root jss58 content '+lista">
                        
                        <div :class="'MuiBox-root jss64 jss59 curso '+lista">
                            <a  class="MuiTypography-root MuiLink-root MuiLink-underlineNone img MuiTypography-colorInherit" id="59383" href="/course/59383/">
                                <img src="https://blob.contato.io/machines-bonus-images/bonus-20191104164653.jpg" alt="">
                            </a>
                                <a class="MuiTypography-root MuiLink-root MuiLink-underlineNone progress MuiTypography-colorInherit" id="59383" href="/course/59383/">
                                <div class="MuiBox-root jss65 progress-bar">
                                    <div class="MuiBox-root jss66 progress-bar-fill"></div>
                                </div>
                            </a>
                            <a class="MuiTypography-root MuiLink-root MuiLink-underlineNone content MuiTypography-colorInherit"  id="59383" href="/course/59383/">
                                <p class="MuiTypography-root title MuiTypography-body2">Curso de Web Acappella Grid</p>
                                <span class="MuiTypography-root instructor MuiTypography-caption">
                                    <i>Vinícius Von  Dentz</i>
                                </span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div v-if="status == 'geral'">
                <div class="MuiBox-root jss85 jss83">
                    <div class="MuiBox-root jss87 jss86 section progress-container"><span class="MuiTypography-root section-title MuiTypography-overline">Progresso</span>
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
    
        <div role="presentation" class="MuiPopover-root jss33" id="profile-menu" onclick="perfil_menu()" aria-hidden="true" style="position: fixed; z-index: 1300; inset: 0px; visibility: hidden;">
            <div tabindex="0" data-test="sentinelStart"></div>
            <div class="MuiPaper-root MuiPopover-paper MuiPaper-elevation8 MuiPaper-rounded" id="profile" tabindex="-1" style="opacity: 1; transform: none; transition: opacity 287ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, transform 191ms cubic-bezier(0.4, 0, 0.2, 1) 0ms; top: 46px; left: 75%; transform-origin: 260px 6px; visibility: hidden;">
                
                <div class="MuiBox-root jss38 profile-infos">
                    <div class="MuiBox-root jss40 profile-infos-avatar jss35 jss39" avatar="" name="Vinícius Von Dentz">
                        <span class="material-icons MuiIcon-root avatar-icon" aria-hidden="true">person</span>
                    </div>
                    <p class="MuiTypography-root profile-infos-name MuiTypography-body2">
                        <b>Vinícius Von Dentz</b>
                    </p>
                    <span  class="MuiTypography-root profile-infos-email MuiTypography-caption">viniciusvondentz@gmail.com</span>
                </div>
                
                <hr class="MuiDivider-root">
                <a class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss34 profile-menu-item MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button"  tabindex="-1" role="menuitem" aria-disabled="false" href="/profile">
                    <span  class="material-icons MuiIcon-root profile-menu-item-icon" aria-hidden="true">assignment_ind</span>
                    <p class="MuiTypography-root MuiTypography-body2">Minha Conta</p>
                    <span  class="MuiTouchRipple-root"></span>
                </a>
                <li class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss34 profile-menu-item MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button"   tabindex="-1" role="menuitem" aria-disabled="false">
                    <span class="material-icons MuiIcon-root profile-menu-item-icon" aria-hidden="true">exit_to_app</span>
                    <p class="MuiTypography-root MuiTypography-body2">Sair</p>
                    <span class="MuiTouchRipple-root"></span>
                </li>
            </div>
            <div tabindex="0" data-test="sentinelEnd"></div>
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
    </div>
    <!--Menu-->

    <div role="presentation" class="MuiDrawer-root MuiDrawer-modal" id="menu" style="position: fixed; z-index: 1100; inset: 0px; display:none; transition: 0.8s;">
        <div class="MuiBackdrop-root" onclick="esconder()" i aria-hidden="true" style="opacity: 1; transition: opacity 225ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;"> </div>
        <div tabindex="0" data-test="sentinelStart"></div>       
    </div>   
    <div class="MuiPaper-root MuiDrawer-paper MuiDrawer-paperAnchorLeft MuiPaper-elevation16" tabindex="-1" id="back" style="transition: 0.5s; width:0">
        <div class="MuiBox-root jss143 jss63">
            <div class="MuiBox-root jss144 header-container">
                <button class="MuiButtonBase-root MuiIconButton-root header-close" tabindex="0" type="button" onclick="esconder()">
                    <span class="MuiIconButton-label">
                        <span class="material-icons MuiIcon-root" aria-hidden="true">close</span>
                    </span>
                    <span class="MuiTouchRipple-root"></span>
                </button>
                <div class="MuiBox-root jss145 header-logo-container">
                    <img  src="https://llbr.blob.core.windows.net/machine-user-images/Logotipo-Curso-de-Web-Acappella-vermelho.png" alt="" class="header-logo-img">
                </div>
            </div>
            <ul class="MuiList-root list-channels-container MuiList-padding">
                <li class="MuiListItem-root jss146 MuiListItem-gutters" onclick="geral()">
                    <a  class="MuiTypography-root MuiLink-root MuiLink-underlineNone list-channels-item-link undefined MuiTypography-colorPrimary" >
                        <div class="MuiListItemIcon-root list-channels-item-icon">
                            <span  class="material-icons MuiIcon-root" aria-hidden="true">dashboard</span>
                        </div>
                        <p class="MuiTypography-root list-channels-item-text MuiTypography-body2">Visão geral</p>
                    </a>
                </li>
                <li class="MuiListItem-root jss146 MuiListItem-gutters jss148" onclick="curso()">
                    <a class="MuiTypography-root MuiLink-root MuiLink-underlineNone list-channels-item-link undefined MuiTypography-colorPrimary" >
                        <div class="MuiListItemIcon-root list-channels-item-icon">
                            <span  class="material-icons MuiIcon-root" aria-hidden="true">dvr</span>
                        </div>
                        <p class="MuiTypography-root list-channels-item-text MuiTypography-body2">Cursos</p>
                    </a>
                </li>
            </ul>
            <span class="MuiTypography-root list-title MuiTypography-overline">Meus treinamentos</span>
            <ul class="MuiList-root list-courses-container MuiList-padding">
                <li class="MuiListItem-root jss149  MuiListItem-gutters">
                    <a class="MuiTypography-root MuiLink-root MuiLink-underlineNone list-courses-item-link MuiTypography-colorPrimary"  href="/course/59383/">
                        <div class="MuiListItemIcon-root list-courses-item-icon">
                            <img src="https://blob.contato.io/machines-bonus-images/bonus-20191104164653.jpg" alt="Curso de Web Acappella Grid">
                        </div>
                        <span  class="MuiTypography-root list-courses-item-text MuiTypography-caption">Curso de Web Acappella Grid</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div tabindex="0" data-test="sentinelEnd"></div>
    </div>
    <script>
        const val = new Vue({
            el:"#root",
            data: {
                status: "curso",
                lista: "grid",
                idx:<?php echo $db ?>
            }
        });
    </script>
    <script src="src/script/main.js"></script> 
</body>

</html>