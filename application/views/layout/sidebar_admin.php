<div class="sidebar" data-background-color="black" data-active-color="info">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Carepol
                </a>
            </div>

            <ul class="nav">
                <li class="<?php echo isset($active_menu_dashboard)?$active_menu_dashboard:'' ?>">
                    <a href="<?php echo base_url('index.php/adminxdashboard'); ?>">
                        <i class="ti-bar-chart"></i>
                        <p>Grafik</p>
                    </a>
                </li>
                <li class="<?php echo isset($active_menu_user)?$active_menu_user:'' ?>">
                    <a href="<?php echo base_url('index.php/adminxuser'); ?>">
                        <i class="ti-user"></i>
                        <p>User</p>
                    </a>
                </li>
				<li class="<?php echo isset($active_menu_alat)?$active_menu_alat:'' ?>">
                    <a href="<?php echo base_url('index.php/adminxalat'); ?>">
                        <i class="ti-tablet"></i>
                        <p>Alat</p>
                    </a>
                </li>
				<li class="<?php echo isset($active_menu_maps)?$active_menu_maps:'' ?>">
                    <a href="<?php echo base_url('index.php/adminxmaps'); ?>">
                        <i class="ti-map"></i>
                        <p>Map</p>
                    </a>
                </li>
				<li>
                    <a href="#">
                        <i class="ti-email"></i>
                        <p>Lapor</p>
                    </a>
                </li>
				<li class="<?php echo isset($active_menu_export)?$active_menu_export:'' ?>">
                    <a href="<?php echo base_url('index.php/adminexport'); ?>">
                        <i class="ti-export"></i>
                        <p>Export</p>
                    </a>
                </li>

				<!--<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="ti-export"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>-->
            </ul>
    	</div>
    </div>