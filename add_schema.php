<?php
require_once 'header.php';

	 
function Encrypt($message)
{
	$key='yeswedoencryptsonoworriesforvivi';
	$iv = 21474836;
    $cipher=openssl_encrypt ($message ,"AES-128-CBC" ,$key, $iv);
	return $cipher;
} 

if(isset($_POST['submit'])){
		$db = $_POST['db'];
		$tables = $_POST['tables'];
		$columns = $_POST['columns'];
		$schemaFile = $_POST['schemaFile'];
		
		$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
		$query = mysqli_prepare($conn,"INSERT INTO db (user_id,db,tables,columns,schemaFile)VALUES (?,?,?,?,?)");
		$query0=mysqli_stmt_bind_param($query, "sssss", $user_id,$db, $tables, $columns,$schemaFile);
		$result =mysqli_stmt_execute($query);
		
		
		
		 if($result){
			echo "<script type='text/javascript'>alert('yes!');</script>";
			$schema_id = mysqli_fetch_row(mysqli_query($conn, "SELECT LAST_INSERT_ID();"))[0];
			echo $schema_id;
			$res=mysqli_query($conn, "select schemaFile from db where db.schema_id=$schema_id ;");
			$ans=mysqli_fetch_assoc($res);
			$ans1=$ans['schemaFile'];
			
			$cipher=Encrypt($ans1);
			echo $cipher;
			echo $schema_id;
			mysqli_query($conn,"update db set db.schemaFile=$cipher where db.schema_id=$schema_id ;");
			
			
		}
		else{
			echo "<script type='text/javascript'>alert(Something Went Wrong! Please Try Again.');</script>";
		} 
}
	 
	 
	 
	 
	 

?>

<html lang="en">
<head>
<title>Vina | addSchema </title>

<script src="alert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="alert/dist/sweetalert.css">
</head>
<body>
<div class="main-content-wrapper d-flex clearfix">

    <!-- Header Area End -->
		<div align="center" style="margin:-0px 0 0 250px;">
			<div class="cart-table-area" style="padding:0 100px 100px 100px;">
				<div class="container-fluid">
					<div class="row">
						       <div class='container3' align='center'>
								<form method='post'>
								  <fieldset>
									<legend>Add schemaFile</legend>
									
									<div class="form-group">
									  <label for="db">Database Name</label>
									  <input type="text" class="form-control" id="db" name="db"value="" placeholder="Eg: Vina" required>
									</div>
									
									<div class="form-group">
									  <label for="tables">Tables</label>
									  <input type="text" class="form-control" id="tables" name="tables" value="" placeholder="Type tables separated by comma(,) Eg: user,product" required>
									</div>
									 
									
									 <div class="form-group">
									  <label for="columns">Columns</label>
									  <input type="text" class="form-control" id="columns" name="columns" value=""  placeholder="Type columns separated by comma(,) Eg: name,address,amount" required>
									</div>
									
									<div class="form-group">
									  <label for="columns">Schema File</label>
									  <input type="text" class="form-control" id="schemaFile" name="schemaFile" value=""  placeholder="Copy and paste your contents schemaFile file here" required>
									</div>
												
									<button class="btn btn-primary" type="submit" name="submit">Submit</button>
									
									
								  </fieldset>
								  
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    
</body>
<?php
require_once 'footer.php';
?>
		</html>