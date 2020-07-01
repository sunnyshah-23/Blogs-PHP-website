<?php
function confirm_query($result)
{   
    global $connection;
    if(!$result)
    {
    die("query failed". mysqli_error($connection));
    }
}

function users_online()
{
    
    
    global $connection;
    $session=session_id();
    $time=time();
    $time_out_in_seconds=40;
    $time_out=$time-$time_out_in_seconds;
    $query="select * from users_online where session='$session' ";
    $send_query=mysqli_query($connection,$query);
    $count=mysqli_num_rows($send_query);
    if($count==null or $count==0)
    {
        mysqli_query($connection,"insert into users_online(session,time) values ('$session','$time')");

    }
    else{
        mysqli_query($connection,"update users_online set time='$time' where session='$session' ");
    }
    $users_online_query=mysqli_query($connection,"select * from users_online where time > '$time_out' ");
  return $count_user=mysqli_num_rows($users_online_query);

}

function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection,trim($string));
}
?>