<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SSOController extends Controller {

    public static function index(Request $request) {

        $is_logged = false;

        if($request->session()->has('_user')) {
            $is_logged = true;
        }

        return view('index', [
            "is_logged" => $is_logged,
            "_callback" => $request->get('_callback') ?? ''
        ]);

    }

    public static function login(Request $request) {

        if($request->get('_user') == 'admin' && $request->get('_pass') == '123') {
            self::create($request);
            return redirect()->route('index')->with('status_success', 'Logged In');
        } else {
            return redirect()->route('index')->with('status_error', 'Incorrect credentials');
        }

    }

    public static function logout(Request $request) {

        if($request->session()->has('_user')) {
            self::delete($request);
        }

        return redirect()->route('index');

    }

    public static function create(Request $request) {

        $request->session()->put('_user', $request->request->get('_user'));
        $request->session()->put('_key', hash('sha256', $request->request->get('_user')));
        $request->session()->save();

    }

    public static function read(Request $request) {

        $error = false;
        $_user = $request->session()->get('_user') ?? null;
        $_key = $request->session()->get('_key') ?? null;

        if(is_null($_user) || is_null($_key))
            $error = true;

        if($request->has('_callback')) {
            print "<form action='".$request->get('_callback')."' method='post'>";
            if(!$error) {
                print "<input type='hidden' name='auth' value='true'>";
            } else {
                print "<input type='hidden' name='auth' value='false'>";
            }
            print "<input type='submit' id='redirectMe' value='Validate'>";
            print "<script>
                    setTimeout(function() {
                        callback();
                    }, 500);
                    function callback() {
                        document.getElementById('redirectMe').click();
                    }
                   </script>";
            print "</form>";
        }


    }

    public static function update(Request $request) { }

    public static function delete(Request $request) {

        $request->session()->forget('_user');
        $request->session()->forget('_key');
        $request->session()->flush();

    }
}
