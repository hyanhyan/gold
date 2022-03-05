<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\User;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends MainController
{
    public function __construct()
    {
        parent::__construct();
    }
        public function index(Request $request) {
        $info=$this->info;
        $admin=User::where('role_id',1)->first();
            return view('admin.messages.index',compact('info','admin'));
        }
        public function send(Request $request)
        {
            $message = new Message();
            $message->user_id = $request->user()->id;
            $message->to_id = $request->to_id;
            $message->message = $request->message;
            $message->product_id = null;
            $prod_path = public_path('/uploads/products');
            if ($request->file('images')) {
                foreach ($request->file('images') as $imagefile) {
                    $name = $imagefile->getClientOriginalName();
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                    //sleep(1);
                    $img_name = md5('1' . strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']) . '2');
                    $imagefile->move($prod_path, $img_name . '.' . $ext);
                    $message->image = $img_name . '.' . $ext;
                }
            }
            $message->save();
            return redirect()->back();
        }
}
