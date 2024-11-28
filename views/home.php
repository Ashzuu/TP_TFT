<?php
  $this->layout('template', ['title' => 'TP TFT']); 
?>
<h1>TFT - Set <?= $this->e($tftSetName) ?></h1>
<p>Personnages :</p>
<?php 
  foreach($this->e($allUnits) as $unit){
    echo "<p>".var_dump($unit)."</p>";
  }
