<?php

function conta_tempo($ultimo_login)
{
    global $xoopsUser, $xoopsConfig;

    $login = $ultimo_login;

    $agora = time();

    $segundos = $agora - $login;

    $hora = 0;

    $minutos = 0;

    $controle = 0;

    for ($i = 0; $i < $segundos; $i++) {
        $controle++;

        if (60 == $controle) {
            $minutos++;

            $controle = 0;
        }

        if (60 == $minutos) {
            $hora++;

            $minutos = 0;
        }
    }

    if ($hora > 1) {
        $resul = (1 == $hora) ? $hora . 'hr-' : $hora . 'hr-';
    }

    $resul .= (0 == $minutos || 1 == $minutos) ? $minutos . 'min-' : $minutos . 'min-';

    $resul .= (0 == $controle || 1 == $controle) ? $controle . 'seg' : $controle . 'seg';

    return $resul;
}
