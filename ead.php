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
    			        <a class="btn btn-sm btn-primary" href="#" data-toggle="dropdown">Professor</a>
    			    <?php } ?>
    				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
    					<a class="dropdown-item" href="?Prof">Professores</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeProf=0">Cadastrar Professor</a>
    					<?php } ?>
    				</div>
    			</span>
    			<span class="dropdown">
    			    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item')) { ?>
    			        <a class="btn btn-sm btn-primary" href="#" data-toggle="dropdown">Categoria</a>
    			    <?php } ?>
    				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
    					<a class="dropdown-item" href="?routeCate">Categorias</a>
    					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'item', 'adicionar')) { ?>
    						<a class="dropdown-item" href="?routeCate=0">Cadastrar Categoria</a>
    					<?php } ?>
    				</div>
    			</span>
    		</div>
                <?php 		
                    if (isset($_GET['Prof'])) :
        			    require_once('ead/professor/lista.php'); 
        			elseif (isset($_GET['routeProf'])) :
        			    require_once('ead/professor/professor.php');
        			elseif (isset($_GET['routeCate'])) :
        			    require_once('ead/categoria/categoria.php');
        			endif;
        		?>

        </div>
    </body>
</div>
<?php require_once('includes/footer.php'); ?>


