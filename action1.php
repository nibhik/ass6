<?php
session_start();
include 'config.php';


if(isset($_POST['add'])){
    $productname=$_POST['productname'];
    $description=$_POST['description'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $price=$_POST['price'];

    $photo=$_FILES['image']['name'];
    $upload="uploads/".$photo;

    $query="INSERT INTO crud(productname,description,name,email,phone,address,price,photo)VALUES(?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ssssssss",$productname,$description,$name,$email,$phone,$address,$price,$upload);
    $stmt->execute();

    move_uploaded_file($_FILES['image']['tmp_name'], $upload);

		header('location:index.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $sql="SELECT photo FROM crud WHERE id=?";
    $stmt2=$conn->prepare($sql);
    $stmt2->bind_param("i",$id);
    $stmt2->execute();
    $result2=$stmt2->get_result();
    $row=$result2->fetch_assoc();

    $imagepath=$row['photo'];
    unlink($imagepath);

    $query="DELETE FROM crud WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('location:index.php');
    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";
}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];

    $query="SELECT * FROM crud WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $id=$row['id'];
    $productname=$row['productname'];
    $description=$row['description'];
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
    $price=$row['price'];
    $photo=$row['photo'];

    $update=true;
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $productname=$_POST['productname'];
    $description=$_POST['description'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $price=$_POST['price'];
    $oldimage=$_POST['oldimage'];

    if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
        $newimage="uploads/".$_FILES['image']['name'];
        unlink($oldimage);
        move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
    }
    else{
        $newimage=$oldimage;
    }
    $query="UPDATE crud SET productname=?,description=?,name=?,email=?,phone=?,address=?,price=?,photo=? WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ssssssssi",$productname,$description,$name,$email,$phone,$address,$price,$newimage,$id);
    $stmt->execute();

    $_SESSION['response']="Updated Successfully!";
    $_SESSION['res_type']="primary";
    header('location:index.php');
}

if(isset($_GET['details'])){
    $id=$_GET['details'];
    $query="SELECT * FROM crud WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    $vid=$row['id'];
    $vpname=$row['productname'];
    $vdname=$row['description'];
    $vname=$row['name'];
    $vemail=$row['email'];
    $vphone=$row['phone'];
    $vaddress=$row['address'];
    $vprice=$row['price'];
    $vphoto=$row['photo'];
}
?>