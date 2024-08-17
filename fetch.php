<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("connection.php");
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $filename=$_FILES['imgs']['name'];
        $tmp_name=$_FILES['imgs']['tmp_name'];

        
        $upfolder="pictures/".$filename;

        move_uploaded_file($tmp_name,$upfolder);

        $insert="INSERT INTO practice_std(name,email,password,img) VALUES('$name','$email','$password','$upfolder')";


        $data=mysqli_query($cont,$insert);

    }
    ?>












   <form method="post" enctype="multipart/form-data">
    <h1>Login Form</h1>
     <input type="text" placeholder="User Name" name="name" required><br><br>
     <input type="text" placeholder="User Email" name="email" required><br><br>
     <input type="text" placeholder="Password" name="password" required><br><br>
     <input type="file" name="imgs"><br><br>
     <input type="submit" name="submit">
   </form>
</body>
</html>