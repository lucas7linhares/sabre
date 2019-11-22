<?php
if (isset($_POST['edit_sigla'])) {
	$arrayPost = null_db($_POST);

	if (!empty($arrayPost['palavra']) && !empty($arrayPost['abreviacao']) && !empty($arrayPost['cd_sigla'])) {

		if (!existeSigla($arrayPost['palavra'], $arrayPost['abreviacao'], $arrayPost['cd_sigla'])) {
			$sql = "UPDATE 
						MCN_PLVR_ABRV 
					SET 
						DC_PLVR = ".strip_tags($arrayPost['palavra']).",
						DC_ABRV = ".strip_tags($arrayPost['abreviacao']).",
						CD_MCN_PLVR_TIPO = ".$arrayPost['tipo'].",
						VL_TMN = ".$arrayPost['tamanho']."
					WHERE 
						CD_PLVR = ".$arrayPost['cd_sigla'];
			mysql_query($sql);

			$retorno = "&type=success&msg=Alterado com sucesso!";
		} else {
			$retorno = "&type=warning&msg=Sigla já existente!";
		}		
	} else {
		$retorno = "&type=danger&msg=Preencha todos os campos!";
	}
}
?>
<script>window.location.href="mac.php?submod=mac<?=$retorno?>"</script>