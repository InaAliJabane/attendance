<?php include("../inc/header.php"); ?>
<?php include("../config/dbcon.php"); ?>

<?php 
 
// Query to get employee data
$sql = "SELECT id, fullname, email, secret, gender, phone, address, regdate, status, role, note, created_at FROM tbl_employee order by id desc";
$result = $con->query($sql);


?>
<style >
	<style type="text/css">
	#table_row {
		background-color: #f2f2f2;
		color: #543e31;
	}
	#table_button {
		background-color: #f2f2f2;
		color: #543e31;
		font-weight: bold;
	}
	
	thead {
		background-color: red   ;
		color: #FFFFFF;
	}
</style>
<!-- My custom style -->
<style type="text/css">
	@media print {
		
		.table th {
			
			background-color: #FFFFFF !important;
			
		}


		.table th {
			
           color: #000000  !important;

       }





       .table td {
          background-color: transparent !important;
      }


      .bg-success {
          background-color: #0000FF    !important;

      }


      .table th {
          background-color: transparent !important;
      }
  }
</style>

</style>
<div class = "container" style="width:100%" >
 <div class="collapse" id="collapse_2">
     <div class="card card-body" style="width: 100%">
      <div class="form-row">
          <div class="col">
           <a  class="btn btn-default btn-sm text-dark rounded-pill" href=""> <strong><i class="fa-solid fa-bars"></i> </strong></a> 

           <span><strong>/</strong></span>
           <a  class="btn btn-default btn-sm text-dark rounded-pill" href=""> <strong>Employee</strong></a> 
           <span><strong>/</strong></span>
           <a onclick="location.reload();" class="btn btn-default btn-sm text-dark rounded-pill"  > <strong>Register</strong></a> 
       </div>



   </div>
</div>
</div>
<br>

<!-- End Model -->




<div class = "row" >
	<div class = "col"  >
      <h3> Employees-Information </h3>


  </div>
  <div class = "col"  >

     <button type="button" class="btn btn-default text-dark float-right ml-2 rounded-pill" type="button" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false" aria-controls="collapseExample"> <i class="fa-solid fa-bars"></i></button>
<a  id="table_button"  class="btn btn-sm btn-secondary  rounded-pill float-right ml-2"  href="">  <small class="fa fa-arrow-left  "></small>&nbsp;&nbsp;  Back &nbsp;&nbsp;    </a> 
<a  style="  background-color: #f2f2f2; color: #543e31; font-weight: bold;" href="#" data-toggle="modal" data-target="#add_modal"   class="action_button btn btn-sm btn-secondary  rounded-pill float-right ml-2"  href="#">  <small class="fas fa-plus "></small>&nbsp;&nbsp;     Add New &nbsp;&nbsp;    </a>   
 </div>
</div>




<br>
<div class="table-responsive">
    <table id="courses_table" class="table table-striped table-bordered" style="width:100%">
        <thead id="table_row">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($employee = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($employee['id']) ?></td>
                        <td><?= htmlspecialchars($employee['fullname']) ?></td>
                        <td><?= htmlspecialchars($employee['email']) ?></td>
                        <td><?= htmlspecialchars($employee['phone']) ?></td>
                        <td><?= htmlspecialchars($employee['address']) ?></td>
                        <td><?= htmlspecialchars($employee['status']) ?></td>
                        <td>
                            <button style="background-color: #f2f2f2; color: #543e31; font-weight: bold; width:100%;" class="btn btn-dark  btn-sm  rounded-pill "    >&nbsp;Save&nbsp; 
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">No records found.</td></tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr class="bg-secondary text-light">
                <th colspan="7" style="text-align:left"></th>
            </tr>
        </tfoot>
    </table>
</div>







</div>

<!-- Stat Model --> 
<div class="modal fade" id="add_modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../post/empsave.php">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label>Full Name <span style="color: red;">*</span></label>
                                <input required type="text" class="form-control" name="fullname" id="fullname" autocomplete="on">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Email <span style="color: red;">*</span></label>
                                <input required type="email" class="form-control" name="email" id="email" autocomplete="on">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label>Password <span style="color: red;">*</span></label>
                                <input required type="password" class="form-control" name="password" id="password" autocomplete="on">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Confirm <span style="color: red;">*</span></label>
                                <input required type="password" class="form-control" name="confirm" id="confirm" autocomplete="on">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Secret <span style="color: red;">*</span></label>
                                <input required type="text" class="form-control" name="secret" id="secret" autocomplete="on">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label>Gender <span style="color: red;">*</span></label>
                                <select required name="gender" class="form-control" id="gender">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Phone <span style="color: red;">*</span></label>
                                <input required type="text" class="form-control" name="phone" id="phone" autocomplete="on">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label>Address <span style="color: red;">*</span></label>
                                <input required type="text" class="form-control" name="address" id="address" autocomplete="on">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Registration Date <span style="color: red;">*</span></label>
                                <input required type="date" class="form-control" name="regdate" id="regdate" autocomplete="on">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label>Status <span style="color: red;">*</span></label>
                                <select required name="status" class="form-control" id="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Role <span style="color: red;">*</span></label>
                                <select required name="role" class="form-control" id="role">
                                    <option value="2">Employee</option>
                                    <option value="1">User</option>
                                    <option value="0">Admin</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                  <button   style="width: 100px; border: 1px solid black; " type="button" class="btn btn-default text-dark btn-sm rounded-pill " data-dismiss="modal">&nbsp;<strong>Close</strong>&nbsp;</button>
                  <button style="width: 100px; " type="submit"  name="save" class="btn btn-dark  btn-sm  rounded-pill "    >&nbsp;Save&nbsp; 
                  </button>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- ----------------------------------------------------------------------------------------------------------- -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- success message  -->
<?php
if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) {
    echo "<script>
    Swal.fire({
        icon: '" . ($_SESSION['message_type'] == 'success' ? 'success' : 'error') . "',
        title: '" . ($_SESSION['message_type'] == 'success' ? 'Success' : 'Error') . "',
        text: '" . $_SESSION['message'] . "',
        timer: 2000,
        showConfirmButton: false
    });
    </script>";
    // Unset session variables
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirm');
            const form = document.querySelector('form[action="../post/empsave.php"]');

            if (passwordField && confirmPasswordField && form) {
                form.addEventListener('submit', function (e) {
                    if (passwordField.value !== confirmPasswordField.value) {
                e.preventDefault(); // Stop form submission
                Swal.fire({
                    icon: 'error',
                    title: 'Password Mismatch',
                    text: 'Passwords do not match. Please try again.',
                    timer: 4000,
                    showConfirmButton: false
                });
            }
        });

        // Show/hide password functionality
                const togglePassword = document.createElement('span');
        //togglePassword.innerHTML = '👁️';
                togglePassword.style.cursor = 'pointer';
                passwordField.parentNode.appendChild(togglePassword);

                togglePassword.addEventListener('click', function () {
                    passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#courses_table').DataTable({
        "order": [], // Default ordering
        "scrollX": true, // Enable horizontal scrolling
        mark: true, // Enable search highlighting
        dom: 'Bfrtip', // Define the layout
        lengthMenu: [ // Define length menu options
            [5, 25, 50, 100, -1],
            ['5 rows','25 rows', '50 rows', '100 rows', 'Show All']
            ],
        buttons: [ // Define buttons for export functionality
            'pageLength',
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible' // Export only visible columns
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible' // Export only visible columns
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible' // Export only visible columns
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible' // Export only visible columns
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible' // Export only visible columns
                }
            },
            'colvis' // Column visibility toggle button
            ],
        columnDefs: [{ // Define column settings
            targets: -1, // Target last column
            visible: true // Show all columns by default
        }]
    });
        });




    </script>


