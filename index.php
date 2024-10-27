
<?php include($_SERVER['DOCUMENT_ROOT'] . "/att/inc/header.php"); ?>

<div class = "container" style="width:100%">
   <br>

   <div class="row">

      <div class = "col"   >
       <div class="card" style="box-shadow:0 0 5px 0 lightgrey;">
         <div class="card-body">

          <h4 class="card-title">Actions</h4>
          <a href="#"  data-toggle="modal" data-target="#add_modal"   style="background-color: #e2e6ea" type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill  ">Add Employee</a>
       </div>
    </div>
 </div>




 <div class = "col"   >
   <div class="card" style="box-shadow:0 0 5px 0 lightgrey;">
      <div class="card-body">

       <h4 class="card-title">View</h4>

       <a href="view/employee_add.php" style="background-color: #e2e6ea
       " type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill ">Employees</a>


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

<!-- End Model -->


<div class="modal fade  " id="prepare_payroll_modal"  role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content"> 

         <div class="modal-header">
            <h4 class="modal-title"  >    Prepare Payroll </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
           <form  method="post"  id="prepare_payroll_form"  > 









             <div class="form-row">
               <div class="col">
                  <div class="form-group ">
                     <label>Month</label>
                     <select style="width: 100%; height: 50%" name="month_pr" required  class="form-control" id="month_pr">


                        <option value=""> Select  </option>
                        <option value="01"> January  </option>
                        <option value="02"> February </option>
                        <option value="03"> March </option>
                        <option value="04"> April </option>
                        <option value="05"> May   </option>
                        <option value="06"> June  </option>
                        <option value="07"> July  </option>
                        <option value="08"> August   </option>
                        <option value="09"> September   </option>
                        <option value="10"> October  </option>
                        <option value="11"> November </option>
                        <option value="12"> December </option>



                     </select>




                  </div>
               </div>


               <div class="col">
                  <div class="form-group ">
                     <label>Year</label>
                     <select style="width: 100%; height: 50%" name="year_pr" required  class="form-control" id="year_pr">
                                      
                       <option value=""> Select Year  </option>
                       <option value="2000"> 2000  </option>
                       <option value="2001"> 2001  </option>
                       <option value="2002"> 2002  </option>
                       <option value="2003"> 2003  </option>
                       <option value="2004"> 2004  </option>
                       <option value="2005"> 2005  </option>
                       <option value="2006"> 2006  </option>
                       <option value="2007"> 2007  </option>
                       <option value="2008"> 2008  </option>
                       <option value="2009"> 2009  </option>
                       <option value="2010"> 2010  </option>
                       <option value="2011"> 2011  </option>
                       <option value="2012"> 2012  </option>
                       <option value="2013"> 2013  </option>
                       <option value="2014"> 2014  </option>
                       <option value="2015"> 2015  </option>
                       <option value="2016"> 2016  </option>
                       <option value="2017"> 2017  </option>
                       <option value="2018"> 2018  </option>
                       <option value="2019"> 2019  </option>
                       <option value="2020"> 2020  </option>
                       <option value="2021"> 2021  </option>
                       <option value="2022"> 2022  </option>
                       <option value="2023"> 2023  </option>
                       <option value="2024"> 2024  </option>
                       <option value="2025"> 2025  </option>
                       <option value="2026"> 2026  </option>
                       <option value="2027"> 2027  </option>
                       <option value="2028"> 2028  </option>
                       <option value="2029"> 2029  </option>
                       <option value="2030"> 2030  </option>
                       <option value="2031"> 2031  </option>
                       <option value="2032"> 2032  </option>
                       <option value="2033"> 2033  </option>
                       <option value="2034"> 2034  </option>
                       <option value="2035"> 2035  </option>
                       <option value="2036"> 2036  </option>
                       <option value="2037"> 2037  </option>
                       <option value="2038"> 2038  </option>
                       <option value="2039"> 2039  </option>
                       <option value="2040"> 2040  </option>
                       <option value="2041"> 2041  </option>
                       <option value="2042"> 2042  </option>
                       <option value="2043"> 2043  </option>
                       <option value="2044"> 2044  </option>
                       <option value="2045"> 2045  </option>
                       <option value="2046"> 2046  </option>
                       <option value="2047"> 2047  </option>
                       <option value="2048"> 2048  </option>
                       <option value="2049"> 2049  </option>
                       <option value="2050"> 2050  </option>
                       <option value="2051"> 2051  </option>
                       <option value="2052"> 2052  </option>
                       <option value="2053"> 2053  </option>
                       <option value="2054"> 2054  </option>
                       <option value="2055"> 2055  </option>
                       <option value="2056"> 2056  </option>
                       <option value="2057"> 2057  </option>
                       <option value="2058"> 2058  </option>
                       <option value="2059"> 2059  </option>
                       <option value="2060"> 2060  </option>
                       <option value="2061"> 2061  </option>
                       <option value="2062"> 2062  </option>
                       <option value="2063"> 2063  </option>
                       <option value="2064"> 2064  </option>
                       <option value="2065"> 2065  </option>
                       <option value="2066"> 2066  </option>
                       <option value="2067"> 2067  </option>
                       <option value="2068"> 2068  </option>
                       <option value="2069"> 2069  </option>
                       <option value="2070"> 2070  </option>
                       <option value="2071"> 2071  </option>
                       <option value="2072"> 2072  </option>
                       <option value="2073"> 2073  </option>
                       <option value="2074"> 2074  </option>
                       <option value="2075"> 2075  </option>
                       <option value="2076"> 2076  </option>
                       <option value="2077"> 2077  </option>
                       <option value="2078"> 2078  </option>
                       <option value="2079"> 2079  </option>
                       <option value="2080"> 2080  </option>
                       <option value="2081"> 2081  </option>
                       <option value="2082"> 2082  </option>
                       <option value="2083"> 2083  </option>
                       <option value="2084"> 2084  </option>
                       <option value="2085"> 2085  </option>
                       <option value="2086"> 2086  </option>
                       <option value="2087"> 2087  </option>
                       <option value="2088"> 2088  </option>
                       <option value="2089"> 2089  </option>
                       <option value="2090"> 2090  </option>
                       <option value="2091"> 2091  </option>
                       <option value="2092"> 2092  </option>
                       <option value="2093"> 2093  </option>
                       <option value="2094"> 2094  </option>
                       <option value="2095"> 2095  </option>
                       <option value="2096"> 2096  </option>
                       <option value="2097"> 2097  </option>
                       <option value="2098"> 2098  </option>
                       <option value="2099"> 2099  </option>




                    </select>
                 </div>
              </div>


           </div>

           <div class="form-row">
            <div class="col">
               <div class="form-group ">
                  <label>Description</label>
                  <textarea class="form-control" required id="description" name="description"></textarea>



               </div>
            </div>
         </div>
         <input type="hidden" name="time" id="time_2">

      </div>
      <div class="modal-footer">
         <button   style="width: 100px; border: 1px solid black; " type="button" class="btn btn-default text-dark btn-sm rounded-pill " data-dismiss="modal">&nbsp;<strong>Close</strong>&nbsp;</button>
         <button style="width: 100px; " type="submit" value="Add" name="action" class="btn btn-dark  btn-sm  rounded-pill "    > </small>&nbsp;Prepare&nbsp; 
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


<script type="text/javascript">
   $("#add_form").submit(function(event) {
    event.preventDefault();
    $.ajax({
      url: base_url + 'contacts/add_parent',
      data: $("#add_form").serialize(),
      type: "post",
      async: false,
      dataType: 'json',
      success: function(response) {
       $('#add_modal').modal('hide');
       $('#add_form')[0].reset();
       alert('Added Successfully');
               //$('#myTable').DataTable().ajax.reload();
       window.location = base_url + 'contacts/sponsors' ;
    },
    error: function() {
     alert("Error occurred: Phone already exists");
  }
}); 

 });

</script>

<script >
 $(document).ready(function() {
  $("#line_manager_id").select2({
    dropdownParent: $("#new_employee_modal")
 });

  $("#employee_location").select2({
    dropdownParent: $("#new_employee_modal")
 });
  $("#employee_department").select2({
    dropdownParent: $("#new_employee_modal")
 });



  $("#year_pr").select2({
    dropdownParent: $("#prepare_payroll_modal")
 });

  $("#month_pr").select2({
    dropdownParent: $("#prepare_payroll_modal")
 });
});

</script>
<script>
   $("#prepare_payroll_form").submit(function(event) {
    event.preventDefault();

    if (confirm("Are you sure you want to prepare payroll?") == true) {

       $.ajax({
          url: base_url + 'hr/prepare_payroll',
          data: $("#prepare_payroll_form").serialize(),
          type: "post",
          async: false,
          dataType: 'json',
          success: function(response) {

           $('#prepare_payroll_modal').modal('hide');
           $('#prepare_payroll_form')[0].reset();
           alert('Payroll created successfully ');


           window.location = base_url + 'hr/payroll' ;       
        },
      //error: function() {
     // alert("Error: Please check if the selected month and year's subscription invoice entries already prepared before");
        error: function(jqXHR, textStatus, errorThrown) {
       // alert('Error: '  );
           alert("Error: Please check if the selected month and year's payroll already prepared before");


        }
     });
    } else {
     return false;
  }
});
</script>
<script>
  var today = new Date();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  document.getElementById("add_employee_time").setAttribute('value',time);
  document.getElementById("time_2").setAttribute('value',time);
</script>

