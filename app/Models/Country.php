<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Employee
 *
 * @author Champ
 */
use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $table = 'country';
    
    public function getCountryAll(){
        try {
         $countryList = Country::all();
         return $countryList;
        } catch (Exception $ex) {
               throw $ex;
        }
    }
   
}