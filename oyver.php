<?php
require_once("baglan.php");



$gelencevap=filitre($_POST["cevap"]);


$kontrolsorgusu=$veritabanibaglantisi->prepare("SELECT * FROM oykullananlar WHERE ipadresi = ? AND tarih >=?");
$kontrolsorgusu->execute([$ipAdresi,$zamanigerial]);

$kontrolsayisi=$kontrolsorgusu->rowcount();
if($kontrolsayisi>0){
	 echo "hata<br>";
	 echo "daha once oy kullanıdınız, 24 saat sonra tekrar deneyiniz<br>";
	 echo "Anasayfa donmek icin <a href='index.php'>tıklayınız</a> ";
}else{
			  if($gelencevap==1){
                    $guncelle=$veritabanibaglantisi->prepare("UPDATE anket oysayisi1=oysayisi+1,toplamoysayisi=toplamoysayisi+1 ");
				   $guncelle->execute();
			  }elseif($gelencevap==2){
                  $guncelle=$veritabanibaglantisi->prepare("UPDATE anket oysayisi2=oysayisi2+1,toplamoysayisi=toplamoysayisi+1 ");
				   $guncelle->execute();
			  }
			  elseif($gelencevap==3){
    $guncelle=$veritabanibaglantisi->prepare("UPDATE anket oysayisi3=oysayisi3+1,toplamoysayisi=toplamoysayisi+1 ");
				   $guncelle->execute();

		     }
			else{ 
	echo "hata<br>";
	 echo "Cevap kaydı bulunamıyor";
 echo "Anasayfa donmek icin <a href='index.php'>tıklayınız</a> ";
			}
	
	$ekle=$veritabanibaglantisi->prepare("INSERT INTO oykullananlar (ipadresi,tarih) values(?,?)");
	
	    $ekle->execute([$ipAdresi,$zamandamgasi]);
	   $eklekontrol=$ekle->rowcount();	
	
	if($eklekontrol>0){
		echo"oy verdiginiz için tesekkurler";
	
	}else{
		echo "hata<br>";
	 echo "işlem sırasında hata olustu";
 echo "Anasayfa donmek icin <a href='index.php'>tıklayınız<br>";
	}
	
	

}


$veritabanibaglantisi=null;

 ?>