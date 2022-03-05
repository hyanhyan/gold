<?php


namespace App\Repositories;

use App\Repositories\Interfaces\RateHistoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RateHistoryRepository implements RateHistoryRepositoryInterface
{
    private $oneDay;

    public function __construct()
    {
        $this->oneDay = 24*60*60;
    }

    public function all()
    {
        return DB::table('rate_history')
            ->select( "buy,sell,created_at");
    }

    public function getByRateIdAndDayCount(int $rateID, string $dayCount, string $action="range", int $locGlob = 1)
    {

        if ($action=="range") {
            switch ($dayCount) {
                case '7':
                    $dayRange = \Carbon\Carbon::now()->subWeek();
                    break;
                case '30':
                    $dayRange = \Carbon\Carbon::now()->subMonth();
                    break;
                case '365':
                    $dayRange = \Carbon\Carbon::now()->subYear();
                    break;
                default:
                    $dayRange = \Carbon\Carbon::now()->subDay();
            }
            return DB::table('rate_histories')
                ->where('rate_id','=',$rateID)
                ->where('created_at','>',$dayRange)
                ->select( "buy","sell","created_at");
        } else {
            $dayStart = $dayCount." 00:00:00";
            $dayEnd = $dayCount." 23:59:59";
            $dayRange = "";

            if ($locGlob){
                return DB::table('rate_histories')
                    ->where('rate_id','=',$rateID)
                    ->whereDate('created_at','<=',$dayEnd)
                    ->whereDate('created_at','>=',$dayStart)
                    ->select( "buy","sell","created_at");
            }
        }


        return DB::table('rate_global_histories')
            ->where('rate_id','=',$rateID)
            ->where('created_at','>',$dayRange)
            ->select( "price", "created_at");
    }
}
