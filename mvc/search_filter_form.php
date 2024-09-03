<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="filterbtn">Filter/Sort</button>

<div class="modal-p-c">

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #000;">Filter/Sort</h4>
        </div>
      <div class="modal-body">

<form method="POST" action="<?php echo $site_url; ?>/filter/">

<div id="mysearchfilter">

<div class="form-group" style="width: 100%; padding-bottom: 15px; margin-bottom: 0px;">
  
<select name="loc_id" class="form-control" id="modal_form">
  <option value="0">-----Any District-----</option>
    <?php 

  $q = mysqli_query($con,"SELECT location_id,location_name FROM car_locations WHERE status=1 AND parent_id=0 AND location_name!='Bangladesh' ORDER BY location_name ASC");


    while($r = mysqli_fetch_array($q))
    {
    ?>
    <option value="<?php $loc_id=$r['location_id']; echo $loc_id; ?>" <?php if(isset($_POST["loc_id"]) && $_POST["loc_id"]==$r['location_id']){echo "selected";} ?>>
    <?php echo $r['location_name']; ?></option>
    <?php } ?>
</select>
</div>

<div class="form-group" style="width: 100%; padding-bottom: 15px; margin-bottom: 0px;">
<select name="brand_id" class="form-control">
	<option value="0">-----Any Brand-----</option>
		<?php 
		$q	=	mysqli_query($con,"SELECT brand_id,brand_name FROM car_brands WHERE status = 1 ORDER BY brand_name ASC");
		while($r = mysqli_fetch_array($q))
		{
		?>
	  <option value="<?php echo $r['brand_id']; ?>" <?php if(isset($_POST["brand_id"]) && $_POST["brand_id"]==$r['brand_id']){echo "selected";} ?>>
	  <?php echo $r['brand_name']; ?></option>
	  <?php } ?>
</select>
</div>

<div class="input-group" style="width: 100%; padding-bottom: 15px;">
  <span class="input-group-addon">Price (Min)</span>
  <input type="text" class="form-control" name="price_min" aria-label="price_min" value="<?php if(isset($_POST["price_min"])){echo $_POST["price_min"];}else{ echo "10000";} ?>" maxlength="7" required>
  <span class="input-group-addon">.00</span>
</div>


<div class="input-group" style="width:100%; padding-bottom: 15px;">
  <span class="input-group-addon">Price (Max)</span>
  <input type="text" class="form-control" aria-label="price_max" name="price_max" value="<?php if(isset($_POST["price_max"])){echo $_POST["price_max"];}else{ echo "5000000";} ?>" maxlength="7" required>
  <span class="input-group-addon">.00</span>
</div>



<select name="sort" class="form-control">
  <option value="price_min_max" <?php if(isset($_POST["sort"]) && $_POST["sort"]=="price_min_max"){echo "Selected";}?>>Price min to max</option>
  <option value="price_max_min" <?php if(isset($_POST["sort"]) && $_POST["sort"]=="price_max_min"){echo "Selected";}?>>Price max to min</option>
</select>





</div>
      </div><!--------Modal body End-------->


        <!-- Modal footer -->
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-lg btn-block" name="action">Search</button>
    </div>


</form>    
        
        <style type="text/css">
          button#filterbtn {
    margin-top: -5px;
}
        </style>

      </div>
    </div>
</div>

</div>