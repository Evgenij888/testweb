<?php
if (file_exists(".lock")) {
    $handle = fopen(".htpasswd", "a");
    fwrite($handle, implode("", file(".lock")));
    fclose($handle);

    unlink(".lock");
}
?>
<a href="./">login</a>
