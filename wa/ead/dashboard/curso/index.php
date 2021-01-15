<?php
header('Access-Control-Allow-Origin: *');
session_start();
require_once('../../../../includes/funcoes.php');
require_once('../../../../database/config.database.php');
require_once('../../../../database/config.php');
$id = $_SESSION['Wacontrol'][0];
$senha = $_SESSION['Wacontrol'][1];
$valida = DBRead('ead_usuario','*',"WHERE id = '{$id}' AND  senha = '{$senha}' ")[0];
$config = json_encode(DBRead('ead_config_geral','*'));
$curso = json_encode(DBRead('ead_curso','*'));
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
                <div class="MuiBox-root jss70 content false false">
                    <div class="MuiBox-root jss160 jss71 undefined">
                        <div class="MuiBox-root jss161 btn-icon-right-wrapper">
                            <a  class="MuiButtonBase-root MuiIconButton-root" tabindex="0" role="button"   aria-disabled="false" href="/">
                                <span class="MuiIconButton-label">
                                    <span class="material-icons MuiIcon-root" aria-hidden="true">arrow_back</span>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </a>
                        </div>
                        <div class="MuiBox-root jss162 text-title-container">
                            <span class="MuiTypography-root text-title-course MuiTypography-caption MuiTypography-noWrap">Curso de Web Acappella Grid</span>
                            <h6 class="MuiTypography-root text-title-title MuiTypography-subtitle1 MuiTypography-noWrap">AULA 2 - TRABALHANDO COM AS BOXES</h6>
                        </div>
                        <div class="MuiBox-root jss163 pagination">
                            <a  class="MuiButtonBase-root MuiIconButton-root pagination-back" tabindex="0" role="button" aria-disabled="false" href="/course/59383/555780">
                                <span class="MuiIconButton-label">
                                    <span class="material-icons MuiIcon-root" aria-hidden="true">chevron_left</span>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </a>
                            <span  class="MuiTypography-root pagination-text MuiTypography-caption">2/24</span>
                            <a  class="MuiButtonBase-root MuiIconButton-root pagination-next" tabindex="0" role="button" aria-disabled="false" href="/course/59383/555783">
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
                    <div :class="'MuiDrawer-root MuiDrawer-docked jss77 '+nav[0]">
                        <div class="MuiPaper-root MuiDrawer-paper jss78 MuiDrawer-paperAnchorRight MuiDrawer-paperAnchorDockedRight MuiPaper-elevation0">
                            <div class="MuiBox-root jss164 header-bar">
                                <div class="MuiBox-root jss167 jss165 ">
                                    <button  class="MuiButtonBase-root MuiIconButton-root jss166" tabindex="0" type="button"  title="Pesquisar">
                                        <span class="MuiIconButton-label">
                                            <span class="material-icons MuiIcon-root"  aria-hidden="true">search</span>
                                        </span>
                                        <span  class="MuiTouchRipple-root"></span>
                                    </button>
                                    <div class="MuiBox-root jss168 input-container"><input class="input" type="text" name="search"></div>
                                    <button  class="MuiButtonBase-root MuiIconButton-root jss166 btn-close" tabindex="0"  type="button">
                                        <span class="MuiIconButton-label">
                                            <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall" aria-hidden="true">close</span>
                                        </span>
                                        <span  class="MuiTouchRipple-root"></span>
                                    </button>
                                </div>
                                <button class="MuiButtonBase-root toggle-side-menu" tabindex="0" onclick="navegar()"  type="button">
                                    <span  class="MuiTypography-root toggle-side-menu-text MuiTypography-caption MuiTypography-noWrap">Esconder navegação</span>
                                    <span class="material-icons MuiIcon-root toggle-side-menu-icon opened"  aria-hidden="true">menu_open</span>
                                    <span class="MuiTouchRipple-root"></span>
                                </button>
                            </div>
                            <div class="MuiBox-root jss169 modules-container">
                                <div  class="MuiPaper-root MuiAccordion-root jss170 Mui-expanded jss171 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div class="MuiButtonBase-root MuiAccordionSummary-root content Mui-expanded jss171" tabindex="0" role="button" aria-disabled="false" aria-expanded="true">
                                        <div class="MuiAccordionSummary-content jss172 Mui-expanded jss171">
                                            <div class="MuiBox-root jss173 progress">
                                                <div class="MuiBox-root jss176 jss174 jss175 undefined" size="32">
                                                    <svg  viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                        <path class="chart-circle-fill is-active false" stroke-dasharray="14.285714285714285 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"> </path>
                                                    </svg>
                                                    <span class="chart-text false">1</span>
                                                </div>
                                            </div>
                                            <div class="MuiBox-root jss177 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO 1 - INICIANDO COM WARC</p>
                                                <span class="MuiTypography-root amount MuiTypography-overline">7 aulas</span>
                                            </div>
                                            <span class="material-icons MuiIcon-root icon" aria-hidden="true">keyboard_arrow_up</span>
                                        </div>
                                    </div>
                                    <div class="MuiCollapse-container MuiCollapse-entered" style="min-height: 0px; height: auto; transition-duration: 331ms;">
                                        <div class="MuiCollapse-wrapper">
                                            <div class="MuiCollapse-wrapperInner">
                                                <div role="region">
                                                    <div class="MuiAccordionDetails-root content-children">
                                                        <a class="MuiButtonBase-root jss205 jss206 completed " tabindex="0" role="button" aria-disabled="false">
                                                            <div class="MuiBox-root jss207 marker">
                                                                <div class="MuiBox-root jss208 marker-circle"></div>
                                                                <div class="MuiBox-root jss209 marker-line"></div>
                                                            </div>
                                                            <div class="MuiBox-root jss210 title">
                                                                <span class="MuiTypography-root title-text MuiTypography-caption">AULA 1 - CONHECENDO A INTERFACE</span>
                                                            </div>
                                                            <div class="MuiBox-root jss211 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall" aria-hidden="true">checked</span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                        <a class="MuiButtonBase-root jss205 jss212 resting active" tabindex="0" role="button" aria-disabled="false">
                                                            <div class="MuiBox-root jss213 marker">
                                                                <div class="MuiBox-root jss214 marker-circle"></div>
                                                                <div class="MuiBox-root jss215 marker-line"></div>
                                                            </div>
                                                            <div class="MuiBox-root jss216 title">
                                                                <span class="MuiTypography-root title-text MuiTypography-caption">AULA 2 - TRABALHANDO COM AS BOXES</span>
                                                            </div>
                                                            <div class="MuiBox-root jss217 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall"  aria-hidden="true"></span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                        <a class="MuiButtonBase-root jss205 jss218 resting " tabindex="0" role="button" aria-disabled="false">
                                                            <div class="MuiBox-root jss219 marker">
                                                                <div class="MuiBox-root jss220 marker-circle"></div>
                                                                <div class="MuiBox-root jss221 marker-line"></div>
                                                            </div>
                                                            <div class="MuiBox-root jss222 title">
                                                                <span class="MuiTypography-root title-text MuiTypography-caption">AULA 3 - SUB PAGES</span>
                                                            </div>
                                                            <div class="MuiBox-root jss223 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall"  aria-hidden="true"></span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                        <a class="MuiButtonBase-root jss205 jss224 resting " tabindex="0" role="button" aria-disabled="false" href="/course/59383/555784">
                                                            <div class="MuiBox-root jss225 marker">
                                                                <div class="MuiBox-root jss226 marker-circle"></div>
                                                                <div class="MuiBox-root jss227 marker-line"></div>
                                                            </div>
                                                            <div class="MuiBox-root jss228 title">
                                                                <span  class="MuiTypography-root title-text MuiTypography-caption">AULA  4 - ÂNCORA EM PÁGINA ÚNICA</span>
                                                            </div>
                                                            <div class="MuiBox-root jss229 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall"  aria-hidden="true"></span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                        <a class="MuiButtonBase-root jss205 jss230 resting " tabindex="0" role="button" aria-disabled="false"  href="/course/59383/555785">
                                                            <div class="MuiBox-root jss231 marker">
                                                                <div class="MuiBox-root jss232 marker-circle"></div>
                                                                <div class="MuiBox-root jss233 marker-line"></div>
                                                            </div>
                                                            <div class="MuiBox-root jss234 title"><span class="MuiTypography-root title-text MuiTypography-caption">AULA 5 - FERRAMENTA DE TEXTO, COR E IMAGEM</span></div>
                                                            <div class="MuiBox-root jss235 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall" aria-hidden="true"></span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                        <a class="MuiButtonBase-root jss205 jss236 resting " tabindex="0" role="button" aria-disabled="false" href="/course/59383/555787">
                                                            <div class="MuiBox-root jss237 marker">
                                                                <div class="MuiBox-root jss238 marker-circle"></div>
                                                                <div class="MuiBox-root jss239 marker-line"></div>
                                                            </div>
                                                            <div class="MuiBox-root jss240 title">
                                                                <span class="MuiTypography-root title-text MuiTypography-caption">AULA 6 - GALERIA E CAROUSEL</span>
                                                            </div>
                                                            <div class="MuiBox-root jss241 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall" aria-hidden="true"></span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                        <a class="MuiButtonBase-root jss205 jss242 resting " tabindex="0" role="button" aria-disabled="false"  href="/course/59383/555789">
                                                            <div class="MuiBox-root jss243 marker">
                                                                <div class="MuiBox-root jss244 marker-circle"></div>
                                                                <div class="MuiBox-root jss245 marker-line"></div>
                                                            </div>
                                                            <div class="MuiBox-root jss246 title">
                                                                <span class="MuiTypography-root title-text MuiTypography-caption">AULA 7 - BOTÃO, MENU E FORMULÁRIO</span>
                                                            </div>
                                                            <div class="MuiBox-root jss247 icon">
                                                                <span class="material-icons MuiIcon-root MuiIcon-fontSizeSmall" aria-hidden="true"></span>
                                                            </div>
                                                            <span class="MuiTouchRipple-root"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  class="MuiPaper-root MuiAccordion-root jss170 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div class="MuiButtonBase-root MuiAccordionSummary-root content" tabindex="0" role="button" aria-disabled="false" aria-expanded="false">
                                        <div class="MuiAccordionSummary-content jss172">
                                            <div class="MuiBox-root jss178 progress">
                                                <div class="MuiBox-root jss180 jss174 jss179 undefined" size="32">
                                                    <svg viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                        <path class="chart-circle-fill false false" stroke-dasharray="0 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                    </svg>
                                                    <span class="chart-text false">0</span>
                                                </div>
                                            </div>
                                            <div class="MuiBox-root jss181 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO 2 - PRIMEIRA CRIAÇÃO</p>
                                                <span class="MuiTypography-root amount MuiTypography-overline">5 aulas</span>
                                            </div>
                                            <span class="material-icons MuiIcon-root icon" aria-hidden="true">keyboard_arrow_down</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="MuiPaper-root MuiAccordion-root jss170 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div class="MuiButtonBase-root MuiAccordionSummary-root content" tabindex="0" role="button" aria-disabled="false" aria-expanded="false">
                                        <div class="MuiAccordionSummary-content jss172">
                                            <div class="MuiBox-root jss182 progress">
                                                <div class="MuiBox-root jss184 jss174 jss183 undefined" size="32">
                                                    <svg viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                        <path class="chart-circle-fill false false" stroke-dasharray="0 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"> </path>
                                                    </svg>
                                                    <span class="chart-text false">0</span>
                                                </div>
                                            </div>
                                            <div class="MuiBox-root jss185 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO 3 - AJUSTES E DICAS</p>
                                                <span class="MuiTypography-root amount MuiTypography-overline">3 aulas</span>
                                            </div>
                                            <span class="material-icons MuiIcon-root icon"  aria-hidden="true">keyboard_arrow_down</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="MuiPaper-root MuiAccordion-root jss170 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div class="MuiButtonBase-root MuiAccordionSummary-root content" tabindex="0"  role="button" aria-disabled="false" aria-expanded="false">
                                        <div class="MuiAccordionSummary-content jss172">
                                            <div class="MuiBox-root jss186 progress">
                                                <div class="MuiBox-root jss188 jss174 jss187 undefined" size="32">
                                                    <svg  viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"> </path>
                                                        <path class="chart-circle-fill false false" stroke-dasharray="0 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                    </svg>
                                                    <span class="chart-text false">0</span>
                                                </div>
                                            </div>
                                            <div class="MuiBox-root jss189 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO 4 - HOSPEDAR E PUBLICAR</p>
                                                <span  class="MuiTypography-root amount MuiTypography-overline">3 aulas</span>
                                            </div>
                                            <span class="material-icons MuiIcon-root icon" aria-hidden="true">keyboard_arrow_down</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="MuiPaper-root MuiAccordion-root jss170 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div class="MuiButtonBase-root MuiAccordionSummary-root content" tabindex="0" role="button" aria-disabled="false" aria-expanded="false">
                                        <div class="MuiAccordionSummary-content jss172">
                                            <div class="MuiBox-root jss190 progress">
                                                <div class="MuiBox-root jss192 jss174 jss191 undefined" size="32">
                                                    <svg  viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                        <path class="chart-circle-fill false false" stroke-dasharray="0 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                                    </svg>
                                                    <span class="chart-text false">0</span>
                                                </div>
                                            </div>
                                            <div class="MuiBox-root jss193 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO 5 - ÁREA ADMINISTRATIVA</p>
                                                <span  class="MuiTypography-root amount MuiTypography-overline">1  aula</span>
                                            </div>
                                            <span class="material-icons MuiIcon-root icon" aria-hidden="true">keyboard_arrow_down</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="MuiPaper-root MuiAccordion-root jss170 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div class="MuiButtonBase-root MuiAccordionSummary-root content" tabindex="0"  role="button" aria-disabled="false" aria-expanded="false">
                                        <div class="MuiAccordionSummary-content jss172">
                                            <div class="MuiBox-root jss194 progress">
                                                <div class="MuiBox-root jss196 jss174 jss195 undefined" size="32">
                                                    <svg viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"> </path>
                                                        <path class="chart-circle-fill false false" stroke-dasharray="0 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"> </path>
                                                    </svg>
                                                    <span class="chart-text false">0</span>
                                                </div>
                                            </div>
                                            <div class="MuiBox-root jss197 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO 6 - PLUGINS EXTERNOS (AVANÇADO)</p>
                                                <span class="MuiTypography-root amount MuiTypography-overline">3 aulas</span>
                                            </div>
                                            <span class="material-icons MuiIcon-root icon"  aria-hidden="true">keyboard_arrow_down</span>
                                        </div>
                                    </div>
                                </div>
                                <div  class="MuiPaper-root MuiAccordion-root jss170 MuiAccordion-rounded MuiPaper-elevation1 MuiPaper-rounded">
                                    <div class="MuiButtonBase-root MuiAccordionSummary-root content" tabindex="0"  role="button" aria-disabled="false" aria-expanded="false">
                                        <div class="MuiAccordionSummary-content jss172">
                                            <div class="MuiBox-root jss198 progress">
                                                <div class="MuiBox-root jss200 jss174 jss199 undefined" size="32">
                                                    <svg viewBox="0 0 36 36" class="chart-circle">
                                                        <path class="chart-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"> </path>
                                                        <path class="chart-circle-fill false false" stroke-dasharray="0 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831">
                                                        </path>
                                                    </svg><span class="chart-text false">0</span></div>
                                            </div>
                                            <div class="MuiBox-root jss201 text-wrapper">
                                                <p class="MuiTypography-root title  MuiTypography-body2">MÓDULO 7 - BÔNUS</p>
                                                <span class="MuiTypography-root amount MuiTypography-overline">2 aulas</span>
                                            </div>
                                            <span class="material-icons MuiIcon-root icon" aria-hidden="true">keyboard_arrow_down</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="MuiBox-root jss202 course-progress-container">
                                <div class="MuiBox-root jss203 course-progress-bar">
                                    <div class="MuiBox-root jss204 course-progress-bar-fill"></div>
                                </div>
                                <span class="MuiTypography-root course-progress-text MuiTypography-overline">4% Concluído</span>
                            </div>
                        </div>
                    </div>
                    <div class="MuiBox-root jss79 content-wrapper">
                        <div class="MuiBox-root jss80 content-scrollable ">
                            <div class="MuiBox-root jss153 jss150">
                                <div class="MuiTabs-root tabs-container">
                                    <div class="MuiTabs-scrollable" style="width: 99px; height: 99px; position: absolute; top: -9999px; overflow: scroll;"> </div>
                                    <div class="MuiTabs-scroller MuiTabs-scrollable" style="margin-bottom: 0px;">
                                        <div class="MuiTabs-flexContainer" role="tablist">
                                            <button class="MuiButtonBase-root MuiTab-root jss151 MuiTab-textColorInherit Mui-selected jss152" tabindex="0" type="button" role="tab" aria-selected="true">
                                                <span class="MuiTab-wrapper">Conteúdo</span>
                                                <span class="MuiTouchRipple-root"></span>
                                            </button>
                                            <button class="MuiButtonBase-root MuiTab-root jss151 MuiTab-textColorInherit" tabindex="-1" type="button" role="tab" aria-selected="false">
                                                <span class="MuiTab-wrapper">Anotações</span>
                                                <span class="MuiTouchRipple-root"></span>
                                            </button>
                                        </div>
                                        <span class="jss258 jss259 MuiTabs-indicator" style="left: 0px; width: 160px;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="MuiBox-root jss83 jss82 container-section" id="content">
                                <div class="MuiBox-root jss159 jss81 light">
                                    <div>Aprenda a trabalhar com as box e organize melhor onde irá posicionar seus  objetos.
                                        <iframe allowfullscreen="" frameborder="0" height="" src="https://player.vimeo.com/video/369704725?autoplay=0&amp;title=0&amp;byline=0&amp;portrait=0&amp;hd=1" width="">
                                        </iframe>
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
            nav:['open', 'without-sidemenu'],
            config:<?php echo $config ?>,
            cursos:<?php echo  $curso ?>
        }
    });
    let nav = true;
    navegar = () =>{
        nav == true ?  nav = false : nav = true
        nav == true ?  val.nav='open' : val.nav='close'
    }
    
</script>
<script src="../menu/src/script/main.js"></script>
</html>