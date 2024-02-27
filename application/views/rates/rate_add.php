
<script src="<?php echo base_url() ?>theme/vendors/combo-box-typeahead/js/bootstrap-combobox.js"></script>
<link href="<?php echo base_url() ?>theme/vendors/combo-box-typeahead/css/bootstrap-combobox.css" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function () {
        $('.combobox').combobox()
    });
</script>
<!-- Parsley -->
<script src="<?php echo base_url() ?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>
<div class="">
    <div class="clearfix"></div> 
    <div class="col-md-12 col-sm-12 col-xs-12 right">
        <div class="x_title">
            <h2>Rate Configuration Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url('rates'); ?>"><button class="btn btn-danger" type="button">Back to Rate Listing Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Rate (ADD)</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />         
                    <form action="<?php echo base_url(); ?>rates/addR" method="post" name="add_form" id="add_form" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="button_action" id="button_action" value="">
                        <input type="hidden" name="action" value="OkSaveData">    
                        <input type="hidden" name="frm_key" value=""/>
                        <input type="hidden" name="frm_id" value=""/> 
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Ratecard Name<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="frm_card" id="frm_card" class="combobox form-control" data-parsley-required="">
                                            <option value="" >Select Ratecard</option>
                                            <?php
                                            $incoming_str = $outgoing_str = '';
                                            for ($i = 0; $i < $ratecard_data['total']; $i++) {

                                                $selected = '';
                                                if (set_value('frm_card') == $ratecard_data['result'][$i]['ratecard_id'])
                                                    $selected = ' selected="selected"';
                                                $option_str = '<option data-ratecard-for="' . $ratecard_data['result'][$i]['ratecard_for'] . '" value="' . $ratecard_data['result'][$i]['ratecard_id'] . '" ' . $selected . '>' . $ratecard_data['result'][$i]['currency_name'] . " :: " . $ratecard_data['result'][$i]['ratecard_name'] . ' (' . $ratecard_data['result'][$i]['ratecard_id'] . ')' . '</option>';
                                                if ($ratecard_data['result'][$i]['ratecard_for'] == 'INCOMING') {
                                                    $incoming_str .= $option_str;
                                                } else {
                                                    $outgoing_str .= $option_str;
                                                }
                                            }
                                            echo '<optgroup label="Incoming">' . $incoming_str . '</optgroup><optgroup label="Outgoing">' . $outgoing_str . '</optgroup>';
                                            ?>
                                        </select>

                                    </div>
                                </div>                  
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Prefix <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_prefix" id="frm_prefix" value="<?php echo set_value('frm_prefix'); ?>"  data-parsley-required="" data-parsley-type="digits" data-parsley-length="[1, 15]" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Destination <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_dest" id="frm_dest" value="<?php echo set_value('frm_dest'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-minlength="3">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Rate per Minute <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_ppm" id="frm_ppm" value="<?php echo set_value('frm_ppm', '0.000000'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-price="">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Charge / Connection <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_ppc" id="frm_ppc" value="<?php echo set_value('frm_ppc', '0.000000'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-price="">
                                    </div>
                                </div>

                                <div class="form-group class_incoming">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">DID Inclusive Channel <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_inclusive_channel" id="frm_inclusive_channel" value="<?php echo set_value('frm_inclusive_channel', '1'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-type="digits">
                                    </div>
                                </div>

                                <div class="form-group class_incoming">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">DID Exclusive Per Channel Rental <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_exclusive_per_channel_rental" id="frm_exclusive_per_channel_rental" value="<?php echo set_value('frm_exclusive_per_channel_rental', '0.000000'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-price="">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">First Pulse <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_min" id="frm_min" value="<?php echo set_value('frm_min', 1); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-type="digits" data-parsley-min="1">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> After First Pulse billing slab<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_res" id="frm_res" value="<?php echo set_value('frm_res', 1); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-type="digits" data-parsley-min="1">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Grace Period<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_grace" id="frm_grace" value="<?php echo set_value('frm_grace', 0); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-type="digits" data-parsley-min="0">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Rate Multiplier<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_mul" id="frm_mul" value="<?php echo set_value('frm_mul', '1.00'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-pattern="/^\d+(\.\d{1,2})?$/" data-parsley-min="0">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Fix Charge per call <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_add" id="frm_add" value="<?php echo set_value('frm_add', '0.00'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-pattern="/^\d+(\.\d{1,2})?$/" data-parsley-min="0">
                                    </div>
                                </div> 	 


                                <div class="form-group hide class_incoming">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">DID Rental <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_rental" id="frm_rental" value="<?php echo set_value('frm_rental', '0.00'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-price="">
                                    </div>
                                </div> 	 
                                <div class="form-group hide class_incoming">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">DID Setup Charge <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" name="frm_setup_charge" id="frm_setup_charge" value="<?php echo set_value('frm_setup_charge', '0.00'); ?>" class="form-control col-md-7 col-xs-12" data-parsley-required="" data-parsley-price="">
                                    </div>
                                </div> 	 


                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Status</label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <div class="radio">
                                            <label><input type="radio" name="frm_status" id="status1" value="1" <?php echo set_radio('frm_status', '1', TRUE); ?> /> Active</label>
                                            <label><input type="radio" name="frm_status" id="status0" value="0" <?php echo set_radio('frm_status', '0'); ?> /> Inactive</label>
                                        </div>                    
                                    </div>
                                </div>		 

                            </div>
                        </div>




                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <!--<a href="<?php echo base_url('rates') ?>"><button class="btn btn-primary" type="button">Cancel</button></a>-->				
                                <button type="button" id="btnSave" class="btn btn-success">Save</button>
                                <button type="button" id="btnSaveClose" class="btn btn-info">Save & Go Back to Listing Page</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 right">
        <div class="x_title">
            <h2>Rate Configuration Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url('rates'); ?>"><button class="btn btn-danger" type="button">Back to Rate Listing Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
</div>    
<script>
    window.Parsley
            .addValidator('alphanumspace', {
                validateString: function (value) {
                    return true == (/^[a-zA-Z\d ]+$/.test(value));
                },
                messages: {
                    en: 'This value should be in alphanumeric and Space'
                }
            })
            .addValidator('price', {
                validateString: function (value) {
                    return true == (/^\d+(?:[.,]\d+)*$/.test(value));
                },
                messages: {
                    en: 'This value should be in price format'
                }
            }
            );


    $('#btnSave, #btnSaveClose').click(function () {
        var is_ok = $("#add_form").parsley().isValid();
        if (is_ok === true)
        {
            var clicked_button_id = this.id;
            if (clicked_button_id == 'btnSaveClose')
                $('#button_action').val('save_close');
            else
                $('#button_action').val('save');

            $("#add_form").submit();
        } else
        {
            $('#add_form').parsley().validate();
        }
    });



    $("#frm_card").change(function () {
        ratecard_changed();
    });

    $(document).ready(function () {
        ratecard_changed();
    });

    function ratecard_changed()
    {
        var element = $('#frm_card').find('option:selected');
        var ratecard_for = element.attr("data-ratecard-for");

        if (ratecard_for == 'INCOMING')
        {
            $('.class_incoming').removeClass('hide');

            $('#frm_rental').attr('data-parsley-required', 'true');
            $('#frm_setup_charge').attr('data-parsley-required', 'true');

        } else
        {
            $('.class_incoming').addClass('hide');

            $('#frm_rental').attr('data-parsley-required', 'false');
            $('#frm_setup_charge').attr('data-parsley-required', 'false');
        }
//	alert(ratecard_for);

    }

</script>
