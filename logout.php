<?php
if (isset($_SERVER["PHP_AUTH_USER"]) && !file_exists(".lock")) {

    $savedLine = "";
    $newLines = array();
    $oldLines = file(".htpasswd");

    for($i = 0; $i < count($oldLines); $i++) {
        if (strpos($oldLines[$i], $_SERVER["PHP_AUTH_USER"].":") === false) {
            $newLines[count($newLines)] = $oldLines[$i];
        } else {
            $savedLine = $oldLines[$i];
        }
    }

    $handle = fopen(".htpasswd", "w");
    fwrite($handle, implode("", $newLines));
    fclose($handle);


    $handle = fopen(".lock", "w");
    fwrite($handle, $savedLine);
    fclose($handle);
}
?>
<a href="./">relogin</a>
