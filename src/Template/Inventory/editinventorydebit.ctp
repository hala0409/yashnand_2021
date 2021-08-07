<?php
use Cake\Routing\Router;

// if(!$is_capable)
	// {
		// $this->ERPfunction->access_deniedmsg();
	// }
// else
// {
?>

<script type="text/javascript">
var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
jQuery(document).ready(function() {
	jQuery('#user_form').validationEngine();
	jQuery('#debit_date').datepicker({
		dateFormat: "dd-mm-yy",
		  changeMonth: true,
	        changeYear: true,
	        yearRange:'-65:+0',
	        onChangeMonthYear: function(year, month, inst) {
	            jQuery(this).val(month + "-" + year);
	        }                    
    });
	
	function count(row_id)
  {
		var qty = jQuery('#quantity_'+row_id).val();
		var rate = jQuery('#rate_'+row_id).val();
		var answer = 0;
		
		if(qty == '')
		{
			qty = 0;
		}
		
		if(rate == '')
		{
			rate = 0;
		}
		answer = parseFloat(qty*rate);
		
		jQuery('#single_amount_'+row_id).val(answer.toFixed(2));
		
		var amount_total = 0;
		jQuery('.amount_txt').each(function(){
				var single_amount = jQuery(this).val();
				if(single_amount == '')
				{
					single_amount = 0;
				}
				amount_total = parseFloat(parseFloat(amount_total)+parseFloat(single_amount));  
		});
		jQuery('#total_amount').val(amount_total.toFixed(2));
		
		var curr_data = {	 						 					
	 					amount : amount_total,	 					
	 					};
		jQuery.ajax({
			headers: {
				'X-CSRF-Token': csrfToken
			},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'convertnumbertowords'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					// var json_obj = jQuery.parseJSON(response);					
					 jQuery('#total_words').val("INR" + " " +response + " " + "only");
					// return false;
					//alert(response);
                },
                error: function (e) {
                     alert('Error');
                     console.log(e.responseText);
                }
            });	
		
  }
  
  jQuery('body').on('blur','.quantity',function(){

		var row_id = jQuery(this).attr('data-id');
		count(row_id);
		
    });
	
	jQuery('body').on('blur','.rate',function(){

		var row_id = jQuery(this).attr('data-id');
		count(row_id);
		
    });
	
	jQuery("body").on("change", "#project_id", function(event){ 
	 
	  var project_id  = jQuery(this).val() ;
		/* alert(product_id);
		return false; */
	   var curr_data = {	 						 					
	 					project_id : project_id,	 					
	 					};	 				
	 	 jQuery.ajax({
			headers: {
				'X-CSRF-Token': csrfToken
			},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'debitnoteprojectdetail'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					var json_obj = jQuery.parseJSON(response);					
					jQuery('#project_code').val(json_obj['project_code']);						
					jQuery('#debit_no').val(json_obj['debitno']);
					return false;
                },
                error: function (e) {
                     alert('Error');
                     console.log(e.responseText);
                }
            });	
	});
	
	
	jQuery("#add_newrow").click(function(){
		var row_length = 0;
		var row_length = jQuery(".row_number").length;
		if(row_length > 0)
		{
			var num = jQuery(".row_number:last").val();
			var row_id = parseInt(num) + 1;
		}
		else
		{
			var row_id = 0;
		}
		
		var sr_length = 0;
		sr_length = jQuery(".serial_no").length;
		if(sr_length > 0)
		{
			var num = jQuery(".serial_no:last").val();
			var sr_no = parseInt(num) + 1;
		}
		else
		{
			var sr_no = 1;
		}
		//alert('length:'+sr_length+' '+'value:'+sr_no);
		var action = 'add_newrow';
		jQuery.ajax({
			headers: {
				'X-CSRF-Token': csrfToken
			},
                       type: 'POST',
                      url: '<?php echo Router::url(["controller" => "Ajaxfunction","action" => "addnewedebitrow"]);?>',
                     data : {row_id:row_id , sr_no:sr_no},
                     success: function (response)
                        {	
                            jQuery("#expence_content").append(response);
							jQuery('#material_id_'+row_id).select2();
							jQuery('.delivery_date').datepicker({
								 changeMonth: true,
							  changeYear: true,
							  dateFormat: "dd-mm-yy"
							});
							return false;
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
	});
	
	jQuery("body").on("blur", ".amount_txt", function(event){ 
	
		var amount_total = 0;
		jQuery('.amount_txt').each(function(){
				var single_amount = jQuery(this).val();
				if(single_amount == '')
				{
					single_amount = 0;
				}
				amount_total = parseFloat(parseFloat(amount_total)+parseFloat(single_amount));  
		});
		jQuery('#total_amount').val(amount_total);
		
		var curr_data = {	 						 					
	 					amount : amount_total,	 					
	 					};
		jQuery.ajax({
			headers: {
				'X-CSRF-Token': csrfToken
			},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'convertnumbertowords'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					// var json_obj = jQuery.parseJSON(response);					
					 jQuery('#total_words').val("INR" + " " +response + " " + "only");
					// return false;
					//alert(response);
                },
                error: function (e) {
                     alert('Error');
                     console.log(e.responseText);
                }
            });	

	});	
	
	$("body").on("click",".del_parent",function(){
		$(this).parents("tr").remove();
		
		var amount_total = 0;
		jQuery('.amount_txt').each(function(){
				var single_amount = jQuery(this).val();
				if(single_amount == '')
				{
					single_amount = 0;
				}
				amount_total = parseFloat(parseFloat(amount_total)+parseFloat(single_amount));  
		});
		jQuery('#total_amount').val(amount_total);
		
		var curr_data = {	 						 					
	 					amount : amount_total,	 					
	 					};
		jQuery.ajax({
			headers: {
				'X-CSRF-Token': csrfToken
			},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'convertnumbertowords'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					// var json_obj = jQuery.parseJSON(response);					
					 jQuery('#total_words').val("INR" + " " +response + " " + "only");
					// return false;
					//alert(response);
                },
                error: function (e) {
                     alert('Error');
                     console.log(e.responseText);
                }
            });
			
			var i = 1;
			jQuery('.serial_no').each(function(){
					jQuery(this).val(i);
					i++;  
			});
			var a = 1;
			jQuery('.sr_div').each(function(){
					jQuery(this).html('');
					jQuery(this).html(a);
					a++;  
			});
		
	});
	
	
		
	$( ".row_number" ).each(function() {
		var project_id = jQuery("#project_id").val();
		var debit_date = jQuery("#debit_date").val();
		var party_id = jQuery("#party_id").val();
		var row_id = $( this ).val();
		var material_id = jQuery("#material_id_"+row_id).val();
		
		if(project_id != "" && debit_date != "" && party_id != "" && material_id != "" && row_id != "")
		{
			
			debitTillDateQuantity(project_id,debit_date,party_id,material_id,row_id);
		}else{
			jQuery("#till_date_qty_"+row_id).val(0);
		}
	});
	
	jQuery("body").on("change", ".material_id", function(event){
		var project_id = jQuery("#project_id").val();
		var debit_date = jQuery("#debit_date").val();
		var party_id = jQuery("#party_id").val();
		var material_id = jQuery(this).val();
		var row_id = jQuery(this).attr("data-id");
		
		if(project_id != "" && debit_date != "" && party_id != "" && material_id != "" && row_id != "")
		{
			debitTillDateQuantity(project_id,debit_date,party_id,material_id,row_id);
		}else{
			jQuery("#till_date_qty_"+row_id).val(0);
		}
	  
	});
	
	jQuery("body").on("change", "#project_id,#party_id,#debit_date", function(event){
		var project_id = jQuery("#project_id").val();
		var debit_date = jQuery("#debit_date").val();
		var party_id = jQuery("#party_id").val();
		
		$( ".row_number" ).each(function() {
		  var row_id = $( this ).val();
		  var material_id = jQuery("#material_id_"+row_id).val();
		  
		  if(project_id != "" && debit_date != "" && party_id != "" && material_id != "" && row_id != "")
			{
				
				debitTillDateQuantity(project_id,debit_date,party_id,material_id,row_id);
			}else{
				jQuery("#till_date_qty_"+row_id).val(0);
			}
		});
	});
	
	function debitTillDateQuantity(project_id,debit_date,party_id,material_id,row_id)
	{
		var curr_data = {	 						 					
							project_id : project_id,	 					
							debit_date : debit_date,	 					
							party_id : party_id,	 					
							material_id : material_id,					
						};	 				
		jQuery.ajax({
			headers: {
				'X-CSRF-Token': csrfToken
			},
			type:"POST",
			url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'getdebittilldatequantity'));?>",
			data:curr_data,
			async:false,
			success: function(response){			
				jQuery("#till_date_qty_"+row_id).val(response);
			},
			error: function (e) {
				 alert('Error');
			}
		});
	}
	
	jQuery("body").on("change", ".quantity", function(event){
		var row = jQuery(this).attr("data-id");
		var debit_qty = jQuery(this).val();
		var till_date_qty = jQuery("#till_date_qty_"+row).val();
		
		var debit_qty = parseFloat(debit_qty);
		var till_date_qty = parseFloat(till_date_qty);
		
		if(debit_qty > till_date_qty)
		{
			jQuery(this).val('');
			alert("Not allow return quantity greater than till date issued quantity.");
			return false;
		}
	});
	$("body").on("click",".del_file",function(){
		$(this).parentsUntil('.del_parent').remove();
	});
});
function ValidateExtension(){
		m=0;
		$('.imageUpload').each(function(){
			if($(this).val() != '') {
				var imageUpload=$(this).val();
				var allowedFiles = ["jpeg","jpg","png","pdf","csv"];
				
				var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
				if (!regex.test(imageUpload.toLowerCase())) {
					$(this).siblings('.notice').html("<?php echo $this->request->session()->read('image_validation'); ?>");
					m++;
				}
				else{
					$(this).siblings('.notice').html(" ");
				}
			}
		});
			if(m>0){
			return false;
			}
        }
		
</script>	
<div class="col-md-10" >
<?php 
if(!$is_capable)
	{
		$this->ERPfunction->access_deniedmsg();
	}
else
{
?>				
                <div class="block block-fill-white">
					<div class="head bg-default bg-light-rtl">
						<h2> EDIT DEBIT NOTE  </h2>
						<div class="pull-right">
						<a href="<?php //echo $this->ERPfunction->action_link('Accounts','debitnotealert');?>" onclick = "javascript:window.close();" class="btn btn-success"><span class="icon-arrow-left"></span> Back</a>
						</div>
					</div>
					
					<?php echo $this->Form->Create('form1',['id'=>'user_form','class'=>'form_horizontal formsize','method'=>'post','enctype'=>'multipart/form-data'],['url'=>['action'=>'']]);?>
					<input type="hidden" name="user_action" class="form-control" value="<?php ?>"/>	
					
					 <div class="content controls">
						<div class="form-row">
                            <div class="col-md-2">Project Code<span class="require-field">*</span> </div>
                            <div class="col-md-4"><input type="text" name="project_code" id="project_code" value="<?php echo $this->ERPfunction->get_project_code($debit_list['project_id']); ?>"
							class="form-control validate[required]" value="" readonly="true"/></div>
							<div class="col-md-2">Project Name *</div>
                            <div class="col-md-4">
								<select class="select2"  required="true"   style="width: 100%;" name="project_id" id="project_id">
								<option value="">--Select Project--</Option>
								<?php 
									foreach($projects as $retrive_data)
									{
									?>
										<option value="<?php echo $retrive_data["project_id"];?>" <?php if($debit_list['project_id'] == $retrive_data['project_id']) echo "selected=selected"; ?>>
										<?php echo $retrive_data["project_name"];?></option>
									<?php
									}
								?>
								</select>
							</div>
                        </div>
						
						
						<div class="form-row">
                            <div class="col-md-2">Debit Note No<span class="require-field">*</span> </div>
                            <div class="col-md-4"><input type="text" name="debit_no" value="<?php echo $debit_list['debit_note_no']; ?>" id="debit_no"
							class="form-control validate[required]"/></div>
							<div class="col-md-2 text-right">Date<span class="require-field">*</span> </div>
                            <div class="col-md-4"><input type="text" name="debit_date" id="debit_date" 
							 class="form-control validate[required]" value="<?php echo $this->ERPfunction->get_date($debit_list['date']); ?>"/></div>
                        </div>
						
						<div class="form-row">
                            <div class="col-md-2">Receiver Party/ Debit to<span class="require-field">*</span></div>
                            <div class="col-md-10">
								<?php  echo $this->Form->select("agency_name",$vendor_assets,["default"=>[$debit_list['debit_to']],"class"=>"select2 asst_list","style"=>"width:100%","id"=>"party_id","required"=>true]);?>
							</div>
                        </div>
						
						<div class="form-row">
                            <div class="col-md-2">Receiver's Name<span class="require-field">*</span> </div>
                            <div class="col-md-10">
								<input type="text" name="receiver_name" value="<?php echo $debit_list['receiver_name']; ?>" id="receiver_name" class="form-control validate[required]"/>
							</div>
							
                        </div>
					
						<div class="form-row">
                            <div class="col-md-2">Reason / Remarks<span class="require-field">*</span> </div>
                            <div class="col-md-10">
								<input type="text" name="reason" value="<?php echo $debit_list['reason']; ?>" placeholder="Misuse / Over-use / Lost / Other" id="reason" class="form-control validate[required]"/>
							</div>
							
                        </div>
						
						<div class="form-row">
						 
                            <table class="table table-bordered">
								<thead>
									<tr>
										<th style="width:15%">Sr.No</th>
										<th style="width:40%">Description</th>
										<th style="width:10%">Net Issue Qty.</th>
										<th style="width:15%">Approx. Quantity</th>
										<th style="width:10%">Unit</th>
										<th style="width:10%">Approx. Rate</th>
										<th style="width:15%">Approx Amount</th>
										
									</tr>
									<tr>
																
									</tr>
								</thead>
								<tfoot>
									<tr>
									<td colspan="5">
										<div class="col-md-12"><p class="text-center text-bold">Total Amount of Debit</p></div></td>
										<td class="col-md-3" colspan="2">
										<?php
										$i=0;
										$numItems = count($detail_data);
										foreach($detail_data as $retrive_data)
										{
										if(++$i === $numItems) 
										{
										?>
										<input type="text" name="total_amount" id="total_amount" value="<?php echo $retrive_data['total_amount']; ?>"
										class="form-control" readonly="true"/>
										<?php }} ?>
										</td>
									</tr>
									<tr>
										<td>In Words<span class="require-field">*</span></td>
										<td colspan="6">
										<?php
										$i=0;
										$numItems = count($detail_data);
										foreach($detail_data as $retrive_data)
										{
										if(++$i === $numItems) 
										{
										?>
										<input type="text" name="total_words" readonly="true" id="total_words" value="<?php echo $retrive_data['total_word']; ?>"
										class="form-control validate[required]"/>
										<?php }} ?>
										</td>
									</tr>
								</tfoot>
								<tbody id="expence_content">
								<?php 
								$i = 0;
									foreach($detail_data as $retrive_data)
									{
										
										 $i++;
								?>
									<tr id="row_id_<?php echo $i; ?>">
										<td style="width:15%">
											<span id="material_code_<?php echo $i; ?>" sr_no="<?php echo $i; ?>" class="sr_div"><?php echo $i; ?></span>
											<input type="hidden" name="debit[detail_id][]"  value="<?php echo $retrive_data['detail_id']; ?>"/>
											<input type="hidden" value="<?php echo $i; ?>" class="row_number">
										</td>
											
										<td>
											<select class="select2 material_id" style="width: 100%;" name="debit[material_id][]" id="material_id_<?php echo $i; ?>" data-id="<?php echo $i; ?>">
												<option value="">--Select Material--</Option>
												<?php 
													foreach($material_list as $retrive)
													{
														$selected = ($retrive['material_id'] == $retrive_data['material_id'])?"selected":"";
														echo '<option value="'.$retrive['material_id'].'"'.$selected.'>'.
														$retrive['material_title'].'</option>';
													}
												?>
											</select>
										</td>
										<td><input type="text" readonly="true" name="debit[till_date_qty][]" id="till_date_qty_<?php echo $i; ?>" value="" class="no-padding form-control"/></td>
										<td style="width:15%"> 
											<input type="text" name="debit[quantity][]" value="<?php echo $retrive_data['quantity']; ?>" class="quantity validate[required]" data-id="<?php echo $i; ?>" style="width:100%" id="quantity_<?php echo $i; ?>"/>
										</td>
										<td>
											<span id="unit_<?php echo $i; ?>"><?php echo $this->ERPfunction->get_category_title($this->ERPfunction->get_material_unit_id($retrive_data['material_id']))?></span>
										</td>
										
										<td style="width:15%">
											<input type="text" name="debit[rate][]" class="rate" value="<?php echo $retrive_data['rate']; ?>" data-id="<?php echo $i; ?>" id="rate_<?php echo $i; ?>" style="width:100%" />
										</td>
										
										<td style="width:15%">
											<input type="text" name="debit[single_amount][]" value="<?php echo $retrive_data['amount']; ?>" class="single_amount amount_txt" id="single_amount_<?php echo $i; ?>" style="width:100%"/></td>
										
										
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<!--<button type="button" id="add_newrow" class="btn btn-default">Add New </button>-->
                        </div>
						
						<div class="form-row" STYLE="margin-top:15px;">
							<div class="col-md-2 text-right">Attach Documents</div>
							<div class="col-md-4">
								<input type="file" name="debit_doc" id="debit_doc" class="form-control imageUpload">
								<span class='required red notice'></span>
							</div>
							<div class="add_field">
							<?php 
							$attached_files = $debit_list["attachment"];					
							if(!empty($attached_files))
							{?>
								<div class='del_parent'>
									<div class='form-row'>
										<div class='col-md-2'>
											<input type='hidden' name='attach_label[]' value='<?php echo $debit_list['attachment'];?>' class='form-control'>
											<b>Attachments :</b>
										</div>
										<div class='col-md-4'><a href="<?php echo $this->ERPfunction->get_signed_url($debit_list['attachment']);?>" class="btn btn-primary" target="_blank">View File</a>
										<input type='hidden' name='old_attach_file[]' value='<?php echo $debit_list['attachment'];?>' class='form-control'></div>
										<div class='col-md-2'><span class='del_file btn btn-danger'>x Remove</span></div>
									</div>
								</div>							
								<?php
							}
							?>
                        </div>
						</div>
						
						<div class="form-row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4"><button type="submit" class="btn btn-primary" onclick="return ValidateExtension()">Edit Debit Note</button></div>
                        </div>
					</div>
					
				<?php $this->Form->end(); ?>
			</div>
<?php } ?>
         </div>
<?php //} ?>