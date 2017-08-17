<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo $is_login;
?>


<div class="container-fluid">
    
    
<h3>Your file was successfully uploaded!</h3>

<!--<ul>
<?php/* foreach ($upload_data as $item => $value):*/?>
<li><?php /*echo $item;?>: <?php echo $value;?></li>
<?php endforeach;*/ ?>
</ul>-->
<?php echo $nombre;
 print_r($header);
 var_dump($header);
 print_r($values);
  var_dump($values);

  foreach ($values as $item){
      foreach ($item as $key => $value) {
           echo "esta es la clve:".$key;
            echo "este es el valor".$value;
            echo "<br></br>";
      }

    
} 
  
 
echo count($values)?>

</div>