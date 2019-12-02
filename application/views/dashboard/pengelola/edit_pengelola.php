<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
            <div class="container-fluid">
				<!-- Notifikasi -->
					<?php echo $this->session->flashdata('message'); ?>
				<!-- End Notifikasi -->
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit User</h4>
                            </div>
                            <div class="content">
							<?php foreach($konten as $data){?>
                                <form action="<?php echo base_url('index.php/adminxuser/proses_edit_user'); ?>" method="POST">
                                    <input type="hidden" name="id_pengelola" value="<?php echo $data['id_pengelola'];?>">
									<div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama_pengelola" class="form-control border-input" placeholder="Nama" value="<?php echo $data['nama_pengelola'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
												<select name="jenis_kelamin" class="form-control  border-input">
													<option selected disabled style="color:silver;">Jenis Kelamin</option>
													<option value="Laki-laki" >Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
								<?php } ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>