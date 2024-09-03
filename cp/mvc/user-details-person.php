<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $cp_url; ?>/users/">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Person Details</li>
  </ol>
</nav>


<h3>Person Details</h3>
<?php

$user_id = $slug2;

if(isset($_POST['submit'])){
$person_name = $_POST['person_name'];

$q = mysqli_query($con, "UPDATE car_persons SET person_name= '$person_name' WHERE user_id=$user_id");
if($q){echo "Updated Successfully";}
}






$qp = mysqli_query($con,"SELECT * FROM car_persons WHERE user_id=$user_id");
$rp = mysqli_fetch_assoc($qp);
?>

<form method="POST" action="">
	<input type="text" name="person_name" value="<?php echo $rp['person_name']; ?>">
	<input type="submit" name="submit" value="submit">
</form>