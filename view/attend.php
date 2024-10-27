
<?php include($_SERVER['DOCUMENT_ROOT'] . "/att/inc/header.php"); ?>

<div class = "container" style="width:100%">
   <br>

   <div class="row">

      <div class = "col"   >
       <div class="card" style="box-shadow:0 0 5px 0 lightgrey; width: 80%; left: 12%;">
         <div class="card-body">

          <h4 class="card-title">Actions</h4>
          <a href="#"  data-toggle="modal" data-target="#add_modal"   style="background-color: #e2e6ea" type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill  ">Attendes</a>
          <a href="#"  data-toggle="modal" data-target="#add_modal"   style="background-color: #e2e6ea" type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill  ">Transactions</a>
          <a href="#"  data-toggle="modal" data-target="#add_modal"   style="background-color: #e2e6ea" type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill  ">Allowed Locations</a>
       </div>
    </div>
 </div>





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
                <form method="post" action="post/empsave.php">
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

<!-- End Model -->





<script>
  (function () {
     'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
     var forms = document.querySelectorAll('.needs-validation1')

  // Loop over them and prevent submission
     Array.prototype.slice.call(forms)
     .forEach(function (form) {
      form.addEventListener('submit', function (event) {

        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
       }

       form.classList.add('was-validated')
    }, false)
   })
  })()


</script>

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
            const form = document.querySelector('form[action="post/empsave.php"]');

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

