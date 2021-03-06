<?php
use Cake\Routing\Router;

$created_by = isset($pr_material['created_by'])?$this->ERPfunction->get_user_name($pr_material['created_by']):'NA';
$last_edit = isset($pr_material['last_edit'])?date("m-d-Y H:i:s",strtotime($pr_material['last_edit'])):'NA';
$last_edit_by = isset($pr_material['last_edit_by'])?$this->ERPfunction->get_user_name($pr_material['last_edit_by']):'NA';

?>
 
<style>
	table {
    	border: solid 1px grey;
		fon-size: 10px;
	}
	table td {
    	border: solid 1px grey;
	}
</style>

<div class="col-md-10 ">
	<div class="prevew_pr">		
	<?php 
		if(!empty($pr_material) ){
			 
	?>	
	    
		<table width="100%" >
			<tbody>
				<tr align="center">
					<!-- <td colspan="11"><?php echo $this->ERPfunction->viewheader($pr_material['pr_date']);?></td> -->
					<td colspan="11">	
					<?php 
						$date = $pr_material['pr_date'];
						if($date != null){
							$date = date("Y-m-d",strtotime($date));
							if($date >= "2019-03-01")
							{
								echo $this->Html->image('logo/header_new.jpg', ['fullBase' => true]); 
							}else{
								echo $this->Html->image('logo/header.jpg', ['fullBase' => true]);
							}
						}else{
							echo $this->Html->image('logo/header_new.jpg', ['fullBase' => true]);
						}
					?>
					</td>
				</tr>
				<tr align="center"><td colspan="11"><h2><strong>Purchase Requisition (PR)</strong></h2></td></tr>
				<tr>
				<!-- <td colspan="2" > <strong> Project Code:</strong> <?php //echo $this->ERPfunction->get_projectcode($pr_material['project_id']);?></td> -->
					<td colspan="11" > <strong> Project Name:</strong> <?php echo $this->ERPfunction->get_projectname($pr_material['project_id'])/*.', &nbsp;'.$this->ERPfunction->get_projectaddress($pr_material['project_id']).', &nbsp;'.$this->ERPfunction->get_projectcity($pr_material['project_id'])*/ ;?></td>
				</tr>
				<tr>
					<td colspan="3"><strong>P. R. No:</strong> <?php echo $pr_material['prno']; ?></td>
					<td colspan="2" class="text-right"><strong>Date:</strong></td><td colspan="3">&nbsp; <?php echo $this->ERPfunction->get_date($pr_material['pr_date']); ?> </td>
					<td colspan="" class="text-right"><strong>Time:</strong></td><td colspan="2">&nbsp; <?php echo $pr_material['pr_time']; ?></td>
				</tr>
			<!--	<tr>
					<td><strong>Raised From:</strong></td>
					<td colspan="2" ><?php echo $this->ERPfunction->get_user_name($pr_material['raise_from']); ?></td>
					<td colspan="2" ><strong>Contact No: (1)</strong> </td>
					<td colspan="2"><?php echo $pr_material['contact_no1']; ?> </td>
				</tr>
				<tr>
					<td><strong>Forwarded To:</strong></td>
					<td colspan="2" ><?php echo $this->ERPfunction->get_user_name($pr_material['forword_to']);?></td>
					<td colspan="2" ><strong>Contact No: (2) </strong></td>
					<td colspan="2"> <?php echo $pr_material['contact_no2']; ?></td>
				</tr> -->
				<tr>
					<td colspan="" ><strong>Contact No: (1)</strong> </td>
					<td colspan="4"><?php echo $pr_material['contact_no1']; ?> </td>
					<td colspan="3" ><strong>Contact No: (2) </strong></td>
					<td colspan="3"> <?php echo $pr_material['contact_no2']; ?></td>
				</tr>
				<tr>
					<td align="center" rowspan="2" ><strong>Material Code</strong></td>
					<td align="center" colspan="4"><strong>Material / Item</strong></td>
					<td rowspan="2" ><strong>Delivery<br>Date<br>(Planned)</strong></td>
					<td rowspan="2" ><strong>Remarks</strong></td>
					<td rowspan="2" ><strong>usage</strong></td>
					<td rowspan="2" ><strong>Mode of Purchase</strong></td>
					<td rowspan="2" ><strong>Purchased quantity</strong></td>
					<td rowspan="2" ><strong>Purchase Remarks</strong></td>
				</tr>
				<tr>
					<td style="width: 100px;"><strong>Description</strong></td>
					<td><strong>Make / Source</strong></td>
					<td><strong>Quantity</strong></td>
					<td><strong>Unit</strong></td>
				</tr>
				<?php 
					foreach($previw_list as $retrive_material){
						$approved_by = $retrive_material['approved_by']; 
						if(is_numeric($retrive_material['material_id']) && $retrive_material['material_id'] != 0)
						{
							$m_code = $this->ERPfunction->get_materialitemcode($retrive_material['material_id']);
							$mt = $this->ERPfunction->get_material_title($retrive_material['material_id']);
							$brnd = $this->ERPfunction->get_brandname($retrive_material['brand_id']);
							$unit = $this->ERPfunction->get_items_units($retrive_material['material_id']);
						}
						else
						{
							$m_code = $retrive_material['m_code'];
							$mt = $retrive_material['material_name'];
							$brnd = $retrive_material['brand_name'];
							$unit = $retrive_material['static_unit'];
						}
				?>
				<tr>
					<td><?php echo $m_code; ?></td>
					<td><?php echo $mt;?></td>
					<td><?php echo $brnd;?></td>
					<td><?php echo $retrive_material['quantity'];?></td>
					<td><?php echo $unit;?></td>
					<td><?php echo date_format($retrive_material['delivery_date'],'d-m-Y');?> </td>
					<td><?php echo $retrive_material['name_of_subcontractor'];?> </td>
					<td><?php echo $retrive_material['usages'];?> </td>
					<td><?php echo ($retrive_material['show_in_purchase'])?"Central":"Local";?> </td>
					<td><?php echo $this->ERPfunction->get_pr_purchased_quantity_by_po($retrive_material["pr_material_id"]);?> </td>
					<td><?php echo $this->ERPfunction->get_purchase_remarks_of_pr_material($retrive_material["pr_material_id"])."".$this->ERPfunction->get_pono_by_pr_material($retrive_material["pr_material_id"]);?> </td>
					
				</tr>
				<?php } ?>
				 
				<tr>
					<td align="center" colspan="5"><h3><strong> Prepared By </strong></h3>
						<?php
						if($pr_material['created_by']){
							echo $this->ERPfunction->get_user_name($pr_material['created_by']); 
						}
						?>
					</td>
					<td align="center" colspan="6"><h3><strong> Approved By </strong></h3>
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
						
						// if($approved_by){
							// echo $this->ERPfunction->get_user_name($approved_by);							
						// }
						?>
					</td>
				</tr>
				
				
			</tbody>
		</table>
		
	<?php  
		}
	?>
	</div>
</div>
               