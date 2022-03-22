






<?php
$hn="localhost";
$un="root";
$pw="";
$db="flames";
$conn=new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error) die($conn->connect_error);
$value1 = $_POST['value1'];
$value2 = $_POST['value2'];
$query="INSERT INTO flames VALUE('$value1','$value2');";
$result=$conn->query($query);


if(isset($value1) && isset($value2)) {
  if($value1 == $value2){
      echo "Both are same names";exit;
    }
    else {
        $flames = array('f','l','a','m','e','s');
        for($i = 0; $i < strlen($value1); $i++) {
            for($j = 0; $j < strlen($value2); $j++)
                if($value1[$i] == $value2[$j]){
                    $value1[$i] = $value2[$j] = '/';
                    break;
                }
        }
    $value1 = str_replace("/", "", $value1);
    $value2 = str_replace("/", "", $value2);
    $count = strlen($value1) + strlen($value2);
    $flame = "flames";

    while(strlen($flame)!= 1) {
        $diff = $count%strlen($flame);
        if($diff == 0){
        $diff=strlen($flame)-1;
        }    else {
        $diff--;
        }
        $flame[$diff] = "@";
        list($f1,$f2)= preg_split("/@/",$flame);
        $flame=$f2.$f1;
    }
    switch($flame){
        case 'f':
            
            echo "You are now Friends";
            break;
    case 'l':
            echo "You are now Lovers";
            break;
        case 'a':
            echo "You are now Ancestors";
            break;
      case 'm':
            echo "You are now Married";
            break;
        case 'e':
            echo "You are now Enemy";
            break;
      case 's':
            echo "You are now Sister";
            break;
    }
        }
    }
?>
