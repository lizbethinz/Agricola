<?php require_once ('conexionagricola.php');


   if (!isset($_SESSION['iduser']) || !$_POST['idpost']){
	   
	   header ('Location:'.$dato['0']);
   }



	//CONSULTA BASE DATOS 2
    mysql_select_db($database_conexion, $conexion);
    $query_DatosUser2 = sprintf("SELECT * FROM categorias WHERE id=%s ",$_POST['id'],"int");
    $DatosUser2 = mysql_query($query_DatosUser2, $conexion) or die(mysql_error());
    $row_DatosUser2 = mysql_fetch_assoc($DatosUser2);
    $totalRows_DatosUser2 = mysql_num_rows($DatosUser2);
	
	
	
	//if ($row_DatosUser2['autor']==$_SESSION['iduser']){
		
	unlink('../img/upload/'.$row_DatosUser2['imagen']);

	//BORRADO BASE DATOS
    $deleteSQL = sprintf("DELETE FROM categorias WHERE id=%s",
                               GetSQLValueString($_POST['id'], "int"));
        
    mysql_select_db($database_conexion, $conexion);
    $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
		
		//}
	
	
	mysql_free_result($DatosUser2);


?>