<!-- <?php $this->load->view('/inc/settings_header'); ?> -->

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
      <a  class="btn btn-default btn-sm text-dark rounded-pill" href="<?php echo base_url('dashboard'); ?>"> <strong><i class="fa-solid fa-bars"></i> </strong></a> 

      <span><strong>/</strong></span>
      <a  class="btn btn-default btn-sm text-dark rounded-pill" href="<?php echo base_url('settings'); ?>"> <strong>Settings</strong></a> 
      <span><strong>/</strong></span>
      <a onclick="location.reload();" class="btn btn-default btn-sm text-dark rounded-pill"  > <strong>Courses</strong></a> 
    </div>
    
    
    
  </div>
</div>
</div>
<br>
<!-- Stat Model --> 
<div class="modal fade" id="import_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title" > Import   </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
   <form method="post"  enctype="multipart/form-data"  action="<?php echo base_url(); ?>settings/import_courses">

     <!--raw-->
     <!--raw-->
     <div class="form-row">
      
      <div class="col">
       <div class="form-group ">
        <label for="label">Select File</label>
        <input class="form-control" required type="file" name="file" required  accept=".xlsx,.xls" id="exampleInputFile">   
        
      </div>
    </div>

    
  </div>
  
</div>
<div class="modal-footer">
  
 <button   style="width: 100px; border: 1px solid black; " type="button" class="btn btn-default text-dark btn-sm rounded-pill " data-dismiss="modal">&nbsp;<strong>Close</strong>&nbsp;</button>
 

 <button  type="submit" value="Add" name="action" class="btn btn-dark  btn-sm  rounded-pill "    >
   <small class="fa fa-upload"></small>&nbsp;Import Excel&nbsp; 
 </button>

</form>   
</div>
</div>
</div>
</div>
<!-- End Model -->
<title> - Courses</title>


<?php if($this->session->flashdata('info')): ?>
 <div style="background-color: #d4edda; color:#294b31" class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo $this->session->flashdata('info'); ?>
</div>
<?php elseif($this->session->flashdata('error')): ?>
 <div class="alert alert-error alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')): ?>
 <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo $this->session->flashdata('danger'); ?>
</div>
<?php elseif($this->session->flashdata('error')): ?>
 <div class="alert alert-error alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>



<div class = "row" >
  <div class = "col"  >
   <h3> Courses</h3>
   
   
 </div>
 <div class = "col"  >
   
  <button type="button" class="btn btn-default text-dark float-right ml-2 rounded-pill" type="button" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false" aria-controls="collapseExample"> <i class="fa-solid fa-bars"></i></button>

  <a style="width: 100px;" type="button"  id="table_button"   class="btn btn-sm btn-secondary  rounded-pill float-right ml-2"   type="button" href="#" data-toggle="modal" data-target="#import_modal" > <small class="fa fa-upload"></small>&nbsp;&nbsp;  Import &nbsp;&nbsp; </a>

  
  <a  style="  background-color: #f2f2f2; color: #543e31; font-weight: bold;" href="#" data-toggle="modal" data-target="#add_modal"   class="action_button btn btn-sm btn-secondary  rounded-pill float-right ml-2"  href="#">  <small class="fas fa-plus "></small>&nbsp;&nbsp;     Add New &nbsp;&nbsp;    </a>   





  <?php $advanced_search    =  $this->uri->segment(3); ?> 
  <?php if ($advanced_search=="advanced_search"): ?>
    <a   id="table_button"  class="btn btn-sm btn-secondary  rounded-pill float-right ml-2"  href="<?php echo base_url('settings/courses'); ?>">  <small class="fa fa-arrow-left  "></small>&nbsp;&nbsp;  Back &nbsp;&nbsp;    </a> 
  <?php else: ?>
   <a   id="table_button"  class="btn btn-sm btn-secondary  rounded-pill float-right ml-2"  href="<?php echo base_url('settings/courses/advanced_search'); ?>">  <small class="fa fa-search  "></small>&nbsp;&nbsp;  Advanced Search &nbsp;&nbsp;    </a> 
 <?php endif ?>
 <input type="hidden" name="advanced_search" id="advanced_search" value="<?php echo $advanced_search   ?>">

 
 
 
</div>
</div>




<br>

<div class="table-resposive">
  <table id="courses_table" class="table table-striped table-bordered  " style="width:100%">
   <thead>
    <tr id="table_row">
     <th>#</th>
     <th> CoursesCode</th>
     <th>Courses Name </th>
     <th>Credit Hour</th>
     <th>Faculty  </th>
     <th>Status</th>
     <th style="width: 75px;">View</th>
     <th style="width: 75px;">Delete</th>
     <th style="width: 75px;">Info</th>
   </tr>
 </thead>
 <tfoot>
  <tr  class="bg-secondary text-light"   >
   <th  style="width: 20px;"></th>
   
 </tr>
</tfoot>
</table>
</div>






</div>


<!-- Stat Model --> 
<div class="modal fade  " id="add_modal"  role="dialog">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title" id="exampleModalLabel">  Add  Course  </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form  method="post"   name="add_form" id="add_form"   > 
     <!--raw-->

     <div class="form-row">
      <div class="col">
       <div class="form-group ">
        <label>CourseCode  <span style="color: red;">*</span> <small>(Without space)</small> </label>
        <input required type="text" class="form-control" name="course_code" id="course_code" aria-describedby="emailHelp" autocomplete="off"      >
      </div>
    </div>
    
    <div class="col">
     <div class="form-group ">
      <label>Course Name <span style="color: red;">*</span></label>
      <input required type="text" class="form-control" name="course_name" id="course_name" aria-describedby="emailHelp" autocomplete="off"      >
    </div>
  </div>
</div>



<div class="form-row">
  <div class="col">
   <div class="form-group ">
    <label>Credit Hour <span style="color: red;">*</span></label>
    <input required type="text" class="form-control" name="credit_hour" id="credit_hour" aria-describedby="emailHelp" autocomplete="off"      >
  </div>
</div>

<div class="col">
 <div class="form-group ">
  <label>Faculty <span style="color: red;">*</span></label>
  <select required style="width: 100%;" name="faculty_id" class="form-control" id="faculty_id" required>
    <option value=''>Select</option>
    <?php if(count($faculties)):  ?>
     <?php   foreach($faculties as $row   ): ?>
       <option value= <?php echo $row ->id ;?>><?php echo $row ->name ;?> </option>
     <?php endforeach; ?>
   <?php endif; ?>
   


   

 </select>
</div>
</div>
</div>




<div class="form-row">


  <div class="col">
   <div class="form-group ">
    <label>Status <span style="color: red;">*</span></label>
    <select required style="width: 100%;" name="course_status" class="form-control" id="course_status" required>

     <option value='1'>Active</option>
     <option value='0'>Inactive</option>




   </select>
 </div>
</div>
</div>



<input required type="hidden" class="form-control" name="time" id="time" aria-describedby="emailHelp" autocomplete="off"      >
</div>
<div class="modal-footer">
  <button   style="width: 100px; border: 1px solid black; " type="button" class="btn btn-default text-dark btn-sm rounded-pill " data-dismiss="modal">&nbsp;<strong>Close</strong>&nbsp;</button>
  <button style="width: 100px; " type="submit" value="Add" name="action" class="btn btn-dark  btn-sm  rounded-pill "    >&nbsp;Add&nbsp; 
  </button>
</form>
</div>
</div>
</div>
</div>



<!-- Stat Model --> 
<div class="modal fade  " id="edit_modal"  role="dialog">
 <div class="modal-dialog  modal-lg" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title" id="edit_exampleModalLabel">  Edit  Course  </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form  method="post"   name="edit_form" id="edit_form"   > 
     <!--raw-->
     <input readonly  required type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelp" autocomplete="off"      >
     <div class="form-row">
      <div class="col">
       <div class="form-group ">
        <label>CourseCode  <span style="color: red;">*</span>   </label>
        <input readonly  required type="text" class="form-control" name="course_code" id="edit_course_code" aria-describedby="emailHelp" autocomplete="off"      >
      </div>
    </div>
    
    <div class="col">
     <div class="form-group ">
      <label>Course Name <span style="color: red;">*</span></label>
      <input required type="text" class="form-control" name="course_name" id="edit_course_name" aria-describedby="emailHelp" autocomplete="off"      >
    </div>
  </div>
</div>



<div class="form-row">
  <div class="col">
   <div class="form-group ">
    <label>Credit Hour <span style="color: red;">*</span></label>
    <input required type="text" class="form-control" name="credit_hour" id="edit_credit_hour" aria-describedby="emailHelp" autocomplete="off"      >
  </div>
</div>

<div class="col">
 <div class="form-group ">
  <label>Faculty <span style="color: red;">*</span></label>
  <select required style="width: 100%;" name="faculty_id" class="form-control" id="edit_faculty_id" required>
    <option value=''>Select</option>
    <?php if(count($faculties)):  ?>
     <?php   foreach($faculties as $row   ): ?>
       <option value= <?php echo $row ->id ;?>><?php echo $row ->name ;?> </option>
     <?php endforeach; ?>
   <?php endif; ?>
   


   

 </select>
</div>
</div>
</div>




<div class="form-row">


  <div class="col">
   <div class="form-group ">
    <label>Status <span style="color: red;">*</span></label>
    <select required style="width: 100%;" name="course_status" class="form-control" 
    id="edit_course_status" required>

    <option value='1'>Active</option>
    <option value='0'>Inactive</option>




  </select>
</div>
</div>
</div>



<input required type="hidden" class="form-control" name="time" id="edit_time" aria-describedby="emailHelp" autocomplete="off"      >
</div>
<div class="modal-footer">
  <button   style="width: 100px; border: 1px solid black; " type="button" class="btn btn-default text-dark btn-sm rounded-pill " data-dismiss="modal">&nbsp;<strong>Close</strong>&nbsp;</button>
  <button style="width: 100px; " type="submit" value="Add" name="action" class="btn btn-dark  btn-sm  rounded-pill "    >&nbsp;Update&nbsp; 
  </button>
</form>
</div>
</div>
</div>
</div>



<!-- Stat Model --> 
<div class="modal fade  " id="info_modal"  role="dialog">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title" > Record Information  </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form > 
     <!--raw-->
     <div class="form-row">


      <div class="col">
       <div class="form-group ">
        <label>Created at</label>
        <input required type="text" class="form-control" name="created_at" id="created_at" aria-describedby="emailHelp" autocomplete="off"       >
      </div>
    </div>
    <div class="col">
     <div class="form-group ">
      <label>Created by (user ID)</label>
      <input required type="text" class="form-control" name="created_by_user_id" id="created_by_user_id" aria-describedby="emailHelp"      >
    </div>
  </div>
</div>
<!--raw-->
<div class="form-row">


  <div class="col">
   <div class="form-group ">
    <label>Updated at</label>
    <input required type="text" class="form-control" name="updated_at" id="updated_at" aria-describedby="emailHelp" autocomplete="off"      >
  </div>
</div>
<div class="col">
 <div class="form-group ">
  <label>Updated by (user ID)</label>
  <input required type="text" class="form-control" name="updated_by_user_id" id="updated_by_user_id" aria-describedby="emailHelp" autocomplete="off"       >
</div>
</div>
</div>


</div>
<div class="modal-footer">
  <button   style="width: 100px; border: 1px solid black; " type="button" class="btn btn-default text-dark btn-sm rounded-pill " data-dismiss="modal">&nbsp;<strong>Close</strong>&nbsp;</button>

</form>
</div>
</div>
</div>
</div>
<!-- End Model -->


<script>
   // fetch courses using datatables



 var advanced_search = $('#advanced_search').val();
 if (advanced_search == "advanced_search") {
  search = "";
}else{
  search = "search";
}

     //*********** Data tables for all courses
$(document).ready(function(){

  $('#courses_table thead  '+search+' th').each( function () {
    var title = $('#courses_table thead th').eq( $(this).index() ).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  } );
  
  
  var table = $('#courses_table').DataTable({
    "ajax": base_url + "settings/fetch_courses_all",
    "order": [],
    "scrollX": true,
    order: [0, 'asc'],
    
    
    mark: true,
    dom: 'Bfrtip',
    lengthMenu: [
     [  25, 50, 100, -1],
     [ '25 rows', '50 rows', '100 rows', 'Show All']
     ],
    
    
    
    
    
    buttons: [
     'pageLength',
     {
       extend: 'copyHtml5',
       exportOptions: {
         columns: ':visible'
       }
     },
     {
       extend: 'excelHtml5',
       exportOptions: {
         columns: ':visible'
       }
     },
     {
       extend: 'csvHtml5',
       exportOptions: {
         columns: ':visible'
       }
     },
     
     {
       extend: 'pdfHtml5',
                // download: 'open',
       exportOptions: {
         columns: ':visible'
       }
       
     },
     {
       extend: 'print',
       exportOptions: {
         columns: ':visible'
       }
     },
     'colvis'
     ],
    columDefs: [{
     targets: -1,
     visible: false
   }]
    
    
   }); //End DT
  table.columns().every( function () {
    var that = this;
    
    $( 'input', this.header() ).on( 'keyup change', function () {
      that
      .search( this.value )
      .draw();
    } );
  } );
  
   });  //end of document ready 



 </script>
 
 <script >


   $("#add_form").submit(function(event) {
    event.preventDefault();
    $.ajax({
      url: base_url + 'settings/add_course',
      data: $("#add_form").serialize(),
      type: "post",
      async: false,
      dataType: 'json',
      success: function(response) {
               // $('#add_modal').modal('hide');
       $('#add_form')[0].reset();
       alert('Added Successfully');
       $('#courses_table').DataTable().ajax.reload();
     },
     error: function() {
      alert("Error occurred: Course Code already exists");
    }
  }); 

  });

   $("#edit_form").submit(function(event) {
    $.ajax({
      url: base_url + 'settings/update_course',
      data: $("#edit_form").serialize(),
      type: "post",
      async: false,
      dataType: 'json',
      success: function(response) {
       $('#edit_modal').modal('hide');
       $('#edit_form')[0].reset();
       alert('Updated Successfully');
       $('#courses_table').DataTable().ajax.reload();
     },
     error: function() {
      alert("Error occurred: Course Code already exists");
    }
  }); 
    
  });



   function view(id)
   {
   // alert(id);
     $.ajax({
      url: "<?php echo base_url('settings/fetch_course_id'); ?>",
      method:"post",
      data:{id:id},
      dataType:"json",
      success:function(response)
      {
       $('#id').val(response.id);
       $('#edit_course_code').val(response.subject_code);

       
       $('#edit_course_name').val(response.subject_name); 
       $('#edit_credit_hour').val(response.crhour); 
       $('#edit_faculty_id').val(response.faculty_id); 
       $('#edit_course_status').val(response.status); 
       $('#edit_modal').modal({
        backdrop:"static",
        keyboard:false
      });
     }
   })
   }


   function info(id)
   {
   // alert(id);
     $.ajax({
      url: "<?php echo base_url('settings/fetch_course_id'); ?>",
      method:"post",
      data:{id:id},
      dataType:"json",
      success:function(response)
      {


        $('#created_at').val(response.created_at);
        $('#created_by_user_id').val(response.created_by_user_id);
        $('#updated_at').val(response.updated_at);
        $('#updated_by_user_id').val(response.updated_by_user_id);
        $('#info_modal').modal({
          backdrop:"static",
          keyboard:false
        });
      }
    })
   }

 </script>

 
 <script >
   function delete_course(id)
   {
   // alert(id);
     if(confirm('Are you sure you want to delete this record?')==true)
     {
      $.ajax({
        url:'<?php echo base_url('settings/delete_course'); ?>',
        method:"post",
        dataType:"json",
        data:{id:id},
        success:function(response)
        {
          if(response==1)
          {
            alert('Data Deleted Successfully');
            $('#courses_table').DataTable().ajax.reload();

          }
          else
          {
            alert('Error [Database Constraint]: This record cannot be deleted because other tables in the database are referencing it.');
          }
        }
      })
    }
  }


  $(document).ready(function() {
    $("input#course_code").on({
      keydown: function(e) {
        if (e.which === 32)
          return false;
      },
      change: function() {
        this.value = this.value.replace(/\s/g, "");
      }
    });
  });




  $(document).ready(function() {
    $("#faculty_id").select2({
      dropdownParent: $("#add_modal")
    });
  });

</script>
<?php $this->load->view('/inc/footer'); ?>