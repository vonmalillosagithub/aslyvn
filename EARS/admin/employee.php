<!DOCTYPE html>
<?php
	require_once 'auth.php';
	
?>
<html lang="eng">
	<head>
		<title>Employee List | Employee Attendance Record System</title>
		<?php include('header.php') ?>
		<link rel="stylesheet" href="mployeesss.css">
	</head>
	<body>
		<?php include('nav_bar.php') ?>
		
		<div class="container-fluid admin">
			<div class="modal fade" id="edit_student" tabindex="-1" role="dialog" aria-labelledby="myModallabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content panel-warning">
						<div class="modal-header panel-heading">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModallabel">Edit Student</h4>
						</div>
						<div id="edit_query"></div>
					</div>
				</div>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<div class="well col-lg-12">
				<button class="btn btn-success" type="button" id="new_emp_btn"><span class="fa fa-plus"></span> Add new </button>
				<br />
				<br />
				
				<table id="table" class="table table-bordered table-striped">
			
					<thead>
						<tr>
							<th>Employee No</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Lastname</th>
							<th>Birthdate</th>
							<th>Province</th>
							<th>Position</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$employee_qry = $conn->query("SELECT * FROM employee") or die($conn->error);

							while($row=$employee_qry->fetch_array()){
						?>
						<tr>
							<td><?php echo $row['employee_no']?></td>
							<td><?php echo $row['firstname']?></td>
							<td><?php echo $row['middlename']?></td>
							<td><?php echo $row['lastname']?></td>
							<td><?php echo $row['birthdate']?></td>
                            <td><?php echo $row['province']?></td>
							<td><?php echo $row['position']?></td>
							<td>
								<center>
								 <button class="btn btn-sm btn-outline-primary edit_employee" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-edit"></i></button>
								<button class="btn btn-sm btn-outline-danger remove_employee" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-trash"></i></button>
								</center>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<br />
			<br />	
			<br />	
		</div>
		
		<div class="modal fade" id="new_employee" tabindex="-1" role="dialog" >
				<div class="modal-dialog modal-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" id="myModallabel">Add new Employee</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<form id='employee_frm'>
							<div class ="modal-body">
								<div class="form-group">
									<label>Firstname:</label>
									<input type="hidden" name="id" />
									<input type="text" name="firstname" required="required" class="form-control" />
								</div>
								<div class="form-group">
									<label>Middlename:</label>
									<input type="text" name ="middlename" placeholder="(optional)" class="form-control" />
								</div>
								<div class="form-group">
									<label>Lastname:</label>
									<input type="text" name="lastname" required="required" class="form-control" />
								</div>
								<div class="form-group">
									<label>Gender:</label>
									<select class="form-control" name="gender" id="gender" required>
											<option value="">Please make a choice</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
								</div>
								<div class="form-group">
                                   <label>Birthdate:</label>
                                   <input type="date" name="birthdate" class="form-control" />
                                </div>
								<div class="form-group">
                                   <label>Status:</label>
                                   <input type="text" name="status" class="form-control" />
                                </div>
                                <div class="form-group">
                                   <label>Province:</label>
                                   <input type="text" name="province" class="form-control" />
                                </div>
								<div class="form-group">
                                   <label>City:</label>
                                   <input type="text" name="city" class="form-control" />
                                </div>
								<div class="form-group">
                                   <label>Barangay:</label>
                                   <input type="text" name="barangay" class="form-control" />
                                </div>
								<div class="form-group">
									<label>Email:</label>
									<input type="text" name="email" required="required" class="form-control" />
								</div>
								<div class="form-group">
									<label>Emp. Type:</label>
									<select class="form-control" name="emp_type" id="emp_type" required>
											<option value="">Please make a choice</option>
											<option value="Part-time employee">Part-time employee</option>
											<option value="Intern">Intern</option>
											<option value="Holiday worker">Holiday worker</option>
											<option value="Permanent position">Permanent position</option>
										</select>
								</div>
								<div class="form-group">
                                   <label>Joining Date (MM/DD/YYYY):</label>
                                   <input type="date" class="form-control datepicker" name="joining_date" id="joining_date" required />
                                </div>
								<div class="form-group">
									<label>Position:</label>
									<input type="text" name="position" required="required" class="form-control" />
								</div>

							<div class="modal-footer">
								<button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#employee_frm').submit(function(e){
				e.preventDefault()
				$('#employee_frm [name="submit"]').attr('disabled',true)
				$('#employee_frm [name="submit"]').html('Saving')
				$.ajax({
					url:'save_employee.php',
					method:"POST",
					data:$(this).serialize(),
					error:err=>console.log(),
					success:function(resp){
						if(typeof resp !=undefined){
							resp = JSON.parse(resp)
							if(resp.status == 1){
								alert(resp.msg);
								location.reload();
							}
						}
					}
				})
			})

			$('.remove_employee').click(function(){
				var id=$(this).attr('data-id');
				var _conf = confirm("Are you sure to delete this data ?");
				if(_conf == true){
					$.ajax({
						url:'delete_employee.php?id='+id,
						error:err=>console.log(err),
						success:function(resp){
							if(typeof resp != undefined){
								resp = JSON.parse(resp)
								if(resp.status == 1){
									alert(resp.msg);
									location.reload()
								}
							}
						}
					})
				}
			});

			$('.edit_employee').click(function(){
				var $id=$(this).attr('data-id');
				$.ajax({
					url:'get_employee.php',
					method:"POST",
					data:{id:$id},
					error:err=>console.log(),
					success:function(resp){
						if(typeof resp !=undefined){
							resp = JSON.parse(resp)
							$('[name="id"]').val(resp.id)
							$('[name="firstname"]').val(resp.firstname)
							$('[name="middlename"]').val(resp.middlename)
							$('[name="lastname"]').val(resp.lastname)
							$('[name="gender"]').val(resp.gender)
							$('[name="birthdate"]').val(resp.birthdate)
							$('[name="status"]').val(resp.status)
							$('[name="province"]').val(resp.province)
							$('[name="city"]').val(resp.city)
							$('[name="barangay"]').val(resp.barangay)
							$('[name="email"]').val(resp.email)
							$('[name="emp_type"]').val(resp.emp_type)
							$('[name="joining_date"]').val(resp.joining_date)
							$('[name="position"]').val(resp.position)
							$('#new_employee .modal-title').html('Edit Employee')
							$('#new_employee').modal('show')
						}
					}
				})
			});
			$('#new_emp_btn').click(function(){
				$('[name="id"]').val('')
				$('[name="firstname"]').val('')
				$('[name="middlename"]').val('')
				$('[name="lastname"]').val('')
				$('[name="gender"]').val('')
				$('[name="birthdate"]').val('')
				$('[name="status"]').val('')
				$('[name="province"]').val('')
				$('[name="city"]').val('')
				$('[name="barangay"]').val('')
				$('[name="email"]').val('')
				$('[name="emp_type"]').val('')
				$('[name="joining_date"]').val('')
				$('[name="position"]').val('')
				$('#new_employee .modal-title').html('Add New Employee')
				$('#new_employee').modal('show')
			})
		});
	</script>
</html>
