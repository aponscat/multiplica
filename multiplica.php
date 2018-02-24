<?php

$nen = readline("Hola, soc Siri, com et dius?\n");
$minuts = readline("Quants minuts vols jugar?\n");

$array_taules = [2, 3, 5];
//$nen='Genis';
$correctes = 0;
$fails = 0;
$temps_total = 0;
$respostes = array();

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
    $final = time();
    $temps = $final - $inici;

    if ($input == $taula * $segon) {
        echo "Molt be $nen, la resposta correcta era $input has trigat $temps segons \n";
        $correctes++;
    } else {
        echo "Molt malament $nen, tothom sap que $taula*$segon=" . ($taula * $segon) . " has trigat $temps segons \n";
        $fails++;
        beep();
    }
    $temps_total = $temps_total + $temps;
    echo "$nen portes $correctes respostes correctes i $fails respostes equivocades! en $temps_total segons\n";
    if ($temps_total >= (60 * $minuts)) {
        echo "Molt be $nen la teva puntuacio final es de " . ($correctes - $fails) / $minuts . "!!!\n";
        beep();
        beep();
        beep();
        beep();
        die("Hem acabat\n");
    }
}

function beep() {
    echo "\x07";
}
