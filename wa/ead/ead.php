<?php
	header('Access-Control-Allow-Origin: *');
	require_once('../../includes/funcoes.php');
	require_once('../../database/config.database.php');
	require_once('../../database/config.php');

	$id 		= get('id');
	$pag 		= (isset($_GET['pag']))? $_GET['pag'] : 1;
	$sub 		= DBRead('tabela_de_precos','*',"WHERE id = '{$id}'")[0];

	if (ModoManutencao()) { header("Location: ../manutencao.php"); }
	$c_query 		= DBRead('c_tabela_de_precos','*',"WHERE id = '{$id}'");
	$categoria 		= $c_query[0];

	if($categoria['ativa_paginacao'] == 'S'){
		$contagem_registro 	= DBCount('tabela_de_precos','*',"WHERE id_categoria = '{$id}' ORDER BY {$categoria['ordenar_por']} {$categoria['asc_desc']}");

    $limite 		= $categoria['limite'];
    $numPaginas 	= ceil($contagem_registro/$limite);
    $inicio 		= ($limite*$pag)-$limite;
	$itens 			= DBRead('tabela_de_precos','*',"WHERE id_categoria = '{$id}' ORDER BY {$categoria['ordenar_por']} {$categoria['asc_desc']} LIMIT {$inicio}, {$limite}");
	}
	else{
	$itens 			= DBRead('tabela_de_precos','*',"WHERE id_categoria = '{$id}' ORDER BY {$categoria['ordenar_por']} {$categoria['asc_desc']} LIMIT {$categoria['limite']}");
	}

	// Escolhendo arquivo para o estilo
	switch ($categoria['estilo']) {
		case 1:
			require_once('includes/estilo_1.php');
		break;

		case 2:
			require_once('includes/estilo_2.php');
		break;

		case 3:
			require_once('includes/estilo_3.php');
		break;

		case 4:
			require_once('includes/estilo_4.php');
		break;

		case 5:
			require_once('includes/estilo_5.php');
		break;

		case 6:
			require_once('includes/estilo_6.php');
		break;

		default:
			require_once('includes/estilo_1.php');
		break;
	}
	if($categoria['ativa_paginacao'] == 'S'){ ?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
			<center>
				<div class="btn-group" role="group" aria-label="...">
					<?php $i = $pag; ?>
					<?php if ($i <= '1') { ?>
							<button type="hidden" class="btn btn-default btn-xs hidden" disabled>Anterior</button>
					<?php } elseif ($i >= '2') { $i = $i - '1'; ?>
							<button type="button" class="btn btn-default btn-xs" onclick="Tabela(<?php echo $id; ?>,'<?php echo $i; ?>');">Anterior</button>
					<?php } ?>
						<?php $i = $pag; ?>
					<?php if ($numPaginas >= '1' && $numPaginas < '9') { $numPaginas = '0'.$numPaginas; } elseif ($numPaginas > '9') { $numPaginas = $numPaginas; } ?>
					<?php if ($i >= '1' && $i <= '9') { ?>
							<button type="button" class="btn btn-default btn-xs" disabled>Página 0<?php echo $i; ?> de <?php echo $numPaginas; ?></button>
					<?php } elseif ($i > '9') { ?>
							<button type="button" class="btn btn-default btn-xs" disabled>Página <?php echo $i; ?> de <?php echo $numPaginas; ?></button>
					<?php } ?>
						<?php $i = $pag; ?>
					<?php if ($i >= 1 && $i < $numPaginas) { $i++; ?>
							<button type="button" class="btn btn-default btn-xs" onclick="Tabela(<?php echo $id; ?>,'<?php echo $i; ?>');">Próximo</button>
					<?php } elseif ($i == $numPaginas) { ?>
							<button type="button" class="btn btn-default btn-xs hidden" disabled>Próximo</button>
					<?php } ?>
				</div>
		</div>
		<?php
	}
?>
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/epack/css/elements/animate.css">




