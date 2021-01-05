<?php
	require_once('includes/funcoes.php');
	require_once('includes/header.php');
	require_once('includes/menu.php');
	require_once('controller/ead.php');
	$TitlePage = 'EAD';
	$UrlPage   = 'ead.php';
    $modo = "dev";#produção
    if($modo == "dev"){ ?>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <?php }else{ ?>
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<?php }?>
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
    			<a class="btn btn-sm btn-primary" href="?Clientes">Clientes</a>
    			<span class="dropdown">
    			    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
    			        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Professor</a>
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
    			        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Categoria</a>
    			    <?php } ?>
    				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
    					<a class="dropdown-item" href="?routeCate">Categorias</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeCate=0">Cadastrar Categoria</a>
    					<?php } ?>
    				</div>
    			</span>
    			<span class="dropdown">
    			    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
    			        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Usuário</a>
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
    			        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Curso</a>
    			    <?php } ?>
    				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
    					<a class="dropdown-item" href="?routeCurs">Cursos</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeCurs=0">Cadastrar Curos</a>
    					<?php } ?>
    				</div>
    			</span>
    			<span class="dropdown">
				<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
					<a class="btn btn-sm btn-primary dropdown-toggle" href="#" data-toggle="dropdown">Configuração</a>
					<div class="dropdown-menu dropdown-menu-left" x-placement="bottom">
						<a class="dropdown-item" href="?configGeral">Configurações Gerais</a>
						<a class="dropdown-item" href="?configPagamento">Configurações de Pagamento</a>
						<a class="dropdown-item" href="?configEmail">Configurações de Email</a>
					</div>					
				<?php } ?>
			</span>
    		</div>
                <?php 		
        		    if (isset($_GET['Clientes'])) :
        			    require_once('ead/clientes/clientes.php');
                    elseif (isset($_GET['Prof'])) :
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
        			elseif (isset($_GET['configPagamento'])) :
        			    require_once('ead/configuracao/pagamento.php'); 
        			elseif (isset($_GET['configEmail'])) :
        			    require_once('ead/configuracao/email.php'); 
        			endif;
        		?>

        </div>
    </body>
</div>
<?php require_once('includes/footer.php'); ?>


