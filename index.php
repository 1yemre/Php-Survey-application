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
	
	
	    if($kayitsayisi>0){ 
			?>
				
	<form action="oyver.php" method="post">
	     <table align="center" border="0" cellspacing="0" cellpadding="0">
	              
	            <tr height="30">
			         <td colspan="2"><?php echo $kayit["soru"];   ?></td>

			    </tr>  
			 	<tr height="30">
			         <td width="25"><input type="radio" name="cevap" value="1"></td>
			         <td width="275"><?php echo $kayit["cevap1"];   ?></td>
				
			    </tr>     
			 
			 	<tr height="30">
			         <td width="25"><input type="radio" name="cevap" value="2"></td>
			         <td width="275"><?php echo $kayit["cevap2"];   ?></td>
				
			    </tr>     

			 			 	<tr height="30">
			         <td width="25"><input type="radio" name="cevap" value="3"></td>
			         <td width="275"><?php echo $kayit["cevap3"];   ?></td>
				
			    </tr>     
                 <tr height="30">
			         <td colspan="2"><input type="submit" value="oyu gonder">
					 
					 </td>
					 
					  <tr height="30">
			         <td colspan="2" align="right"><a href="sonuclar.php" style=" text-decoration:none;color:blue;">
						  Anket sonucların Goster
						 </a>
					 
					 </td>


	   </table>
		
</form>

</body>
</html>
<?php
			
}else{?>
		 
	Anket Bulunmuyor			
			
<?php } ?> 	 
	
	
</body>
</html>
<?php 

$veritabanibaglantisi=null;

 ?>