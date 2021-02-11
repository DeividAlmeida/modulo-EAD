<?php
	require_once('includes/funcoes.php');
	require_once('includes/header.php');
	require_once('includes/menu.php');
	require_once('controller/ead.php');
	$TitlePage = 'EAD';
	$UrlPage   = 'ead.php';
	echo DBRead('ead','*',"WHERE id = '1'")[0]['modo'];
?>
<div class="has-sidebar-left">
    <header class="blue accent-3 relative nav-sticky">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<div class="container-fluid text-white">
    		<div class="row p-t-b-10 ">
    			<div class="col">
    				<h4><i class="icon-graduation-cap"></i> <?php echo $TitlePage; ?></h4>
    			</div>
    		</div>
    	</div>
    </header>
    <body>
    	<div class="container-fluid animatedParent animateOnce my-3" >
            <div class="pb-3">

    			<a class="btn btn-sm btn-primary" href="?">Inicio</a>
    			<span class="dropdown">
    			    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
    			        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Professores</a>
    			    <?php } ?>
    				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
    					<a class="dropdown-item " href="?Prof">Professores</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeProf=0">Cadastrar Professor</a>
    					<?php } ?>
    				</div>
    			</span>
    			<span class="dropdown">
    			    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
    			        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Usuários</a>
    			    <?php } ?>
    				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
    					<a class="dropdown-item" href="?routeUsua">Usuários</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeUsua=0">Cadastrar Usuário</a>
    					<?php } ?>
    				</div>
    			</span>
    			<span class="dropdown">
    			    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
    			        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Cursos</a>
    			    <?php } ?>
    				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
    					<a class="dropdown-item" href="?routeCate">Categorias</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeCate=0">Cadastrar Categoria</a>
    					<?php } ?>
    					<a class="dropdown-item" href="?routeCurs">Cursos</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeCurs=0">Cadastrar Curso</a>
    					<?php } ?>
    				</div>
    			</span>
    			<span class="dropdown">
				<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
					<a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Configuração</a>
					<div class="dropdown-menu dropdown-menu-left" x-placement="bottom">
						<a class="dropdown-item" href="?configGeral">Configurações Gerais</a>
						<a class="dropdown-item" href="?configEmail">Configurações de Email</a>
					</div>					
				<?php } ?>
			    </span>
			    <button class="btn btn-sm behance text-white" data-toggle="modal" data-target="#Ajuda"><i class="icon-question-circle"></i></button>
    		</div>
                <?php 		
                    if (isset($_GET['Prof'])) :
        			    require_once('ead/professor/lista.php'); 
        			elseif (isset($_GET['routeProf'])) :
        			    require_once('ead/professor/professor.php');
        			elseif (isset($_GET['routeCate'])) :
        			    require_once('ead/categoria/categoria.php');
        		    elseif (isset($_GET['routeUsua'])) :
        			    require_once('ead/usuario/usuario.php');
        			elseif (isset($_GET['routeCurs'])) :
        			    require_once('ead/curso/curso.php');
        			elseif (isset($_GET['routeModu'])) :
        			    require_once('ead/curso/modulo/modulo.php');
        		    elseif (isset($_GET['routeAula'])) :
        			    require_once('ead/curso/modulo/aula/aula.php');
        			elseif (isset($_GET['configGeral'])) :
        			    require_once('ead/configuracao/geral.php');
        			elseif (isset($_GET['configEmail'])) :
        			    require_once('ead/configuracao/email.php'); 
        			endif;
        		?>

        </div>
    </body>
</div>
<div class="modal fade" id="Ajuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content b-0">
				<div class="modal-header r-0 bg-primary">
					<h6 class="modal-title text-white" id="exampleModalLabel">Informações de Sobre o Módulo</h6>
					<a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
				</div>

				<div class="modal-body">
					<h5><b>Videoaulas direto do Vimeo ou Youtube:</b></h5>
					<p>
					    Para obter mais informações sobre esse tipo de integração acesse as documentações abaixo <br>
					    <a target="_blank" href="https://vimeo.zendesk.com/hc/pt/articles/360001494447-Usando-os-par%C3%A2metros-do-player"><i class="icon icon-vimeo-square" aria-hidden="true"></i> Vimeo</a><br>
					    <a target="_blank" href="https://developers.google.com/youtube/player_parameters?hl=pt-br"><i class="icon icon-youtube-square" aria-hidden="true"></i> YouTube</a>
					</p>
				</div>
			</div>
		</div>
<?php require_once('includes/footer.php'); ?>


