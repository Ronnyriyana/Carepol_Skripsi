<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/DataTables-1.10.20/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/css/buttons.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/Responsive-2.2.3/css/responsive.bootstrap.min.css">
<style>
	.btn-group{
		margin-left:10px;
	}

	.pagination > li.active > a, .pagination > li.active > span{background-color:#7ac29a;border-color:#7ac29a;}

	.jarak{
		margin-top:20px;
		margin-bottom:20px;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<!-- Notifikasi -->
		<?php echo $this->session->flashdata('message'); ?>
		<!-- End Notifikasi -->
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Tabel Lapor</h4>
						<p class="category">Laporan dari user melalui aplikasi.</p>
						<p class="category"></p>
					</div>
					<div class="content table-responsive">
						<table id="example" class="table table-striped table-bordered dt-responsive nowrap">
							<thead>
								<th>No.</th>
								<th>Pelapor</th>
								<th>waktu</th>
								<th>Caption</th>
								<th>Aksi</th>
							</thead>
							<tbody>
							<?php $no=1;foreach($konten as $data){?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $data['nama_lengkap']; ?></td>
									<td><?= $data['created_at']; ?></td>
									<td><?= mb_substr($data['caption'],0,50); ?></td>
									<td>
									<div class="dropdown">
										<button class="btn btn-success btn-xs btn-fill dropdown-toggle" type="button" data-toggle="dropdown"><span class="ti-settings"></span> <span class="caret"></span></button>
										<ul class="dropdown-menu dropdown-menu-right">
										  <li><a href="<?= base_url('index.php/lapor/detail/').$data['id_lapor']; ?>">Detail</a></li>
										  <li><a href="<?= base_url('index.php/lapor/proses_delete/').$data['id_lapor']; ?>"  data-toggle="confirmation" data-placement="left" data-popout="true">Delete</a></li>
										</ul>
									</div>
									</td>
								</tr>
							<?php $no++;} ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script>
	//swal berhasil
	<?php if($this->session->flashdata('berhasil')){ ?>
	    swal("Berhasil !", "<?= $this->session->flashdata('berhasil'); ?>", "success")
	<?php } ?>

	 //swal gagal
	<?php if($this->session->flashdata('gagal')){ ?>
	    swal("Gagal !", "<?= $this->session->flashdata('gagal'); ?>", "error")
	<?php } ?>
</script>

<script src="<?php echo base_url(); ?>assets/bootstrap-confirmation.js"></script>
<script>
  $('[data-toggle=confirmation]').confirmation({
	rootSelector: '[data-toggle=confirmation]',
	container: 'body',
	title: 'Ingin menghapus data ini ?',
	btnOkIcon: 'glyphicon glyphicon-trash'
  });
</script>

<script src="<?php echo base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Responsive-2.2.3/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/Responsive-2.2.3/js/responsive.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        buttons: [
			{extend: 'copy', className: 'btn btn-success btn-sm btn-fill', exportOptions: {columns: [ 0, 1, 2, 3]}},
			{extend: 'excel', className: 'btn btn-success btn-sm', exportOptions: {columns: [ 0, 1, 2]}},
			{extend: 'pdf', className: 'btn btn-success btn-sm btn-fill', exportOptions: {columns: [ 0, 1, 2, 3 ]}},
			{extend: 'csv', className: 'btn btn-success btn-sm', exportOptions: {columns: [ 0, 1, 2, 3 ]}}
		],
		columnDefs: [
            { responsivePriority: 10008, targets: 1 },
            {  "width": "8%", targets: 0 },
            {  "width": "8%", targets: 4 }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_length ' );
} );
</script>