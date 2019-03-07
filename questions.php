<?php
require_once 'header.php';

if(isset($_POST['submit'])){
		$question=$_POST['question'];
		$db=$_POST['db'];
		$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
		$query = mysqli_prepare($conn,"INSERT INTO queries (user_id,db,question)VALUES (?,?,?)");
		$query0=mysqli_stmt_bind_param($query, "sss",$user_id,$db,$question);
		$result =mysqli_stmt_execute($query);
}
	 
?>

<html lang="en">
<head>
<title>Vina | Translate </title>

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
									<legend>Post Your Questions</legend>
									<div class="form-group">
									  <label for="question">Questions</label>
									  <input type="text" class="form-control" id="question" name="question" value="" placeholder="Place your question here" required>
									 <label for="xy">Choose your Database</label>
									
									 <select name="db">
												<?php 

												$sql = mysqli_query($conn, "SELECT db FROM db where db.user_id=$user_id ;");

												while ($row = $sql->fetch_assoc()){
												$val=$row['db']
												?>
												<option value='$val'><?php echo $val; ?></option>

												<?php
												// close while loop 
												}
												?>
												

									</select>
									
									</div>
									<button class="btn btn-primary" type="submit" name="submit">Submit</button>
									<?php echo "<div class='loader'></div> " ?>
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