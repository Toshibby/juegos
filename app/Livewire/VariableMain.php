<?php

namespace App\Livewire;

use App\Livewire\Forms\VariableForm;
use App\Models\Variable;
use Illuminate\Container\Attributes\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class VariableMain extends Component
{
    public VariableForm $form;
    public $isOpen=false;
    public $search;
    public $inputX;
    public $predictedY;

    #esto de abajo se peude borrar

    public function render()
    {
        $variables=Variable::paginate();
        return view('livewire.variable-main', compact("variables"));
    }
    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->resetValidation();
    }
    public function store(){
        $this->validate();
        if($this->form->id==null){
            Variable::create($this->form->all());
        }else{
            $variable=Variable::find($this->form->id);
            $variable->update($this->form->all());
        }

        $this->isOpen=false;
        $this->dispatch('sweetalert', message:'se pudo xd');
    }
        public function edit(Variable $variable){
            $this->isOpen=true;
            $this->form->fill($variable);
        }

    #[On("delItem")]
    public function destroy(Variable $variable){
        $variable->delete();
    }
    public function totalVarInd(){
        return Variable::sum('var_ind');
    }
    public function totalVarDep()
    {
        return Variable::sum('var_dep');
    }

    public function totalVarIndSquared()
    {
        return Variable::sum('var_ind_squared');
    }

    public function totalVarDepSquared()
    {
        return Variable::sum('var_dep_squared');
    }

    public function totalVarIndDepProduct()
    {
        return Variable::sum('var_ind_dep_product');
    }
    public function correlationCoefficient()
    {
        $n = Variable::count();
        $sumX = Variable::sum('var_ind');
        $sumY = Variable::sum('var_dep');
        $sumX2 = Variable::sum('var_ind_squared');
        $sumY2 = Variable::sum('var_dep_squared');
        $sumXY = Variable::sum('var_ind_dep_product');

        $numerator = ($n * $sumXY) - ($sumX * $sumY);
        $denominator = sqrt(($n * $sumX2 - $sumX ** 2) * ($n * $sumY2 - $sumY ** 2));

        $correlation = $denominator == 0 ? 0 : $numerator / $denominator;

        return number_format($correlation, 3);
    }

    public function correlationAssociationType()
    {
        $correlation = $this->correlationCoefficient();

        if ($correlation < 0) {
            return "Asociación negativa";
        } elseif ($correlation >= 0 && $correlation < 0.20) {
            return "Asociación muy débil";
        } elseif ($correlation >= 0.20 && $correlation < 0.40) {
            return "Asociación débil";
        } elseif ($correlation >= 0.40 && $correlation < 0.60) {
            return "Asociación moderada";
        } elseif ($correlation >= 0.60 && $correlation < 0.80) {
            return "Asociación fuerte";
        } else {
            return "Asociación muy fuerte";
        }
    }

    public function regressionAnalysis()
    {
        $n = Variable::count();
        $sumX = Variable::sum('var_ind');
        $sumY = Variable::sum('var_dep');
        $sumXY = Variable::sum('var_ind_dep_product');
        $sumX2 = Variable::sum('var_ind_squared');

        $b_numerator = ($n * $sumXY) - ($sumX * $sumY);
        $b_denominator = ($n * $sumX2) - ($sumX ** 2);
        $b = $b_denominator != 0 ? $b_numerator / $b_denominator : 0;

        $a = ($sumY - ($b * $sumX)) / $n;

        return [
            'a' => number_format($a, 3),
            'b' => number_format($b, 3),
        ];
    }
    public function predictY()
    {
        $regressionCoefficients = $this->regressionAnalysis();
        $a = $regressionCoefficients['a'];
        $b = $regressionCoefficients['b'];

        $this->predictedY = $a + ($b * $this->inputX);
        $this->predictedY = number_format($this->predictedY, 2);
    }

}
