<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$modo = DBRead('ead','*',"WHERE id = '1'")[0];

?>
<html >
    <head>
        <meta charset="utf-8">
        <base target="_blank">
        <title>Login - Curso de Web Acappella</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo ConfigPainel('base_url'); ?>wa/ead/login/src/style/main.css">
        <?php echo $modo['dev']?>
    </head>

    <body>
        <div id="root">
            <div class="MuiBox-root jss21 jss20">
                <div class="MuiBox-root jss23 jss22">
                    <div class="MuiBox-root jss24 logo-container">
                        {{idx}}
                        <img src="https://llbr.blob.core.windows.net/machine-user-images/Logotipo-Curso-de-Web-Acappella-vermelho.png" alt="" class="logo-img">
                    </div>
                    <form class="MuiFormControl-root">
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
                        <a class="MuiTypography-root MuiLink-root MuiLink-underlineHover forgot-password MuiTypography-caption MuiTypography-colorPrimary" type="button" href="/forgot-password">Esqueci minha senha</a>
                        <div class="MuiBox-root jss31 btn-login-container">
                            <button class="MuiButtonBase-root MuiButton-root MuiButton-contained btn-login MuiButton-containedPrimary MuiButton-containedSizeLarge MuiButton-sizeLarge" tabindex="0" type="submit">
                                <span class="MuiButton-label">Entrar</span>
                                <span class="MuiTouchRipple-root"></span>
                            </button>
                        </div>
                        <label class="MuiFormControlLabel-root" for="manter" onclick="box(document.getElementById('manter').checked)">
                            <span class="MuiButtonBase-root MuiIconButton-root jss32 MuiCheckbox-root MuiCheckbox-colorSecondary MuiIconButton-colorSecondary" aria-disabled="false">
                                <span class="MuiIconButton-label" id="switch_board">
                                    <input class="jss35" id="manter" type="checkbox" data-indeterminate="false" value="true">
                                    <span class="material-icons MuiIcon-root" id="switch" aria-hidden="true"></span>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </span>
                            <span class="MuiTypography-root MuiFormControlLabel-label MuiTypography-body1">
                                <lable class="MuiTypography-root keep-connected MuiTypography-caption"> Mantenha-me conectado</lable>
                            </span>
                        </label>
                    </form>
                    <div class="MuiBox-root jss36 sign-up-container">
                        <a class="MuiButtonBase-root MuiButton-root MuiButton-text MuiButton-textSecondary MuiButton-textSizeLarge MuiButton-sizeLarge" tabindex="0" aria-disabled="false" href="https://www.aprendafazersites.com.br/curso-de-webacappella/se-cadastrar-no-curso.html" target="_blank">
                            <span class="MuiButton-label">
                                <p class="MuiTypography-root sign-up MuiTypography-body2">Ainda não é aluno?</p>
                            </span>
                            <span class="MuiTouchRipple-root"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script>
    new Vue({
        el:"#root",
        data: {
            idx:"teste"
        }
    })
</script>
        <script src="src/script/main.js"></script>                          
    </body>
</html>