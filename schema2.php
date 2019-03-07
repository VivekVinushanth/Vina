<?php
require_once 'header1.php';
$query="Select name,db,tables,columns from db natural join users ";
$result = mysqli_query($conn, $query);

echo "<div class='container2' align='center' >";

if($result){
	echo '<legend>User Schemas</legend>';
	$record = mysqli_fetch_assoc($result);
	if(sizeof($record)!=0){
		echo '<table class="table table-hover"><tr class="table-active">';
		foreach($record as $key => $data){
			echo "<th scope='row'>$key</th>";
		}
		
		while($record){
			echo '<tr class="table-active">';
			foreach($record as $key => $data){
				echo "<td width='auto'>$data</td>";
			}
			
			echo '</tr>';
			$record = mysqli_fetch_assoc($result);
		}
		echo '</table>';
	}
}
echo "</div>";
require_once 'footer.php';
?>