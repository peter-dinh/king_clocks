<?php 
// thiết lập lấy thông tin người dùng khi truy cập vào website
	include 'admin/check_detect/Mobile_Detect.php';
	
	$ten_thiet_bi = "No name";
	 $detect = new Mobile_Detect;
	 if ( $detect->isMobile() ) {
	 	if( $detect->isiOS() ){
	 		$ten_thiet_bi = "Mobile_IOS";
		 }
		 if( $detect->isAndroidOS() ){
		 	$ten_thiet_bi = "Mobile_Android";
		 }
	 }

	 if( $detect->isTablet() ){
	 	$ten_thiet_bi = "Tablet";
	 }

	 if( $detect->isMobile() && !$detect->isTablet() ){
	 	$ten_thiet_bi = "PC";
	 }
	 $browse = "No name";
	 if($detect->is('Chrome'))
	 {
	 	$browse = "Chrome";
	 }
	 if($detect->is('Opera'))
	 {
	 	$browse = "Opera";
	 }
	 if($detect->is('UC Browser'))
	 {
	 	$browse = "UC Browser";
	 }
	 if($detect->is('Firefox'))
	 {
	 	$browse = "Firefox";
	 }
	 if($detect->is('Safari'))
	 {
	 	$browse = "Safari";
	 }
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	$id = Info_Max_ID();
	$username = "Ẩn danh";
	if(isset($_SESSION['username']))
		$username = $_SESSION['username'];
	$time_now = date("Y-m-d G:i:s");

	$ip = $_SERVER['REMOTE_ADDR'];

        $array = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

	$local = $array->country;

	$city = $array->city;
	mysqli_query($mysqli,"INSERT INTO so_luot_truy_cap(`id`, `username`, `time`, `ip`, `local`, `city`,`tenthietbi`, `browse` ) VALUES ('$id','$username','$time_now','$ip','$local','$city', '$ten_thiet_bi', '$browse')");
?>