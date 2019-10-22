<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css"/>
<div class="templatemo_lightgrey_about" id="templatemo_about">
	<div class="container">
		<div class="templatemo_paracenter"><h2>Carepol</h2></div>
		<div class="templatemo_paracenter">
			<p>Etiam faucibus turpis id ipsum egestas porta. Cras in aliquet purus, ac varius turpis. Proin nibh mauris, lacinia at tincidunt egestas, tincidunt eleifend urna. Aliquam erat volutpat.</p>
		</div>
	</div>
	<div class="container">
		<div class="content table-responsive">
			<table id="example" class="display nowrap" style="width:100%">
				<thead>
					<th>No.</th>
					<th>latitude</th>
					<th>Longitude</th>
					<th>Co</th>
					<th>Updated</th>
				</thead>
				<tbody>
				<?php $no=1;foreach($konten as $data){?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['lat']; ?></td>
						<td><?php echo $data['lon']; ?></td>
						<td><?php echo $data['co']; ?></td>
						<td><?php echo $data['waktu_pengujian']; ?></td>
					</tr>
				<?php $no++;} ?>
				</tbody>
			</table>
		</div>
    </div>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
	<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
	</script>