<?php

try{
	$veritabanibaglantisi=new PDO("mysql:host=localhost;dbname=ornekler;charset=utf8","root","");
}catch(PDOException $hata){
	echo $hata->getMessage();
	
	
	
}

function filitre($deger){
	$bir=trim($deger);
	$iki=strip_tags($bir);
	$uc=htmlspecialchars($iki,ENT_QUOTES);
		
	
}

$ipAdresi=$_SERVER["REMOTE_ADDR"];

$zamandamgasi=time();
$oykullanmazamani=86400;//saniye cinsinden
$zamanigerial=$zamandamgasi-$oykullanmazamani;

?>