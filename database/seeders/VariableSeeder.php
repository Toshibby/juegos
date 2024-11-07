<?php

namespace Database\Seeders;

use App\Models\Variable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variable=new Variable();
        $variable->var_ind="20";
        $variable->var_dep="30";
        $variable->save();

        $variable = new Variable();
        $variable->var_ind = "40";
        $variable->var_dep = "60";
        $variable->save();

        // Para R3
        $variable = new Variable();
        $variable->var_ind = "20";
        $variable->var_dep = "40";
        $variable->save();

        // Para R4
        $variable = new Variable();
        $variable->var_ind = "30";
        $variable->var_dep = "60";
        $variable->save();

        // Para R5
        $variable = new Variable();
        $variable->var_ind = "10";
        $variable->var_dep = "30";
        $variable->save();

        // Para R6
        $variable = new Variable();
        $variable->var_ind = "10";
        $variable->var_dep = "40";
        $variable->save();

        // Para R7
        $variable = new Variable();
        $variable->var_ind = "20";
        $variable->var_dep = "40";
        $variable->save();

        // Para R8
        $variable = new Variable();
        $variable->var_ind = "20";
        $variable->var_dep = "50";
        $variable->save();

        // Para R9
        $variable = new Variable();
        $variable->var_ind = "20";
        $variable->var_dep = "30";
        $variable->save();

        // Para R10
        $variable = new Variable();
        $variable->var_ind = "30";
        $variable->var_dep = "70";
        $variable->save();
    }
}
