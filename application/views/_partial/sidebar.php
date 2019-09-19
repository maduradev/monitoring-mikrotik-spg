<nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
    				<li class="text-center">
                        <img src="<?php echo base_url(); ?>assets/img/find_user.png" class="user-image img-responsive"/>
    					</li>
                        <li>
                            <a <?php if ($page == 'monitoring') { echo'class="active-menu"'; } ?> href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                        </li>
                        <li>
                            <a <?php if ($page == 'mikrotik') { echo'class="active-menu"'; } ?> href="<?php echo base_url(); ?>mikrotik"><i class="fa fa-table fa-3x"></i> Data Mikrotik</a>
                        </li>
                    </ul>
                </div>
            </nav>  
            <!-- /. NAV SIDE  -->