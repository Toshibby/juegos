<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class VariableForm extends Form
{
    #[Rule("required|min:2")]
    public $var_dep,$var_ind;

    public $id;
}
