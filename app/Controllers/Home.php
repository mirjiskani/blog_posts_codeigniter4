<?php

namespace App\Controllers;

class Home extends BaseController {

    // load home page

    public function index() {
        return view( 'welcome_message' );
    }

}
