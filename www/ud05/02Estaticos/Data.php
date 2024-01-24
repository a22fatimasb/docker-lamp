<?php
class Data
{
    private static $calendario = "Calendario gregoriano";
    private static $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    private static $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];


    public static function getData()
    {
        $ano = date('Y'); //Nos da el año actual 
        $mes = date('m');
        $dia = date('d');
        $diaNombre = self::$dias[date('w')];
        $mesNombre = self::$meses[$mes - 1];
        //Hoy es Lunes 7 de Febrero del 2022
        return "Hoy es $diaNombre $mes de $mesNombre del $ano ";
    }

    // Función que devuelve el valor de $calendario
    public static function getCalendar()
    {
        return self::$calendario;
    }

    // Función que devuelve la hora en el siguiente formato HH:MM:SS.
    public static function getHora()
    {
        return date('H:i:s');
    }

    //Función que llamará a los métodos getData() y getHora() para mostrar tanto la fecha como la hora.
    public static function getDataHora()
    {
        echo self::getData() . " y son las " . self::getHora();
    }
}
