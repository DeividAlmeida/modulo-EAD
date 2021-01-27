<?php 
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$db = json_encode(DBRead('ead_config_geral','*'));
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
if(!empty($valida)){header('Location:'.ConfigPainel('base_url').'wa/ead/dashboard/inicio/index.php?status=curso&posicao=avancar');}
?>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
        <base target="_blank">
        <title>Login - Curso de Web Acappella</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo ConfigPainel('base_url'); ?>wa/ead/cadastro/src/style/main.css">
        <?php echo DBRead('ead','*',"WHERE id = '1'")[0]['modo']; ?>
    </head>

<body style="margin:0 !important">
    <div id="root">
        <div class="MuiBox-root jss23 jss22">
            <div class="MuiBox-root jss42 jss41 app-toolbar">
                <a class="logo-toolbar" href="/">
                    <img src="https://llbr.blob.core.windows.net/machine-user-images/Logotipo-Curso-de-Web-Acappella-vermelho.png" alt="">
                </a>
                <button  class="MuiButtonBase-root MuiIconButton-root icon-toolbar MuiIconButton-sizeSmall" tabindex="0"  type="button">
                    <span class="MuiIconButton-label">
                        <span class="material-icons MuiIcon-root" aria-hidden="true">help_outline</span>
                    </span>
                    <span class="MuiTouchRipple-root"></span>
                </button>
            </div>
            <div class="MuiBox-root jss83 jss82">
                <div class="MuiBox-root jss84 content">
                    <div class="MuiBox-root jss86 jss85 account-data-container">
                        <span class="MuiTypography-root section-title MuiTypography-overline">Dados da conta</span>
                        <div class="MuiBox-root jss87 account-data-content">
                            <div class="MuiBox-root jss88 account-data-avatar-container">
                                <label style="cursor: pointer" multiple accept='image/*' for="avatar-input" class="MuiBox-root jss90 jss89">
                                    <div  class="MuiBox-root jss91 avatar-wrapper">
                                        
                                            <div class="MuiBox-root jss93 undefined jss50 jss92">
                                                <span v-if="avatar ==''"  class="material-icons MuiIcon-root avatar-icon" style="font-size:50px" aria-hidden="true">person</span>
                                                <img  v-if="avatar !=''"  :src="avatar">
                                            </div>
                                            <span class="MuiTouchRipple-root"></span>
                                     <input onchange="readURL(this)" id="avatar-input" type="file" multiple accept='image/*' name="imagem">
                                    </div>
                                </lable >
                            </div>
                            <div class="MuiBox-root jss94 account-area account-data-inputs-container">
                                <div class="MuiBox-root jss95 input-container name">
                                    <div class="MuiFormControl-root MuiTextField-root input">
                                        <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink MuiInputLabel-outlined MuiFormLabel-filled" data-shrink="true" for="name" id="name-label">Nome</label>
                                        <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                            <input aria-invalid="false" id="name" type="text" class="MuiInputBase-input MuiOutlinedInput-input"  value="Vinícius Von Dentz">
                                            <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                <legend class="jss98 jss99">
                                                    <span>Nome</span>
                                                </legend>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="MuiBox-root jss106 account-password-new-container">
                                    <div class="MuiBox-root jss107 input-container new-password" id="metade">
                                        <div class="MuiFormControl-root MuiTextField-root input">
                                            <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink MuiInputLabel-outlined MuiFormLabel-filled" data-shrink="true" for="name" id="name-label">CPF</label>
                                            <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                                <input aria-invalid="false" id="name" type="text" class="MuiInputBase-input MuiOutlinedInput-input"  value="Vinícius Von Dentz">
                                                <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                    <legend class="jss98 jss99">
                                                        <span>CPF</span>
                                                    </legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="MuiBox-root jss108 input-container new-password-confirm" id="metade">
                                        <div class="MuiFormControl-root MuiTextField-root input">
                                            <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink MuiInputLabel-outlined MuiFormLabel-filled" data-shrink="true" for="name" id="name-label">Data de Nascimento</label>
                                            <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                                <input aria-invalid="false" id="name" type="text" class="MuiInputBase-input MuiOutlinedInput-input"  value="Vinícius Von Dentz">
                                                <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                    <legend class="jss98 jss99">
                                                        <span>Data de Nascimento</span>
                                                    </legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="MuiBox-root jss95 input-container email">
                                    <div class="MuiFormControl-root MuiTextField-root input">
                                        <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink MuiInputLabel-outlined MuiFormLabel-filled" data-shrink="true" for="name" id="name-label">E-mail</label>
                                        <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                            <input aria-invalid="false" id="email" type="email" class="MuiInputBase-input MuiOutlinedInput-input"  value="Vinícius Von Dentz">
                                            <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                <legend class="jss98 jss99">
                                                    <span>E-mail</span>
                                                </legend>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="MuiBox-root jss95 input-container Endereço">
                                    <div class="MuiFormControl-root MuiTextField-root input">
                                        <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink MuiInputLabel-outlined MuiFormLabel-filled" data-shrink="true" for="name" id="name-label">Endereço</label>
                                        <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                            <input aria-invalid="false" id="Endereço" type="text" class="MuiInputBase-input MuiOutlinedInput-input"  value="Vinícius Von Dentz">
                                            <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                <legend class="jss98 jss99">
                                                    <span>Endereço</span>
                                                </legend>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="MuiBox-root jss106 account-password-new-container">
                                    <div class="MuiBox-root jss107 input-container new-password" id="metade">
                                        <div class="MuiFormControl-root MuiTextField-root input">
                                            <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink MuiInputLabel-outlined MuiFormLabel-filled" data-shrink="true" for="name" id="name-label">Senha</label>
                                            <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                                <input id="campo0" aria-invalid="false" id="senha" type="text" class="MuiInputBase-input MuiOutlinedInput-input"  value="">
                                                <div class="MuiInputAdornment-root MuiInputAdornment-positionEnd">
                                                    <button onclick="visivel('0')" id="eyesenha2" class="MuiButtonBase-root MuiIconButton-root MuiIconButton-edgeEnd" tabindex="0" type="button" aria-label="toggle password visibility">
                                                        <span class="MuiIconButton-label">
                                                            <span class="material-icons MuiIcon-root" id="eye0" aria-hidden="true" id="olho" >visibility</span>
                                                        </span>
                                                        <span class="MuiTouchRipple-root"></span>
                                                    </button>
                                                </div>
                                                <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                    <legend class="jss98 jss99">
                                                        <span>Senha</span>
                                                    </legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="MuiBox-root jss108 input-container new-password-confirm" id="metade">
                                        <div class="MuiFormControl-root MuiTextField-root input">
                                            <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink MuiInputLabel-outlined MuiFormLabel-filled" data-shrink="true" for="name" id="name-label">Confirme a senha</label>
                                            <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                                <input id="campo1" aria-invalid="false" id="name" type="text" class="MuiInputBase-input MuiOutlinedInput-input"  value="Vinícius Von Dentz">
                                                <div class="MuiInputAdornment-root MuiInputAdornment-positionEnd">
                                                    <button onclick="visivel('1')" id="eyesenha" class="MuiButtonBase-root MuiIconButton-root MuiIconButton-edgeEnd" tabindex="0" type="button" aria-label="toggle password visibility">
                                                        <span class="MuiIconButton-label">
                                                            <span class="material-icons MuiIcon-root" id="eye1" aria-hidden="true">visibility</span>
                                                        </span>
                                                        <span class="MuiTouchRipple-root"></span>
                                                    </button>
                                                </div>
                                                <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                    <legend class="jss98 jss99">
                                                        <span>Confirme a senha</span>
                                                    </legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                        <div class="MuiBox-root jss101 account-footer">
                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text btn-profile MuiButton-textPrimary" tabindex="0" type="button">
                                <span class="MuiButton-label">Salvar Alterações</span>
                                <span class="MuiTouchRipple-root"></span>
                            </button>
                        </div>
                    </div>
                    <div class="MuiBox-root jss102 jss85 account-password-container">
                        <span class="MuiTypography-root section-title MuiTypography-overline">Alterar senha</span>
                        <div class="MuiBox-root jss103 account-password-content">
                            <div class="MuiBox-root jss104 account-password-current-container">
                                <div class="MuiBox-root jss105 input-container current-password">
                                    <div class="MuiFormControl-root MuiTextField-root input password">
                                        <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-outlined" data-shrink="false" for="password" id="password-label">Senha atual</label>
                                        <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl MuiInputBase-adornedEnd MuiOutlinedInput-adornedEnd">
                                            <input aria-invalid="false" id="password" type="password" class="MuiInputBase-input MuiOutlinedInput-input MuiInputBase-inputAdornedEnd MuiOutlinedInput-inputAdornedEnd" value="">
                                            <div class="MuiInputAdornment-root MuiInputAdornment-positionEnd">
                                                <button class="MuiButtonBase-root MuiIconButton-root MuiIconButton-edgeEnd" tabindex="0" type="button" aria-label="toggle password visibility">
                                                    <span class="MuiIconButton-label">
                                                        <span class="material-icons MuiIcon-root" aria-hidden="true">visibility</span>
                                                    </span>
                                                    <span class="MuiTouchRipple-root"></span>
                                                </button>
                                            </div>
                                            
                                            <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                <legend class="jss98">
                                                    <span>Senha atual</span>
                                                </legend>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="MuiBox-root jss106 account-password-new-container">
                                <div class="MuiBox-root jss107 input-container new-password">
                                    <div class="MuiFormControl-root MuiTextField-root input">
                                        <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-outlined" data-shrink="false" for="newPassword" id="newPassword-label">Nova senha</label>
                                        <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl MuiInputBase-adornedEnd MuiOutlinedInput-adornedEnd">
                                            <input aria-invalid="false" id="newPassword" type="password" class="MuiInputBase-input MuiOutlinedInput-input MuiInputBase-inputAdornedEnd MuiOutlinedInput-inputAdornedEnd" value="">
                                            <div class="MuiInputAdornment-root MuiInputAdornment-positionEnd">
                                                <button class="MuiButtonBase-root MuiIconButton-root MuiIconButton-edgeEnd" tabindex="0" type="button" aria-label="toggle password visibility">
                                                    <span class="MuiIconButton-label" style="padding:15px">
                                                        <span  class="material-icons MuiIcon-root" aria-hidden="true">visibility</span>
                                                    </span>
                                                    <span class="MuiTouchRipple-root"></span>
                                                </button>
                                            </div>
                                            <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                <legend class="jss98">
                                                    <span>Nova senha</span>
                                                </legend>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="MuiBox-root jss108 input-container new-password-confirm">
                                    <div class="MuiFormControl-root MuiTextField-root input">
                                        <label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-outlined" data-shrink="false" for="confirmNewPassword"  id="confirmNewPassword-label">Confirme a nova senha</label>
                                        <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl MuiInputBase-adornedEnd MuiOutlinedInput-adornedEnd">
                                            <input aria-invalid="false" id="confirmNewPassword" type="password" class="MuiInputBase-input MuiOutlinedInput-input MuiInputBase-inputAdornedEnd MuiOutlinedInput-inputAdornedEnd" value="">
                                            <div class="MuiInputAdornment-root MuiInputAdornment-positionEnd">
                                                <button class="MuiButtonBase-root MuiIconButton-root MuiIconButton-edgeEnd" tabindex="0" type="button" aria-label="toggle password visibility">
                                                    <span class="MuiIconButton-label">
                                                        <span class="material-icons MuiIcon-root" aria-hidden="true">visibility</span>
                                                    </span>
                                                    <span class="MuiTouchRipple-root"></span>
                                                </button>
                                            </div>
                                            <fieldset aria-hidden="true" class="jss96 MuiOutlinedInput-notchedOutline">
                                                <legend class="jss98">
                                                    <span>Confirme a nova senha</span>
                                                </legend>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="MuiBox-root jss109 account-footer">
                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text btn-profile MuiButton-textPrimary" tabindex="0" type="button">
                                <span class="MuiButton-label">Salvar Alterações</span>
                                <span class="MuiTouchRipple-root"> </span>  
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="presentation" class="MuiPopover-root jss48" id="profile-menu"  style="position: fixed; z-index: 1300; inset: 0px; visibility: hidden;" aria-hidden="true">
        <div tabindex="0" data-test="sentinelStart"></div>
        <div class="MuiPaper-root MuiPopover-paper MuiPaper-elevation8 MuiPaper-rounded" tabindex="-1"  style="opacity: 0; transform: scale(0.75, 0.5625); transition: opacity 296ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, transform 197ms cubic-bezier(0.4, 0, 0.2, 1) 99ms; top: 52px; left: 1076px; transform-origin: 260px 0px; visibility: hidden;">
            <div class="MuiBox-root jss53 profile-infos">
                <div class="MuiBox-root jss55 profile-infos-avatar jss50 jss54" avatar="" name="Vinícius Von Dentz">
                    <span class="material-icons MuiIcon-root avatar-icon" aria-hidden="true">person</span>
                </div>
                <p class="MuiTypography-root profile-infos-name MuiTypography-body2">
                    <b>Vinícius Von Dentz</b>
                </p>
                <span class="MuiTypography-root profile-infos-email MuiTypography-caption">viniciusvondentz@gmail.com</span>
            </div>
            <hr class="MuiDivider-root">
            <a class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss49 profile-menu-item MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button" tabindex="-1" role="menuitem" aria-disabled="false" href="/profile">
                <span  class="material-icons MuiIcon-root profile-menu-item-icon" aria-hidden="true">assignment_ind</span>
                <p class="MuiTypography-root MuiTypography-body2">Minha Conta</p>
                <span  class="MuiTouchRipple-root"></span>
            </a>
            <li class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss49 profile-menu-item MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button" tabindex="-1" role="menuitem" aria-disabled="false">
                <span class="material-icons MuiIcon-root profile-menu-item-icon" aria-hidden="true">exit_to_app</span>
                <p class="MuiTypography-root MuiTypography-body2">Sair</p>
                <span class="MuiTouchRipple-root"></span>
            </li>
        </div>
        <div tabindex="0" data-test="sentinelEnd"></div>
    </div>
    <div role="presentation" class="MuiPopover-root jss45" id="help-menu" aria-hidden="true" style="position: fixed; z-index: 1300; inset: 0px; visibility: hidden;">
        <div tabindex="0" data-test="sentinelStart"></div>
        <div class="MuiPaper-root MuiPopover-paper MuiPaper-elevation8 MuiPaper-rounded" tabindex="-1" style="opacity: 0; transform: scale(0.75, 0.5625); visibility: hidden;">
            <div class="MuiBox-root jss70 help-email-container">
                <span class="MuiTypography-root help-email-label MuiTypography-overline">E-mail para ajuda:</span>
                <a  class="MuiTypography-root MuiLink-root MuiLink-underlineHover help-email-link MuiTypography-colorPrimary" href="mailto:contato@wacontrol.com.br">
                    <p class="MuiTypography-root help-email-text MuiTypography-body2">contato@wacontrol.com.br</p>
                </a>
            </div>
            <hr class="MuiDivider-root">
            <li class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss46 MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button" tabindex="-1" role="menuitem" aria-disabled="false">
                <p class="MuiTypography-root help-menu-item-text MuiTypography-body2">Introdução</p>
                <span class="MuiTouchRipple-root"></span>
            </li>
            <li class="MuiButtonBase-root MuiListItem-root MuiMenuItem-root jss46 MuiMenuItem-gutters MuiListItem-gutters MuiListItem-button" tabindex="-1" role="menuitem" aria-disabled="false">
                <p class="MuiTypography-root help-menu-item-text MuiTypography-body2">Suporte</p>
                <span class="material-icons MuiIcon-root help-menu-item-icon MuiIcon-fontSizeSmall" aria-hidden="true">launch</span>
                <span class="MuiTouchRipple-root"></span>
            </li>
        </div>
        <div tabindex="0" data-test="sentinelEnd"></div>
    </div>
    <script>
        const origin = '<?php echo ConfigPainel('base_url'); ?>';
        const val = new Vue({
            el:'#root',
            data: {
                status: 'login',
                avatar:'',
                idx:<?php echo $db ?> 
            }
        });
    </script>
    <script src="src/script/main.js"></script>
</body>

</html>