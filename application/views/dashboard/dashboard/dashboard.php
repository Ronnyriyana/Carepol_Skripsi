<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-sm-6">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-5">
                            <div class="spinner-border text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                          </div>
                          <div class="col-xs-7">
                              <div class="numbers">
                                  <p>Zona</p>
                                  <?= $zona; ?>
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr />
                          <div class="stats">
                              <i class="ti-reload"></i> Updated now
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-5">
                              <div class="icon-big icon-success text-center">
                                  <i class="ti-location-pin"></i>
                              </div>
                          </div>
                          <div class="col-xs-7">
                              <div class="numbers">
                                  <p>Parameter</p>
                                  <?= $parameter; ?>
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr />
                          <div class="stats">
                              <i class="ti-timer"></i> In the last hour
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-5">
                              <div class="icon-big icon-danger text-center">
                                  <i class="ti-user"></i>
                              </div>
                          </div>
                          <div class="col-xs-7">
                              <div class="numbers">
                                  <p>Pemilik Alat</p>
                                  <?= $pemilik_alat; ?>
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr />
                          <div class="stats">
                              <i class="ti-calendar"></i> Last day
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-5">
                              <div class="icon-big icon-info text-center">
                                  <i class="ti-signal"></i>
                              </div>
                          </div>
                          <div class="col-xs-7">
                              <div class="numbers">
                                  <p>Alat</p>
                                  <?= $alat; ?>
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr />
                          <div class="stats">
                              <i class="ti-reload"></i> Updated now
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">

          <div class="col-md-12">
              <div class="card">
                  <div class="header">
                      <h4 class="title">Users Behavior</h4>
                      <p class="category">24 Hours performance</p>
                  </div>
                  <div class="content">
                      <div id="chartHours" class="ct-chart"></div>
                      <div class="footer">
                          <div class="chart-legend">
                              <i class="fa fa-circle text-info"></i> Open
                              <i class="fa fa-circle text-danger"></i> Click
                              <i class="fa fa-circle text-warning"></i> Click Second Time
                          </div>
                          <hr>
                          <div class="stats">
                              <i class="ti-reload"></i> Updated 3 minutes ago
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
	  <div class="row">
        <div class="biskuit_wafer">
            <div id="messages"></div>
        </div>
	  </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.2/mqttws31.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/mqtt/style_dashboard.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/mqtt/mqtt_setting.js"></script>
<script>
$(document).ready(function() {
    startConnect();
});
function insertparameter(data){
   $.post("<?= base_url('index.php/receiver_alat/store'); ?>", data, function(data, status){
        document.getElementById("messages").innerHTML += '<span><b>Input: '+data+'</b></span><br/>';
    });
}
</script>