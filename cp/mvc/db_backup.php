
<?php



if(isset($_POST['submit']))
{
  $delete =$_POST['delete'];
$a=unlink("../db_backup/".$delete);
if($a){echo "FIle Deleted Successfully";}else{ echo "Failed to delete";}

}

?>


<table width="100%" class="table table-bordered">
<tr class="table-primary">
<th >Date</th><th>Size</th><th>Name</th><th colspan="2" width="20%">Action</th>
</tr>
<?php




if ($handle = opendir('../db_backup')) {

    while (false !== ($entry = readdir($handle))) {
      if($entry !="." && $entry !=".." && $entry !="index.html"){

$file = '../db_backup/'.$entry;
$filesize = filesize($file);
$filesize = round($filesize / 1024 / 1024, 1);





?>
<tr>
	<td><?php echo substr($entry,4,10); ?></td>
	<td><?php echo $filesize;?>MB</td>
	<td><?php echo $entry; ?></td>
<td>	
	<a href="../db_backup/<?php echo $entry; ?>"><button class="btn btn-primary btn-sm">Download</button> </a>  
</td>
<td>
<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="delete" value="<?php echo $entry; ?>">
	<input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm">	

</form>	

</td>
</tr>





<?php

      }
    }



    closedir($handle);
}


?>

</table>
  