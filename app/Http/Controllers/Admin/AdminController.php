<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductType;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ChangePassword;
use phpDocumentor\Reflection\Types\Parent_;

class AdminController extends MainController
{
    /**
     * Show the application dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $user = $this->user;
        $info = $this->info;
        return view('admin.dashboard', compact('user', 'info'));
    }

    /**
     * Change password page.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $info = $this->info;
        $model = $this->changePasswordModel();
        $model->user = Auth::user();

        if ($request->isMethod('post'))  {
            $validator = $model->validation($request);
            if ($model->change($validator, $request)) {
                //redirect('/admin/change-password');
            }
        }

        $breadcrumb = [
            [
                'name' => 'Change Password',
            ],
        ];

        return view('admin.settings.change-password', compact('breadcrumb', 'info'));
    }

    public function changePasswordModel()
    {
        return new ChangePassword();
    }
    public function privacy() {
        $info=$this->info;
        $breadcrumb = [
            [
                'name' => 'About Us',
            ],
        ];
        return view('admin.privacy.privacy',compact('breadcrumb', 'info'));

    }
    public function collection() {
        $info=$this->info;
        $collections = ProductType::all();
        $breadcrumb = [
            [
                'name' => 'Collection',
            ],
        ];
        return view('admin.collection.collection',compact('breadcrumb','collections', 'info'));

    }

}
