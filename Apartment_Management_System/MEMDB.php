<?php 
	session_start();
	$db = oci_connect('APARTMENT', 'house', 'localhost/XE');


	// initialize variables
	$MEMBER_ID = "";
	$MEMBER_NAME = "";
	$PHONE = "";
	$EMAIL = "";
	$FLAT_NO = "";
	$update = false;

	if (isset($_POST['save'])) {
		$MEMBER_ID = $_POST['MEMBER_ID'];
		$MEMBER_NAME = $_POST['MEMBER_NAME'];
		$PHONE = $_POST['PHONE'];
		$EMAIL = $_POST['EMAIL'];
		$FLAT_NO = $_POST['FLAT_NO'];

		$a = oci_parse($db, "INSERT INTO MEMBER (MEMBER_ID, MEMBER_NAME, PHONE, EMAIL, FLAT_NO) VALUES ('$MEMBER_ID', '$MEMBER_NAME', '$PHONE', '$EMAIL', '$FLAT_NO')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		header('location: MEMCOPY.php');
	}
    if (isset($_POST['update'])) {
        $MEMBER_ID = $_POST['MEMBER_ID'];
		$MEMBER_NAME = $_POST['MEMBER_NAME'];
		$PHONE = $_POST['PHONE'];
		$EMAIL = $_POST['EMAIL'];
		$FLAT_NO = $_POST['FLAT_NO'];
		
        $b=oci_parse($db, "UPDATE MEMBER SET MEMBER_NAME='$MEMBER_NAME', PHONE='$PHONE', EMAIL='$EMAIL', FLAT_NO='$FLAT_NO' WHERE MEMBER_ID=$MEMBER_ID");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
        header('location: MEMCOPY.php');
    }
    if (isset($_GET['del'])) {
        $MEMBER_ID = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM MEMBER WHERE MEMBER_ID=$MEMBER_ID");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
        header('location: MemberInfo.php');
    }
?>