<?php


function alertAlumno($cantidad, $limite)
{
    if ($cantidad >= $limite) {
        $cantidadEstudiante = "<span class=\"label label-danger\">{{ $cantidad / $limite }}</span>";
    } elseif ($cantidad < $limite && $cantidad >= $limite - 5) {
        $cantidadEstudiante = "<span class=\"label label-warning\">{{ $cantidad / $limite }}</span>";
    } else {
        $cantidadEstudiante = "<span class=\"label label-default\">{{ $cantidad / $limite }}</span>";
    }
    return $cantidadEstudiante;
}