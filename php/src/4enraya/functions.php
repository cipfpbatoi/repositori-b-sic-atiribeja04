<?php

function inicializarGraella() {
    $graella = array();
    for ($i = 0; $i < 6; $i++) {
        for ($j = 0; $j < 7; $j++) {
            $graella[$i][$j] = 0;
        }
    }
    return $graella;
}

function pintarGraella($graella) {
    echo "<table>";
    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            $clase = "buid";
            if ($graella[$i][$j] == 1) {
                $clase = "player1";
            } elseif ($graella[$i][$j] == 2) {
                $clase = "player2";
            }
            echo "<td class='$clase'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function mover(&$graella, $columna, $jugadorActual) {
    for ($i = 5; $i >= 0; $i--) {
        if ($graella[$i][$columna] == 0) {
            $graella[$i][$columna] = $jugadorActual;
            break;
        }
    }
}
