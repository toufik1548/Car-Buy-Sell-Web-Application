<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="<?php echo $cp_url; ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                    My Menu
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $cp_url; ?>/changepassword/">Change Password</a>
                        <a class="nav-link" href="<?php echo $cp_url; ?>/logout.php">Logout</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $cp_url; ?>/media/">Media</a>
                        <a class="nav-link" href="<?php echo $cp_url; ?>/post-add/">Post Add</a>
                        <a class="nav-link" href="<?php echo $cp_url; ?>/post-list/">Post List</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts5">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $cp_url; ?>/users/">Users</a>
                        <a class="nav-link" href="<?php echo $cp_url; ?>/showrooms/">Showrooms</a>
                        <a class="nav-link" href="<?php echo $cp_url; ?>/showrooms-temp/">Temp Showrooms</a>
                        <a class="nav-link" href="<?php echo $cp_url; ?>/temp-agents/">Temp Agents</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-car"></i></div>
                    Cars
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $cp_url; ?>/car-used/">Car List</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Brands
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo $cp_url; ?>/brand-add/">Brand Add</a>
                        <a class="nav-link" href="<?php echo $cp_url; ?>/brands/">Brand List</a>
                    </nav>
                </div>

                <a class="nav-link" href="<?php echo $cp_url; ?>/used-search-list/">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-magnifying-glass-location"></i></div>
                    Search Records
                </a>
                <a class="nav-link" href="<?php echo $cp_url; ?>/buyer-request/">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Buyer Request
                </a>
                <a class="nav-link" href="<?php echo $cp_url; ?>/sms-gateway/">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-sms"></i></div>
                    SMS Send
                </a>

                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="<?php echo $cp_url; ?>/chart/">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="<?php echo $cp_url; ?>/tables/">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <?php include("footer_left.php"); ?>
    </nav>
    
</div>
