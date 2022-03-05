<?php


namespace App\Repositories\Interfaces;

interface RateHistoryRepositoryInterface
{
    //get all rate history
    public function all();

    //get rate history by rate ID and dayCount
    public function getByRateIdAndDayCount(int $rateID, string $dayCount, string $action, int $locGlob);

}
