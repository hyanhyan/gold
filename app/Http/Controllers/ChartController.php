<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\RateHistoryRepositoryInterface;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    private $rateHistoryRepo;

    public function __construct(RateHistoryRepositoryInterface $rateHistoryRepo)
    {
        parent::__construct();
        $this->rateHistoryRepo = $rateHistoryRepo;
    }

    public function index()
    {
        $services = $this->services;
        return view('cominghome', compact('services'));
    }

    public function ajaxRequest(Request $request)
    {
        $pars = $request->all();

        $rateHistoryList = $this->rateHistoryRepo->getByRateIdAndDayCount($pars['rate_id'], $pars['day_count'],$pars['action'])->get();
        $rateGlobalHistoryList = $this->rateHistoryRepo->getByRateIdAndDayCount($pars['rate_id'], $pars['day_count'],$pars['action'], 0)->get();
        return response()->json(['success' => ['local_list' => $rateHistoryList, 'global_list' => $rateGlobalHistoryList ]]);
    }
}

