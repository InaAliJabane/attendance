<?php include("../inc/header.php"); ?>

<div class="container" style="width:100%">
   <br>
   <div class="row">
      <div class="col">
         <div class="card" style="box-shadow:0 0 5px 0 lightgrey; width: 80%; left: 12%;">
            <div class="card-body">
               <h4 class="card-title">Actions</h4>
               <!-- Attendees button to trigger location check and modal -->
               <a href="#" id="attendBtn" style="background-color: #e2e6ea" type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill">Attendees</a>
               <a href="#" data-toggle="modal" data-target="#add_modal" style="background-color: #e2e6ea" type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill">Transactions</a>
               <a href="#" data-toggle="modal" data-target="#add_modal" style="background-color: #e2e6ea" type="button" class="btn btn-light text-dark btn-lg btn-block rounded-pill">Allowed Locations</a>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Attendees Confirmation Modal -->
<div class="modal fade" id="attendModal" tabindex="-1" aria-labelledby="attendModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="../post/attend.php">  
         <div class="modal-header">
            <h5 class="modal-title" id="attendModalLabel">Confirm Attendance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            
            <!-- Shift Selection Dropdown -->
            <div class="form-group">
                <label for="shiftSelect">Select Shift:</label>
                <select class="form-control" id="shiftSelect" name="shift">
                    <option value="enter">Enter Shift</option>
                    <option value="out">Out Shift</option>
                </select>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <!-- This button will submit the attendance -->
            <button type="submit" name="attend" class="btn btn-primary" id="confirmAttendBtn">Yes, Attend</button>
         </div>
      </div>
      </form>
   </div>
</div> 

<!-- jQuery (full version, not slim) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    // Session-stored location coordinates
    const sessionLatitude = <?php echo json_encode($_SESSION['latitude']); ?>;
    const sessionLongitude = <?php echo json_encode($_SESSION['longitude']); ?>;
    const allowedDistance = 120; // Allowed distance in meters

    function calculateDistance(lat1, lon1, lat2, lon2) {
        const R = 6371e3; // Earth's radius in meters
        const φ1 = lat1 * Math.PI / 180;
        const φ2 = lat2 * Math.PI / 180;
        const Δφ = (lat2 - lat1) * Math.PI / 180;
        const Δλ = (lon2 - lon1) * Math.PI / 180;

        const a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                  Math.cos(φ1) * Math.cos(φ2) *
                  Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        return R * c; // Distance in meters
    }

    document.getElementById("attendBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link behavior

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const userLatitude = position.coords.latitude;
                const userLongitude = position.coords.longitude;

                const distance = calculateDistance(sessionLatitude, sessionLongitude, userLatitude, userLongitude);

                if (distance <= allowedDistance) {
                    // Show confirmation modal
                    $('#attendModal').modal('show');
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Wrong Location',
                        text: `Please go to the assigned location to mark attendance. You are ${Math.round(distance)} meters away.`,
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
            }, function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Location Error',
                    text: 'Unable to access location. Please enable location services.',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Geolocation Not Supported',
                text: 'Your browser does not support geolocation.',
                timer: 3000,
                showConfirmButton: false
            });
        }
    });

    // Handle attendance confirmation and redirection
document.getElementById("confirmAttendBtn").addEventListener("click", function() {
    $('#attendModal').modal('hide');

    // Directly redirect to the desired page after successful attendance confirmation
    window.location.href = "/att/post/attend.php"; // Replace with the actual page URL
});

</script>

























<!-- Success Message -->
<?php
// if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) {
//     echo "<script>
//     Swal.fire({
//         icon: '" . ($_SESSION['message_type'] == 'success' ? 'success' : 'error') . "',
//         title: '" . ($_SESSION['message_type'] == 'success' ? 'Success' : 'Error') . "',
//         text: '" . $_SESSION['message'] . "',
//         timer: 2000,
//         showConfirmButton: false
//     });
//     </script>";
//     / Unset session variables
//     unset($_SESSION['message']);
//     unset($_SESSION['message_type']);
// }
?>
