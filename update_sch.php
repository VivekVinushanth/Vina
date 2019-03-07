<?php
require_once 'header.php';
$query="Select db,tables,columns from db where user_id = '$user_id'";
$result = mysqli_query($conn, $query);

echo "<div class='container2'>";
if($result){
	$record = mysqli_fetch_assoc($result);
	if(sizeof($record)!=0){
		echo '<table class="table table-hover"><tr class="table-primary">';
		foreach($record as $key => $data){
			echo "<th scope='row'>$key</th>";
				}

		while($record){
			echo '<tr class="universal_table">';
			foreach($record as $key => $data){
				echo "<td class='universal_table' width='auto'>$data</td>";
			}
			
		
		    $record = mysqli_fetch_assoc($result);
			echo '<td><form method="get"><a class="btn btn-primary" name="edit" href="edit.php?idang='.$record['db'].'">Edit</a></form></td>';
		}
	
		echo '</table>';
	}

		else{
			echo "<div class='alert alert-dismissible alert-danger'>
		  <button class='close' type='button' data-dismiss='alert'>&times;</button>
		  <strong>Oh gosh!</strong> <a class='alert-link' href=questions.php>Ask VINA for your translations</a>";
}
}
echo "</div>";
require_once 'footer.php';
?>