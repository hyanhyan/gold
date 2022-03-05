<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $all = $request->all();
        list($where, $query) = $this->filterServicesFront($all);


        $role_permission = 1;
        if (Auth::check()){
            $role_id = auth()->user()->role_id;
            if ($role_id !== 4){
                $role_permission = 0;
            }
        }

        $sql = "select `user_infos`.`user_id`, `user_infos`.`title`, `user_infos`.`pictures`, `user_infos`.`market`, `user_infos`.`address`".
            " from `service_user_table`".
            " inner join `user_infos` on `user_infos`.`id` = `service_user_table`.`user_id`".
            " inner join `services` on `services`.`id` = `service_user_table`.`service_id`".
            " where $where `services`.`for_all`='$role_permission' group by `user_infos`.`id`";

        $users = DB::select($sql);

        $services = $this->services;

        $fill = Service::where('for_all', '=', 1)->pluck('name', 'id')->all();
        if (Auth::check()){
            $role_id = auth()->user()->role_id;
            if ($role_id !== 4){
                $fill = $services;
            }
        }

        return view('services.index', compact('services', 'fill', 'users'));
    }


    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function show(Request $request,string $id)
    {
        $all = $request->all();
        list($where, $query) = $this->filterServicesFront($all);
        $role_permission = 1;
        if (Auth::check()){
            $role_id = auth()->user()->role_id;
            if ($role_id !== 4){
                $role_permission = 0;
            }
        }
        $user = UserInfo::where('user_id',$id)->get()->first();
        $sql = "select `user_infos`.`user_id`, `user_infos`.`title`, `user_infos`.`pictures`, `user_infos`.`market`, `user_infos`.`address`".
            " from `service_user_table`".
            " inner join `user_infos` on `user_infos`.`id` = `service_user_table`.`user_id`".
            " inner join `services` on `services`.`id` = `service_user_table`.`service_id`".
            " where $where `services`.`for_all`='$role_permission' group by `user_infos`.`id`";

        $users = DB::select($sql);

        $services = User::find($id)->services()->get()->pluck('name');
        $user['messengers'] = json_decode($user['messengers'], true);

        return view('services.item', compact('user', 'services','users'));
    }


}
