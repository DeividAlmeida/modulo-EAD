<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$db = json_encode(DBRead('ead_config_geral','*'));
session_start();
$id = $_SESSION['Wacontrol'][0];
$senha = $_SESSION['Wacontrol'][1];
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
        <link rel="stylesheet" href="<?php echo ConfigPainel('base_url'); ?>wa/ead/login/src/style/main.css">
        <?php echo DBRead('ead','*',"WHERE id = '1'")[0]['modo']; ?>
    </head>

    <body >
        <div id="root">
            <div class="MuiBox-root jss21 jss20">
                <div class="MuiBox-root jss23 jss22">
                    <div class="MuiBox-root jss24 logo-container">
                        <img src="https://llbr.blob.core.windows.net/machine-user-images/Logotipo-Curso-de-Web-Acappella-vermelho.png" alt="" class="logo-img">
                    </div>
                    <form class="MuiFormControl-root">
                        <div v-if="status == 'login'">
                            <div class="MuiBox-root jss25 input-container email">
                                <div class="MuiFormControl-root MuiTextField-root input">
                                    <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                        <input aria-invalid="false" placeholder="E-mail" id="login-email" name="email" type="email" class="MuiInputBase-input MuiOutlinedInput-input" value="">
                                        <fieldset aria-hidden="true" class="jss26 MuiOutlinedInput-notchedOutline"></fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="MuiBox-root jss30 input-container password">
                                <div class="MuiFormControl-root MuiTextField-root input">
                                    <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl MuiInputBase-adornedEnd MuiOutlinedInput-adornedEnd">
                                        <input aria-invalid="false" placeholder="Senha" autocomplete="on" id="login-password" name="password" type="password" class="MuiInputBase-input MuiOutlinedInput-input MuiInputBase-inputAdornedEnd MuiOutlinedInput-inputAdornedEnd" value="">
                                        <div class="MuiInputAdornment-root MuiInputAdornment-positionEnd">
                                            <button onclick="visivel(document.getElementById('olho').innerHTML)" class="MuiButtonBase-root MuiIconButton-root MuiIconButton-edgeEnd" tabindex="0" type="button" aria-label="toggle password visibility">
                                                <span class="MuiIconButton-label">
                                                    <span class="material-icons MuiIcon-root" id="olho" aria-hidden="true">visibility</span>
                                                </span>
                                                <span class="MuiTouchRipple-root"></span>                                        
                                            </button>
                                        </div>
                                        <fieldset  aria-hidden="true" class="jss26 MuiOutlinedInput-notchedOutline"></fieldset>                                    
                                    </div>
                                </div>
                            </div>
                            <div class=" forgot-password " @click="ver('reset')" style="margin-bottom:16px"><a type="button" >Esqueci minha senha</a></div>
                            <div class="MuiBox-root jss31 btn-login-container">
                                <button onclick="valida()" class="MuiButtonBase-root MuiButton-root MuiButton-contained btn-login MuiButton-containedPrimary MuiButton-containedSizeLarge MuiButton-sizeLarge" tabindex="0" type="button">
                                    <span class="MuiButton-label">Entrar</span>
                                    <span class="MuiTouchRipple-root"></span>
                                </button>
                            </div>
                            <label class="MuiFormControlLabel-root "  for="manter" onclick="box(document.getElementById('manter').checked)" style="right:35%; position: relative">
                                <span class="MuiButtonBase-root MuiIconButton-root jss32 MuiCheckbox-root MuiCheckbox-colorSecondary MuiIconButton-colorSecondary" aria-disabled="false">
                                    <span class="MuiIconButton-label" id="switch_board">
                                        <input class="jss35" id="manter" type="checkbox" data-indeterminate="false" value="true">
                                        <span class="material-icons MuiIcon-root" id="switch" aria-hidden="true"></span>
                                    </span>
                                    <span class="MuiTouchRipple-root"></span>
                                </span>
                                <span class="MuiTypography-root MuiFormControlLabel-label MuiTypography-body1">
                                    <span class="MuiTypography-root keep-connected MuiTypography-caption"> Mantenha-me conectado</span>
                                </span>
                            </label>
                        </div>
                        <div v-if="status == 'reset'">
                            <div class="MuiBox-root jss41 input-container email">
                                <p class="MuiTypography-root sign-up MuiTypography-body2">Informe seu e-mail de acesso para recuperar a senha:</p>
                            </div>
                            <div class="MuiBox-root jss41 input-container email">
                                <div class="MuiFormControl-root MuiTextField-root input">
                                    <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-formControl">
                                        <input aria-invalid="false" placeholder="E-mail" id="login-email" name="email" type="email" class="MuiInputBase-input MuiOutlinedInput-input" value="">
                                        <fieldset aria-hidden="true" class="jss26 MuiOutlinedInput-notchedOutline"></fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="MuiBox-root jss31 btn-login-container">
                                <button class="MuiButtonBase-root MuiButton-root MuiButton-contained btn-login MuiButton-containedPrimary MuiButton-containedSizeLarge MuiButton-sizeLarge" tabindex="0" type="submit">
                                    <span class="MuiButton-label">Recuperar senha</span>
                                    <span class="MuiTouchRipple-root"></span>
                                </button>
                            </div>
                            
                        </div>
                    </form>
                    <div class="MuiBox-root jss36 sign-up-container" >
                        <span class="MuiButtonBase-root MuiButton-root MuiButton-text MuiButton-textSecondary MuiButton-textSizeLarge MuiButton-sizeLarge" tabindex="0" aria-disabled="false"  >
                            <span class="MuiButton-label">
                                <a v-if="status == 'login'" :href="idx[0].link_cadastro" class="sign-up" style="text-decoration:none ">Ainda não é aluno?</a>
                                <p v-if="status == 'reset'" @click="ver('login')" class="sign-up">VOLTAR</p>
                            </span>
                            <span class="MuiTouchRipple-root"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const origin = '<?php echo ConfigPainel('base_url'); ?>';
            const val = new Vue({
                el:'#root',
                data: {
                    status: 'login',
                    idx:<?php echo $db ?> 
                }
            });
        </script>
        <script src="src/script/main.js"></script>                          
    </body>
</html>