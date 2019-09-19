
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo APP_NAME; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url()?>assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url()?>assets/js/custom.js"></script>
</head>
<body>
    <div id="page-inner">
        <br/>
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                <div class="panel-heading text-center">
                   <h4>Aplikasi Monitoring Mikrotik</h4>
                </div>
                <div class="panel-body">
                    <div id="pesan-error" class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="alert alert-danger" id="ayr-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Password Salah!
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <h5>Username</h5>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="username" id="username"/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <h5>Password</h5>
                        </div>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="password" id="password"/>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <button class="btn btn-primary pull-right" id="simpan">Login</button>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pesan-error').hide();
            $('#simpan').click(function(){
                //cek username yg ada di database
                var username = $('#username').val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>check-username',
                    data: { username : username },
                    success: function(data) {
                        if (data == '1') {
                            prose_login();
                        } else {
                            $('#ayr-alert').text('Username tidak ditemukan!');
                            $('#pesan-error').show();

                            setTimeout(function(){
                                $('#ayr-alert').text('');
                                $('#pesan-error').hide();
                            }, 5000);
                        }
                    }
                });
            });
        });

        function prose_login() {
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>proses-login',
                data: { username : username, password : password },
                success: function(data) {
                    if (data == '1') {
                        console.log('berhasil');
                        window.location.href = '<?php echo base_url(); ?>';
                    } else {
                        $('#ayr-alert').text('Password Salah!');
                        $('#pesan-error').show();

                        setTimeout(function(){
                            $('#ayr-alert').text('');
                            $('#pesan-error').hide();
                        }, 5000);
                    }
                }
            });
        }
    </script>
</body>
</html>
