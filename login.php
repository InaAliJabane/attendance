
<html>

<head>

 <title>Sanabil- Employee systems  </title>


 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

 <!-- Tell the browser to be responsive to screen width -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
 
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" ></script>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
 <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style type="text/css">
  @page {
   size: auto;
 }
</style>






</head>
<body>
 <style >
   .dropdown:hover>.dropdown-menu{
     display: block;
   }
 </style>

 <!-- NAV-->
 <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark  ;">
   <a style="height: 40px" class="navbar-brand" href="https://schoolsfls443dr4rsm53m.shihaab.tech/dashboard"> <b> 
   </b> </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">

   </div>
 </nav>

 <body style="background-image: url('https://schoolsfls443dr4rsm53m.shihaab.tech/images/bglogin.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">

  <div class="container" style="width: 100%">
   <style>
    #card {
      width: 54% !important;
    }
    @media (max-width: 800px) {
      #card {
        width: 100% !important;
      }
    }
  </style>   



  <center>



    <img style="width: 240px;" src="https://schoolsfls443dr4rsm53m.shihaab.tech/images/sanabil_main_logo.png" class="card-img-top mx-auto" alt="..."><br/><small>Employee Systems</small><br>

  </center>

  <br>


  <center><h5>
   Emp
 </h5> </center>

 <br><br><br><br>
 <div id="card" class="card mx-auto">
  <div class="card-body" style="box-shadow:0 0 25px 0 lightgrey; " >
    <br/>

    <label><h3 align="left">&nbsp; Login</h3></label>
    <br/>

    <!-- Include jQuery and SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form id="loginForm" method="POST">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <div class="input-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="showPasswordToggle">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-dark rounded-pill myButton" >Login</button>
</form>
<script>
    $(document).ready(function() {
        $("#loginForm").submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            // Disable the button and set a 30-second timer
            $(".myButton").attr("disabled", true).text("Please wait...");
            let buttonTimeout = setTimeout(function() {
                $(".myButton").attr("disabled", false).text("Login"); // Re-enable the button and reset text after 30 seconds
            }, 30000);

            $.ajax({
                type: "POST",
                url: "./config/auth.php", // Ensure this path is correct
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    clearTimeout(buttonTimeout); // Clear the timeout if AJAX completes
                    $(".myButton").attr("disabled", false).text("Login");
                    
                    if (response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: response.error,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else if (response.redirect) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful',
                            text: 'Redirecting...',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = response.redirect;
                        });
                    }
                },
                error: function(xhr, status, error) {
                    clearTimeout(buttonTimeout); // Clear the timeout if AJAX fails
                    $(".myButton").attr("disabled", false).text("Login");
                    console.log("Error Status:", status);
                    console.log("XHR Object:", xhr);
                    console.log("Error Thrown:", error);

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again. Status: ' + status + ', Error: ' + error,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });

        // Toggle password visibility
        $("#showPasswordToggle").click(function() {
            const passwordField = $("#password");
            const fieldType = passwordField.attr("type") === "password" ? "text" : "password";
            passwordField.attr("type", fieldType);
        });
    });
</script>

    <div class="card-footer"><a href="#"></a></div>
  </div><!-- end of card body-->

</div><!-- end of card-->

</div><!-- end container-->
<script type="text/javascript">
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<style type="text/css">




 html {
  position: relative;
  min-height: 100%;
}
body {
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px;
  background-color: #f5f5f5; 
}
</style>

<br>

<div class="footer navbar-fixed-bottom">
  <nav class="navbar  navbar-expand-lg navbar navbar-dark bg-dark  navbar-fixed-bottom ;">
    <a class="navbar-brand" href="#"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <p class="text-light   "  ><i class="fa fa-copyright" aria-hidden="true">    </i> 2024 &nbsp; Sanabil Employee - Developed by Saafi Systems   </p>

  </nav>
</div>








</body>



</html>