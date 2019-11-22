<?php 
include_once("../../functions.php");
require_once('../../Connections/gpi.php');
mysql_select_db($database_gpi, $gpi);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['cd_sigla']) && !empty($_POST['cd_sigla'])) {
	$sql = "DELETE FROM MCN_PLVR_ABRV WHERE CD_PLVR = ".$_POST['cd_sigla'];
	mysql_query($sql);
}
?>