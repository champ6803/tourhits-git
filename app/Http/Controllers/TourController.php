<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of TourController
 *
 * @author chonl
 */
class TourController {

    public function tour_detail() {
        return view('tour.tour-detail');
    }

}
