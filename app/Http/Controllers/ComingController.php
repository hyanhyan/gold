<?php

    namespace App\Http\Controllers;
    use App\Rate;
    use Illuminate\Http\Request;

    class ComingController extends Controller
    {

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            $data_gold = Rate::orderBy('id', 'DESC')->where('metal_id',1)->paginate(20);

            $data_silver = Rate::orderBy('id', 'DESC')->where('metal_id',2)->paginate(20);

            $data_platinum = Rate::orderBy('id', 'DESC')->where('metal_id',3)->paginate(20);

            $data_palladium = Rate::orderBy('id', 'DESC')->where('metal_id',4)->paginate(20);

            return view('coming', compact('data_gold','data_silver','data_platinum','data_palladium'));
        }
    }
