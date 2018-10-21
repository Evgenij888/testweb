<meta charset="utf-8">
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Access Denied';
    exit;
} 
?>

Welcome, <?=$_SERVER['PHP_AUTH_USER'] ?>!<br />
<br /> 
  <a href="result.php?info=mem">Get info memory</a><br> 
  <a href="result.php?info=cpu">Get info Cpu</a><br> 
  <a href="result.php?info=pwd">Get info pwd</a><br> 
  <a href="result.php?info=gitinfo">Get info Current git commit</a><br> 

<a href="logout.php">logout</a>

