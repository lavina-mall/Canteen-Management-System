<?php
require_once("header.php");
?>
<?php
$msg="";
if (isset($_POST['contact']))
{
	if(!empty($_POST['contact']))
	{	
		$contact=$_POST['contact'];
		$result = $db->query("SELECT * FROM users WHERE contact = ':value'",['value'=>$contact])->fetch();
		if(!empty($result))
		{
	
			$result = $db->delete('users'," contact = $contact ");
			$msg ="Customer Successfully deleted";

		}
		else
		{
			$msg="Mobile number does not exist";
		}
	}
	else
	{
		$msg="Enter Mobile Number";
	}
}

?>
<div id="page-wrapper">
    <div class="container-fluid">
		<div id="page-wrapper">
            <div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-12">
                        <h1 class="page-header">
                            Delete Customer
                        </h1> 
                    </div>
                </div>
				<div class="jumbotron">
					<form action="delete_customer.php" method="POST">
  						<div class="form-group">
       						<label for="contact" style="font-size:21px;"> Enter Mobile number</label>
  							<input type="contact" class="form-control" name="contact" placeholder="Mobile Number" >
  						</div>
  						<input type="submit" class="btn btn-primary btn-lg" value="Delete"> &nbsp <?php echo $msg;?>	
  					</form>	
                </div>
     	</div>
 	</div>
</div>



<?php
require_once("footer.php")
?>