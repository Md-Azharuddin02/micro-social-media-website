<?php
include ('connection.php');
?>



<!DOCTYPE html>
<html>
<head>
  <title>profile update1</title>
  <link rel="stylesheet" href="styleforloginform.css">
</head>
<style>
  .facebook-page{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .img{
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin: 10px auto;
  }
  .img img{
    width:93px;
    height: 90px;
    border-radius: 50%;
    
  }
  .img::after {
  content: "";

}
</style>

<body>
  <div class="container flex">
    <div class="facebook-page flex">
      <form action="" method="post">
        <div class="img">
          <img src="images/flower.jpg" alt="">
        </div>
        <input type="text" placeholder="First Name" required name="fname">
        <input type="text" placeholder="Last Name" required name="lname">
        <input type="email" placeholder="Email" required name="email">
        <input type="date" placeholder="DOB" required name="dob">
        <div class="link">
          <button type="submit" name="submit" class="login">Update</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

<?php
 if(isset($_POST['submit'])){
  $fname= mysqli_real_escape_string($con, $_POST['fname']);
  $lname=mysqli_real_escape_string($con,  $_POST['lname']);
  $email= mysqli_real_escape_string($con, $_POST['email']);
  $dob=mysqli_real_escape_string($con,  $_POST['dob']);


$emailQuery= " SELECT * FROM Users where email='$email' ";
$query  = mysqli_query($con, $emailQuery);

$emailCount =  mysqli_num_rows($query);

if($emailCount>0){
  $updateQuerry= "UPDATE USERS SET fname='$fname', lname='$lname',email='$email',dob='$dob' ";
  $query = mysqli_query($con,$updateQuerry);
  if($query){
    ?>
    <script>
      alert("Updated successfully !");
      </script>
    <?php
  }
}
else{
  ?>
  <script>
    alert("User does not Exist !");
    </script>
  <?php
}


}



?>