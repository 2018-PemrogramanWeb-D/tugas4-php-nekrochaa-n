<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>  
<html>
<head>
  <title>login form dengan validasi</title>
  <style>
  .error {color: #FF0000;}
  </style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $passErr = "";
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["name"])) {

    $nameErr = "Nama Wajib diisi!";
  }
  else{
    if($_POST['name'] != "awawa"){
      $nameErr = "Nama Salah!";
    }else{
    $name = test_input($_POST["name"]);
    }
  }

  if(empty($_POST["password"])) {

    $passErr = "Password Wajib diisi!";
  }
  else{
    if($_POST['password'] != "123"){
      $passErr = "Password tidak benar!";
      header("Location: http://localhost/wahyudi/login_val.php");
      //$passErr = "Password tidak benar!";
    }else{
      $_SESSION['password'] = test_input($_POST["password"]);
      $_SESSION['name'] = test_input($_POST["name"]);
      
      header("Location: http://localhost/wahyudi/welcome_page.php");
      //$password = test_input($_POST["password"]);
    }
    
  }

  //$name = test_input($_POST["name"]);
  //$password = test_input($_POST["password"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>PHP Form dengan Validasi</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name; ?>"><span class ="error"> * <?php echo $nameErr ;?></span>
  <br><br>
  Password: <input type="text" name="password"><span class ="error"> * <?php echo $passErr ;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<br>
<br>
<br>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $password;
echo "<br>";
?>

</body>
</html>