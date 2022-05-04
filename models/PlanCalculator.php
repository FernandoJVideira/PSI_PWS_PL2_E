<?php

class PlanCalculator
{
    public $date;
    public $InicialCredit;
    public $numPrest;

    function calculaPlano($InicialCredit, $numPrest, $date)
    {

        $prestArray = array();
        $prest = round($InicialCredit/$numPrest, 2);
        $divida = $InicialCredit;  

        for($i = 1; $i <= $numPrest; $i++)
        {
            $datePrest = date('d-m-Y', strtotime("+".$i ." month", strtotime($date)));
            $divida -= $prest;
            round($divida, 2);

            if($i == $numPrest && $divida != 0)
            {
                $prest = $InicialCredit - ($prest * ($i -1));
                $divida = 0;
            }

            $prestArray[$i] = array(

                'data' => $datePrest,
                'valor' => $prest,
                'divida' => $divida
            );
        }  

        return $prestArray;
    }
}
