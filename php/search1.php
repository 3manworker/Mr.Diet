<?php
  //require_once "./database/db.php";
  $db = new mysqli("localhost", "root", "", "menu");
  if (isset($_POST['query'])) {
    $result=$db->query('set names utf-8');
    $Q="select mname,ingredient,do from menu where mname like '%{$_POST['query']}%'";
    $result=$db->query($Q);
    $num=$result->num_rows;
    

      //$query = "SELECT * FROM Songs WHERE song_name LIKE '{$_POST['query']}%' LIMIT 100";
      //$result = mysqli_query($connection, $query);
    $t="";
      for ($i=0;$i<$num;$i++) {
        $ARAW=$result->fetch_row();
        $t.="<option value='".$ARAW[0]."'>".$ARAW[0]."</option>";
        //echo $ARAW[0]."<br/>";
    }
    echo $t;
    
  }
?>