<?php $link = mysql_connect("us-cdbr-sl-dfw-01.cleardb.net", "b1a452e692a4c1","7de3a1eb");

$query = "SELECT counter FROM `ibmx_c577f9096c258cc`.`counter_api`";     
$result = mysql_query($query);  

while ($counter = mysql_fetch_array($result))
         
		 {            
			$counter_bd=$counter['counter'];
										
	     };
		  
 $counter_bd=$counter_bd+1;
 echo "{\"count\":".$counter_bd."}";
 $query2 = "UPDATE `ibmx_c577f9096c258cc`.`counter_api` SET counter = " . $counter_bd . " WHERE id=1 ;"; 
 $result = mysql_query($query2);  
?>