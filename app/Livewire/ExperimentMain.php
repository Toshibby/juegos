<?php

namespace App\Livewire;

use App\Models\Experiment;
use Livewire\Component;

class ExperimentMain extends Component
{
    public $n, $p, $k;
    public $probability;
    public $experiments;

    public function render()
    {
        return view('livewire.experiment-main');
    }
    public function calculateBinomial()
    {
        $this->validate([
            'n' => 'required|integer|min:1',
            'p' => 'required|numeric|min:0|max:1',
            'k' => 'required|integer|min:0|max:' . $this->n,
        ]);

        $this->probability = $this->binomialProbability($this->n, $this->k, $this->p);

    }

    private function binomialProbability($n, $k, $p)
    {
        $combination = $this->binomialCoefficient($n, $k);
        $q = 1 - $p;
        return $combination * pow($p, $k) * pow($q, $n - $k);
    }

    //  formnula C(n, k) = n! / (k! . (n-k)!)
    private function binomialCoefficient($n, $k)
    {
        return $this->factorial($n) / ($this->factorial($k) * $this->factorial($n - $k));
    }

    private function factorial($num)
    {
        if ($num == 0) return 1;
        $factorial = 1;
        for ($i = 1; $i <= $num; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }


}
