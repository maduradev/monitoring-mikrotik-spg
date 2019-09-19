<!-- Basic datatable -->
<div class="panel panel-warning">
	<div class="panel-body">
        <div class="row">
        	<div class="col-md-10"></div>
        	<div class="col-md-2">
	            <a class="btn btn-primary pull-right" href="<?php echo base_url() ?>mikrotik/tambah">Tambah</a>
            </div>
        </div>
        <br>
		<table class="table table-bordered table-hover datatable-basic" id="ayr-table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Alamat IP</th>
					<th>Nama Mikrotik</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>

			<?php 
				$no = 1;
				foreach ($mikrotik as $row) { 
					$action 	= '	<a class="btn btn-success" href="'.base_url().'mikrotik/edit/'.$row->id.'" data-popup="tooltip-custom" title="Edit Data" data-placement="bottom"><i class="fa fa-pencil"></i></a>
            						<a class="btn btn-danger" href="javascript:void(0)" onclick="hapus('.$row->id.')" data-popup="tooltip-custom" title="Hapus Data" data-placement="bottom"><i class="fa fa-trash-o"></i></a>';
			?>

				<tr class="gradeA">
					<td><?php echo $no; ?></td>
					<td class="right"><?php echo $row->ip_mikrotik; ?></td>
					<td class="left"><?php echo $row->nama_mikrotik; ?></td>
					<td class="center"><?php echo $action; ?></td>
				</tr>

			<?php 
					$no++; 
				} 
			?>
			</tbody>
		</table>
	</div>
</div>
<!-- /basic datatable -->
<script type="text/javascript">	
	$(document).ready(function() {
		$('#ayr-table').dataTable({
			"columns": [
				{ "width": "10%", "className": "text-left"  },
				{ "width": "30%", "className": "text-left" },
				{ "width": "45%", "className": "text-left"  },
				{ "width": "15%", "className": "text-center"  }
			]
	    });
	});

	function hapus(id) {
		var result = confirm("Apakah data ingin dihapus ?");
		if (result) {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url()?>mikrotik/hapus',
				data: { id : id },
				success: function(data) {
					if(data){
						alert('Data berhasil dihapus');
						window.location.href = '<?php echo base_url(); ?>mikrotik';
					}
					else{
						alert('Data gagal dihapus');
					}
				}
			});
		}
	}
</script>