<?php

// Insert Data 
$con = mysqli_connect("localhost","root","","satyam-php") or mysqli_connect_error();
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$maritual_status = $_POST['maritul_status'];
	$insert_query = "INSERT INTO `ajax-php`(`name`, `email`, `maritul_status`) VALUES ('$name','$email','$maritual_status')";

	 mysqli_query($con,$insert_query);
	header('Content-Type: application/json');
	$datasubmit =  "successsubmit";
	echo json_encode($datasubmit);
	
}
// END INSERT DATA 



// Fetch Data Through Filter Search Box
if(isset($_POST['value'])){
	$search_value = $_POST['value'];
	$select_query = "SELECT * FROM `ajax-php` WHERE name LIKE '".$search_value."%'  ORDER BY date DESC LIMIT 10";
	$query_table = mysqli_query($con,$select_query);
	while($row_table = mysqli_fetch_assoc($query_table)){
		?><tr>
		<td ><input type="checkbox" name="multidel" value="<?php echo $row_table['id']; ?>"/></td>
		<td id="user_id"><?php echo $row_table['id']; ?></td>
		<td><?php echo $row_table['name']; ?></td>
		<td><?php echo $row_table['email']; ?></td>
		<td>
		<?php if($row_table['maritul_status'] == 0) { 
				$row_table['maritul_status'] = "Married";
				echo $row_table['maritul_status'];
		}
		else{
			$row_table['maritul_status'] = "Unmarried";
			echo $row_table['maritul_status'];
		}
		?></td>
		<td><span onclick="update_record(<?php echo $row_table['id']; ?>);" style="font-size:24px; text-align:center;cursor:pointer;" ><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
		<td><span onclick="delete_record(<?php echo $row_table['id']; ?>);" style="font-size:24px; text-align:center;cursor:pointer;" ><i id="delete_record" class="fa fa-trash-o" aria-hidden="true"></i></span></td>
		</tr><?php
	}
}

// End Fetch Data Through Filter Search Box


//Delete Record 
if(isset($_POST['user_id'])){
	$user_id = $_POST['user_id'];
	$delet_query = "DELETE FROM `ajax-php` WHERE `id` = '$user_id'";
	$result = mysqli_query($con,$delet_query);
	header('Content-Type: application/json');
	$data =  "success";
	echo json_encode($data);
}


//End Delete Record


// Fetch Record From Data base For Update
if(isset($_POST['update_user_id'])){
	$update_id = $_POST['update_user_id'];
	
	$fetch_record = "SELECT * FROM `ajax-php` WHERE `id` = '$update_id'";
	$run_query = mysqli_query($con,$fetch_record);
	
	while($row_record = mysqli_fetch_assoc($run_query)){
		?>
		<div class="update_close" onclick="update_close();"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="row">
			<div class="form-group">
				<input type="text" class="form-control" id="update_name" value="<?php echo $row_record['name']?>" required /> 
			</div>
			
			<div class="form-group">
				<input type="email" class="form-control" id="update_email" value="<?php echo $row_record['email']?>"/> 
			</div>
			<div class="form-group">	
	
				<input type="radio" id="radio" value="0" name="umaritul_status" <?php 
			if($row_record['maritul_status'] == 0 ){ echo "checked"; }
			?> />Married <br/>  
				<input type="radio" id="radio" value="1" name="umaritul_status" <?php 
			if($row_record['maritul_status'] == 1 ){ echo "checked"; }
			?>  />Unmarried 
			
			</div>
			<div class="form-group">	
				<button id="update_button" onclick="record_update(<?php echo $row_record['id']?>);" class="btn-success btn btn-block">Update</button> 
			</div>			
		</div>
		
		<?php
		
		
	}
}
//End Fetch Record From Data base For Update


//Update Record From Fetch Data

if(isset($_POST['record_id'])){
	$main_id = $_POST['record_id'];
	$new_name = $_POST['unew_name'];
	$new_email = $_POST['unew_email'];
	
	$new_maritul_status = $_POST['unew_maritul_status'];
	
	$main_update = "UPDATE `ajax-php` SET `name`= '$new_name',`email`='$new_email',`maritul_status`='$new_maritul_status' WHERE `id`= '$main_id'";
	mysqli_query($con,$main_update);
	header('Content-Type: application/json');
	$dataupdate =  "updated";
	echo json_encode($dataupdate);
}
	
//End Update Record From Fetch Data



// Pagination Section
	if(isset($_POST['page_id'])){
		$page_id = $_POST['page_id'];
		$result_per_page = 10;
		$row_colomn = $result_per_page;
		$current_page_id = $page_id;
		$row_offset = ($current_page_id-1) * $row_colomn;
		$table_data = "SELECT * FROM `ajax-php` LIMIT ".$row_offset.",".$row_colomn;
		$table_data_query = mysqli_query($con, $table_data); 
		
			while($row_value= mysqli_fetch_array($table_data_query)){
			?><tr>
					<td ><input type="checkbox" name="multidel" value="<?php echo $row_value['id']; ?>"/></td>
					<td id="user_id"><?php echo $row_value['id']; ?></td>
					<td><?php echo $row_value['name']; ?></td>
					<td><?php echo $row_value['email']; ?></td>
					<td>
					<?php if($row_value['maritul_status'] == 0) { 
							$row_value['maritul_status'] = "Married";
							echo $row_value['maritul_status'];
					}
					else{
						$row_value['maritul_status'] = "Unmarried";
						echo $row_value['maritul_status'];
					}
					?></td>
					<td><span onclick="update_record(<?php echo $row_value['id']; ?>);" style="font-size:24px; text-align:center;cursor:pointer;" ><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
					<td><span onclick="delete_record(<?php echo $row_value['id']; ?>);" style="font-size:24px; text-align:center;cursor:pointer;" ><i id="delete_record" class="fa fa-trash-o" aria-hidden="true"></i></span></td>
			 </tr><?php
	}
		

	}
//End pagination Section
if(isset($_POST['check_value'])){
	
	
	$check_value = $_POST['check_value'];
	if($check_value!='')
	$delete_query = "DELETE FROM `ajax-php` WHERE `id` IN (".$check_value.")";
	 mysqli_query($con,$delete_query);
	
	header('Content-Type: application/json');
	$data =  "success";
	echo json_encode($data);
}


// Delete Multiple Record at one time
