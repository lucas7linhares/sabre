<?php
if (isset($_POST['insert_sigla'])) {
	$arrayPost = null_db($_POST);

	if (!empty($arrayPost['palavra']) && !empty($arrayPost['abreviacao'])) {
		
		if (!existeSigla($arrayPost['palavra'], $arrayPost['abreviacao'])) {
			$sql = "INSERT INTO 
						MCN_PLVR_ABRV (
							DC_PLVR,
							DC_ABRV,
							CD_MCN_PLVR_TIPO,
							VL_TMN
						) 
					VALUES (
						".strip_tags($arrayPost['palavra']).",
						".strip_tags($arrayPost['abreviacao']).",
						".$arrayPost['tipo'].",
						".$arrayPost['tamanho']."
					)";
			mysql_query($sql);

			$retorno = "&type=success&msg=Inserido com sucesso!";
		} else {
			$retorno = "&type=warning&msg=Sigla já existente!";
		}
	} else {
		$retorno = "&type=danger&msg=Preencha todos os campos!";
	}
}
?>
<script>window.location.href="mac.php?submod=mac<?=$retorno?>"</script>