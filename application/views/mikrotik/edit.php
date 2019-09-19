<!-- Basic datatable -->
<div class="panel panel-warning">
	<div class="panel-body">
		<form role="form" class="form-horizontal" id="form_vendor" method="post">
            <div class="form-group row" id="form-ip-mikrotik">
            	<div class="col-md-1"></div>
            	<div class="col-md-3">
                	<label>IP Mikrotik</label>
                	<input type="hidden" class="form-control" name="id_mikrotik" id="id_mikrotik" value="<?php echo $mikrotik->id; ?>" />
                </div>
            	<div class="col-md-7">
                	<input type="text" class="form-control" name="ip_mikrotik" id="ip_mikrotik" value="<?php echo $mikrotik->ip_mikrotik; ?>" />
                </div>
            	<div class="col-md-1"></div>
            </div>
            <div class="form-group row">
            	<div class="col-md-1"></div>
            	<div class="col-md-3">
                	<label>Nama Mikrotik</label>
                </div>
            	<div class="col-md-7">
                	<input type="text" class="form-control" name="nama_mikrotik" id="nama_mikrotik" value="<?php echo $mikrotik->nama_mikrotik; ?>" />
                </div>
            	<div class="col-md-1"></div>
            </div>
            <div class="row">
            	<div class="col-md-10"></div>
            	<div class="col-md-2">
		            <button id="save" type="button" class="btn btn-primary pull-right" data-loading-text="Proses...">Simpan</button>
		            <a class="btn btn-danger pull-left" onclick="reset()">Reset</a>
	            </div>
	        </div>
        </form>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#ip_mikrotik").keyup(function() {
			var ip_mikrotik = $("#ip_mikrotik").val();
			$.ajax({
				type : "POST",
				url: '<?php echo base_url()?>mikrotik/check_ip',
				data: { ip_mikrotik : ip_mikrotik },
				success: function(data) {
					console.log(data);
					if (data == 1) {
						$("#form-ip-mikrotik").removeClass("has-error").addClass("has-success");
						$('#save').removeAttr("disabled");
					} else {
						data = JSON.parse(data);
						if (data.ip_mikrotik == '<?php echo $mikrotik->ip_mikrotik; ?>') {
							$( "#form-ip-mikrotik" ).removeClass( "has-error" ).addClass( "has-success" );
							$('#save').removeAttr("disabled");
						} else {
							$( "#form-ip-mikrotik" ).removeClass( "has-success" ).addClass( "has-error" );
							$('#save').attr("disabled", true);
						}
					}
				}
			});
		});

		$('#save').click(function(){
			$.ajax({
	            type: 'POST',
	            url: '<?php echo base_url()?>mikrotik/update',
	            data: $('#form_vendor').serialize(),
	            success: function(data) {
	                data = JSON.parse(data);
	                if(data == '1')
	                {
	                	window.location.href = '<?php echo base_url(); ?>mikrotik';
	                }
	                else
	                {
	                    alert('Data gagal disimpan');
	                }
	            }
	        });
        });
	});

	function reset() {
		$("#ip_mikrotik").val('');
		$("#nama_mikrotik").val('');
	}
</script>