<?php
use Cake\Routing\Router;
?>
<script type="text/javascript" >

var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
	jQuery(document).ready(function() {		
		jQuery('.editprmaterial').click(function(){	
			var pmid = $(this).attr("pmid");
			var mid = $(this).attr("mid");
			var bid = $(this).attr("bid");
			var qty = $(this).attr("qty");
			var data = {pmid:pmid,mid:mid,bid:bid,qty:qty};
			$.ajax({
				type : "POST",
				url : "<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'editprmaterial'));?>",
				data : data,
				async : false,
				success : function(response){
					jQuery('.modal-content').html(response);
					jQuery('.select2').select2();
				},
				error : function(e){
					alert("Error");
					console.log(e.responseText);
				}
				
			});
		});
		
		
	jQuery("body").on("change", ".material_id", function(event){ 
	 /* var row_id = jQuery(this).attr('data-id'); */
	  var material_id  = jQuery(this).val() ;
		/* alert(material_id);
		return false;  */  
	   var curr_data = {	 						 					
	 					material_id : material_id,	 					
	 					};	 				
	 	 jQuery.ajax({
                headers: {
					'X-CSRF-Token': csrfToken
				},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'getmaterialbrandlist'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					var json_obj = jQuery.parseJSON(response);					
					jQuery('#brand_id').html();
					jQuery('#brand_id').html(json_obj['itemlist']);
					jQuery('#brand_id').select2();					
					return false;
                },
                error: function (e) {
                     alert('Error');
                }
            });
	
  });
	
	jQuery("body").on("click","#done_manual",function(){
	
			if(confirm("Are you sure,you have done with this record?"))
			{
				if(confirm("Are you sure,you have done with this record?"))
				{
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		
	});	
		
	});
</script>
<style>
div.checker span.checked:before {
	top: -6px;
	color: white;
}
</style>
<div class="modal fade " id="load_modal" role="dialog">
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
<div class="col-md-12">

	
		<div class="block" id="pr-div" style="width:auto;">
			<div class="head bg-default bg-light-rtl">
				<h2>Pending PR Status </h2>
				<div class="pull-right">
				<a href="<?php echo $this->ERPfunction->action_link($back_url,$back_page);?>" class="btn btn-success"><span class="icon-arrow-left"></span> Back</a>
				</div>
			</div>
		<div class="content">
		<script>
		
var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
		jQuery(document).ready(function() {
			jQuery('body').on('click','.viewmodal',function(){
			
				
				var project_id  = jQuery(this).attr('p_id') ;
				var material_id  = jQuery(this).attr('m_id') ;
				
					urlstring ="<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'purchasemanagestock'));?>";
				
				var curr_data = {project_id:project_id, material_id:material_id };	 				
					jQuery.ajax({
						headers: {
					'X-CSRF-Token': csrfToken
				},
                type:"POST",
						url:urlstring,
						data:curr_data,
						async:false,
						success: function(response){                    
							jQuery('.modal-content').html(response);					
						},
						beforeSend:function(){
									jQuery('#modal-view').html('<center><img src=../images/4.gif width=120px><div><h3>Loading...</h3></div></center>');
								},
						error: function(e) {
								console.log(e.responseText);
								 }
					});	
									
			});
		jQuery("#user_form").validationEngine();
		jQuery('#from_date,#to_date').datepicker({
		dateFormat: "dd-mm-yy",
		  changeMonth: true,
	        changeYear: true,
	        yearRange:'-65:+0',
	        onChangeMonthYear: function(year, month, inst) {
	            jQuery(this).val(month + "-" + year);
	        }                    
    });
		jQuery('#pr_list').DataTable({"order": [[ 1, "desc" ]]});
		
		jQuery("body").on("change", ".approve", function(event){
				var pr_id = jQuery(this).val();
				
				if(confirm('Are you Sure approve this PR?'))
				{
				var curr_data = {	 						 					
	 					pr_id : pr_id,	 					
	 					};	 				
	 	 jQuery.ajax({
                headers: {
					'X-CSRF-Token': csrfToken
				},
                type:"POST",
                url:"<?php echo Router::url(array('controller'=>'Ajaxfunction','action'=>'approvepr'));?>",
                data:curr_data,
                async:false,
                success: function(response){					
					 location.reload();
					return false;
                },
                error: function (e) {
                     alert('Error');
                }
		});}
			else
			{				
				 jQuery(this).removeAttr('checked');
				 jQuery(this).parent().removeClass('checked');
				//jQuery(this).prop('checked', true);
			}
			});		
		} );
	
	function check_select()
	{
		//check item is actually selected or not.
		return true;
	}
</script>

			<div class="col-md-12 filter-form">
			<?php 
$project_id = isset($request_data['project_id'])?$request_data['project_id']:'';
$from_date = isset($request_data['from_date'])?$request_data['from_date']:'';
$to_date = isset($request_data['to_date'])?$request_data['to_date']:'';
?>
				<?php echo $this->Form->Create('form1',['id'=>'user_form','class'=>'form_horizontal formsize','method'=>'post','enctype'=>'multipart/form-data'],['url'=>['action'=>'']]);?>
					<div class="form-row">                          
						<div class="col-md-10 text-right" id="pr_left">
							<div class="col-md-3">Select Project</div>
						<div class="col-md-5">
							<select class="select2" style="width: 100%;" name="project_id" id="project_id" class="validate[required]">
								<option value="">All</Option>
								<?php 
									foreach($projects as $retrive_data)
									{
										echo '<option value="'.$retrive_data['project_id'].'" '.$this->ERPfunction->selected($project_id,$retrive_data['project_id']).'>'.
										$retrive_data['project_name'].'</option>';
									}
								?>
							</select>
						</div>
					 <div class="col-md-2"><!--  Date From : --></div>
                        <div class="col-md-2"><input type="hidden" name="from_date" id="from_date" value="<?php echo $from_date;?>" class="form-control"/></div>
						<div class="col-md-2"><!-- Date To : --></div>
                        <div class="col-md-2"><input type="hidden" name="to_date" id="to_date" value="<?php echo $to_date;?>" class="form-control"/></div>
						 </div> 
						
					<div class="col-md-2"> <div class="col-md-12"><input type="submit" name="go" id="go" class="btn btn-primary" value="Go"/></div></div>
						<br>
						<br>
					</div>
				</form>			
			</div>
			</div>
			<div class="content "> <!-- list custom-btn-clean -->
			<?php
			if(isset($pr_list))
			{
				echo $this->Form->Create('form2',['id'=>'app_frm','method'=>'post','url'=>['controller'=>'Inventory','action'=>'preparepo2']]);
				/* echo $this->Form->Create('form2',['id'=>'app_frm','method'=>'post',"onsubmit"=>"return check_select()",'url'=>['action'=>'approvedpr']]); */
			
			?><div id="scrolling-div">
				<table id="pr_list" class="dataTables_wrapper table table-striped table-bordered">
					<thead>
						<tr>
							<th>Project Name</th>
							<th>P.R. No</th>						
							<th>Date</th>						
							<th>Time</th>						
							<th colspan="9" style="padding:0;">
								<table class='table-bordered' style='width:100%;'>
									<tr>
									<th>Material Code</th>						
									<th>Material Name</th>						
									<th>Make/<br>Source</th>						
									<th>Quantity</th>
									<th>Unit</th>
									<th>Delivery Date</th>
									<th>View</th>
									<th>Purchase Remarks</th>
									</tr>
								</table>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$prno = null;
						$show = 0;
						// if(isset($pr_list))
						// {		
							foreach($pr_list as $retrive_data)
							{ $prno = $retrive_data['prno'];
							 $project = $retrive_data['project_id'];
							?>
								<tr class="rmv_<?php echo $i;?>">								
									<td><?php echo $this->ERPfunction->get_projectname($retrive_data['project_id']); ?></td> 
									<td><?php echo $retrive_data['prno'];?></td>								
										<input type="hidden" name="con1[]" value="<?php echo $retrive_data['contact_no1']; ?>">
										<input type="hidden" name="con2[]" value="<?php echo $retrive_data['contact_no2']; ?>">
									<td><?php  echo $this->ERPfunction->get_date($retrive_data['date_of_approve']); ?>
										<!--<span id="app_date_<?php echo $i; ?>"></span>  material approved date filled from get_purchase_pr_materials helper function by jq -->
									</td>								
									<td><?php // echo $retrive_data["pr_time"]; ?>
										<span id="app_time_<?php echo $i; ?>"></span> <!-- material approved time filled from get_purchase_pr_materials helper function by jq -->
									</td>								
									<td colspan="9">
									<?php 
										$materials_data = $this->ERPfunction->get_pr_track_materials($retrive_data["erp_inventory_pr_material"],$retrive_data["pr_id"],$i,$project);
										if($materials_data != "None")
										{
											$show = 1;
											echo $materials_data;
										}
										else{
											// echo "No Pending Records Found.";
											echo "<script>											
											$('.rmv_".$i."').remove();
											</script>";
											
										}
									?>
									</td>								
								</tr>
							<?php
							$i++;
							}
							// else{
							// echo "<tr><td colspan='5'>Data Not Available</td></tr>";
						 // }
						?>
					</tbody>
				</table></div>
				<?php if($show)
				{ ?>
				<!--<div class="row">							
					<div class="col-md-2 pull-right">
						<input type="submit" class="btn btn-success" name="approve_list" value="Approve">
					</div>
					<input type="hidden" name="purchase_mod" value='central' checked >
					<input type="hidden" name="project_id" value="<?php echo $project_id;?>">
					<input type="hidden" name="prno" value="<?php echo $prno;?>">
					<input type="hidden" id="data-url" value="<?php echo $this->request->base;?>">				
				</div>-->
				<?php } echo $this->Form->end();
			}
			?>
			<?php 
				if(isset($pr_list))
				{
				if(!empty($pr_list)){
			
			?>
			<div class="col-md-2">
				<?php 
					echo $this->Form->create("",["type"=>"file","class"=>"validateForm form-horizontal","role"=>"form","id"=>"export_csv"]);
				?>
					<!-- <form method="post"> -->
						<input type="hidden" name="project_id" value="<?php echo isset($request_data['project_id'])?$request_data['project_id']:''; ?>">
						<input type="submit" class="btn btn-success" value="Export To Excel" name="export_csv">
					<!-- </form> -->
				</div>
				<?php 
					echo $this->Form->end();
				?>
				<?php }
				} ?>
			
			
			
		</div>
		</div>
	
</div>
<?php }?>
</div>
