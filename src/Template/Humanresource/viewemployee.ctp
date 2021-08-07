<?php
use Cake\Routing\Router;
?>
<script type="text/javascript">
var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
jQuery(document).ready(function() {
	jQuery('#user_form').validationEngine();
	jQuery('#date_of_birth,#as_on_date,#date_of_joining').datepicker({
		dateFormat: "dd-mm-yy",
		  changeMonth: true,
	        changeYear: true,
	        yearRange:'-65:+0',
	        onChangeMonthYear: function(year, month, inst) {
	            jQuery(this).val(month + "-" + year);
	        }
                    
    }); 
	jQuery('.viewmodal').click(function(){
			
			payid=jQuery(this).attr('id');
			jQuery('#modal-view').html('hello');
			 var model  = jQuery(this).attr('data-type') ;
		//alert(model);
		//return false;
	   var curr_data = {type : model};	 				
	 	 jQuery.ajax({
                headers: {
				'X-CSRF-Token': csrfToken
			},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'categorylist'));?>",
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
		
	 jQuery("body").on("click", "#btn-add-category", function(){		
		var category_name  = jQuery('#category_name').val() ;
		var model  = jQuery(this).attr('model');	
		/* alert(category_name + ' ' + model);
		return false; */
		if(category_name != "")
		{
			var curr_data = {					
					model : model,
					category_name: category_name				
					};
					
					jQuery.ajax({
                headers: {
				'X-CSRF-Token': csrfToken
			},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'addcategory'));?>",
                data:curr_data,
                async:false,
                success: function(response){
					/* //alert(category_name + ' ' + model + ' ' + response);
		//return false; */
                     var json_obj = jQuery.parseJSON(response);					
						jQuery('.table').append(json_obj[0]);
						jQuery('#category_name').val("");						
						jQuery("#"+model).append(json_obj[1]);	
						jQuery('.select2').select2();
						return false;		
                },
                error: function (tab) {
                    alert('error');
                }
            });	
		}
		else
		{
			alert("Please enter Category Name.");
		}
	});
	
	jQuery("body").on("click", ".btn-delete-cat", function(event){
	 
	  event.preventDefault(); // disable normal link function so that it doesn't refresh the page
	  var docHeight = jQuery(document).height(); //grab the height of the page
	  var scrollTop = jQuery(window).scrollTop();
	  var cat_id  = jQuery(this).attr('id') ;
	  var model  = jQuery(this).attr('model') ;

	if(confirm("Are you sure want to delete this record?"))
		{
	   var curr_data = {	 						 					
	 					cat_id : cat_id,	 					
	 					};	 				
	 	 jQuery.ajax({
                headers: {
				'X-CSRF-Token': csrfToken
			},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'removecategory'));?>",
                data:curr_data,
                async:false,
                success: function(response){
						jQuery("#"+model+" option[value='"+cat_id+"']").remove();
                    	jQuery('tr#cat-'+cat_id).hide();
						jQuery('.select2').select2();
							return true; 	
                },
                error: function (tab) {
                    alert('error');
                }
            });
		}
	
  });
} );
</script>
<div class="modal fade " id="load_modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content"></div>
    </div>
</div>	
<?php 
$employee_id=isset($employee_data['employee_id'])?$employee_data['employee_id']:'';
$employee_no=$id;
$user_identy_number = isset($employee_data['user_identy_number'])?$employee_data['user_identy_number']:'';
$date_of_joining=isset($employee_data['date_of_joining'])?$this->ERPfunction->get_date($employee_data['date_of_joining']):'';
$employee_at=isset($employee_data['employee_at'])?$employee_data['employee_at']:'';
$first_name=isset($employee_data['first_name'])?$employee_data['first_name']:'';
$middle_name=isset($employee_data['middle_name'])?$employee_data['middle_name']:'';
$last_name=isset($employee_data['last_name'])?$employee_data['last_name']:'';
$date_of_birth=isset($employee_data['date_of_birth'])?$employee_data['date_of_birth']->format('d-m-Y'):'';
$pf_ref_no=isset($employee_data['pf_ref_no'])?$employee_data['pf_ref_no']:'';
$education=isset($employee_data['education'])?$employee_data['education']:'';
$year_of_passing=isset($employee_data['year_of_passing'])?$employee_data['year_of_passing']:'';
$gender=isset($employee_data['gender'])?$employee_data['gender']:'Male';
$marital_status=isset($employee_data['marital_status'])?$employee_data['marital_status']:'Single';
$experience=isset($employee_data['experience'])?$employee_data['experience']:'';
$as_on_date=isset($employee_data['as_on_date'])?$this->ERPfunction->get_date($employee_data['as_on_date']):'';
$pan_card_no=isset($employee_data['pan_card_no'])?$employee_data['pan_card_no']:'';
$driving_licence_no=isset($employee_data['driving_licence_no'])?$employee_data['driving_licence_no']:'';
$epf_no=isset($employee_data['epf_no'])?$employee_data['epf_no']:'';
$image_url=isset($employee_data['image_url'])?$employee_data['image_url']:'';
$mobile_no=isset($employee_data['mobile_no'])?$employee_data['mobile_no']:'';
$employee_address=isset($employee_data['employee_address'])?$employee_data['employee_address']:'';
$email_id=isset($employee_data['email_id'])?$employee_data['email_id']:'';
$name1=isset($employee_data['name1'])?$employee_data['name1']:'';
$relationship1=isset($employee_data['relationship1'])?$employee_data['relationship1']:'';
$contactno1=isset($employee_data['contactno1'])?$employee_data['contactno1']:'';
$name2=isset($employee_data['name2'])?$employee_data['name2']:'';
$relationship2=isset($employee_data['relationship2'])?$employee_data['relationship2']:'';
$contactno2=isset($employee_data['contactno2'])?$employee_data['contactno2']:'';
$blood_group=isset($employee_data['blood_group'])?$employee_data['blood_group']:'';
$payment=isset($employee_data['payment'])?$employee_data['payment']:'';
$designation=isset($employee_data['designation'])?$employee_data['designation']:'';
$basic_salary=isset($employee_data['basic_salary'])?$employee_data['basic_salary']:0;
$incentive=isset($employee_data['incentive'])?$employee_data['incentive']:'';
$total_salary=isset($employee_data['total_salary'])?$employee_data['total_salary']:0;
$cheque_name=isset($employee_data['cheque_name'])?$employee_data['cheque_name']:'';
$ac_no=isset($employee_data['ac_no'])?$employee_data['ac_no']:'';
$bank=isset($employee_data['bank'])?$employee_data['bank']:'';
$ifsc_code=isset($employee_data['ifsc_code'])?$employee_data['ifsc_code']:'';
$extra_payment=isset($employee_data['extra_payment'])?explode(',',$employee_data['extra_payment']):array();
$incentive_includes=isset($employee_data['incentive_includes'])?explode(',',$employee_data['incentive_includes']):array();
$adhaar_card_no = isset($employee_data['adhaar_card_no'])?$employee_data['adhaar_card_no']:"";
$da = isset($employee_data['da'])?$employee_data['da']:0;
$medical_allowance = isset($employee_data['medical_allowance'])?$employee_data['medical_allowance']:0;
$other_allowance = isset($employee_data['other_allowance'])?$employee_data['other_allowance']:0;
$hra = isset($employee_data['hra'])?$employee_data['hra']:0;
$food_allowance = isset($employee_data['food_allowance'])?$employee_data['food_allowance']:0;
$acco_allowance = isset($employee_data['acco_allowance'])?$employee_data['acco_allowance']:0;
$trans_allowance = isset($employee_data['trans_allowance'])?$employee_data['trans_allowance']:0;
$mobile_allowance = isset($employee_data['mobile_allowance'])?$employee_data['mobile_allowance']:0;
$mobile_cug = isset($employee_data['mobile_cug'])?$employee_data['mobile_cug']:0;
$ctc = isset($employee_data['ctc'])?$employee_data['ctc']:0;
$branch = isset($employee_data['branch'])?$employee_data['branch']:"";
$esi_no = isset($employee_data['esi_no'])?$employee_data['esi_no']:"";
$uan_no = isset($employee_data['uan_no'])?$employee_data['uan_no']:"";
$pay_type = isset($employee_data['pay_type'])?$employee_data['pay_type']:"";
$role = isset($employee_data['role'])?$employee_data['role']:"";

$category = isset($employee_data['category'])?$employee_data['category']:"";
$candidate_id = isset($employee_data['candidate_id']);
$is_esi = isset($employee_data['is_esi'])?$employee_data['is_esi']:"";
$is_epf = isset($employee_data['is_epf'])?$employee_data['is_epf']:"";

$food_checked = ($food_allowance != "company_provided" && $food_allowance != "bill_paid")?"checked":"";
$acco_checked = ($acco_allowance != "company_provided" && $acco_allowance != "bill_paid")?"checked":"";
$trans_checked = ($trans_allowance != "company_provided" && $trans_allowance != "bill_paid")?"checked":"";
/* $mobile_checked = ($mobile_allowance != "company_provided" && $mobile_allowance != "bill_paid")?"checked":""; */
$mobile_checked = ($mobile_cug == 0 && $mobile_allowance != "bill_paid")?"checked":"";
$mobile_cug_checked = ($mobile_cug != 0 && $mobile_allowance != "bill_paid")?"checked":"";
$passport_no = isset($employee_data['passport_no'])?$employee_data['passport_no']:"";

$show_food_box = ($food_checked == "checked") ? "style=display:inline;width:50%;":"style=display:none;width:50%";
$show_acc_box = ($acco_checked == "checked") ? "style=display:inline;width:50%;":"style=display:none;width:50%";
$show_trans_box = ($trans_checked == "checked") ? "style=display:inline;width:50%;":"style=display:none;width:50%";
$show_mobile_box = ($mobile_checked == "checked") ? "style=display:inline;width:50%;":"style=display:none;width:50%";
$show_mobile_cug_box = ($mobile_cug_checked == "checked") ? "style=display:inline;width:50%;":"style=display:none;width:50%";

?>

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
						<h2><?php echo $form_header;?> </h2>
						<div class="pull-right">
						<a onclick = "javascript:window.close();" class="btn btn-success"><span class="icon-arrow-left"></span> Back</a>
						</div>
					</div>
                    
					<?php echo $this->Form->Create('form1',['id'=>'user_form','class'=>'form_horizontal formsize','method'=>'','enctype'=>'multipart/form-data'],['url'=>['action'=>'']]);?>
					
					<input type="hidden" name="user_action" class="form-control" value="<?php echo $user_action;?>" disabled />	
					    					
				

					<div class="content controls">	
						  <?php if($user_action == 'insert')  { ?>

						<div class="form-row">
							<div class="col-md-2">
							 	<label>	
									<input type="radio" class="newselectid" name="select"  value="New" checked="true">New
							 	</label>
							</div>
					
							<div class="col-md-2">
								 <label>	
									<input type="radio" class="selectid" name="select"  value="SelectCandidate">Select Candidate
								 </label>
							</div>
						
							
						</div>
					
					<?php } else { 
							if($candidate_id == true ){ ?>
							<div class="form-row">
							<div class="col-md-2">
							 	<label>	
									<input type="radio" class="newselectid" name="select"  value="New"  disabled>New
							 	</label>
							</div>
						
							<div class="col-md-2">
								 <label>	
									<input type="radio" class="selectid" name="select"  value="SelectCandidate" checked disabled>Select Candidate
								 </label>
							</div>
						
							
						</div>
					<?php } }	?>
						
						<div class="form-row">
                            <div class="col-md-2">Employee No </div>
                            <div class="col-md-2"><input type="text" name="employee_no" value="<?php echo $user_identy_number;?>"
							class="form-control validate[required]" readonly="true" disabled /></div>
                        
                            <div class="col-md-2">Date of Joining</div>
                            <div class="col-md-2"><input type="text" name="date_of_joining" id="date_of_joining" value="<?php echo $date_of_joining;?>" class="form-control validate[required]"  disabled /></div>
							
							 <div class="col-md-2">Employed at</div>
                            <div class="col-md-2">
							
							<select class="select2" style="width: 100%;" name="employee_at" required="true" disabled>
								<option value="">--Select Project--</Option>
								<?php 
									foreach($projects as $retrive_data)
									{
										echo '<option value="'.$retrive_data['project_id'].'" 
										'.$this->ERPfunction->selected($employee_at,$retrive_data['project_id']).' >
										'.$retrive_data['project_name'].'</option>';
									}
								?>
							</select>
							</div>
                        
						
						</div>
						
						<div class="form-row">
                            <div class="col-md-2">PF Slip Ref. No.</div>
                            <div class="col-md-2"><input type="text" name="pf_ref_no" value="<?php echo $pf_ref_no;?>" disabled class="form-control"/>
							</div>
						</div>
						
						 <div class="header">
							<h2><u>Personal Information</u></h2>
						</div>
						<div class="form-row">
                            <div class="col-md-2">First Name </div>
                            <div class="col-md-2"><input type="text" name="first_name" value="<?php echo $first_name;?>"
							class="form-control validate[required]"  disabled /></div>
                        
                            <div class="col-md-2">Middle Name</div>
                            <div class="col-md-2"><input type="text" name="middle_name" value="<?php echo $middle_name;?>" class="form-control"  disabled /></div>
							
							<div class="col-md-2">Last Name </div>
                            <div class="col-md-2"><input type="text" name="last_name" value="<?php echo $last_name;?>" class="form-control validate[required]"  disabled /></div>
                        
						
					   </div>
					   <div class="form-row">
                            <div class="col-md-2">Date of Birth </div>
                            <div class="col-md-2"><input type="text" name="date_of_birth" id="date_of_birth" value="<?php echo $date_of_birth;?>"
							class="form-control validate[required]"  disabled /></div>
                        
                            <div class="col-md-2">Education</div>
                            <div class="col-md-2"><input type="text" name="education" value="<?php echo $education;?>" class="form-control"  disabled /></div>
							
							<div class="col-md-2">Year of Passing </div>
                            <div class="col-md-2"><input type="text" name="year_of_passing" value="<?php echo $year_of_passing;?>" class="form-control validate[required]"  disabled /></div>
                        
						
					   </div>
					   <div class="form-row">
                             <div class="col-md-2">Gender </div>
                            <div class="col-md-2">
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="gender" value="Male" <?php echo $this->ERPfunction->checked($gender,'Male');?> disabled /> Male</label>
                                </div>
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="gender" value="Female" <?php echo $this->ERPfunction->checked($gender,'Female');?> disabled /> Female</label>
                                </div>                                                              
                            </div>
							 <div class="col-md-2">Marital Status</div>
                            <div class="col-md-2">
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="marital_status" value="Married" <?php echo $this->ERPfunction->checked($marital_status,'Married');?> disabled/>Married</label>
                                </div>
                                <div class="radiobox-inline">
                                    <label><input type="radio" name="marital_status" value="Single" <?php echo $this->ERPfunction->checked($marital_status,'Single');?> disabled/>Single</label>
                                </div>                                                       
                            </div>

                              <div class="col-md-2">Passport No.</div>
                            	<div class="col-md-2">
                               	 	
                                    	<input type="text" readonly="true" name="passport_no" value="<?php echo $passport_no;?>" class="form-control" />
                               		 
                              	</div>
							<!--
							<div class="col-md-2">Experience</div>
                            <div class="col-md-2"><input type="text" name="experience" value="<?php //echo $experience;?>" class="form-control"  disabled /></div>
							
							<div class="col-md-2">As on Date</div>
                            <div class="col-md-2"><input type="text" name="as_on_date" id="as_on_date" value="<?php //echo $as_on_date;?>" class="form-control "  disabled /></div>
                        	-->				
					   </div>
					   <div class="form-row">
                          	<div class="col-md-2">PAN Card No</div>
                            <div class="col-md-2"> 
								<input type="text" name="pan_card_no" value="<?php echo $pan_card_no;?>" class="form-control"  disabled />
                            </div>
							<div class="col-md-2">Driving Licence No</div>
                            <div class="col-md-2"><input type="text" name="driving_licence_no" value="<?php echo $driving_licence_no;?>" class="form-control"  disabled /></div>
											
					   
					   
                          	<div class="col-md-2">Adhaar Card No</div>
                            <div class="col-md-2"> 
								<input type="text" name="adhaar_card_no" value="<?php echo $adhaar_card_no;?>" class="form-control"  disabled />
                            </div>						
                      	</div>	

                      	<div class="form-row">
							<div class="form-row">
							<div class="col-md-2">Pay Type*</div>
                            <div class="col-md-2">
								<select name="pay_type" class="form-control validate[required]" disabled>
									<option value="" >Select Type</option>
									<option value="employee" <?php echo $this->ERPfunction->selected("employee",$pay_type);?>>Employee</option>
									<option value="consultant" <?php echo $this->ERPfunction->selected("consultant",$pay_type);?>>P.T. Employee</option>
									<option value="temporary" <?php echo $this->ERPfunction->selected("temporary",$pay_type);?>>Temporary</option>
								</select>
							</div>
                       
                        				
                            <?php $designation_data =  $this->ERPfunction->get_category_title($designation);  ?>

							<div class="col-md-2">Designation:<span class="require-field">*</span></div>
                            <div class="col-md-4">
							<input type="text" name="role" value= "<?php echo $designation_data ?>"  disabled >
							</div>
							
                      	</div>	
                      	</div>	




						 <div class="form-row">
                            <div class="col-md-2">Image</div>
                            <div class="col-md-4">
							<?php 
									echo $this->Html->image($this->ERPfunction->get_employee_image($id),
								array('class'=>'userimage','height'=>'50px','width'=>'50px')); ?>
                                                             
                            </div>
                        </div>
						<div class="header"><h2><u>Contact Information</u></h2></div>
						<div class="form-row">
                            <div class="col-md-2">Mobile No.  </div>
                            <div class="col-md-2"><input type="text" name="mobile_no" value="<?php echo $mobile_no;?>" class="form-control validate[required]"  disabled /></div>
                        
                            <div class="col-md-2">E-mail ID</div>
                            <div class="col-md-4"><input type="text" name="email_id" value="<?php echo $email_id;?>" class="form-control"  disabled /></div>
                        </div>
						<div class="form-row">
                            <div class="col-md-2">Address</div>
                            <div class="col-md-10">
								<textarea name="employee_address" readonly="true" class="form-control"><?php echo $employee_address; ?></textarea>
							</div>
                        </div>
						<div class="form-row"><hr disabled />					
							<div class="header"><h2><u>In Case of Emergency Please Contact</u></h2></div>
                            <div class="col-md-2">1) Name</div>
                            <div class="col-md-2"> 
								<input type="text" name="name1" value="<?php echo $name1;?>" class="form-control"  disabled />
                            </div>
							<div class="col-md-2">Relationship</div>
                            <div class="col-md-2"><input type="text" name="relationship1" value="<?php echo $relationship1;?>" class="form-control"  disabled /></div>
							
							<div class="col-md-2">Contact No</div>
                            <div class="col-md-2"><input type="text" name="contactno1" value="<?php echo $contactno1;?>" class="form-control"  disabled /></div>
                        		
                        </div>
						<div class="form-row">
					
                            <div class="col-md-2">2) Name</div>
                            <div class="col-md-2"> 
								<input type="text" name="name2" value="<?php echo $name2;?>" class="form-control"  disabled />
                            </div>
							<div class="col-md-2">Relationship</div>
                            <div class="col-md-2"><input type="text" name="relationship2" 
							value="<?php echo $relationship2;?>" class="form-control"  disabled /></div>
							
							<div class="col-md-2">Contact No</div>
                            <div class="col-md-2"><input type="text" name="contactno2" value="<?php echo $contactno2;?>" class="form-control"  disabled /></div>
                        </div>
						<div class="form-row"><!-- <hr disabled /> -->
						<div class="col-md-2">Blood Group</div>
                            <div class="col-md-4">
								<select style="width: 100%;" class="select2" name="blood_group" disabled>
								<option value="">--Select Blood Broup--</option>
								<option value="O+" <?php echo $this->ERPfunction->selected($blood_group,'O+');?>>O+</option>								
								<option value="O-" <?php echo $this->ERPfunction->selected($blood_group,'O-');?>>O-</option>
								<option value="A+" <?php echo $this->ERPfunction->selected($blood_group,'A+');?>>A+</option>
								<option value="A-" <?php echo $this->ERPfunction->selected($blood_group,'A-');?>>A-</option>
								<option value="B+" <?php echo $this->ERPfunction->selected($blood_group,'B+');?>>B+</option>
								<option value="B-" <?php echo $this->ERPfunction->selected($blood_group,'B-');?>>B-</option>
								<option value="AB+" <?php echo $this->ERPfunction->selected($blood_group,'AB+');?>>AB+</option>
								<option value="AB-" <?php echo $this->ERPfunction->selected($blood_group,'AB-');?>>AB-</option>
								</select>
							</div> 
                        </div>
						
						<div class="header" style="display:none;"> 
							<h2><u>PAYMENT DETAILS</u></h2>
						</div>
						<div class="form-row" style="display:none;">
                            <div class="col-md-2">Payment </div>
                            <div class="col-md-2">
							<select style="width: 100%;" class="validate[required]" name="payment" disabled>
								<option value="">--Select Payment--</option>
								<option value="Cash" <?php echo $this->ERPfunction->selected($payment,'Cash');?>>Cash</option>								
								<option value="Cheque" <?php echo $this->ERPfunction->selected($payment,'Cheque');?>>Cheque</option>							
								</select>							
							</div>
                        
                            <div class="col-md-2">Designation</div>
                            <div class="col-md-2">
							 <select class="validate[required]" style="width: 100%;"id="designation" name="designation" disabled>
									<option value=""><?php echo __('--Designation--'); ?></option>
									<?php
                                    if(isset($designationlist)){
                                        foreach($designationlist as $unit_info){
                                        ?>
                                   <option value="<?php echo $unit_info['cat_id'];?>" <?php                                            
                                                if($designation == $unit_info['cat_id']){
                                                    echo 'selected="selected"';
                                                }else{
                                                    echo '';
                                                }
                                            
                                        
                                        ?> ><?php echo $unit_info['category_title'];?></option>
                                            <?php             
                                        }
                                    }
                                   ?>
								</select>
							</div>
							
					   </div>
					  <!-- <div class="form-row"> 
							<div class="col-md-2">ESI No</div>
                            <div class="col-md-2"><input type="text" name="esi_no" value="<?php //echo $esi_no;?>" class="form-control validate[required]"  disabled /></div>
 
							<div class="col-md-2">EPF No</div>
                            <div class="col-md-2"><input type="text" name="epf_no" value="<?php //echo $epf_no;?>" class="form-control validate[required]"  disabled /></div>
							
							<div class="col-md-2">UAN No*</div>
                            <div class="col-md-2"><input type="text" name="uan_no" value="<?php //echo $uan_no;?>" class="form-control validate[required]" /></div>
						</div>-->
						<div class="form-row" style="display:none;"> 
							<div class="col-md-2">EPF</div>
                            <div class="col-md-2">
							<select style="width: 100%;" disabled name="is_epf" id="is_epf">
								<option value="yes" <?php echo $this->ERPfunction->selected($is_epf,'yes');?>>Yes</option>
								<option value="no" <?php echo $this->ERPfunction->selected($is_epf,'no');?>>No</option>							
							</select>							
							</div>
							<div id="epf_section" style="<?php echo ($is_epf == "no")?"display:none":""; ?>">
							<div class="col-md-2">EPF No</div>
                            <div class="col-md-2"><input type="text" name="epf_no" value="<?php echo $epf_no;?>" class="form-control" disabled/></div>
							
							<div class="col-md-2">UAN No</div>
                            <div class="col-md-2"><input type="text" name="uan_no" value="<?php echo $uan_no;?>" class="form-control" disabled/></div>
							</div>
						</div>
						
						<div class="form-row" style="display:none;"> 
							<div class="col-md-2">ESI</div>
                            <div class="col-md-2">
							<select style="width: 100%;" disabled name="is_esi" id="is_esi">
								<option value="yes" <?php echo $this->ERPfunction->selected($is_esi,'yes');?>>Yes</option>
								<option value="no" <?php echo $this->ERPfunction->selected($is_esi,'no');?>>No</option>							
							</select>							
							</div>
							<div id="esi_section" style="<?php echo ($is_esi == "no")?"display:none":""; ?>">
							<div class="col-md-2">ESI No</div>
                            <div class="col-md-2"><input type="text" name="esi_no" value="<?php echo $esi_no;?>" class="form-control" disabled/></div>
							</div>
						</div>
						
						<div class="form-row" style="display:none;"> 
							<div class="col-md-2">Pay Type</div>
                            <div class="col-md-2">
								<select name="pay_type" class="form-control validate[required]" disabled>
									<option value="" >Select Type</option>
									<option value="employee" <?php echo $this->ERPfunction->selected("employee",$pay_type);?>>Employee</option>
									<option value="consultant" <?php echo $this->ERPfunction->selected("consultant",$pay_type);?>>P.T. Employee</option>
									<option value="temporary" <?php echo ($user_action == 'insert')?'selected':$this->ERPfunction->selected("temporary",$pay_type);?>>Temporary</option>
								</select>
							</div>
                       
							<div class="col-md-2">Category</div>
                            <div class="col-md-2">
								<select name="category" class="form-control validate[required]" disabled>
									<option value="" >Select Category</option>
									<option value="a" <?php echo $this->ERPfunction->selected("a",$category);?>>A</option>
									<option value="b" <?php echo $this->ERPfunction->selected("b",$category);?>>B</option>
									<option value="c" <?php echo $this->ERPfunction->selected("c",$category);?>>C</option>
								</select>							
							</div>
                        </div>
					   <div class="form-row" style="display:none;"> <!--<hr disabled />-->
                            <div class="col-md-2">Basic Pay(Rs.) </div>
                            <div class="col-md-2"><input type="text" name="basic_salary" value="<?php echo $basic_salary;?>"
							class="form-control validate[required] basic_salary count_total"  disabled /></div>
                        
							<div class="col-md-3 text-right">D.A.(Rs.) </div>
                            <div class="col-md-2"><input type="text" name="da" value="<?php echo $da;?>"
							class="form-control validate[required] da count_total"  disabled /></div>	
							
					   </div>
					   <div class="form-row" style="display:none;">
                            <div class="col-md-2">Medical Allowance(Rs.) </div>
                            <div class="col-md-2"><input type="text" name="medical_allowance" value="<?php echo $medical_allowance;?>"
							class="form-control validate[required] medical_allowance count_total"  disabled /></div>
														
							<div class="col-md-3 text-right">Conveyance Allowance (Rs.) </div><!-- HRA amount -->
                            <div class="col-md-2"><input type="text" name="hra" value="<?php echo $hra;?>"
							class="form-control validate[required] hra count_total"  disabled /></div>
						</div>	
						
						<div class="form-row" style="display:none;">                           							
							<div class="col-md-2"> Other Allowance (Rs.)<span class="require-field">*</span> </div>
                            <div class="col-md-2"><input type="text" name="other_allowance" value="<?php echo $other_allowance;?>"
							class="form-control validate[required] other_allowance count_total" disabled /></div>
						</div>
						
						<div class="form-row" style="display:none;">  <hr disabled />
							<div class="col-md-3 text-right">Food Allowance(Rs.) </div>
                            <div class="col-md-3 text-left">								
                                    <input type="radio" name="food_allowance" class="food_rad" value="company_provided" <?php echo $this->ERPfunction->checked($food_allowance,'company_provided');?> disabled /> Provided By Company
									<br>
                                    <input type="radio" class="show_fix_input food_rad" name="food_allowance" value="fixed"  <?php echo $food_checked;?> disabled /> Fix Paid
									<input name="food_fixed" class="input-sm fix_radio food_allowance count_total validate[required,custom[integer],min[0]]" <?php echo $show_food_box; ?> value="<?php echo ($food_checked!="")?$food_allowance:0;?>" disabled >
									<br>
									<input type="radio" name="food_allowance"  class="food_rad" value="bill_paid" <?php echo $this->ERPfunction->checked($food_allowance,'bill_paid');?> disabled /> Bill Paid
                            </div>																
						<div class="col-md-3 text-right">Accomodation Allowance(Rs.) </div>
                            <div class="col-md-3">								
								<input type="radio" name="acco_allowance" class="acc_rad" value="company_provided" <?php echo $this->ERPfunction->checked($acco_allowance,'company_provided');?> disabled /> Provided By Company
								<br>
								<input type="radio" name="acco_allowance" class="acc_rad" value="fixed" <?php echo $this->ERPfunction->checked($acco_allowance,'fixed');?> <?php echo $acco_checked;?> disabled /> Fix Paid
								<input name="acc_fixed" class="input-sm count_total acco_allowance validate[required,custom[integer],min[0]]" <?php echo $show_acc_box;?> value="<?php echo ($acco_checked!="")?$acco_allowance:0;?>" disabled>
								<br>
								<input type="radio" name="acco_allowance" class="acc_rad" value="bill_paid" <?php echo $this->ERPfunction->checked($acco_allowance,'bill_paid');?> disabled /> Bill Paid
                                
							</div>
						</div>
					 <div class="form-row" style="display:none;">	
							<div class="col-md-3 text-right">Transportation Allowance(Rs.) </div>
                            <div class="col-md-3 text-left">								
								<input type="radio" name="trans_allowance" class="trans_rad"  value="company_provided" <?php echo $this->ERPfunction->checked($trans_allowance,'company_provided');?> disabled /> Provided By Company
								<br>
								<input type="radio" name="trans_allowance" class="trans_rad" value="fixed" <?php echo $this->ERPfunction->checked($trans_allowance,'fixed');?> <?php echo $trans_checked;?> disabled /> Fix Paid
								<input name="trans_fixed" class="input-sm count_total trans_allowance validate[required,custom[integer],min[0]]" <?php echo $show_trans_box;?> value="<?php echo ($trans_checked!="")?$trans_allowance:0;?>" disabled>
								<br>
								<input type="radio" name="trans_allowance" class="trans_rad" value="bill_paid" <?php echo $this->ERPfunction->checked($trans_allowance,'bill_paid');?> disabled /> Bill Paid
                            </div>
							<div class="col-md-3 text-right">Mobile Allowance(Rs.) </div>
							<div class="col-md-3 text-left">								
								<input type="radio" name="mobile_allowance" class="mobile_rad"  value="fixed_cug" id="cug" <?php echo $mobile_cug_checked;?>/> CUG Limit
								<input name="mobile_cug" class="input-sm cug_allowance validate[required,custom[integer],min[0]]" <?php echo $show_mobile_cug_box;?> value="<?php echo ($mobile_cug!=0)?$mobile_cug:0;?>" disabled>
								<br>
								<input type="radio" name="mobile_allowance" class="mobile_rad" value="fixed" id="fix" <?php echo $this->ERPfunction->checked($mobile_allowance,'fixed');?> <?php echo $mobile_checked;?> disabled /> Fix Paid
								<input name="mobile_fixed" class="input-sm count_total mobile_allowance validate[required,custom[integer],min[0]]" <?php echo $show_mobile_box;?> value="<?php echo ($mobile_checked!="")?$mobile_allowance:0;?>" disabled >
								<br>
								<input type="radio" name="mobile_allowance" class="mobile_rad" value="bill_paid" <?php echo $this->ERPfunction->checked($mobile_allowance,'bill_paid');?> disabled /> Bill Paid
                            </div>                        
					   </div>
					   <div class="form-row" style="display:none;">                
                        <hr disabled />
                           <!-- <div class="col-md-2">Incentives (Including All)</div>
                            <div class="col-md-2"><input type="text" name="incentive" 
							value=" <?php // echo $incentive;?>" class="form-control incentive count_total"  disabled /></div> -->
							 <div class="col-md-2">CTC (Month) (Rs.)</div>
                            <div class="col-md-2"><input type="text" name="total_salary" value="<?php echo $total_salary;?>" class="form-control validate[required] total_salary count_total"  disabled /></div>
							
							<div class="col-md-2 text-right">CTC (Year) (Rs.)</div>
                            <div class="col-md-2"><input type="text" name="ctc" value="<?php echo $ctc;?>" class="form-control validate[required] ctc count_total"  disabled /></div>
							
					   </div>
					    <div class="form-row" style="display:none;">
							<div class="col-md-2">Cheque Name</div>
                            <div class="col-md-2">
							<input type="text" name="cheque_name" value="<?php echo $cheque_name;?>" class="form-control" disabled />
							</div>
                            <div class="col-md-2">A/C No </div>
                            <div class="col-md-2"><input type="text" name="ac_no" value="<?php echo $ac_no;?>"
							class="form-control validate[required]"  disabled /></div>
                        
                            <div class="col-md-2 text-right">Bank</div>
                            <div class="col-md-2"><input type="text" name="bank" value="<?php echo $bank;?>" class="form-control validate[required]"  disabled /></div>
							
					   </div>				  
					    <div class="form-row" style="display:none;">						
						 <div class="col-md-2">Branch</div>
                            <div class="col-md-2"><input type="text" name="branch" value="<?php echo $branch;?>" class="form-control validate[required]"  disabled /></div>
						
					    <div class="col-md-2 text-right">IFSC Code</div>
                            <div class="col-md-2"><input type="text" name="ifsc_code" value="<?php echo $ifsc_code;?>" class="form-control validate[required]"  disabled /></div>
						</div>	
						
						<div class="form-row">
							<div class="header"><h2><u>Attachment</u></h2></div>
                            <div class="col-md-2"> Aadhar Card</div>
							<?php if($user_action == "edit" && $employee_data['aadhar_card_att'] != "") { ?>
								<div class='col-md-4'><a href="<?php echo $this->ERpfunction->get_signed_url($employee_data['aadhar_card_att']);?>" class="btn btn-primary" target="_blank">View File</a></div>
							<?php } ?>
						</div>
						
						<div class="form-row">							
                            <div class="col-md-2"> PAN Card</div>
							<?php if($user_action == "edit" && $employee_data['pan_card_att'] != "") { ?>
								<div class='col-md-4'><a href="<?php echo $this->ERPfunction->get_signed_url($employee_data['pan_card_att']);?>" class="btn btn-primary" target="_blank">View File</a></div>
							<?php } ?>
						</div>
						
						<div class="form-row">							
                            <div class="col-md-2"> Driving Licence</div>
							<?php if($user_action == "edit" && $employee_data['driving_licence_att'] != "") { ?>
								<div class='col-md-4'><a href="<?php echo $this->ERPfunction->get_signed_url($employee_data['driving_licence_att']);?>" class="btn btn-primary" target="_blank">View File</a></div>
							<?php } ?>
						</div>
						
						<div class="form-row">							
                            <div class="col-md-2"> Cancelled Cheque</div>
							<?php if($user_action == "edit" && $employee_data['cancel_cheque_att'] != "" ) { ?>
								<div class='col-md-4'><a href="<?php echo $this->ERPfunction->get_signed_url($employee_data['cancel_cheque_att']);?>" class="btn btn-primary" target="_blank">View File</a></div>
							<?php } ?>
						</div>
						
						<div class="form-row">							
                            <div class="col-md-2"> Resume / CV</div>
							<?php if($user_action == "edit" && $employee_data['resume_att'] != "") { ?>
								<div class='col-md-4'><a href="<?php echo $this->ERpfunction->get_signed_url($employee_data['resume_att']);?>" class="btn btn-primary" target="_blank">View File</a></div>
							<?php } ?>
						</div>
						
						<div class="form-row">							
                            <div class="col-md-2"> Qualification Documents</div>
							<?php if($user_action == "edit" && $employee_data['qualification_doc'] != "") { ?>
								<div class='col-md-4'><a href="<?php echo $this->ERPfunction->get_signed_url($employee_data['qualification_doc']);?>" class="btn btn-primary" target="_blank">View File</a></div>
							<?php } ?>
						</div>
						
						<div class="form-row">							
                            <div class="col-md-2"> Other </div>
							<?php if($user_action == "edit" && $employee_data['other_doc'] != "") { ?>
								<div class='col-md-4'><a href="<?php echo $this->ERPfunction->get_signed_url($employee_data['other_doc']);?>" class="btn btn-primary" target="_blank">View File</a></div>
							<?php } ?>
						</div>
						
						
						<div class="form-row add_field">
						<?php 
						if($user_action == "edit")
						{
						$attached_files = json_decode($employee_data["attachment"]);
						$attached_label = json_decode(stripcslashes($employee_data['attach_label']));						
						if(!empty($attached_files))
						{							
							$i = 0;
							foreach($attached_files as $file)
							{?>
								<div class='del_parent'>
									<div class='form-row'>
										<div class='col-md-2'>
											<?php echo $attached_label[$i];?>
											<input type='hidden' name='attach_label[]' value='<?php echo $attached_label[$i];?>' class='form-control'>
										</div>
										<div class='col-md-4'><a href="<?php echo $this->ERPfunction->get_signed_url($file);?>" class="btn btn-primary" target="_blank">View File</a>
										<input type='hidden' name='old_image_url[]' value='<?php echo $file;?>' class='form-control'></div>
										
									</div>
								</div>							
							<?php $i++;
							}
						   }
						}
						?>
						</div> 
						<?php 
							$id = $employee_data['user_id'];
							
							
							if(!empty($employee_data['non_working_id']))
							{
								$str1='';
								$rejoin_id = $this->ERPfunction->getRejoinInfo($id,$str1);
								
								/*foreach($groupid as $key=>$value)
								{
									$str1=''; 
									$last_group_id = $this->ERPfunction->getRejoinInfo($value,$str1);
									$result1 .= $str1;	
								}

								$childid1= explode( ',', $result1);
								$resultgroupid1 = array_unique($childid1);*/
						?>
					
						<table border="2" align="center">
							<tr>
							<td colspan="2"><h2>Re-Join Information</h2></td>
							</tr>
							<tr>
								<th>Employee - No Id </th>
								<th>Employee Date</th>
							</tr>
							<tr>
								<td><?php echo $employee_data['non_working_id']; ?></td>
								<td><?php echo $employee_data['rejoin_date']; ?></td>
							</tr>
						</table>
						
					
                    <?php } ?>
				</div>
				<?php $this->Form->end(); ?>


				<div class="row" style="font-style:italic;color:gray;">							
					<div class="col-md-7 pull-right">
						<br><br>
						
						<div class="col-md-4">						 
						  <a href="../printemployee/<?php echo $employee_data["user_id"];?>" class="btn btn-default" id="print_this" target="_blank"><i class="icon-print"></i> Print</a>
						</div> 
					</div>
				</div> 
			</div>
<?php } ?>     
	 </div>

