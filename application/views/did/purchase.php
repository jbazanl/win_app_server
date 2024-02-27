
<script src="<?php echo base_url() ?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>
<style type="text/css">
    .purchase {cursor:pointer;}
</style>    
<div class="">
    <div class="clearfix"></div>    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Purchase DID</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">DID Number <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="frm_prefix" id="frm_prefix" value="" class="form-control col-md-7 col-xs-12" data-parsley-type="digits" data-parsley-minlength="2"/>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="button" value="Search" name="frm_search" id="frm_search" class="btn btn-info" />    
                        </div>
                    </div>
                    <br />  
                    <div class="ln_solid"></div>       
                    <form action="<?php echo base_url(); ?>dids/purchase_did" method="post" name="add_form" id="add_form" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="action" value="OkSaveData">    
                        <input type="hidden" name="frm_key" value=""/>           

                        <div class="col-md-12 col-sm-6 col-xs-12 text-center" id="search_loader" style="margin:0 auto; display:none;">
                            <img src="<?php echo base_url(); ?>theme/default/images/loading.gif">
                        </div>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert" id="search_notfound" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong></strong>
                        </div>
                        <div class="form-group" id="search_result" style="display:none;">
                            <div class="col-md-6 col-sm-6 col-xs-12">							
                                <table class="table table-bordered table-striped jambo_table" id="didlisting">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 well" style="margin-top: 6px !important;">
                                <b>DID Details</b>
                                <div id="search_did" style="display:none;">		
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">DID</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control" disabled="disabled" type="text" value="" id="did" name="did">								  
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Setup Charge</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control has-feedback-left" disabled="disabled" type="text" value="" id="setup" name="setup">
                                            <span class="fa fa-inr form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Rental Charge</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control has-feedback-left" disabled="disabled" type="text" value="" id="rental" name="rental">
                                            <span class="fa fa-inr form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">PPM</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control has-feedback-left" disabled="disabled" type="text" value="" id="ppm" name="ppm">
                                            <span class="fa fa-inr form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">PPC</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control has-feedback-left" disabled="disabled" type="text" value="" id="ppc" name="ppc">
                                            <span class="fa fa-inr form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Minimal Time</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control" disabled="disabled" type="text" value="" id="min" name="min">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Resolution Time</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control" disabled="disabled" type="text" value="" id="res" name="res">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Grace Period</label>
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            <input class="form-control" disabled="disabled" type="text" value="" id="grace" name="grace">
                                        </div>
                                    </div>

                                    <input class="form-control has-feedback-left"  type="hidden" value="" id="add" name="add">
                                    <input class="form-control"  type="hidden" value="" id="mul" name="mul">
                                   
                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">I accepts the terms & conditions </label>
                                        <div class="col-md-2 col-sm-6 col-xs-12"><input class="form-control" type="checkbox" id="terms" value="yes" data-parsley-error-message="Please accepts"/> </div>								
                                    </div>

                                    <div class="form-group">     
                                        <div class="col-md-12">
                                            <ul class="list-unstyled text-info">
                                                <li><small><i class="fa fa-star"></i>DID Number setup charges will be not refundable and it is one-time charge.</small></li>
                                                <li><small><i class="fa fa-star"></i>Monthly DID number rental will not refundable if the DID number is discontinued mid of the month.</small></li>
                                                <li><small><i class="fa fa-star"></i>DID channel limit charges are monthly based and it will not refundable in case reduce the channels mid of the month.</small></li>
                                            </ul>   
                                        </div> 
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-sm-9 col-xs-12 col-md-offset-4">
                                            <button type="submit" class="btn btn-success" style="margin-bottom: -15px;display:none;">Purchase</button>
                                            <input class="form-control" type="hidden" value="" id="didno" name="didno">
                                            <input class="form-control" type="hidden" value="" id="setup_charge" name="setup_charge">
                                            <input class="form-control" type="hidden" value="" id="rental_charge" name="rental_charge">
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>				

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
<script>
    $(document).ready(function () {

      /*  var table = $('#didlisting').DataTable({
            searching: false,
            ordering: false,
            paging: false,
            bInfo: false,
        });*/
		//showDatatable('didlisting', [], [2, "asc"]);

        $('#didlisting').on('click', 'tr', function () {
            if ($(this).hasClass('selected'))
            {
                $(this).removeClass('selected');
            } else
            {
                $('#didlisting tbody tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $.dataBox = function (i, d) {
            $('#did').val(d[i].did);
            $('#didno').val(d[i].did);
            $('#setup').val(d[i].setup);
            $('#setup_charge').val(d[i].setup);
            $('#rental').val(d[i].rental);
            $('#rental_charge').val(d[i].rental);
            $('#ppm').val(d[i].ppm);
            $('#ppc').val(d[i].ppc);
            $('#min').val(d[i].min);
            $('#res').val(d[i].res);
            $('#grace').val(d[i].grace);
            $('#add').val(d[i].add);
            $('#mul').val(d[i].mul);

            $('#add_form .btn-success').show();

        };

        $.listBox = function (data) {
            var str = '';
            $.each(data, function (key, value) {
                hash = key + 1;
                str += '<tr><td width="40">' + hash + '</td><td>' + value.did + '</td><td width="80"><a title="Purchase" data-key="' + key + '" class="edit purchase">View <i class="fa fa-angle-double-right"></i></a></td></tr>';
            });

            $('#search_did').hide();
            //$.dataBox(0,data);

            $('#search_result tbody').html(str);
            $('#search_result tbody a').bind("click", function () {
                $('#search_did').show();
                $.dataBox($(this).data("key"), data);
            });
        };

        $('#frm_search').click(function () {
            $('#terms').attr('data-parsley-required', 'false');
            var is_ok = $("#add_form").parsley().isValid();
            if (is_ok === true)
            {
                $('#search_loader').show();
                $('#search_notfound').hide();
                $('#search_result').hide();

                /*$.get("<?php echo base_url() ?>dids/api_did", function (data, status) {
                 $('#search_loader').hide();			
                 if(data.length>0)
                 {
                 $('#search_result').show();
                 $.listBox(data);					
                 }
                 else $('#search_notfound').show();
                 });*/

                $.post("<?php echo base_url() ?>dids/api_did", {did: $('#frm_prefix').val()})
                        .done(function (data) {
                            $('#search_loader').hide();
                            if (data.status == true)
                            {
                                $('#search_result').show();
                                $.listBox(data.dids);


                                $('#terms').attr('data-parsley-required', 'true');
                            } else
                            {
                                $('#search_notfound strong').html(data.msg);
                                $('#search_notfound strong').html(data.dids);
                                $('#search_notfound').show();
                            }
                        })
                        .fail(function () {
                            alert("error");
                        });
            } else
            {
                $('#add_form').parsley().validate();
            }
        });

    })
</script>
