<div id="templatemo_home">
    	<div class="templatemo_top">
      <div class="container templatemo_container">
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div class="logo">
              <a href="#"><img src="<?php echo base_url(); ?>assets_frontend/images/logotype@2x.png" style="margin:10px;" alt="Carepol"></a>
            </div>
          </div>
          <div class="col-sm-9 col-md-9 templatemo_col9">
          	<div id="top-menu">
            <nav class="mainMenu">
              <ul class="nav">
                <li class="<?php echo isset($active_menu_home)?$active_menu_home:'' ?>">
                  <a class="menu" href="<?php echo base_url('index.php/frontend'); ?>">Home</a>
                </li>
                <li class="<?php echo isset($active_menu_map)?$active_menu_map:'' ?>">
                  <a class="menu" href="<?php echo base_url('index.php/frontend/map'); ?>">Map</a>
                </li>
                <li class="<?php echo isset($active_menu_grafik)?$active_menu_grafik:'' ?>">
                  <a class="menu" href="#">Grafik</a>
                </li>
                <li class="<?php echo isset($active_menu_data)?$active_menu_data:'' ?>">
                  <a class="menu" href="#">About</a>
                </li>
				<li>
                  <a class="menu" href="<?php echo base_url('index.php/login'); ?>">Dashboard</a>
                </li>
              </ul>
            </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>