<?php
require_once 'BaseAuthController.php';

class PlanController extends BaseAuthController
{
    public function index()
    {
        $this -> loginFilter();

        if(!isset($_POST['montante']) && !isset($_POST['numero']))
        {
            $this -> renderView('plan/index.php');
        }
        else
        {
            $this->show();
        }
    }

    public function show()
    {
        require_once 'models/PlanCalculator.php';
        $planCalculator = new PlanCalculator();

        $prest = $planCalculator->calculaPlano($_POST['montante'], $_POST['numero'], date("d-m-Y"));

        $this->renderView('plan/show.php', ['prest' => $prest]);
    }
}
