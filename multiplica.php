<?php

$nen = readline("Hola, soc Siri, com et dius?\n");
$minuts = readline("Quants minuts vols jugar?\n");

$array_taules = [2, 3, 4, 5];
//$array_taules = [8];
$correctes = 0;
$fails = 0;
$temps_total = 0;
$respostes = array();
$array_fails=array();

while (1) {
    $taula = $array_taules[array_rand($array_taules)];
    $segon = rand(2, 9);

    while (in_array($taula . '-' . $segon, $respostes) || in_array($segon . '-' . $taula, $respostes)) {
        $taula = $array_taules[array_rand($array_taules)];
        $segon = rand(2, 9);
    }
    $repostes[] = $taula . '-' . $segon;
    $repostes[] = $segon . '-' . $taula;

    $inici = time();
    $input = readline("$nen, $taula * " . $segon . " =\n");
    while (!is_numeric($input)) {
        echo "Aixo no es un numero!!!\n";
        $input = readline("$nen, $taula * " . $segon . " =\n");
    }
    system('clear');
    $final = time();
    $temps = $final - $inici;

    if ($input == $taula * $segon) {
        echo "Molt be $nen, la resposta correcta era $input has trigat $temps segons \n";
        $correctes++;
    } else {
        echo "Molt malament $nen, tothom sap que $taula*$segon=" . ($taula * $segon) . " has trigat $temps segons \n";
        $fails++;
        $array_fails[]="$taula x $segon";
        beep();
    }
    $temps_total = $temps_total + $temps;
    echo "$nen portes $correctes respostes correctes i $fails respostes equivocades! en $temps_total segons\n";
    if ($temps_total >= (60 * $minuts)) {
        echo "Molt be $nen la teva puntuacio final es de " . round(($correctes - $fails) / $minuts,1) . "!!!\n";
        beep();
        beep();
        beep();
        beep();
        if ($array_fails)
        {
          echo "Els errors que has comes son:\n";
          print_r($array_fails);
        }
        die("Hem acabat\n");
    }
}

function beep() {
    echo "\x07";
}
