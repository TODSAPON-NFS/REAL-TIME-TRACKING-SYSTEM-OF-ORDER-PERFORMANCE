<?php

use Illuminate\Database\Seeder;
use App\ordertocut;
use App\ordertocut_cad;
use App\ordertocut_marchant;
use App\ordertocut_mu;
use App\ordertocut_store;

class ordertocutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $OTC= new ordertocut;

        $OTC->Buyer = 'tina';
        $OTC->OrderNo = 12;
        $OTC->Color = 10;
        $OTC->Item = 12;
        $OTC->save();

        $Temp= new ordertocut_cad;
        $Temp->id=$OTC->id;
        $Temp->save();

        $Temp= new ordertocut_mu;
        $Temp->id=$OTC->id;
        $Temp->save();

        $Temp= new ordertocut_store;
        $Temp->id=$OTC->id;
        $Temp->save();

        $Temp= new ordertocut_marchant;
        $Temp->id= $OTC->id;
        $Temp->save();

    }
}
