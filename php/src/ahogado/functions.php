<?php

function inicializar_progreso($longitud_palabra) {
    $progreso = array();
    for ($i = 0; $i < $longitud_palabra; $i++) {
        $progreso[$i] = '_';
    }
    return $progreso;
}

function imprimir_progreso($progreso) {
    $resultado = '';
    for ($i = 0; $i < count($progreso); $i++) {
        $resultado .= $progreso[$i] . ' ';
    }
    return $resultado;
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
