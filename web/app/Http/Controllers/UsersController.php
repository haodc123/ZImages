<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    private $user;
    private $customer;

    public function update_user(Request $request) {
        if ($request->user_action == "delete") {
        
            $this->do_delete_user($request);
            
            // Prepare success info to view
            $type = 'deleteuser';
        }
        
        return redirect()->route('next', ['type' => $type]);
        
    }

    public function do_delete_user($request) {
        $input = $request->all();
        $user = new User();
        $user->id = $input['f_id'];
        $user->delete_user();
    }

    public function ctr_list_users() {
        $user = new User();
        $list_users = $user->getAllUsersPagination();

        return view('control.users', [
            'users' => $list_users
        ]);
    }
}
