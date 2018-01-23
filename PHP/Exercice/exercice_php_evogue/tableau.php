<?php
$tab = array(
    "tableau" => array(
        0 => "julien",
        1 => "nicolas",
        2 => "mathieu",
        3 => "christelle",
        4 => "nina",
        5 => "johanna"
    )
);

echo '<pre>';
print_r($tab);
echo '</pre>';

 $f = fopen('liste.txt', 'a');

 $choco = $tab['tableau'][2];
 echo $choco;

 fwrite($f, $choco . "\r\n");

 ?>
