<?php include('header/header.php'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                     Widget settings form goes here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn blue">Save changes</button>
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN STYLE CUSTOMIZER -->

<!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
     <small></small>
    </h3>

    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="#" method="POST">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-basket font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">
                            New Subadmin Registration </span>

                        </div>
                        <div class="actions btn-set">

                            <button class="btn btn-default btn-circle " type="button" onClick="location.href='<?php echo base_url('index.php/subadmin') ?>'"><i class="fa fa-reply"></i> back</button>
                            <button type="submit" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>


                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_general" data-toggle="tab">
                                    General </a>
                                </li>

                            </ul>
                            <div class="tab-content no-space">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Name <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="name" placeholder="" data-validation="length alphanumeric" data-validation-length="min2">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Username <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="username" placeholder="" data-validation="length alphanumeric" data-validation-length="min6">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Email <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="email" placeholder="" data-validation="email">
                                            </div>
                                        </div>
                                        
                                 

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Password <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="pass_confirmation" data-validation="length" data-validation-length="min8">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Confirm password <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="pass" data-validation="confirmation">
                                            </div>
                                        </div>
                                        
                                        

                                  
                                 
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
<?php include('header/footer.php'); ?>
<script src="<?php echo base_url(); ?>resources/assets/global/scripts/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    
    
    $.validate({
    lang: 'es'
  });
    
    
</script>