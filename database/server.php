<?php
    // Check that user logged in or not
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
    include_once 'classes/Crud.php';

    // Declare a new Crud object
    $crud = new Crud();

    $blood_group = array(
        "A-",
        "B+",
        "B-",
        "AB+",
        "AB-",
        "O+",
        "O-",
    );

    $message="";
    if(isset($_POST["login"])){
      $row = $crud->login('user', $_POST['email'], $_POST['password']);
      if($row){
        $_SESSION["name"] = $row['name'];
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["rank"] = $row['rank'];
      } else {
        $message = "Invalid Username or Password!";
      }
    }
    if(isset($_POST["logout"])) {
      $_SESSION["name"] = "";
      $_SESSION["user_id"] = "";
      $_SESSION["rank"] = "";
      session_destroy();
    }

    if(isset($_POST['register_user'])) {
        if($_POST['password'] != $_POST['confirmPassword']){
            $message = "Passwords doesn't match";
        } else{
        $name = $_POST['name'];
        $image = "";
        $image_name = "";

        $image = addslashes($_FILES['image']['tmp_name']);
        $image_name = addslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);

        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $occupation = $_POST['occupation'];
        $age = $_POST['age'];
        $blood_group = $_POST['blood_group'];
        $total_donated = $_POST['total_donated'];
        $last_donated = $_POST['last_donated'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password =$_POST['password'];

        $crud->execute("INSERT INTO user (name, image, image_name, phone, email, occupation, age, blood_group, total_donated, last_donated, address, username, password) VALUES ('$name', '$image', '$image_name', '$phone', '$email', '$occupation', '$age', '$blood_group', '$total_donated', '$last_donated', '$address', '$username', '$password' )");
        }
    }

    if(isset($_POST['view_profile'])) {
      $profile = $crud->search('user', 'id', $_POST['user_id']);
      if(!$profile){
        $_SESSION['msg'] = "ERROr reading user data!";
      }
    }


    if(isset($_POST['delete_user'])) {
      $id = $_POST['user_id'];

      $result = $crud->delete($id, 'user');

      if(!$result){
        $_SESSION['msg'] = "Error deleting user";
      } else {
        $_SESSION['msg'] = "Deleted Successfully";
      }
    }

    if(isset($_POST['edit_user'])) {
      $id = $_POST['user_id'];
      $user = $crud->search("user", "id", $id);
      if(!$user){
        $_SESSION['msg'] = "Error in loading user edit page";
      }
      // echo 'running';
    }

    if(isset($_POST['update_user'])) {
      $id = $_POST['user_id'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $occupation = $_POST['occupation'];
      $age = $_POST['age'];
      $blood_group = $_POST['blood_group'];
      $total_donated = $_POST['total_donated'];
      $last_donated = $_POST['last_donated'];
      $address = $_POST['address'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];

      $query = "UPDATE user SET name=$name, phone=$phone, email=$email, occupation=$occupation, age=$age, blood_group=$blood_group, total_donated=$total_donated, last_donated=$last_donated, address=$address, username=$username";
      if(!empty($password) && ($password == $confirmPassword)){
        $query = $query.", password=$password";
      }

      $image = "";
      $image_name = "";

      $image = addslashes($_FILES['image']['tmp_name']); //SQL Injection defence!
      if(!empty($image)){
        $image_name = addslashes($_FILES['image']['name']);

        $image = file_get_contents($image);
        $image = base64_encode($image);
        $query = $query.", image=$image, image_name=$image_name";
      }
      $query = "$query WHERE id = $id";
      $result = $crud->execute($query);
      if(!$result){
        $_SESSION['msg'] = "Couldn't update data!";
      }
    }

    if(isset($_POST['request_blood'])){
      $name = $_POST['requesterName'];
      $p_name = $_POST['patientName'];
      $h_name = $_POST['hospitalName'];
      $address = $_POST['donationAddress'];
      $blood_group = $_POST['bloodGroup'];
      $bag_count = $_POST['bloodQuantity'];
      $contact = $_POST['contactNumber'];
      $date = date('Y-m-d', strtotime($_POST['donatingDate']));

      $result = $crud->execute("INSERT INTO req (name, p_name, hospital_name,address, blood_group, bag_count, contact, donate_date) VALUES('$name', '$p_name', '$h_name',  '$address',  '$blood_group',  '$bag_count',  '$contact',  '$date')");
      if(!$result){
        echo "Insertion problem";
      }
    }

    $users = $crud->select('user');
    $total_donor = $crud->getData("SELECT COUNT(id) as donor FROM user");
    // $requests = $crud->getData("SELECT * FROM req");
?>
