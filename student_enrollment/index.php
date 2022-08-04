<?php require_once 'admin/db_con.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Student Enrollment Management System</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <!-- <a class="navbar-brand" href="index.php"><i class="fas fa-chart-line fa-3x"></i></a> -->
      <a class="navbar-brand" href="index.php"><img class="img-thumbnail" id="imgdb" src="./admin/images/CCIS Logo.png" width="60px" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <h1 class="nav-item" style="color:white;text-align:center;"><strong>Welcome to Student Management System!</strong></h1><br>
      <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
        <div class="nav-item">
          <a class="btn btn-primary float-right" href="admin/login.php">Login</a>
      </div>
      </div>
    </nav>
          <div class="container" style="margin-top: 5.0em;margin-bottom: 5.0em;"><br>
          <div class="row">
            <div class="col-md-4 offset-md-4">
            <div class="card">
			      <div class="card-body register-card-body">
              <form method="POST">
                <table class="text-center infotable">
                  <tr>
                    <th colspan="2">
                      <p class="text-center">Student Information</p>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <p>Choose Class</p>
                    </td>
                    <td>
                      <select class="form-control" name="choose">
                        <option value="">
                          Select
                        </option>
                        <option value="BSCS3-1">
                          BSCS 3-1
                        </option>
                        <option value="BSCS3-2">
                          BSCS 3-2
                        </option>
                        <option value="BSCS3-3">
                        BSCS 3-3
                        </option>
                        <option value="BSCS3-4">
                        BSCS 3-4
                        </option>
                        <option value="BSCS3-1N">
                        BSCS 3-1N
                        </option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <p><label for="roll">Student No</label></p>
                    </td>
                    <td>
                      <input class="form-control" type="text" pattern="[a-zA-Z0-9-]{15}" id="roll" placeholder="Student Number" name="roll">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="text-center">
                      <input class="btn btn-danger" type="submit" name="showinfo">
                    </td>
                  </tr>
                </table>
              </form>
              </div>
              </div>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
          $choose= $_POST['choose'];
          $roll = $_POST['roll'];
          if (!empty($choose && $roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `roll`='$roll' AND `class`='$choose'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['roll']==$roll && $choose==$row['class']) {
                $stroll= $row['roll'];
                $stname= $row['name'];
                $stclass= $row['class'];
                $city= $row['city'];
                $photo= $row['photo'];
                $pcontact= $row['pcontact'];
              ?>
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered">
              <tr>
                <td rowspan="5"><h3>Student Info</h3><img class="img-thumbnail" src="admin/images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
                <td>Name</td>
                <td><?= isset($stname)?$stname:'';?></td>
              </tr>
              <tr>
                <td>Student No.</td>
                <td><?= isset($stroll)?$stroll:'';?></td>
              </tr>
              <tr>
                <td>Class</td>
                <td><?= isset($stclass)?$stclass:'';?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?= isset($city)?$city:'';?></td>
              </tr>
              <tr>
                <td>Contact No.</td>
                <td><?= isset($pcontact)?$pcontact:'';?></td>
              </tr>
            </table>
          </div>
        </div>  
      <?php 
          }else{
                echo '<p style="color:red;">Please Input Valid Roll & Email</p>';
              }
            }else{
              echo '<p style="color:red;">Your Input Doesn\'t Match!</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Data Not Found!");</script>
            <?php }
          }; ?>
    </div>

    <footer style="margin-top: 7.5em;text-align:center;">
      <div class="container">
      <p>Copyright &copy; <?php echo date('Y') ?></p>
      </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
      body{
        background-color: white;
      }

    </style>
  </body>
</html>