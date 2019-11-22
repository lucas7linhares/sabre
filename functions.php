<?php
function getWord(){
	$returnArray = array();
	$sql = "SELECT 
			    P.*,
			    T.NM_TIPO
			FROM
			    MCN_PLVR_ABRV P
			        LEFT JOIN
			    MCN_PLVR_TIPO T ON P.CD_MCN_PLVR_TIPO = T.CD_MCN_PLVR_TIPO";
	$rs = mysql_query($sql);
	while($row = mysql_fetch_array($rs)){
		$returnArray[$row['CD_PLVR']] = $row;
	}
	return $returnArray;
}

function existeSigla($palavra, $abreviacao, $cd_sigla = NULL) {
	$cd_sigla = str_replace("'", "", $cd_sigla);

	$palavra = trim(strip_tags(str_replace("'", "", $palavra)));
	$abreviacao = trim(strip_tags(str_replace("'", "", $abreviacao)));

	$sql = "SELECT 
			    CD_PLVR
			FROM
			    MCN_PLVR_ABRV
			WHERE
			    DC_PLVR = '".$palavra."' OR DC_ABRV = '".$palavra."'
			        OR DC_PLVR = '".$abreviacao."'
			        OR DC_ABRV = '".$abreviacao."'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$existe = true;
		while ($row = mysql_fetch_assoc($result)) {
			$cd_existente = $row['CD_PLVR'];
			if ($cd_existente != $cd_sigla) {
				return true;
			}
		}
		if ($existe || $cd_existente == $cd_sigla) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}

function getInfoPalavra($cd_sigla) {
	$sql = "SELECT * FROM MCN_PLVR_ABRV WHERE CD_PLVR = ".$cd_sigla;
	$rs = mysql_query($sql);
	if (mysql_num_rows($rs) > 0) {
		return mysql_fetch_array($rs);
	} else {
		return null;
	}
}

function getTipos() {
	$sql = "SELECT * FROM MCN_PLVR_TIPO ORDER BY NM_TIPO ASC";
	$result = mysql_query($sql);
	$array = array();
	while ($row = mysql_fetch_assoc($result)) {
		$array[$row['CD_MCN_PLVR_TIPO']] = $row['NM_TIPO'];
	}

	return $array;
}
?>