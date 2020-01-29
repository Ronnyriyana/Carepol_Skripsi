<div class="sidebar" data-background-color="black" data-active-color="success">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <img src="<?= base_url() ?>assets/img/carepol.png" class="img-responsive" alt="Carepol">
                </a>
            </div>

            <ul class="nav">
                <li class="<?php echo isset($active_menu_dashboard)?$active_menu_dashboard:'' ?>">
                    <a href="<?php echo base_url('index.php/dashboard'); ?>">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?php echo isset($active_menu_grafik)?$active_menu_grafik:'' ?>">
                    <a href="<?php echo base_url('index.php/grafik'); ?>">
                        <i class="ti-bar-chart"></i>
                        <p>Grafik</p>
                    </a>
                </li>
                <li class="<?php echo isset($active_menu_pengelola)?$active_menu_pengelola:'' ?>">
                    <a href="<?php echo base_url('index.php/pengelola'); ?>">
                        <i class="ti-id-badge"></i>
                        <p>Pengelola</p>
                    </a>
                </li>
                <li class="<?php echo isset($active_menu_user)?$active_menu_user:'' ?>">
                    <a href="<?php echo base_url('index.php/user'); ?>">
                        <i class="ti-user"></i>
                        <p>User</p>
                    </a>
                </li>
				<li class="<?php echo isset($active_menu_alat)?$active_menu_alat:'' ?>">
                    <a href="<?php echo base_url('index.php/alat'); ?>">
                        <i class="ti-signal"></i>
                        <p>Alat</p>
                    </a>
                </li>
                <!--<li class="<?php echo isset($active_menu_maps)?$active_menu_maps:'' ?>">
                    <a href="#mapSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="ti-map"></i><p><b class="ti-angle-down"></b> Map</p></a>
                    <ul class="collapse active" style="list-style: none;" id="mapSubmenu">
                        <li class="<?php echo isset($active_menu_maps_zonasi)?$active_menu_maps_zonasi:'' ?>">
                            <a href="<?php echo base_url('index.php/map'); ?>">
                                <i class="ti-map-alt"></i>
                                <p>Map Zonasi</p>
                            </a>
                        </li>
                        <li  class="<?php echo isset($active_menu_maps_parameter)?$active_menu_maps_parameter:'' ?>">
                            <a href="<?php echo base_url('index.php/map/parameter'); ?>">
                                <i class="ti-location-pin"></i>
                                <p>Map Parameter</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="<?php echo isset($active_menu_maps_zonasi)?$active_menu_maps_zonasi:'' ?>">
                    <a href="<?php echo base_url('index.php/map'); ?>">
                        <i class="ti-map-alt"></i>
                        <p>Map Zonasi</p>
                    </a>
                </li>
                <li  class="<?php echo isset($active_menu_maps_parameter)?$active_menu_maps_parameter:'' ?>">
                    <a href="<?php echo base_url('index.php/map/parameter'); ?>">
                        <i class="ti-location-pin"></i>
                        <p>Map Parameter</p>
                    </a>
                </li>
				<li class="<?php echo isset($active_menu_lapor)?$active_menu_lapor:'' ?>">
                    <a href="<?php echo base_url('index.php/lapor'); ?>">
                        <i class="ti-email"></i>
                        <p>Lapor</p>
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