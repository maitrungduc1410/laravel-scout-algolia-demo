<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{

	public function getUsers(Request $request) {
		if(empty($request->search)) {
			$users = User::paginate(10);
		}
		else {
			$users = User::search($request->search)->paginate(10);;
		}
        return $users;
    }

    public function searchUser(Request $request) {
        return User::search($request->search)->paginate(10);;
    }
}
