<?php

function inicializar_progreso($longitud_palabra) {
    return array_fill(0, $longitud_palabra, '_');
}

function imprimir_progreso($progreso) {
    return implode(' ', $progreso);
}

function verificar_letra($palabra, $letra, &$progreso) {
    $letra_correcta = false;
    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] == $letra) {
            $progreso[$i] = $letra;
            $letra_correcta = true;
        }
    }
    return $letra_correcta;
}
