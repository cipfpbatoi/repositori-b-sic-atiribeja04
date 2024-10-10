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
    echo "<table style='margin: 0 auto;'>";
    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            $clase = "buid"; 
            if ($graella[$i][$j] == 1) {
                $clase = "player1"; 
            } elseif ($graella[$i][$j] == 2) {
                $clase = "player2"; 
            }
            echo "<td class='$clase' style='width: 50px; height: 50px;'></td>";
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

function comprobarVictoria($graella, $jugador) {
    // horizontal
    for ($i = 0; $i < 6; $i++) {
        for ($j = 0; $j < 4; $j++) { 
            if ($graella[$i][$j] == $jugador &&
                $graella[$i][$j + 1] == $jugador &&
                $graella[$i][$j + 2] == $jugador &&
                $graella[$i][$j + 3] == $jugador) {
                return true;
            }
        }
    }

    //  vertical
    for ($i = 0; $i < 3; $i++) { 
        for ($j = 0; $j < 7; $j++) {
            if ($graella[$i][$j] == $jugador &&
                $graella[$i + 1][$j] == $jugador &&
                $graella[$i + 2][$j] == $jugador &&
                $graella[$i + 3][$j] == $jugador) {
                return true;
            }
        }
    }

    // diagonal ascendente
    for ($i = 3; $i < 6; $i++) { 
        for ($j = 0; $j < 4; $j++) {
            if ($graella[$i][$j] == $jugador &&
                $graella[$i - 1][$j + 1] == $jugador &&
                $graella[$i - 2][$j + 2] == $jugador &&
                $graella[$i - 3][$j + 3] == $jugador) {
                return true;
            }
        }
    }

    // diagonal
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ($graella[$i][$j] == $jugador &&
                $graella[$i + 1][$j + 1] == $jugador &&
                $graella[$i + 2][$j + 2] == $jugador &&
                $graella[$i + 3][$j + 3] == $jugador) {
                return true;
            }
        }
    }

    return false; 
}
