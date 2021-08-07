<?php
use Cake\Routing\Router;

$created_by = isset($erp_grn_details['created_by'])?$this->ERPfunction->get_user_name($erp_grn_details['created_by']):'NA';
$last_edit = isset($erp_grn_details['last_edit'])?date("m-d-Y H:i:s",strtotime($erp_grn_details['last_edit'])):'NA';
$last_edit_by = isset($erp_grn_details['last_edit_by'])?$this->ERPfunction->get_user_name($erp_grn_details['last_edit_by']):'NA';

$changes = (array) json_decode($erp_grn_details['changes']);
$updated_fields = array();
foreach($changes as $change)
{
	$change = (array) json_decode($change);
	$keys=array_keys($change);
	$updated_fields = array_merge($updated_fields,$keys);
}
$updated_fields = array_unique($updated_fields);
// debug($updated_fields);
// die;

if(!$is_capable)
	{
		$this->ERPfunction->access_deniedmsg();
	}
else
{

?>
<style>
.changes{
	background-color:red;
}
</style>
<div class="col-md-10 ">

	<div class="prevew_pr">		
	<?php 
		if(!empty($erp_grn_details) ){
			 
	?>	
	    
		<table width="100%" border="1" >
			<tbody>
				<tr align="center">
				<td colspan="8"><?php echo $this->ERPfunction->viewheader();?></td>
				</tr>
				<!--<tr align="center"><td colspan="8"><h1><strong>YashNand Engineers & Contractors</strong></h1></td></tr> -->
				<tr align="center"><td colspan="8"><h2><strong>Goods Receipt Note (GRN)</strong></h2></td></tr>
				<tr>
					<!--<td colspan="2" > <strong> Project Code: <?php // echo $this->ERPfunction->get_projectcode($erp_grn_details['project_id']);?></strong></td> -->
					<td colspan="8" class="<?php echo in_array("project_id",$updated_fields)?"changes":""; ?>"> <strong> Project Name: <?php echo $this->ERPfunction->get_projectname($erp_grn_details['project_id'])/*.', &nbsp;'.$this->ERPfunction->get_projectaddress($erp_grn_details['project_id']).', &nbsp;'.$this->ERPfunction->get_projectcity($erp_grn_details['project_id']) */;?></strong></td>
				</tr>
				<tr>
					<td><strong>GRN No:</strong></td>
					<td colspan="2" class="<?php echo in_array("grn_no",$updated_fields)?"changes":""; ?>"> <?php echo $erp_grn_details['grn_no']; ?></td>
					<td colspan="1" ><strong>Date:</strong> </td>
					<td colspan="1" class="<?php echo in_array("grn_date",$updated_fields)?"changes":""; ?>"> <?php echo $this->ERPfunction->get_date($erp_grn_details['grn_date']); ?>  </td>
					<td colspan="1" ><strong>Time:</strong> </td>
					<td colspan="2" class="<?php echo in_array("grn_time",$updated_fields)?"changes":""; ?>"> <?php echo $erp_grn_details['grn_time']; ?></td>
				</tr>
				<tr>
					<td><strong>Vendor Name:</strong></td>
					<td colspan="3" class="<?php echo in_array("vendor_userid",$updated_fields)?"changes":""; ?>"><?php echo $this->ERPfunction->get_vendor_name($erp_grn_details['vendor_userid']); ?></td>
					<td colspan="1" ><strong>Vendor ID:</strong> </td>
					<td colspan="3" class="<?php echo in_array("vendor_id",$updated_fields)?"changes":""; ?>"><?php echo $erp_grn_details['vendor_id']; ?> </td>
				</tr>
				<tr>
				<?php
				if($erp_grn_details['pr_id'] != "" || $erp_grn_details['po_id'] != "")
				{
				?>
					<td><strong><?php echo ($erp_grn_details['pr_id'] != "") ?"P.R. No":"P.O. No.";?>:</strong></td>
					<td colspan="2" >
					<?php 
						if($erp_grn_details['pr_id'] != "")
						{
							echo $this->ERPfunction->get_pr_no($erp_grn_details['pr_id']); 
						}else{
							echo $this->ERPfunction->get_po_no($erp_grn_details['po_id']); 
						}
						
					?>
					</td>
					<?php
				}
				elseif($erp_grn_details['local_po_id'] != 0)
				{
				?>
					<td><strong>Local P.O. No.:</strong></td>
					<td colspan="2" >
					<?php echo $this->ERPfunction->get_pono_by_grnid($erp_grn_details['grn_id']); ?>
					</td>
				<?php
				}else{
				?>
					<td><strong>Manual P.O. No.:</strong></td>
					<td colspan="2" >
					<?php echo ($erp_grn_details['manualpo_no'] != 0)?$erp_grn_details['manualpo_no']:'NA'; ?>
					</td>
				<?php } ?>
				</tr>
				<tr>
					<td><strong>Security Gate Pass No.:</strong> </td>
					<td colspan="3" class="<?php echo in_array("security_gate_pass_no",$updated_fields)?"changes":""; ?>"><?php echo $erp_grn_details['security_gate_pass_no']; ?> </td>
					<td colspan="1" ><strong>Gate Pass Date:</strong> </td>
					<td colspan="3" class="<?php echo in_array("gate_pass_date",$updated_fields)?"changes":""; ?>"><?php echo date("d-m-Y",strtotime($erp_grn_details['gate_pass_date'])); ?> </td>
				</tr>
				<tr>
					<td><strong>Challan No:</strong> </td>
					<td colspan="3" class="<?php echo in_array("challan_no",$updated_fields)?"changes":""; ?>"><?php echo $erp_grn_details['challan_no']; ?> </td>
					<td colspan="1" ><strong>Challan Date:</strong> </td>
					<td colspan="3" class="<?php echo in_array("challan_date",$updated_fields)?"changes":""; ?>"><?php echo date("d-m-Y",strtotime($erp_grn_details['challan_date'])); ?> </td>
				</tr>	
				<tr>
					<td><strong>Driver's Name:</strong></td>
					<td colspan="2" class="<?php echo in_array("driver_name",$updated_fields)?"changes":""; ?>"><?php echo $erp_grn_details['driver_name'];  ?></td>
					<td colspan="2" ><strong>Vehicle's No:</strong> </td>
					<td colspan="3" class="<?php echo in_array("vehicle_no",$updated_fields)?"changes":""; ?>"><?php echo $erp_grn_details['vehicle_no']; ?> </td>
				</tr>				
				<?php if( $erp_grn_details["payment_method"] == "Cash")
				{ ?>
				<tr align="center"><td colspan="8"><font size="4"><strong>Paid in Cash </strong></font></td></tr>
				<tr>
					<td><strong>Purchase Amt (Rs.):</strong></td>
					<td colspan="1" ><?php echo $erp_grn_details['purchase_amt'];  ?></td>
					<td colspan="1" ><strong>Freight (Rs.)</strong> </td>
					<td colspan="2"><?php echo $erp_grn_details['freight']; ?> </td>
					<td colspan="2">Unloading (Rs.):</td>
					<td colspan="1"><?php echo $erp_grn_details['unloading']; ?> </td>
				</tr>	
				<tr>
					<td><strong>Voucher No:</strong></td>
					<td colspan="2" ><?php echo $erp_grn_details['vouchar_no'];  ?></td>
					<td colspan="2" ><strong>Total Amt Paid (Rs.):</strong> </td>
					<td colspan="3"><?php echo $erp_grn_details['total_amt']; ?> </td>
				</tr>
				<?php } ?>
				<tr>
					<td align="center" rowspan="2" ><strong>Material Code</strong></td>
					<td align="center" colspan="2"><strong>Material / Item</strong></td>
					<td rowspan="2" ><strong>Vendor's Qty.<br>/Weight</strong></td>
					<td rowspan="2" ><strong>Actual Qty.<br>/Weight</strong></td>
					<td rowspan="2" ><strong>Difference (+/-)</strong></td>
					<td rowspan="2" ><strong>Unit</strong></td>
					<td rowspan="2" style="width:15px;"><strong>Remark</strong></td>
					<!--<td rowspan="2" ><strong>Remarks by Inspector</strong></td>-->
				</tr>
				<tr>
					<td><strong>Description</strong></td>
					<td><strong>Make / Source</strong></td>
				
				</tr>
				<?php 
					foreach($previw_list as $retrive_material){
						$d_changes = (array) json_decode($retrive_material['changes']);
						$d_updated_fields = array();
						foreach($d_changes as $d_change)
						{
							$d_change = (array) json_decode($d_change);
							$d_keys=array_keys($d_change);
							$d_updated_fields = array_merge($d_updated_fields,$d_keys);
						}
						$d_updated_fields = array_unique($d_updated_fields);
						
						if($retrive_material['is_static'])
						{
							$m_code = $retrive_material['m_code'];
							$mt = $retrive_material['material_name'];
							$brnd = $retrive_material['brand_name'];
							$unit = $retrive_material['static_unit'];
						}
						else
						{
							$m_code = $this->ERPfunction->get_materialitemcode($retrive_material['material_id']);
							$mt = $this->ERPfunction->get_material_title($retrive_material['material_id']);
							$brnd = $this->ERPfunction->get_brandname($retrive_material['brand_id']);
							$unit = $this->ERPfunction->get_items_units($retrive_material['material_id']);
						}
						$num = explode(":",$retrive_material['difference_qty']);
						$rounded_num = round($num[0],3);
						$num[0] = $rounded_num;
						$round_difference = implode(":",$num);
				?>
				<tr>
					<td><?php echo $m_code; ?></td>
					<td class="<?php echo in_array("material_id",$d_updated_fields)?"changes":""; ?>"><?php echo $mt;?></td>
					<td class="<?php echo in_array("brand_id",$d_updated_fields)?"changes":""; ?>"><?php echo $brnd;?></td>
					<td class="<?php echo in_array("quantity",$d_updated_fields)?"changes":""; ?>"><?php echo bcdiv($retrive_material['quantity'],1,3);?></td>
					<td class="<?php echo in_array("actual_qty",$d_updated_fields)?"changes":""; ?>"><?php echo bcdiv($retrive_material['actual_qty'],1,3); ?></td>
					<td class="<?php echo in_array("difference_qty",$d_updated_fields)?"changes":""; ?>"><?php echo $round_difference; ?></td>
					<td><?php echo $unit;?></td>
					<td class="<?php echo in_array("remarks",$d_updated_fields)?"changes":""; ?>"><?php echo $retrive_material['remarks']; ?></td>
					<!--<td><?php //echo $retrive_material['remarks']; ?></td>-->
					 
				</tr>
				<?php } ?>
				 
				<tr>
					<td align="center" colspan="4"><h3><strong> Made By </strong></h3>
						<?php
						if($erp_grn_details['created_by']){
							echo $this->ERPfunction->get_user_name($erp_grn_details['created_by']); 
						}
						?>
					</td>
					<!--
					<td align="center" colspan="3"><h3><strong> Inspected By </strong></h3>
						<?php
						// if($erp_grn_details['created_by']){
							// echo $this->ERPfunction->get_user_name($erp_grn_details['created_by']); 
						// }
						?>
					</td> -->
					<td align="center" colspan="4"><h3><strong> Approved By </strong></h3>
						<?php
						$approver = array();
						$ids = array();
						foreach($previw_list as $retrive_material){
							if(!in_array($retrive_material['approved_by'],$ids))
							{
							$approver[] = $this->ERPfunction->get_user_name($retrive_material['approved_by']);
							$ids[] = $retrive_material['approved_by'];
							}
						}
						foreach($approver as $app){
								echo $app . "<br>";
						}
						?>
					</td>
				</tr>
				
				
			</tbody>
		</table>
	
		<div class="row" style="font-style:italic;color:gray;padding-top:15px;">
			<div class="col-md-6 pull-left">
				<div class="add_field">
				
										<h2>Attachment</h2>
							<?php 
							$attached_files = json_decode($erp_grn_details["attach_file"]);
							$attached_label = json_decode(stripcslashes($erp_grn_details['attach_label']));						
							if(!empty($attached_files))
							{							
								$i = 0;
								foreach($attached_files as $file)
								{?>
									<div class='del_parent'>
										<div class='form-row'>
											<div class='col-md-4'>
												<?php echo $attached_label[$i];?>
												<input type='hidden' name='attach_label[]' value='<?php echo $attached_label[$i];?>' class='form-control'>
											</div>
											<div class='col-md-4'><a href="<?php echo $this->request->base;?>/img/users_images/<?php echo $file;?>" class="btn btn-primary" target="_blank">View File</a>
											<input type='hidden' name='old_attach_file[]' value='<?php echo $file;?>' class='form-control'></div>
											
										</div>
									</div>							
								<?php $i++;
								}
							}
							?>
                        	</div>
			</div>
			<div class="col-md-6 pull-right">
				<!--	<div class="col-md-4">
					<?php //echo "Created By: {$created_by}"; ?>
				</div>
				<div class="col-md-6">
					<?php //echo "Last Edited By: {$last_edit_by}"; ?>
				</div> -->
				<?php
					if(isset($stock))
					{
				?>
				<div class="col-md-2 pull-right">						 
					<a href="../../printapprovedgrnrecord/<?php echo $erp_grn_details["grn_id"];?>" class="btn btn-info	" id="print_this" target="_blank"><i class="icon-print"></i> Print</a>
				</div> 
				<?php
				}else
				{
				?>
				<div class="col-md-2 pull-right">						 
					<a href="../printapprovedgrnrecord/<?php echo $erp_grn_details["grn_id"];?>" class="btn btn-info	" id="print_this" target="_blank"><i class="icon-print"></i> Print</a>
				</div> 
				<?php
				}
				?>
				
			</div>
		</div> 
	<?php  
		}
	?>
	</div>
</div>
 <?php }?>              