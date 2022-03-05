<?php

namespace App\Http\Controllers;


class SponsorsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $services = $this->services;
        return view('sponsors.index', compact('services'));
    }

}
