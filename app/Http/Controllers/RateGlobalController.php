<?php

namespace App\Http\Controllers;

use App\Rate;
use App\RateGlobal;
use App\RateGlobalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

include('simple_html_dom.php');
class RateGlobalController extends Controller
{

    public function cash(Request $request ) {
        $rates = RateGlobal::query("SELECT * FROM  rate_globals")->get();
        $last_rates = RateGlobalHistory::query("SELECT * FROM  rate_global_historis")->get();

        $response['rates'] = json_encode($rates);
        $response['last_rates'] = json_encode($last_rates);

        $res_path = resource_path('json_files');
        $fp = fopen($res_path . '/global.json', 'w+');
        fwrite($fp, json_encode($response));
        fclose($fp);

    }


    public function local(Request $request ) {
        $dateStart = date("Y-m-d", strtotime('-1 days'))." 00:00:00";
        $dateEnd = date("Y-m-d", strtotime('-1 days'))." 23:59:59";
        $rates = Rate::query("SELECT id, metal_id, purity, sell, updated_at, created_at, buy FROM  rates")->get()->take(13);

        $last_rates = DB::table('rate_histories')->whereDate("created_at",'>=', $dateStart)->whereDate("created_at",'<=', $dateEnd)->orderBy('id', 'desc')->get()->take(13);//
        if (!count($last_rates)) {
            $last_rates=$rates;
        }

        $response['rates'] = json_encode($rates);
        $response['last_rates'] = json_encode($last_rates);
        //dd($rates);

        $res_path = resource_path('json_files');
        $fp = fopen($res_path . '/local.json', 'w+');
        fwrite($fp, json_encode($response));
        fclose($fp);

    }
    public function index(Request $request )
    {
        if (isset($request->username))
            return redirect('/');



        //get dolar course from rate.am
        /*$html = file_get_html('http://www.rate.am');
        $ret = $html->find('tr[class=btm]', 1)->childNodes(2)->nodes[0]->_[4];*/
        for ($i=0;$i<2;$i++){
            if ($i === 1 ) sleep(30);
            $rateGlobal = RateGlobal::all();
            $timestamp = strtotime($rateGlobal[0]['updated_at']);
            $day = date('d', $timestamp);
            $nowDay = date('d');

            $html = file_get_html('https://markets.businessinsider.com/commodities');
            $xau = $html->find('div[data-room=RY0306000000XAU]',0)->childNodes(0)->nodes[0]->_[4];
            $xau = str_replace(',', '', $xau);
            $xag = $html->find('div[data-room=RY0306000000XAG]',0)->childNodes(0)->nodes[0]->_[4];
            $xag = str_replace(',', '', $xag);
            $xpt = $html->find('div[data-room=RY0306000000XPT]',0)->childNodes(0)->nodes[0]->_[4];
            $xpt = str_replace(',', '', $xpt);
            $xpd = $html->find('div[data-room=RY0306000000XPD]',0)->childNodes(0)->nodes[0]->_[4];
            $xpd = str_replace(',', '', $xpd);


            $gold = new RateGlobal();
            $gold->findOrFail(1)->fill(['metal_id' => 1, 'price' => $xau])->save();
            $silver = new RateGlobal();
            $silver->findOrFail(13)->fill([ 'metal_id'=> 2 ,'price' => $xag])->save();
            $platinum = new RateGlobal();
            $platinum->findOrFail(14)->fill([ 'metal_id'=> 3 ,'price' => $xpt])->save();
            $palladium = new RateGlobal();
            $palladium->findOrFail(15)->fill([ 'metal_id'=> 4 ,'price' => $xpd])->save();



            if ($day != $nowDay) {
                $gold = new RateGlobalHistory();
                $gold->findOrFail(1)->fill(['rate_id' => 1, 'price' => $rateGlobal[0]['price']])->save();
                $silver = new RateGlobalHistory();
                $silver->findOrFail(2)->fill([ 'rate_id'=> 13 ,'price' => $rateGlobal[1]['price']])->save();
                $platinum = new RateGlobalHistory();
                $platinum->findOrFail(3)->fill([ 'rate_id'=> 14 ,'price' => $rateGlobal[2]['price']])->save();
                $palladium = new RateGlobalHistory();
                $palladium->findOrFail(4)->fill([ 'rate_id'=> 15 ,'price' => $rateGlobal[3]['price']])->save();

            }
            // sleep(20);
        }

        //sleep(1);



    }
}
