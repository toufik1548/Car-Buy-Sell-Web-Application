


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Used Cars DataTable
        <a class="btn btn-primary" href="<?php echo $cp_url; ?>/brand-add/" role="button">Add New Brand</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                  <th><center>Brand ID</center></th>
                  <th><center>Photo</center></th>
                  <th><center>Name</center></th>
                  <th><center>Total Models</center></th>
                  <th><center>Actions</center></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $qb = mysqli_query($con,"SELECT * FROM car_brands WHERE brand_name!='All' ORDER BY brand_name ASC");
                while($rb=mysqli_fetch_assoc($qb)){
                ?>
                    <tr>
                        <td><center><?php echo $rb['brand_id']; ?></center></td>
                        <td align="center" ><center><img src="../../images/brands/logo/<?php echo $rb['brand_logo']; ?>" width="100"></center></td>
                        <td><center><?php echo $rb['brand_name']; ?></center></td>
                        <td><center><?php echo get_total("car_models", "model_id","WHERE brand_id=".$rb["brand_id"]);?></center></td>
                        <td><center>
                          <a class="btn btn-info btn-sm" href="<?php echo $cp_url; ?>/brand-edit/<?php echo $rb['brand_id']; ?>" role="button">Edit</a>

                          <a class="btn btn-success btn-sm" href="<?php echo $cp_url; ?>/models/<?php echo $rb['brand_id']; ?>" role="button">Models</a>
                        </center></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>