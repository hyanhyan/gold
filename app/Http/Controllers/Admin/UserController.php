<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends MainController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info = $this->info;
        $data = User::orderBy('id','DESC')->paginate(5);
        $roles = Role::pluck('name','id')->all();
        //dd($data);
        $breadcrumb = [
            [
                'name' => 'Users Management',
            ]
        ];

        return view('admin.users.index',compact('data', 'roles', 'breadcrumb','info'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = $this->info;
        $roles = Role::pluck('name','name')->all();

        $breadcrumb = [
            [
                'name' => 'Users Management',
                'url' => route('users.index')
            ],
            [
                'name' => 'Create'
            ]
        ];


        return view('admin.users.create',compact('roles', 'breadcrumb','info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = $this->info;
        $user = User::find($id);

        $breadcrumb = [
            [
                'name' => 'Users Management',
                'url' => route('users.index')
            ],
            [
                'name' => 'Show'
            ]
        ];

        return view('admin.users.show',compact('user', 'breadcrumb','info' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = $this->info;
        $user = User::find($id);
        $roles = Role::pluck('name','id')->all();
        $userRole = $user->roles->pluck('id','name')->all();

        //dd($roles,$userRole);

        $breadcrumb = [
            [
                'name' => 'Users Management',
                'url' => route('users.index')
            ],
            [
                'name' => 'Edit'
            ]
        ];
//dd($user->roles);
        return view('admin.users.edit',compact('user','roles','userRole', 'breadcrumb','info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $info = $this->info;

        if (!Auth::user()->hasRole('Admin'))
        {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $input['role_id'] = $input['roles'][0];

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
    public function view_offer() {
        $info=$this->info;
        $products=Product::with('offers')->where('user_id',Auth::id())->get();

//        foreach ($offers as $offer) {
//            $id=$offer->product_id;
//            $product=Product::where('id',$id)->first();
//            dd($product);
//        }
        return view('user.my_offers',compact('info'));
    }
    public function privacy() {
        $info=$this->info;
        $breadcrumb = [
            [
                'name' => 'About Us',
            ],
        ];
        return view('privacy.privacy',compact('breadcrumb', 'info'));

    }
}
