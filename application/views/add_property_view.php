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
                            Add New Property </span>

                        </div>
                        <div class="actions btn-set">

                            <button class="btn btn-default btn-circle " type="button" onClick="location.href='<?php echo base_url('index.php/area') ?>'"><i class="fa fa-reply"></i> back</button>
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
                                            <label class="col-md-2 control-label"> Property Name <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="name" placeholder="" data-validation="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Property Description <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea  rows="7" cols="50" name=""description"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Property Type <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="type" placeholder="" data-validation="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Property Floor <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="floor" placeholder="" data-validation="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Minimum Stay<span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="minimum_stay" placeholder="" data-validation="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Added on<span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="date" class="form-control" name="added_on" placeholder="" data-validation="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Available From<span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="date" class="form-control" name="available_from" placeholder="" data-validation="required">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Amenities <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">

                                                    <?php $amenitiesValues = Amenities::find_by_sql("select * from Amenities");
                                        foreach($amenitiesValues as $amenities)
                                        {
                                            $amenitiesFound= $amenities->values;
                                            $amenitiesId= $amenities->amenities_id;
                                            ?>

                                                <input type="checkbox" name="amenities[]" name ="<?php echo($amenitiesId) ?>" value="<?php echo($amenitiesFound) ?>"><?php echo($amenitiesFound) ?>
                                         <?php
                                        }
                                             ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Rules <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">

                                                <?php $rulesValues = Rules::find_by_sql("select * from Rules");
                                                foreach($rulesValues as $rules)
                                                {
                                                    $rulesFound= $rules->values;
                                                    $rulesId= $rules->rule_id;
                                                    ?>

                                                    <input type="checkbox" name="rules[]" name ="<?php echo($rulesId) ?>" value="<?php echo($rulesFound) ?>"><?php echo($rulesFound) ?>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Bills <span class="required">
                                            * </span>
                                            </label>
                                            <div class="col-md-10">

                                                <?php $billsValues = Bills::find_by_sql("select * from Bills");
                                                foreach($billsValues as $bills)
                                                {
                                                    $billsFound= $bills->values;
                                                    $billsId= $bills->bill_id;
                                                    ?>

                                                    <input type="checkbox" name="bills[]" name ="<?php echo($billsId) ?>" value="<?php echo($billsFound) ?>"><?php echo($billsFound) ?>
                                                    <?php
                                                }
                                                ?>
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