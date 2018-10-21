<meta charset="utf-8">
<?php 

if ($_GET['info']){

    $info = $_GET['info'];
  
    if($info === 'mem'){
    $exec_free = explode("\n", trim(shell_exec('free')));
    $get_mem = preg_split("/[\s]+/", $exec_free[1]);
    $mem = number_format(round($get_mem[2]/1024/1024, 2), 2) . '/' . number_format(round($get_mem[1]/1024/1024, 2), 2);
  

    echo 'Memory info:'. $mem;
    }

    if($info === 'cpu'){
    $exec_loads = sys_getloadavg();
    $exec_cores = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
    $cpu = round($exec_loads[1]/($exec_cores + 1)*100, 0) . '%';

    echo 'Cpu info: '.$cpu;
   }

    if($info === 'pwd'){
	$pwd = trim(shell_exec( "pwd" ));
	echo 'Current dir: '. $pwd;
    }

    if($info === 'gitinfo'){
	$currGitCom = trim (shell_exec("git rev-parse --verify HEAD"));
	echo 'Current git commit: '. $currGitCom;
    }

}



?>
<br><hr><a href="/">Back</a>
<br><hr>
<h4>View array: </h4>
<?php 
if ($_GET) print_r ($_GET);
 ?>