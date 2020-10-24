<?php
  include 'action1.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sale product</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
</head>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">College Network</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Update</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Delete</a>
        </li>
      </ul>
      </div>
    <form class="form-inline" action="/action_page.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </nav>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center text-dark mt-2">Product Sale</h3>
        <hr>
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">Add Post</h3>
        <form action="action1.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <input type="text" name="productname"  class="form-control" placeholder="Enter product name" required>
          </div>
          <div class="form-group">
            <input type="text" name="description"  class="form-control" placeholder="Enter product description" required>
          </div>
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
          </div>

          <div class="form-group">
            <input type="email" name="email" 
             class="form-control" placeholder="Enter e-mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone"  class="form-control" placeholder="Enter phone" required>
          </div>
          <div class="form-group">
            <input type="text" name="address"  class="form-control" placeholder="Enter address " required>
          </div>
          <div class="form-group">
            <input type="text" name="price" class="form-control" placeholder="Enter price " required>
          </div>

          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $photo; ?>">
            <input type="file" name="image" class="custom-file">
            <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
          </div>
          <div class="form-group">
           
            <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
          
          </div>
        </form>
      </div>

      <div class="col-md-8">
    
        <h3 class="text-center text-info">Records Present In The Database</h3>
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Description</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          
          <tr>
              <td>1</td>
              <td><img src="uploads/hp.jpg" width-"25"></td>
              <td>Hp Da0327tu Laptop</td>
              <td>4gb, Hard Drive Size: 4TB </td>
              <td>xyzw</td>
              <td>xyzw@gmail.com</td>
              <td>9352896312</td>
              <td>Nashik</td>
              <td>33500</td>
              <td>
              <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
                <a href="action1.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                <a href="index1.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
              
              </td>
            </tr>

            <tr>
              <td>2</td>
              <td><img src="uploads/9pro.jpg" width-"25"></td>
              <td>Xiaomi Redmi Note 9 Pro </td>
              <td>128GB + 6GB RA </td>
              <td>abcd</td>
              <td>abcd@gmail.com</td>
              <td>9852637895</td>
              <td>Alandi</td>
              <td>18499</td>
              <td>
              <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
                <a href="action1.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                <a href="index1.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
              
              </td>
            </tr>

            <tr>
              <td>3</td>
              <td><img src="uploads/headset.jpg" width-"25"></td>
              <td>Free Headset with Noise Cancellation  </td>
              <td>odestro B-11 Wireless Magnetic Bluetooth neckbend in-Ear High Bass Stereo Hands-Free Headset with Noise Cancellation Mic for Gyming, Jogging, Running for All iOS and Android Smartphones(Multicolour)  </td>
              <td>abcd</td>
              <td>abcd@gmail.com</td>
              <td>9852637895</td>
              <td>Alandi</td>
              <td>18499</td>
              <td>
              <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
                <a href="action1.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                <a href="index1.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
              
              </td>
            </tr>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><img src="<?= $row['photo']; ?>" width="25"></td>
              <td><?= $row['productname']; ?></td>
              <td><?= $row['description']; ?></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['phone']; ?></td>
              <td><?= $row['address']; ?></td>
              <td><?= $row['price']; ?></td>
              <td>
                <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
                <a href="action1.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                <a href="index1.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </body>
  </html>