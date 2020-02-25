<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-sm-6">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">
                                <i class="ti-map-alt"></i>
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
                          <a href="<?php echo base_url('index.php/map'); ?>">
                            <i class="ti-reload"></i> Update Zona
                          </a>
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
                          <a href="<?php echo base_url('index.php/map/parameter'); ?>">
                              <i class="ti-timer"></i> 8 Jam terakhir
                          </a>
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
                          <a href="<?php echo base_url('index.php/pengelola'); ?>">
                              <i class="ti-new-window"></i> Daftar Baru
                          </a>
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
                          <a href="<?php echo base_url('index.php/alat'); ?>">
                              <i class="ti-new-window"></i> Tambah baru
                          </a>
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
                      <h4 class="title">Data Parameter</h4>
                      <p class="category">8 Jam Terakhir</p>
                  </div>
                  <div class="content">
                    <textarea rows="12" class="form-control border-input">
                        <?php foreach($dataparameter as $data){
                                echo "Key Alat : ".$data['key_alat']." | Co : ".$data['co']." | Co2 : ".
                                $data['co2']." | Kelembaban : ".$data['kelembaban']." | Suhu : ".$data['suhu'].
                                " | Lat : ".$data['lat']." | Lon : ".$data['lon']." \n";
                        }
                        ?>
                    </textarea>
                      <div class="footer">
                          <hr>
                          <div class="stats">
                          <a href="">
                              <i class="ti-reload"></i> Update
                          </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>