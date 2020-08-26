<html>

<style>
th {
	font-size: 1.25em;
	color:blue
}


</style>


<?php

function testing($filename, $delimiter, $quote, $columns_to_show) {

	$handle = fopen($filename,"r") or die("Cannot open" . $filename);
	
	$column_set = preg_split("/:/",$columns_to_show);
	echo "<table  border=\"1\">\n";
	$check = 0;
	while ($data = fgets($handle)) {
		echo "<tr>\n";
		preg_match_all("/". $quote . "(.+)" . $quote ."|[^" . $delimiter ."]++/",$data,$data_cols);
		//$data_cols = preg_split("/".$delimiter."/",$data);
		
		if ($columns_to_show == "ALL" ){
			for ($k=0; $k<count($data_cols[0]); ++$k) {
				if ($data_cols[0][$k][0]=="\"" && $data_cols[0][$k][-1]=="\""){
					$data_cols[0][$k] = substr($data_cols[0][$k],1,strlen($data_cols[0][$k])-2);
				}
				if ($check ==0){
					echo "  <th> ".$data_cols[0][$k]." </th>\n";
				} else{
					echo "  <td> ".$data_cols[0][$k]." </td>\n";
				}
			}
			echo "</tr>\n";
			
		} else{
			
		for ($k=0; $k<count($data_cols[0]); ++$k) {
			
			if (in_array($k+1, $column_set)){
				if ($data_cols[0][$k][0]=="\"" && $data_cols[0][$k][-1]=="\""){
					$data_cols[0][$k] = substr($data_cols[0][$k],1,strlen($data_cols[0][$k])-2);
				}
				if ($check ==0){
					echo "  <th> ".$data_cols[0][$k]." </th>\n";
				} else{
					echo "  <td> ".$data_cols[0][$k]." </td>\n";
				}
				
			}
		}
			echo "</tr>\n";
		}
		$check += 1; 
	}
	fclose($handle);
	
	
	

}
?>

</html>
