<?php
require_once 'header.php';
$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
if(isset($_GET['idang']))
{
	$db=$_GET['idang'];
	echo $db;
	$res = mysqli_query($conn,"select db,tables,columns,schemaFile from db where db.db='$db';");
	
	$result= mysqli_fetch_assoc($res);
}

?>

<?php if(isset($_POST['resubmit'])){
		$newdb = $_POST['newdb'];
		$newtables = $_POST['newtables'];
		$newcolumns = $_POST['newcolumns'];
		$newschemaFile = $_POST['newschemaFile'];
		
		$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
		
		$query = mysqli_query($conn,"update db set db.db='$newdb',db.tables='$newtables',db.columns='$newcolumns',db.schemaFile='$newschemaFile' where db.db='$db';");
		
		echo "<script type='text/javascript'>alert(Updated Successfuly');</script>";
		
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
		
 
}
?>

<html lang="en">
<head>
<title>Vina | Update </title>

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
								<form method='post' >
								  <fieldset>
									<legend>UpdateschemaFile</legend>
									
									<div class="form-group">
									  <label for="db">Database Name</label>
									  <input type="text" class="form-control" id="db" name="newdb" value="<?php echo $result['db']; ?>" placeholder="Eg: Vina" required>
									</div>
									
									<div class="form-group">
									  <label for="tables">Tables</label>
									  <input type="text" class="form-control" id="tables" name="newtables" value="<?php echo $result['tables'] ?>" placeholder="Type tables separated by comma(,) Eg: user,product" required>
									</div>
									 
									
									 <div class="form-group">
									  <label for="columns">Columns</label>
									  <input type="text" class="form-control" id="columns" name="newcolumns" value="<?php echo $result['columns'] ?>"  placeholder="Type columns separated by comma(,) Eg: name,address,amount" required>
									</div>
									
									<div class="form-group">
									  <label for="columns">Schema File</label>
									  <input type="text" class="form-control" id="schemaFile" name="newschemaFile" value="<?php echo $result['schemaFile'] ?>"  placeholder="Copy and paste your contents schemaFile file here" required>
									</div>
												
									<button class="btn btn-primary" type="submit" name="resubmit">Update</button>
									
									
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