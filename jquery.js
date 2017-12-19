// Filter Value Through Search Box
$(document).ready(function(){
 
	$("#search").keyup(function(){
		
		var value = $(this).val();
		
		$.ajax({
			url : 'http://localhost/satyam-php/db.php',
			type : 'post',
			data : {value : value},
			success : function(data){
				$("#table").html(data);
			}
		});
	});

});
// End Filter Search Record


//Submit Data Into Database
function submitdata(){
	var name = $("#name").val();
	var email = $("#email").val();
	var maritul_status = $("input[name=maritul_status]:checked").val();
	
	$.ajax({
		url :  'http://localhost/satyam-php/db.php',
		type : 'post',
		data : {name : name, email:email, maritul_status: maritul_status},
		success : function(data){
			if(data == "successsubmit")
			{
				alert("Hello "+email+" Your Record Submit Successfully");
				location.reload();
				
			}
		}
		
	});
	
}
//End Submit data Into Database


//Delete data Into Database

function delete_record(user_id){
	var conf = confirm("Are You Sure");
	if(conf == true){
		$.ajax({
			url : 'http://localhost/satyam-php/db.php',
			type : 'post',
			data : {user_id: user_id},
			success : function(data){
				if(data=="success"){
					var success = " User ID "+user_id+" Deleted Successfully" ;
					$("#del_succ").text(success);
					setTimeout(function(){
					  location.reload();
					}, 2000);
					
				}
			}
		});
	}
	else{
		alert("Nothing");
	}
}
//End Delete data Into Database



//Fetch Update record  Into form through database
function update_record(update_user_id){
	$(".update_form").toggle();
	
	$.ajax({
		url : 'http://localhost/satyam-php/db.php',
		type : 'post',
		data : {update_user_id : update_user_id},
		success : function(data){
			$(".update_form").html(data);
		}
	});
	}
//End Fetch Update record  Into form through database	

//Close Update popup through Closing icon
function update_close(){
		$(".update_form").hide(100);
}
//End Close Update popup through Closing icon


//Update Fetch Record 	
function record_update(record_id){
	var unew_name = $("#update_name").val();
	var unew_email = $("#update_email").val();
	var unew_maritul_status = $("input[name=umaritul_status]:checked").val();
	
	if(unew_name == '' || unew_email == ''){
		alert("Please Enter Text");
	}else{
	$.ajax({
			url :  'http://localhost/satyam-php/db.php',
			type : 'post',
			data : {unew_name : unew_name, unew_email:unew_email, unew_maritul_status: unew_maritul_status,record_id:record_id},
			success : function(data){
				console.log(data);
				if(data == "updated")
				{
					alert("Hello "+unew_name+" Your Record Update Successfully");
					location.reload();
					
				}
			}
			
		});
	}
}
//End Update Fetch Record 


//Pagination for record

function get_pagination(page_id){
	$.ajax({
		url : 'http://localhost/satyam-php/db.php',
		type : 'post',
		data : {page_id:page_id},
		success : function(data){
			$("#table").html(data);
		}
		
	});
}	


// Delete Multiple Record

function delete_multiple_record(){
	
	var value = [];
            $.each($("input[name='multidel']:checked"), function(){            
                value.push($(this).val());
				
            });
	var check_value =  value.join(", ");
	if(check_value != ''){
	var conf_box = confirm("Are you really want to delete "+check_value);
	if(conf_box==true){
	$.ajax({
		url : 'http://localhost/satyam-php/db.php',
		type : 'post',
		data : {check_value:check_value},
		success : function(data){
			console.log(data);
			if(data=="success"){
				alert("The Record "+check_value+" has been deleted");
				setTimeout(function(){ location.reload(); }, 1000);
			}
			
		}
		
	});
	}
	else{
		alert("Firstly You have to make sure");
	}
	}
	else{
		alert("Please Select At Least One Record");
	}

}	
var isallcheck = false;
function allcheck(){
	var checkboxprop = $("input[name='allcheck']");
	console.log("Hello");
	 isallcheck = !isallcheck;
	$("input[name='multidel']").prop('checked', isallcheck);
	
}