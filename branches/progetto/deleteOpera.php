<?php

  include_once __DIR__ . '/libs/csrf/csrfprotector.php'; // FIXED
  csrfProtector::init();
	session_start();
	if($_SESSION['loginlev'] !== 1 && $_SESSION['loginlev'] !== 2)
		header('location: missAutentication.php');
	$id = $_GET['id'];
	$col = 'mysql:host=localhost;dbname=my_durresarchmuseum';
$db = new PDO($col , 'root', '');
$db->beginTransaction();
if (isset($_SERVER[‘HTTP_REFERER’]) && $_SERVER[‘HTTP_REFERER’]!=””)
  {
  if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)
    {
    // Qualcosa non quadra: uscire dal programma, creare file di log, etc etc.
    }
  }
  else{
$sql = $db->prepare('DELETE FROM opera WHERE id = :id');
$sql->bindParam(':id', $id);
$sql->execute();
}
?>
