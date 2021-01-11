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

<body style="">
    <noscript aria-hidden="true">You need to enable JavaScript to run this app.</noscript>
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
                <button class="MuiButtonBase-root MuiIconButton-root jss32" tabindex="0" type="button"  aria-controls="profile" aria-haspopup="true">
                    <span class="MuiIconButton-label">
                        <div class="MuiBox-root jss37 undefined jss35 jss36" avatar="" name="Vinícius Von Dentz">
                            <span  class="material-icons MuiIcon-root avatar-icon" aria-hidden="true">person</span>
                        </div>
                    </span>
                    <span class="MuiTouchRipple-root"></span>
                </button>
            </div>
            <div class="MuiBox-root jss44 jss43">
                <h6 class="MuiTypography-root title MuiTypography-subtitle2">Cursos</h6>
                <div class="MuiBox-root jss45 jss42">
                    <button class="MuiButtonBase-root MuiIconButton-root view-mode-toggle" tabindex="0" type="button"   title="Visualização em lista">
                        <span class="MuiIconButton-label">
                            <span class="material-icons MuiIcon-root" aria-hidden="true">view_list</span>
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
                <div class="MuiBox-root jss58 content grid">
                    <div class="MuiBox-root jss64 jss59 grid ">
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
    </div>

    <div role="presentation" class="MuiPopover-root jss33" id="profile-menu" aria-hidden="true" style="position: fixed; z-index: 1300; inset: 0px; visibility: hidden;">
        <div tabindex="0" data-test="sentinelStart"></div>
        <div class="MuiPaper-root MuiPopover-paper MuiPaper-elevation8 MuiPaper-rounded" tabindex="-1" style="opacity: 0; transform: scale(0.75, 0.5625); visibility: hidden;">
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
                <p class="MuiTypography-root MuiTypography-body2">Sair</p><span class="MuiTouchRipple-root"></span>
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
                <li class="MuiListItem-root jss146 MuiListItem-gutters">
                    <a  class="MuiTypography-root MuiLink-root MuiLink-underlineNone list-channels-item-link undefined MuiTypography-colorPrimary" href="/dashboard">
                        <div class="MuiListItemIcon-root list-channels-item-icon">
                            <span  class="material-icons MuiIcon-root" aria-hidden="true">dashboard</span>
                        </div>
                        <p class="MuiTypography-root list-channels-item-text MuiTypography-body2">Visão geral</p>
                    </a>
                </li>
                <li class="MuiListItem-root jss146 MuiListItem-gutters Mui-selected jss148">
                    <a class="MuiTypography-root MuiLink-root MuiLink-underlineNone list-channels-item-link undefined MuiTypography-colorPrimary" href="/list">
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
                status: "login",
                idx:<?php echo $db ?>
            }
        });
        val.ver = (a) =>{ val.status = a}
    </script>
    <script src="src/script/main.js"></script> 
</body>

</html>