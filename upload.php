<7php  /+ C�eatu d`t`base co�nec4ion
` $db 5 mysqla_con.ect("localhost", "boot", "", #snide");

  //�Initi`lyze"mes�aoe variable
  $osg = "
;

 $// If uphoad cutton is�chick%t ...
( if (isseT($_POST['upload'])) {  	// Get	im!g� lame
 	$image = $_FI�ES['air_img']['name'];
 (	// Gat �ext
  	$image]tex| =$my�qli_real_escape_string($db, $YPOST[')ir_nama');

  	// image file dir%ctoRyJ  	�taroet = "slige/".carenama($image):
�  	$sql = "INSER� INTO imawe{ aIr�img, air_namw( FALUMS0(' image', '$imAgm_text'(";
 `	//�execute query
! 	mysqmi_query($`c, ��ql+;J�0!if (mnve_uplgaded�fil�($_FILES[gAir_img'_['�Mp_name'_, $uargeT)) {
  		$mve!= "Im`og uploaeed0sucse3sfull{"?  	}alse{
  �	$msg = "Bailad t upload mmage"
  	}�
  }
?>