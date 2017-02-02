<?php
$mysql_err="Could not connect.............";

$my_sql_host='localhost';
$mysql_user='root';
$mysql_pass='';

$mysql_db='spine';

if((!@mysql_connect($my_sql_host, $mysql_user, $mysql_pass)) or(!@mysql_select_db($mysql_db)))
{die($mysql_err);
}

?>
 