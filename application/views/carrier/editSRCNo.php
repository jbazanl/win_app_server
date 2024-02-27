
<script src="<?php echo base_url() ?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>
<?php
$callerid_data = $data['callerid'];

$allowed_rules = $disallowed_rules = '';

foreach ($callerid_data as $callerid_data_temp) {
    if ($callerid_data_temp['action_type'] == 1) {
        if ($allowed_rules != '')
            $allowed_rules .= "\n";
        $allowed_rules .= $callerid_data_temp['display_string'];
    }
    else {
        if ($disallowed_rules != '')
            $disallowed_rules .= "\n";
        $disallowed_rules .= $callerid_data_temp['display_string'];
    }
}
?>

<div class="">
    <div class="clearfix"></div>    
    <div class="col-md-12 col-sm-12 col-xs-12 right">
        <div class="x_title">
            <h2>Carrier Caller ID Translation Rules</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url() . 'carriers/edit/' . param_encrypt($data['carrier_id']); ?>/<?php echo $active_tab; ?>"><button class="btn btn-danger" type="button" >Back to Carrier Edit Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">             
                <form action="" method="post" name="carrier_form" id="carrier_form" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="button_action" id="button_action" value="">
                    <input type="hidden" name="action" value="OkSaveData"> 
                    <input type="hidden" name="carrier_id" value="<?php echo $data['carrier_id']; ?>"/>    
                    <input type="hidden" name="carrier_key" value="<?php echo $data['carrier_id']; ?>"/>  
                    <input type="hidden" name="tab" value="<?php echo $active_tab; ?>">


                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Carrier </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="carrier_name_display" id="carrier_name_display" value="<?php echo $data['carrier_id'] . ' (' . $data['carrier_name'] . ')'; ?>"  disabled="disabled"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Allowed Rules </label>
                        <div class="col-md-8 col-sm-6 col-xs-10">                  
                            <textarea name="allowed_rules" id="allowed_rules" rows="5" class="form-control col-md-7 col-xs-12"><?php echo $allowed_rules; ?></textarea>   
                            <small>(comma or new line separated)</small> 
                        </div>


                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Allowed Rules Note </label>
                        <div class="col-md-8 col-sm-6 col-xs-10" style="color: blue">                  
                            %=>% : allow all CLI without CLI translation.
                            <br/>44|%=>% : allow only 44 prefix CLI and removing 44 prefix from CLI.
                            <br/>44|%=>0044% : allow only 44 prefix CLI and removing 44 and adding 0044 prefix in CLI.
                            <br/>44{4}|%=>% : allowing only 44 prefix CLI with 4 length and removing 44 from the CLI.
                            <br/>{10}%=>91% : allowing only 10 digit CLI and adding 91 prefix in the CLI.
                            <br/>%=>441149800228 : allowing all CLI and replacing incoming CLI with 441149800228.
                        </div>                         

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Disallowed Rules </label>
                        <div class="col-md-8 col-sm-6 col-xs-10">
                            <textarea name="disallowed_rules" id="disallowed_rules" rows="5" class="form-control col-md-7 col-xs-12"><?php echo $disallowed_rules; ?></textarea>
                            <small>(comma or new line separated)</small>  
                        </div>    


                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Allowed Rules Note </label>
                        <div class="col-md-8 col-sm-6 col-xs-10" style="color: blue">                  
                            % : Block the all CLI.
                            <br/>44% : block the starting with 44 CLI.
                            <br/>441149800228 : block the 441149800228 CLI.
                        </div>

                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-4">
                            <!--<a href="<?php echo base_url() . 'carriers/edit/' . param_encrypt($data['carrier_id']); ?>"><button class="btn btn-primary" type="button">Cancel</button></a>-->		
                            <button type="button" id="btnSave" class="btn btn-success">Save</button>
                            <button type="button" id="btnSaveClose" class="btn btn-info">Save & Go Back to carrier Edit Page</button>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 right">
        <div class="ln_solid"></div>
        <div class="x_title">
            <h2>Carrier Caller ID Translation Rules</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url() . 'carriers/edit/' . param_encrypt($data['carrier_id']); ?>/<?php echo $active_tab; ?>"><button class="btn btn-danger" type="button" >Back to Carrier Edit Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>  


<script>
    $('#btnSave, #btnSaveClose').click(function () {
        var is_ok = $("#carrier_form").parsley().isValid();
        if (is_ok === true)
        {
            var clicked_button_id = this.id;
            if (clicked_button_id == 'btnSaveClose')
                $('#button_action').val('save_close');
            else
                $('#button_action').val('save');

            if (is_ok === true)
            {
                $("#carrier_form").submit();
            }
        } else
        {
            $('#carrier_form').parsley().validate();
        }
    })
</script>