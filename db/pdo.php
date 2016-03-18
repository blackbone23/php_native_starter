<?php
// koneksi ke database
session_start();
$base_url = "http://localhost/folder";  //your website url localhost change with website url if it take to live host
date_default_timezone_set("Asia/JAKARTA");
if(!isset($_SESSION['username'])){
	$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	//$_SESSION['actual_link']=$actual_link;
	if($actual_link != $base_url."/login.php") {
		header("Location: $base_url/login.php");
	}
}
global $transaksi;
//$base_url = "http://localhost/stoktabunghendri";
function testdb_connect() {
$dbh = new PDO("mysql:host=DBHOST;dbname=DBNAME", "USERNAME", "PASSWORD");
     return ($dbh);
}

function edit($a,$b,$c,$d,$e,$f,$g) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE TABLE SET field2=:field2  WHERE field1=:field1");
	$stmt->execute(array(':field1' => $a, ':field2' => $b));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}

function get($a,$b) {
	$db = testdb_connect();
	$stmt = $db->prepare("SELECT FROM TABLE WHERE TABLE.field1=:field1 AND TABLE.field2=:field2 ORDER BY KEY ASC");
	$stmt->execute(array(':field1' => $a, ':field2' => $b));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}
function input($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("INSERT INTO TABLE (field1) VALUES(:field1)");
	$stmt->execute(array(':field1' => $a));
	$affected_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($affected_rows);
}
function update($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("UPDATE TABLE SET field2='VALUE' WHERE field1=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}

function delete($a) {
	$db = testdb_connect();
	$stmt = $db->prepare("DELETE FROM TABLE WHERE field1=:field1");
	$stmt->execute(array(':field1' => $a));
	$fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return($fetch_array);
}
