<?php
include('connect.php');
$id = $_GET['id'];

$query = "SELECT * FROM booking WHERE id = '$id'";
$result = mysqli_query($db, $query);

if ($result) {
  while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $patientCode = $row['patientCode'];
    $bookingDate = $row['bookingDate'];
    $status = $row['booking_status'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="css/timepicker.css">
  <title>Booking System</title>

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Navbar -->
  <?php include('navbar.php') ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('sidebar.php') ?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Appointment Details</li>
        </ol>

        <div class="form-group col-4">
          <label>Patient Code: </label>
          <select class="custom-select">
            <?php
            $query = "SELECT * FROM patient p, booking b WHERE b.patientCode = p.patientCode AND id = '$id'";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                $name = $row['name'];
                $id = $row['patientCode'];

            ?>
                <option><?php echo $name ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>


        <div class="form-group col-4">
          <label> Current Appiointment Date:</label>
          <input type="name" class="form-control" name="startDate" value="<?php echo $bookingDate ?>" id="startDate" readonly="readonly">
        </div>

        <div class="form-group col-4">
          <label>New Date:</label>
          <input type="date" class="form-control" name="startDate"  id="startDate" placeholder="Set new appointment date">
        </div>

        <div class="form-group col-4">
          <label>New Time:</label>
          <input type="time" class="form-control" name="startDate" id="startDate" placeholder="Set new appointment time">
        </div>

        <div class="form-group col-4">
          <label>Status:</label>
          <select class="form-control">
            <option>On Hold</option>
            <option>Cancelled</option>
            <option>Completed</option>
          </select>
        </div>

        <div class="form-group col-4">
          <button class="btn btn-primary" onclick="onSubmit()">Submit</button>
        </div>
        <!-- Sticky Footer -->
        <?php include('footer.php') ?>
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script>
      function onSubmit() {
        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let address = document.getElementById('address').value;

        console.log(name + surname + email + phone + address);

        $.ajax({
          type: 'POST',
          url: 'createPatient.php',
          data: {
            name: name,
            surname: surname,
            email: email,
            phone: phone,
            address: address
          },
        });
      }
    </script>
    <script src="js/timepicker.js"></script>
    <script>
      $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '10',
        maxTime: '6:00pm',
        defaultTime: '11',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
    </script>

</body>

</html>