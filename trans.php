<?php
require_once 'header1.php';
$query="Select name,db,question,result,feedback from users natural join queries natural join db  ";
$result = mysqli_query($conn, $query);

echo "<div class='container2' align='center' >";

if($result){
	echo '<legend>User Stat</legend>';
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