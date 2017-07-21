
<?php
  include'../includes/confi.php';
  session_start();
?>


<?php
  $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
  if(isset($_POST["dangnhap"]))
  {
    $user1 = $_POST["taikhoan"];
    $pass1 = $_POST["matkhau"];
    $sql = "select * from account where username = '$user1' and password ='$pass1'";
    $tk1 = mysqli_query($mysqli,$sql);
    if(mysqli_num_rows($tk1) == 1)
    {
		mysqli_query($mysqli,"update account set statust = 1 where username = '$user1'");
      $row1= mysqli_fetch_array($tk1);
      $_SESSION["username"] = $row1["username"];
      $_SESSION["password"] = $row1["password"];
      $_SESSION["display"] = $row1["display"];
      $_SESSION["type"] = $row1["type"];
	  $_SESSION["vaitro"] = $row1["idvaitro"];
		
    }
  }

  if(isset($_SESSION["username"]) && isset($_SESSION["type"]) == 1)
  {
    header("location:../index.php");
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
<link href="../style/layout.css" rel="stylesheet" type="text/css" media="all" /> 
</head>

<body>
  <div id="main">
  	<div id="avata_admin">
      <img src="../image/login.jpg" width="330"/>
    </div>
  	<div id="box">
    	<fieldset style="width:300px">
        <form method="post">
          <table width="300">
              <tr>
                <td width="80"><legend>Tài khoản</legend></td>
                <td width="208"><input type="text" name="taikhoan" style="width:200px" /></td>
            </tr>
              <tr>
                <td><legend>Mật khẩu</legend></td>
                <td><input type="password" name="matkhau" style="width:200px" /></td>
            </tr>
              <tr>
                <td></td>
                <td><input type="submit" id="dangnhap" name="dangnhap" value="Đăng Nhập" style="width:80px;" >
                  <input type="button" name="thoat" value="Thoát" onclick="window.location.href='../../index.php'" style="width:80px;" />
                </td>
            </tr>
          </table>
        </form>
    	</fieldset>
    </div>
  </div>
</body>
</html>