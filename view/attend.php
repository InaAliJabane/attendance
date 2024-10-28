<!-- Include any header or necessary HTML setup -->
<?php include("../inc/header.php"); ?>

<div class="container" style="width:100%">
   <br>
   <div class="row">
      <div class="col">
         <div class="card" style="box-shadow:0 0 5px 0 lightgrey; width: 80%; left: 12%;">
            <div class="card-body">
               <h4 class="card-title">Actions</h4>
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
         <form id="attendanceForm">
            <div class="modal-header">
               <h5 class="modal-title" id="attendModalLabel">Confirm Attendance</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                   <label for="shiftSelect">Select Shift:</label>
                   <select class="form-control" id="shiftSelect" name="shift" required>
                       <option value="enter">Enter Shift</option>
                       <option value="out">Out Shift</option>
                   </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary" id="confirmAttendBtn">Yes, Attend</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- Include necessary scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- JavaScript to handle location checking and attendance submission -->
<script>
    // Session-stored location coordinates and allowed distance from PHP session
    const sessionLatitude = <?php echo json_encode($_SESSION['latitude']); ?>;
    const sessionLongitude = <?php echo json_encode($_SESSION['longitude']); ?>;
    const allowedDistance = <?php echo json_encode($_SESSION['meters']); ?>;

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

    // Event listener for "attendBtn" to check location and show the modal if within allowed distance
    document.getElementById("attendBtn").addEventListener("click", function(event) {
        event.preventDefault();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const userLatitude = position.coords.latitude;
                const userLongitude = position.coords.longitude;
                const distance = calculateDistance(sessionLatitude, sessionLongitude, userLatitude, userLongitude);

                if (distance <= allowedDistance) {
                    $('#attendModal').modal('show'); // Show shift selection modal
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
                let errorMsg = 'Unable to access location. Please enable location services.';
                if (error.code === 1) errorMsg = 'Permission denied. Please allow location access.';
                else if (error.code === 2) errorMsg = 'Position unavailable. Try again later.';
                else if (error.code === 3) errorMsg = 'Request timed out. Please try again.';

                Swal.fire({
                    icon: 'error',
                    title: 'Location Error',
                    text: errorMsg,
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

    // Handle attendance form submission with AJAX
    document.getElementById("attendanceForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const shift = document.getElementById("shiftSelect").value;

        $.ajax({
            url: "../post/attend.php", // Adjust path as needed
            type: "POST",
            data: { shift: shift },
            dataType: "json",
            success: function(response) {
                if (response.error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error
                    });
                } else if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "/att/view/attend.php"; // Redirect after success
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });
    });
</script>
