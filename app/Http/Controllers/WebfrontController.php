<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

class WebfrontController extends Controller{

    private $content  = 'webfront.';
    //private $route    = 'master.boards.';
    public function showRegister(){

      return view($this->content.'register');
    }

    public function doRegister(){

      //return view($this->content.'register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
}
