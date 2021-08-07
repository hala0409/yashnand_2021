<?php
use Cake\Routing\Router;
?>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#user_form').validationEngine();
	jQuery('.from_date').datepicker({
		dateFormat: "dd-mm-yy",
		  changeMonth: true,
	        changeYear: true,
	        yearRange:'-65:+0',
	        onChangeMonthYear: function(year, month, inst) {
	            jQuery(this).val(month + "-" + year);
	        }                    
    });
	
	jQuery('.to_date').datepicker({
		dateFormat: "dd-mm-yy",
		  changeMonth: true,
	        changeYear: true,
	        yearRange:'-65:+0',
	        onChangeMonthYear: function(year, month, inst) {
	            jQuery(this).val(month + "-" + year);
	        }                    
    });
		
		
			jQuery('.brand_add').click(function(){
			
			
				var model  = jQuery(this).attr('data-type') ;
		
				var curr_data = {type : model};	 				
				 jQuery.ajax({
						type:"POST",
						url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'addmorebrand'));?>",
						data:curr_data,
						async:false,
						success: function(response){                    
							jQuery('.modal-content').html(response);
							jQuery('.select2').select2();
						},
						beforeSend:function(){
									jQuery('#modal-view').html('<center><img src=../images/4.gif width=120px><div><h3>Loading...</h3></div></center>');
								},
						error: function(e) {
								console.log(e);
								 }
					});			
		});
	
	jQuery('.viewmodal').click(function(){
			
			jQuery('#modal-view').html('hello');
			 var model  = jQuery(this).attr('data-type') ;
		//alert(model);
		//return false;
	   var curr_data = {type : model};	 				
	 	 jQuery.ajax({
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'addmorematerial'));?>",
                data:curr_data,
                async:false,
                success: function(response){                    
					jQuery('.modal-content').html(response);
					jQuery('.select2').select2();
                },
                beforeSend:function(){
							jQuery('#modal-view').html('<center><img src=../images/4.gif width=120px><div><h3>Loading...</h3></div></center>');
						},
		        error: function(e) {
		                console.log(e);
		                 }
            });			
		});
	
	jQuery("body").on("change", ".material_id", function(event){ 
	 var row_id = jQuery(this).attr('data-id');
	  var material_id  = jQuery(this).val() ;
		/* alert(material_id);
		return false;  */  
	   var curr_data = {	 						 					
	 					material_id : material_id,	 					
	 					};	 				
	 	 jQuery.ajax({
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'getmaterialbrandlist'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					var json_obj = jQuery.parseJSON(response);					
					
					jQuery('#brand_id_'+row_id).html();
					jQuery('#brand_id_'+row_id).html(json_obj['itemlist']);
					jQuery('#brand_id_'+row_id).select2();
					jQuery('#unit_name_'+row_id).html();
					jQuery('#unit_name_'+row_id).html(json_obj['unit_name']);
					jQuery('#material_code_'+row_id).html();
					jQuery('#material_code_'+row_id).html(json_obj['material_code']);					
					return false;
                },
                error: function (e) {
                     alert('Error');
                }
            });
	
  });
	
	
	
	
	jQuery("body").on("change", "#vendor_userid", function(event){ 
		 var vendor_userid  = jQuery(this).val() ;
		/* alert(product_id);
		return false; */
	   var curr_data = {	 						 					
	 					vendor_userid : vendor_userid,	 					
	 					};	 				
	 	 jQuery.ajax({
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'vendordetail'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					var json_obj = jQuery.parseJSON(response);					
					jQuery('#vendor_id').val(json_obj['vendor_id']);						
					jQuery('#vendor_address').val(json_obj['address_1']);						
					/* jQuery('#vendor_delivery_address').val(json_obj['delivery_place']); */						
					jQuery('#ven_contact_no1').val(json_obj['contact_no1']);												
					jQuery('#ven_contact_no2').val(json_obj['contact_no2']);												
					jQuery('#email').val(json_obj['email_id']);												
					jQuery('#pan_card_no').val(json_obj['pancard_no']);												
					jQuery('#gst_no').val(json_obj['gst_no']);												
					return false;
                },
                error: function (e) {
                     alert('Error');
                }
            });	
	});
	jQuery("#add_newrow").click(function(){
		
		var row_len = jQuery(".row_number").length;
		if(row_len > 0)
		{
			var num = jQuery(".row_number:last").val();
			var row_id = parseInt(num) + 1;
		}
		else
		{
			var row_id = 0;
		}
		
		jQuery.ajax({
                     type: 'POST',
                     url: '<?php echo Router::url(["controller" => "Ajaxfunction","action" => "purchaseraterow"]);?>',
                     data : {row_id:row_id},
                     success: function (response)
                        {	
                            jQuery("tbody").append(response);
							jQuery('.from_date, .to_date').datepicker({
								 changeMonth: true,
							  changeYear: true,
							  dateFormat: "dd-mm-yy"
							});
							jQuery('#material_id_'+row_id).select2();
							jQuery('#brand_id_'+row_id).select2();
							jQuery('#taxes_duties_'+row_id).select2();
							jQuery('#loading_trans_'+row_id).select2();
							jQuery('#unloading_'+row_id).select2();
							
							return false;
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
	});
	jQuery('.delivery_date').datepicker({
		 changeMonth: true,
      changeYear: true,
	  dateFormat: "dd-mm-yy"
	});
	
	jQuery("body").on("change", ".material_id", function(event){ 
	 var row_id = jQuery(this).attr('data-id');
	  var material_id  = jQuery(this).val() ;
		/* alert(material_id);
		return false;  */  
	   var curr_data = {	 						 					
	 					material_id : material_id,	 					
	 					};	 				
	 	 jQuery.ajax({
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'getmaterialbrandlist'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					var json_obj = jQuery.parseJSON(response);					
					
					jQuery('#brand_id_'+row_id).html();
					jQuery('#brand_id_'+row_id).html(json_obj['itemlist']);
					jQuery('#brand_id_'+row_id).select2();
					jQuery('#unit_name_'+row_id).html();
					jQuery('#unit_name_'+row_id).html(json_obj['unit_name']);
					// jQuery('#material_code_'+row_id).html();
					// jQuery('#material_code_'+row_id).html(json_obj['material_code']);
					
					return false;
                },
                error: function (e) {
                     alert('Error');
                }
            });
	
  });
  
  jQuery('body').on('click','.trash',function(){
		var row_id = jQuery(this).attr('data-id');
		
		jQuery('table tr#row_id_'+row_id).remove();	
		return false;
	});
	
	function count_total(row_id)
	{
		var price = parseFloat(jQuery('#unit_rate_'+row_id).val());
		var single_amount = price;
	
		var dc = parseFloat($("#dc_"+row_id).val());		
		if(dc != '')
		{			
			dc = parseFloat((100-dc)/100);
			single_amount = parseFloat(price * dc);
		}
		
		var tr = parseFloat($("#tr_"+row_id).val()); /* CGST */ 
		var gst = parseFloat($("#gst_"+row_id).val()); /* SGST */ 
		var other = parseFloat($("#other_tax_"+row_id).val()); /* IGST */
		var total_gst = parseFloat(tr + gst + other);
		if(total_gst > 0)
		{
			var gst_count = 1 + parseFloat(total_gst / 100);
			single_amount = parseFloat(single_amount * gst_count)
		}
		
		var single_amt = single_amount;
		
		jQuery('#final_rate_'+row_id).val(single_amt.toFixed(2));
	}
	
	 jQuery('body').on('blur','.unit_rate',function(){ 
		var row_id = jQuery(this).attr('data-id');
		count_total(row_id);
	});
	
	jQuery("body").on("change",".tx_count",function(){
		var row_id = jQuery(this).attr('data-id');
		count_total(row_id);
	});
	
	
	
	$("body").on("click",".del_parent",function(){
		$(this).parents("tr").remove();
		
		var po_sum = 0;
		jQuery('.amount').each(function(){
				var single_po_amount = jQuery(this).val();
				po_sum = parseFloat(parseFloat(po_sum)+parseFloat(single_po_amount));  
		});
		jQuery('#total_po_amount').html();
		jQuery('#total_po_amount').html(po_sum.toFixed(2));
	});
	
	$("body").on("change",".change_add",function(){
		var id = $(this).val();
		// alert(id);
		if(id == "mp")
		{
			/* $("#mp_address").css("display","block");
			$("#gj_address").css("display","none"); */	
			$("#vatno").val("23379109713");
			$("#cstno").val("23379109713");
				
		}else{
			/* $("#gj_address").css("display","block");
			$("#mp_address").css("display","none"); */
			$("#cstno").val("24073404329");
			$("#vatno").val("24073404329");
		}
		
	});
	
	jQuery("body").on("change",".othertax",function(){
		
		var sid = jQuery(this).attr("sid");
		
		if(sid == "other")
		{
			jQuery("#other_text").css("display","block");			
		}
		else{
			jQuery("#other_text").css("display","none");
		}
	});
	
	$("body").on("blur","#other_text",function(){
		var other_tx = $(this).val();
		$(".othertax").val(other_tx);
	});
	
	$("body").on("change","#loading",function(){
		var check = $(this).attr("checked");		
		if(check)
		{
			$("#show_loading").css("display","none");
		}else{$("#show_loading").css("display","block");}
	});
});
</script>
<style>
body
{
	overflow-x:hidden;
}
</style>	
<div class="modal fade " id="load_modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content"></div>
    </div>
</div>

<div class="modal fade " id="brand_modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content"></div>
    </div>
</div>
<div class="col-md-10" >
<?php 
if(!$is_capable)
	{
		$this->ERPfunction->access_deniedmsg();
	}
else
{
?>		
<div class="col-md-12" >		
                <div class="block block-fill-white">
					<div class="head bg-default bg-light-rtl">
						<h2>Finalized Purchase Rate  </h2>
						<div class="pull-right">
						<a href="<?php echo $this->ERPfunction->action_link('Purchase','index');?>" class="btn btn-success"><span class="icon-arrow-left"></span> Back</a>
						</div>
					</div>
					<?php echo $this->Form->Create('form1',['id'=>'user_form','class'=>'form_horizontal formsize','method'=>'post','enctype'=>'multipart/form-data'],['url'=>['action'=>'']]);?>
						
					
					 <div class="content controls">
					
						<div class="form-row">
                            <div class="col-md-2">Vendor Name:*</div>
                            <div class="col-md-4">
								<?php 
								
								?>
								<select class="select2"  required="true"   style="width: 100%;" name="vendor_userid" id="vendor_userid">
								<option value="">--Select Vendor--</Option>
								<?php 
									foreach($vendor_department as $retrive_data)
								{echo '<option value="'.$retrive_data['user_id'].'">'.
										$this->ERPfunction->get_vendor_name($retrive_data['user_id']).'</option>';									
									
								}
								?>
								</select>
							</div>
                        
                             <div class="col-md-2">Vendor ID:</div>
                            <div class="col-md-4">
								<input type="text" name="vendor_id" id="vendor_id" value="" class="form-control" value=""/>
							</div>
                        </div>
						<div class="form-row">
                            <div class="col-md-2">Vendor Addresss:</div>
                            <div class="col-md-10">
								<input type="text" name="vendor_address"  id="vendor_address" class="form-control" value=""/>
							</div>
                        </div>	
						<div class="form-row">						
                            <div class="col-md-2">Contact No: (1)</div>
							<div class="col-md-4">
								<input type="text" name="contact_no1" id="ven_contact_no1" class="form-control" value=""/>
							</div>
							
                            <div class="col-md-2">Contact No: (2)</div>
							<div class="col-md-4">
								<input type="text" name="contact_no2" id="ven_contact_no2" value="" class="form-control"/>
							</div>
						</div>
						<div class="form-row">
                            <div class="col-md-2">E-mail ID:</div>
                            <div class="col-md-10">
								<input type="text" name="email" id="email" class="form-control" value=""/>
							</div>
                        </div>
						
						<div class="form-row">						
                            <div class="col-md-2">Pan Card No:</div>
							<div class="col-md-4">
								<input type="text" name="pan_card_no" id="pan_card_no" class="form-control" value=""/>
							</div>
							
                            <div class="col-md-2">GST No:</div>
							<div class="col-md-4">
								<input type="text" name="gst_no" id="gst_no" value="" class="form-control"/>
							</div>
						</div>
						<div class="form-row">
                            <div class="col-md-2">Payment Method:</div>
                            <div class="col-md-4">
								<select class="select2"  required="true"   style="width: 100%;" name="payment_method" id="payment_method" >
									<option value="cheque">Cheque</Option>
									<option value="cash">Cash</Option>		
								</select>
							</div>
                        
                        </div>
						<div class="form-row">                           
							<div class="col-md-2">Project Name:*</div>
                        <div class="col-md-10">
							<select class="select2" required="true" style="width: 100%;" name="project_id[]" id="project_id" multiple="multiple">
								<?php 
									foreach($projects as $retrive_data)
									{
										$selected = (in_array($retrive_data['project_id'],$project_id)) ? "selected" : "";
										echo '<option value="'.$retrive_data['project_id'].'" '. $selected .'>'.$retrive_data['project_name'].'</option>';
									}
								?>
							</select>
						</div>
						</div>
						
						<div class="form-row">
							<div class="col-md-2">Rate from:</div>
							<div class="col-md-4">
								<input type="text" name="rate_from_date" value="" class="from_date"/>
							</div>
							<div class="col-md-2">Rate To:</div>
							<div class="col-md-4">
								<input type="text" name="rate_to_date" value="" class="to_date"/>
							</div>
						</div>
						
						<div class="form-row">
							<div class="col-md-2">All Taxes & Duties:</div>
							<div class="col-md-4">
								<select class="select2" required="true" name="taxes_duties" style="width:100%;">
									<option value="yes">Yes</Option>												
									<option value="no">No</Option>												
								</select>
							</div>
							
							<div class="col-md-2">Loading & Transportation</div>
							<div class="col-md-4">
								<select class="select2" required="true" name="loading_trans" style="width:100%;">
									<option value="yes">Yes</Option>												
									<option value="no">No</Option>												
								</select>
							</div>
						</div>
						
						<div class="form-row">
							<div class="col-md-2">Unloading</div>
							<div class="col-md-4">
								<select class="select2" required="true" name="unloading" style="width:100%;">
									<option value="yes">Yes</Option>												
									<option value="no">No</Option>												
								</select>
							</div>
						</div>
							
						<div class="form-row" style="overflow:scroll;margin-top:20px;">						
                            <table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="10" class="text-center">Material / Item</th>
										<th rowspan="2" class="text-center">Delete</th>
									</tr>
									<tr>
										<th>Description</th>
										<th>HSN Code</th>
										<th>Make / Source</th>
										<th>Unit</th>	
										<th>Unit Rate<br>(Rs.)</th>	
										<th>Dis<br>(%)</th>
										<th>CGST<br>(%)</th>
										<th>SGST<br>(%)</th>
										<th>IGST<br>(%)</th>													
										<th>Final Rate</th>																	
									</tr>
								</thead>
								<tbody>	

			<tr id="row_id_0">
			
			<td>
		<select class="select2 material_id" style="width:130px;" name="material[material_id][]" id="material_id_0" data-id="0">
			<option value="">Select Material</Option>
			<?php 
			   foreach($material_list as $retrive_data)
			   {
					 echo '<option value="'.$retrive_data['material_id'].'">'.
					 $retrive_data['material_title'].'</option>';
			   }
			?>
		</select>
			</td>
			<td><input type="text" name="material[hsn_code][]" value="" class="hsn_code" data-id="0" id="hsn_code_0" style="width:150px" /></td>
			<td>
			<select class="select2"  required="true"   name="material[brand_id][]" style="width:130px;" id="brand_id_0">
			<option value="">Select Item</Option>												
			</select>
			</td>
			
			<td>
			<span id="unit_name_0"></span>
			<input type="hidden" value="0" name="row_number" class="row_number">
			</td>
			<td><input type="text" name="material[unit_rate][]" value="0" class="unit_rate" value="" data-id="0" id="unit_rate_0" style="width:80px" /></td>
			<td><input type="text" name="material[discount][]" value="0" class="tx_count" id="dc_0" data-id="0" style="width:55px"></td>
			<td><input type="text" name="material[transportation][]" value="0"  class="tx_count" id="tr_0" data-id="0" style="width:55px"></td>
			<td><input type="text" name="material[gst][]" class="tx_count" value="0" id="gst_0"  data-id="0" style="width:55px"></td>
			<td><input type="text" name="material[other_tax][]" class="tx_count" value="0" id="other_tax_0"  data-id="0" style="width:55px"></td>
			<td><input type="text" name="material[final_rate][]" value="0" class="final_rate" id="final_rate_0" style="width:90px" /></td>
			<td><a href="#" class="btn btn-danger del_parent">Delete</a>
			</td>
		</tr>
		
		
								</tbody>
								
							</table>
                        </div>
						
						<button type="button" id="add_newrow" class="btn btn-default">Add New </button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						<button type="button" id="material_add" data-type="material_add" data-toggle="modal" 
								data-target="#load_modal" class="btn btn-default viewmodal" style="">Add Material </button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" id="brand_add" data-type="brand_add" data-toggle="modal" 
								data-target="#load_modal" class="btn btn-default brand_add" style="">Add Brand </button>
								
						
						
						<div class="form-row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4"><button type="submit" name="go" class="btn btn-primary">Finalize Rate</button></div>
                        </div>
					</div>
				<?php $this->Form->end(); ?>
			</div>
			</div>
<?php }?>
         </div>
		