<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $_header; ?>
        <?php echo $_js; ?>
    </head>
    <body>
        <div id="wrapper">
            <?php echo $_navbar; ?>
            <?php echo $_sidebar; ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <?php echo $_content; ?>
    			</div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
    </body>
</html>
