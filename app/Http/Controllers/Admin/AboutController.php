<?php

namespace App\Http\Controllers\Admin;

use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AboutController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $userID = auth()->user()->id;
        if(UserInfo::where('user_id','=',$userID)->first()==null) {
            $info =(object)array('phone'=>'',
                          'optional_phone' => '',
                          'address'=> '',
                          'market' => 0,
                          'optional_address'=> '',
                          'email'=> '',
                          'pictures'=> 'avatar1.png',
                          'description'=> '');

        } else {
            $info = $this->info;

            $info->messengers = json_decode($info['messengers'], true);
        }
//dd($info);
//
        return view('admin.profiles.index',compact('info'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $roles = Role::pluck('name','name')->all();
//
//        $breadcrumb = [
//            [
//                'name' => 'Users Management',
//                'url' => route('users.index')
//            ],
//            [
//                'name' => 'Create'
//            ]
//        ];
//
//        return view('admin.users.create',compact('roles', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required|same:confirm-password',
//            'roles' => 'required'
//        ]);
//
//        $input = $request->all();
//        $input['password'] = Hash::make($input['password']);
//
//        $user = User::create($input);
//        $user->assignRole($request->input('roles'));
//
//        return redirect()->route('users.index')
//            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $user = User::find($id);
//
//        $breadcrumb = [
//            [
//                'name' => 'Users Management',
//                'url' => route('users.index')
//            ],
//            [
//                'name' => 'Show'
//            ]
//        ];
//
//        return view('admin.users.show',compact('user', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $user = User::find($id);
//        $roles = Role::pluck('name','id')->all();
//        $userRole = $user->roles->pluck('id','name')->all();
//
//        //dd($roles,$userRole);
//
//        $breadcrumb = [
//            [
//                'name' => 'Users Management',
//                'url' => route('users.index')
//            ],
//            [
//                'name' => 'Edit'
//            ]
//        ];
//
//        return view('admin.users.edit',compact('user','roles','userRole', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param UserInfo $info
     * @param int $id
     * @return void
     */
    public function update(Request $request,int $id)
    {

        $profile_path = public_path('/uploads/profiles/');

        $request->request->remove('_method');
        $request->request->remove('_token');
        $req_all =  $request->all();
        $userID = auth()->user()->id;
        $req_all['user_id'] = $userID;

        $mess_soc = array();
        if (isset($req_all['messengers']['viber'])){
            $mess_soc[] = $req_all['messengers']['viber'];
        }
        if (isset($req_all['messengers']['whatsapp'])){
            $mess_soc[] = $req_all['messengers']['whatsapp'];
        }
        if (isset($req_all['messengers']['telegram'])){
            $mess_soc[] = $req_all['messengers']['telegram'];
        }
        $req_all['messengers'] = json_encode($mess_soc);
//        dd($req_all);
        if ($files=$request->file('pictures')) {
            $name=$files->getClientOriginalName();
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $pictureName = $userID. '.' . $ext;
            $files->move($profile_path, $userID. '.' . $ext );
            $req_all['pictures']=$pictureName;
        }else{
            $req_all['pictures']= 'avatar1.png';
        }



        if(UserInfo::where('user_id','=',$userID)->first()==null) {
            DB::table('user_infos')->insert($req_all);
        } else {
            UserInfo::where('user_id','=',$userID)->update($req_all);
        }

        $info = UserInfo::where('user_id', '=', $userID)->first();
        $info->messengers = json_decode($info['messengers'], true);

        return view('admin.profiles.index',compact('info'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        User::find($id)->delete();
//        return redirect()->route('users.index')
//            ->with('success','User deleted successfully');
    }
    public function about()
    {
        $info=$this->info;
        $breadcrumb = [
            [
                'name' => 'About Us',
            ],
        ];
        return view('admin.about.about',compact('breadcrumb', 'info'));
    }

}
