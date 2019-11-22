<?php 
include_once("../../../functions.php");
require_once('../../../Connections/gpi.php');
mysql_select_db($database_gpi, $gpi);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
date_default_timezone_set('America/Sao_Paulo');

include_once("../functions.php");

if (isset($_POST['cd_sigla']) && !empty($_POST['cd_sigla'])) {
	$arrayPalavra = getInfoPalavra($_POST['cd_sigla']);
} else {
	echo "Palavra não encontrada";
	exit();
}
?>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="Alterar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered align-modal" role="document">
    <div class="modal-content">
    	<div class="panel panel-primary mb0">
			<div class="panel-heading">
				<span class="fa fa-pencil"></span>
				Alterar Palavra
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          		<span aria-hidden="true">&times;</span>
	    		</button>
			</div>
			<div class="panel-body">
				<form action="mac.php?submod=mac_edit" method="POST" class="form-horizontal" onsubmit="return confirmInsert('edit');">
					<input type="hidden" name="cd_sigla" id="cd_sigla" value="<?=$arrayPalavra['CD_PLVR']?>">
					<div class="form-group text-center">
						<small>
							<span class="obrigatorio">*</span> Campos obrigatórios
						</small>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">
							Palavra:<span class="obrigatorio">*</span>
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" id="edit_palavra" value="<?=$arrayPalavra['DC_PLVR']?>" name="palavra" required="true" maxlength="100" placeholder="Insira palavra...">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">
							Abreviação:<span class="obrigatorio">*</span>
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" id="edit_abreviacao" value="<?=$arrayPalavra['DC_ABRV']?>" name="abreviacao" required="true" maxlength="100" placeholder="Insira abreviação...">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">
							Tipo:
						</label>
						<div class="col-md-5">
							<select name="tipo" id="edit_tipo" class="selectpicker" title="Selecione tipo" data-live-search="true">
								<?php foreach (getTipos() as $key => $value) { ?>
									<option value="<?=$key?>" <?=($key==$arrayPalavra['CD_MCN_PLVR_TIPO']) ? "selected" : ""?>>
										<?=$value?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">
							Tamanho:
						</label>
						<div class="col-md-5">
							<input type="number" class="form-control" name="tamanho" value="<?=$arrayPalavra['VL_TMN']?>" id="edit_tamanho" min="1" max="255" placeholder="Insira tamanho...">
						</div>
					</div>
					<div class="form-group">
						<small>
							Obs.: Não poderão haver abreviações ou palavras repetidas!
						</small>
					</div>			
					<div class="form-group">
						<div class="col-md-6 text-left">
							<button type="button" class="btn btn-default" data-dismiss="modal" title="Cancelar operação">
								<span class="fa fa-ban"></span>
								Cancelar
							</button>
						</div>
						<div class="col-md-6 text-right">
							<button type="submit" class="btn btn-success" name="edit_sigla" title="Salvar dados">
								<span class="fa fa-floppy-o"></span>
								Salvar
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	  </div>
	</div>
</div>