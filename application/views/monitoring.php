<?php
$index = 1;
foreach ($mikrotik as $row) {
    $output = $status = $bg = $icon = '';
    if ($index % 4 == 1) {
        echo '<div class="row">';
    }

    echo '<div id="ip-'.$row->id.'">';
    echo '  <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-times"></i>
                    </span>
                    <div class="text-box" >
                        <p class="main-text">'.$row->ip_mikrotik.'</p>
                        <p class="text-muted">'.$row->nama_mikrotik.'</p>
                    </div>
                </div>
            </div>';
            echo '</div>';

    if ($index % 4 == 0) {
        echo '</div>';
    }
    $index++;
}
?>

<script type="text/javascript">
    <?php
        foreach ($mikrotik as $row2) {
    ?>
        load_cctv2('<?php echo $row2->id; ?>'); //menampilkan data awal
    <?php
        }

        foreach ($mikrotik as $row2) {
    ?>
            setInterval(function () {
                    load_cctv2('<?php echo $row2->id; ?>'); //emnampilkan data secara realtime dengan waktu load 5 detik
            }, 5000);
    <?php
        }
    ?>

    setTimeout(function(){
        window.location.href = '<?php echo base_url(); ?>';
    }, 300000);

    function load_cctv2(id) {
        $('#ip-'+id).load('<?php echo base_url(); ?>monitoring/load_cctv_status/'+id);
    }
</script>