<?php 
$getWord = getWord();
?>
<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="../css/toastr.css">
<link rel="stylesheet" type="text/css" href="macanha/css/mac.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">

<div class="content">
	<div class="container col-md-8 col-md-offset-2">

		<?php if (isset($_GET['type'])) { ?>
			<div class="row mt10" id="alert">
				<div class="alert alert-<?=$_GET['type']?> alert-dismissible text-center" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong><?=$_GET['msg']?></strong>
				</div>
			</div>
		<?php } ?>

		<div class="panel panel-primary hg-panel mt10 sombra">
			<div class="panel-heading">
				<span class="fa fa-keyboard-o"></span>
				SABRE - Sistema de Abreviação
			</div>
			<div class="panel-body">
				<div class="col-md-12 mb20">		
					<button type="button" name="btnInsert" class="btn btn-success" id="btnInsert" data-toggle="modal" data-target="#modalInsert" title="Inserir nova sigla">
						<span class="fa fa-plus-circle"></span>
						Adicionar
					</button>
				</div>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-hover" id="siglas">
						  	<thead>
							  	<tr>
							  		<th>Palavra</th>
							  		<th>Abreviação</th>
							  		<th>Tipo</th>
							  		<th>Tamanho</th>
							  		<th class="text-center">
							  			<span class="fa fa-cogs"></span>
							  		</th>
							  	</tr>
						  	</thead>
						  	<tbody>
						  		<?php foreach($getWord as $key => $value) { ?>
							  		<tr id="sigla_<?=$value['CD_PLVR']?>">
							  			<td id="palavra_<?=$value['CD_PLVR']?>" class="mw300">
							  				<?=mb_strimwidth($value['DC_PLVR'], 0, 50, "...")?>
						  				</td>
							  			<td id="abreviacao_<?=$value['CD_PLVR']?>" class="mw100">
							  				<?=mb_strimwidth($value['DC_ABRV'], 0, 10, "...")?>
						  				</td>
						  				<td><?=(empty($value['NM_TIPO'])) ? "-" : $value['NM_TIPO']?></td>
						  				<td><?=(empty($value['VL_TMN'])) ? "-" : $value['VL_TMN']?></td>
							  			<td class="text-center" nowrap>
							  				<button type="button" name="btnEdit" id="btnEdit" data-target="#modalEdit" class="btn btn-warning" data-toggle="modal" onclick="editSigla(<?=$value['CD_PLVR']?>);" title="Clique para alterar palavra">
							  					<span class="fa fa-pencil-square-o"></span>
							  					Alterar
							  				</button>
							  				<button type="button" name="btnDelete" id="btnDelete" class="btn btn-danger" data-toggle="modal" onclick="removeSigla(<?=$value['CD_PLVR']?>);" title="Clique para remover palavra">
							  					<span class="fa fa-trash"></span>
							  					Remover
							  				</button>
							  			</td>
							  		</tr>
						  		<?php } ?>
						  	</tbody>
						</table>							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Insert -->
<?php include_once("inc/insert_palavra.inc"); ?>
<!-- Modal -->

<div id="modal"></div>

<script src="js/datatables.min.js"></script>
<script src='../js/toastr.js'></script>
<script src="macanha/js/script.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/defaults-pt_BR.js"></script>