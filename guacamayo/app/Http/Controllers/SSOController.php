<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SSOController extends Controller {

    private $users = [];

    public function __construct() {
        $this->users = [
            "admin" => "123",
            "rogovsky" => "123"
        ];
    }

    public static function index(Request $request) {
        $is_logged = false;

        if($request->has('_auth'))
            $is_logged = true;

        return view('index', [
            "is_logged" => $is_logged,
            "_callback" => $request->get('_callback') ?? ''
        ]);
    }

    public static function login(Request $request) {
        if($request->get('_email') == 'admin' && $request->get('_password') == '123') {
            self::create($request);
        }
    }

    public static function logout(Request $request) {
        if($request->has('_auth')) {
            self::delete($request);
        }
    }

    public static function create(Request $request) {
        $request->session()->put('_user', $request->request->get('_user'));
        $request->session()->put('_key', hash('sha256', $request->request->get('_key')));
    }

    public static function read(Request $request) : bool {

        $_user = $request->session()->get('_user') ?? null;
        $_key = $request->session()->get('_key') ?? null;

        if(is_null($_user) || is_null($_key))
            return false;
        return true;
    }

    public static function update(Request $request) { }

    public static function delete(Request $request) {

        $request->session()->forget('_user');
        $request->session()->forget('_key');
        $request->session()->flush();

    }
}
