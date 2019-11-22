<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="Adicionar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered align-modal" role="document">
    <div class="modal-content">
    	<div class="panel panel-primary mb0">
			<div class="panel-heading">
				<span class="fa fa-plus-square"></span>
				Adicionar Palavra
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
			</div>
			<div class="panel-body">
				<form action="mac.php?submod=mac_insert" method="POST" class="form-horizontal" onsubmit="return confirmInsert('insert');">
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
							<input type="text" class="form-control" name="palavra" id="insert_palavra" required="true" maxlength="100" placeholder="Insira palavra...">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">
							Abreviação:<span class="obrigatorio">*</span>
						</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="abreviacao" id="insert_abreviacao" required="true" maxlength="100" placeholder="Insira abreviação...">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">
							Tipo:
						</label>
						<div class="col-md-5">
							<select name="tipo" id="insert_tipo" class="selectpicker" title="Selecione tipo" data-live-search="true">
								<?php foreach (getTipos() as $key => $value) { ?>
									<option value="<?=$key?>">
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
							<input type="number" class="form-control" name="tamanho" id="insert_tamanho" min="1" max="255" placeholder="Insira tamanho...">
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
							<button type="submit" class="btn btn-success" name="insert_sigla" title="Salvar dados">
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