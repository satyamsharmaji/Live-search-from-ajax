
<html>
    <head>
    <title>Practice</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <style>
	</style>
    </head>
    <body>
	
	<div class="container">
		<form method="post">
		  <div class="form-group">
			<label for="email">Name</label>
			<input type="text" class="form-control" id="name">
		  </div>

		  <div class="form-group">
			<label for="pwd">Email:</label>
			<input type="text" class="form-control" id="email">
		  </div>
		   <div class="form-group">
		   <input type="radio"  value="0" checked id="maritul_status" name="maritul_status"> Married<br/>
		   <input type="radio" value="1"  id="maritul_status" name="maritul_status"> UnMarried<br/>
		   
		   </div>
		  <button type="button" class="btn btn-default" id="submit" onclick="submitdata();" >Submit</button>
		</form>
	</div>
	<div id="submit_successfully"></div>
	<div class="container">
	
		
			<form method="post" action="">
			<div class="form-group">
			<div class="col-md-4"><span onclick="delete_multiple_record();" style="font-size:24px; text-align:center;cursor:pointer;" ><i id="delete_record" class="fa fa-trash-o" aria-hidden="true"></i></span></div>
				<div class="col-md-4">
				
				</div>
				<div class="col-md-4">
				<input type="text" class="form-control" id="search" name="search" placeholder="Search By Name">
			  </div>
			</form>
		</div>
	</div>
	<div class="container">
	<h4 class="text-success" id="del_succ"></h4>
	</div>
	<div class="container">
		<table class="table table-striped">
			<thead>
			<tr>
			<td ><input type="checkbox" name="allcheck" onclick="allcheck();" /></td>
			<td >User Id</td>
			<td>Name</td>
			<td>Email Id</td>
			<td>Maritual Status</td>
			<td>Update</td>
			<td>Delete</td>
			</tr>
			</thead>
			<tbody id="table">
			<?php
			$con = mysqli_connect("localhost","root","","satyam-php") or mysqli_connect_error();
			$result_per_page = 10;
			$calculation_data_query = "SELECT * FROM `ajax-php`";
			$run_calculation = mysqli_query($con, $calculation_data_query);
		
			
			$table_data = "SELECT * FROM `ajax-php` LIMIT 0,10";
			
			$table_data_query = mysqli_query($con, $table_data); 
			
			$number_of_rows = mysqli_num_rows($run_calculation);
			$number_of_row_per_page =ceil($number_of_rows/$result_per_page);
			while($row_value= mysqli_fetch_array($table_data_query)){
			?><tr>
					<td ><input type="checkbox" name="multidel" value="<?php echo $row_value['id'];?>"/></td>
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
			
			
			?>
		</tbody>
				</table>
		 <ul class="pagination">
		 <?php for($page=1;$page<=$number_of_row_per_page; $page++) {?>
			<li><a href="javascript:void(0)" onclick="get_pagination(<?php echo $page;?>);"><?php echo $page;?></a></li>
			
		 <?php } ?>	
		 </ul>
	</div>
	
	<div class="update_form">
	
	</div>
<script src="jquery.js"></script>
    </body>
</html>