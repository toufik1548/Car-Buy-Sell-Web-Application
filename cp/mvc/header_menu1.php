<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $logged_admin_name; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $cp_url; ?>/">Home <span class="sr-only">(current)</span></a>
      </li>




<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/changepassword/">Change Password</a>
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/media/">Media</a>
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/news/">News</a>
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/tips/">Tips</a>
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/logout.php">Logout</a>
        </div>
       
</li>


<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/users/">users</a>
           </div>
       
</li>


<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/brands/">Brands</a>
        </div>
       
</li>


<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          New Car
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/new-car-add/">Add New Car</a>
          <a class="dropdown-item" href="<?php echo $cp_url; ?>/new-car-list/">New Car List</a>
        </div>
       
</li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $cp_url; ?>/logout.php">Logout</a>
      </li>


    </ul>
  </div>
</nav>