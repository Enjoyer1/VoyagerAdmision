<?php

namespace App\Widgets;

use App\Pasantia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;

class prueba extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //fechas
        $now = Carbon::now()->setTimezone('America/Santiago');
        $startYear = $now->copy()->startOfYear();
        $halfYear = $now->copy()->endOfYear() ->subMonth(5)->addDay(1);
        $endYear = $now->copy()->endOfYear();


        //primer semestre o segundo semestre
        if ($now <= $halfYear) {
            $pasantias = Pasantia::where([
                ['fecha', '>=', $startYear],
                ["fecha", "<=", $halfYear],
            ])->count();

            $pasantiasPendientes =
                Pasantia::where([
                    ['estado', 'Pendiente'],
                    ["fecha", ">=", $startYear],
                    ["fecha", "<=", $halfYear],
                ])->count();

            $pasantiasCanceladas =
                Pasantia::where([
                    ['estado', 'Cancelada'],
                    ["fecha", ">=", $startYear],
                    ["fecha", "<=", $halfYear],
                ])->count();

            $pasantiasRealizadas =
                Pasantia::where([
                    ['estado', 'Realizada'],
                    ["fecha", ">=", $startYear],
                    ["fecha", "<=", $halfYear],
                ])->count();

            $title = "Usted posee registradas un total de <b> {$pasantias}</b> Pasantías entre <b>{$startYear->format('d-m-Y')} - {$halfYear->format('d-m-Y')}</b>";

        } else {

            $pasantias = Pasantia::where([
                ['fecha', '>', $halfYear],
                ["fecha", "<=", $endYear],
            ])->count();

            $pasantiasPendientes =
                Pasantia::where([
                    ['estado', 'Pendiente'],
                    ["fecha", ">", $halfYear],
                    ["fecha", "<=", $endYear],
                ])->count();

            $pasantiasCanceladas =
                Pasantia::where([
                    ['estado', 'Cancelada'],
                    ["fecha", ">", $halfYear],
                    ["fecha", "<=", $endYear],
                ])->count();

            $pasantiasRealizadas =
                Pasantia::where([
                    ['estado', 'Realizada'],
                    ["fecha", ">", $halfYear],
                    ["fecha", "<=", $endYear],
                ])->count();
            $title = "Usted posee registradas un total de <b> {$pasantias}</b> Pasantías entre <b>{$halfYear->format('d-m-Y')} - {$endYear->format('d-m-Y')}</b>";

        }


        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => "3 Carreras más populares<br><br>",
            'text' => "1- Ing. Comercial <br>
                       2- Medicina<br> 3- Derecho<br>",

            'button' => [
                'text' => "Ver todas las carreras",
                'link' => route("voyager.pasantias.index"),
            ],
            'image' => asset('images/widget-backgrounds/framesSvg.svg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Pasantia::class));
    }
}