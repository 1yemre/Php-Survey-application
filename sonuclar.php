<?PHP
require_once("baglan.php");




?>

<!doctype html>
<html langs="tr-TR">
<head> 
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<title>Anasayfa</title>
</head>
    
<body>
	 <?php
	
	   $anketsorgusu=$veritabanibaglantisi->prepare("SELECT *from anket LIMIT 1");
	   $anketsorgusu->execute(); 
	   $kayitsayisi=$anketsorgusu->rowcount();
	   $kayit=$anketsorgusu->fetch(PDO::FETCH_ASSOC);
	
	   $anketinbirincisikoysayisi=$kayit["oysayisi1"];
	   $anketinikincisikoysayisi=$kayit["oysayisi2"];
	   $anketinucuncusikoysayisi=$kayit["oysayisi3"];
	   $anketintoplamoysayisi=$kayit["toplamoysayisi"];
	
	
	$birincisikyuzde=($anketinbirincisikoysayisi / $anketintoplamoysayisi)*100;
		$birformat=number_format($birincisikyuzde,2,",","");
	$ikincisikyuzde=($anketinikincisikoysayisi/ $anketintoplamoysayisi)*100;
	    $ikiformat=number_format($ikincisikyuzde,2,",","");
	$ucuncusikyuzde=($anketinucuncusikoysayisi/ $anketintoplamoysayisi)*100;
	    $ucformat=number_format($ucuncusikyuzde,2,",","");
	
	
	     
	
	    if($kayitsayisi>0){ 
			?>
				
	
	     <table align="center" border="0" cellspacing="0" cellpadding="0">
	              
	            <tr height="30">
					
			         <td colspan="2"><?php echo $kayit["soru"];   ?></td>

			    </tr>  
			 	<tr height="30">
					  <td width="75">%<?php echo $birincisikyuzde ;?></td>
			         <td width="225"><?php  echo $kayit["cevap1"];
						 ?></td>
				
			    </tr>     
			 
			 	<tr height="30">
			         <td width="75">%<?php echo $ikincisikyuzde ;?></td>
			         <td width="225"><?php echo $kayit["cevap2"];   ?></td>
				
			    </tr>     

			 			 	<tr height="30">
			         <td width="75">%<?php echo $ucuncusikyuzde   ?></td>
			         <td width="225"><?php echo $kayit["cevap3"];   ?></td>
				
			    </tr>     
              
					  <tr height="30">
			         <td colspan="2" align="right"><a href="index.php" style=" text-decoration:none;color:blue;">
						  Anasayfaya don
						 </a>
					 
					 </td>
		


	   </table>
		


</body>
</html>
<?php
			
}else{
           header("location:index.php");
			exit();
 ?>

			
<?php } ?> 	 
	
	
</body>
</html>
<?php 

$veritabanibaglantisi=null;

 ?>