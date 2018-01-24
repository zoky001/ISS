<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth')->except(['guest', 'index']);
    }

    function guest() {


        return view('guest');
    }

    function logged() {


        return view('logged');
    }

    function admin() {

        return view('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function iss_home() {      //   \Illuminate\Support\Facades\Auth::login($user);
        return view('iss_home');
    }

    public function csrf() {      //   \Illuminate\Support\Facades\Auth::login($user);
        return view('csrf');
    }

    function CSRF_ranjiv(Request $request) {

        $user = $request->name;

        return view('csrf', compact('user'));
    }

    public function xss() {

        $text = "<script>
while(1){
alert('SIS je najbolji kolegij!!');
}
</script>";
        return view('xss', compact('xss_ranjiv', 'xss_siguran', 'text')); //   \Illuminate\Support\Facades\Auth::login($user);
        return view('xss');
    }

    public function xss_ranjiv(Request $request) {


        if (!empty($request->name)) {

            $xss_ranjiv = $request->name;
        } elseif (!empty($request->safe)) {
            $xss_siguran = $request->safe;
        }

        $text = "<script>
while(1){
alert('SIS je najbolji kolegij!!');
}
</script>";

        return view('xss', compact('xss_ranjiv', 'xss_siguran', 'text'));
    }

    public function SQLinjection() {

//   \Illuminate\Support\Facades\Auth::login($user);

        $someVariable = " ' OR '1'='1 ";
        $ranjivUpit = "\$user = DB::select(DB::raw(\"SELECT * FROM users WHERE name = '\$user'\"));";
        $siguranUpit = "\$user = DB::table('users') -> where('name', '=', \$user])->get();";
        return view('sql_injection', compact('someVariable', 'ranjivUpit', 'siguranUpit'));
    }

    function SQLinjection_ranjiv(Request $request) {

        $user = $request->name;

        $someVariable = " ' OR '1'='1 ";

        $user = DB::select(DB::raw("SELECT * FROM users WHERE name = '$user'"));


        /* if ($user != null) {

          echo "<br> IME KORISNIKA: " . $user[0]->name . "<br>";
          echo "E-mail KORISNIKA: " . $user[0]->email;
          } else {

          echo "NE postoji korisnik: ";
          } */

        $ranjivUpit = "\$user = DB::select(DB::raw(\"SELECT * FROM users WHERE name = '\$user'\"));";
        $siguranUpit = "\$user = DB::table('users') -> where('name', '=', \$user])->get();";

        return view('sql_injection', compact('user', 'someVariable', 'ranjivUpit', 'siguranUpit'));
    }

    function SQLinjection_nije_ranjiv(Request $request) {

        $user = $request->name;
        $someVariable = " ' OR '1'='1 ";

        $user = DB::table('users')->where([
                    ['name', '=', $user],
                ])
                ->get();

        $ranjivUpit = "\$user = DB::select(DB::raw(\"SELECT * FROM users WHERE name = '\$user'\"));";
        $siguranUpit = "\$user = DB::table('users') -> where('name', '=', \$user])->get();";

        return view('sql_injection', compact('user', 'someVariable', 'ranjivUpit', 'siguranUpit'));
    }

    public function test() {      //   \Illuminate\Support\Facades\Auth::login($user);
        echo '<br><h1>KRIPTIRANO:</h1>';
        echo(encrypt("ZOKY"));
        echo '<br><h1>KRIPTIRANO:</h1>';

        echo(Crypt::encryptString("ZOKY"));

        $a = encrypt("ZOKY");



        echo '<br><h1>DEKRIPTIRANO:</h1>';
        echo(decrypt($a));

        echo '<br><h1>DEKRIPTIRANO:</h1>';



        echo(Crypt::decryptString(Crypt::encryptString("ZOKY")));





        echo '<br><h1>HASH:</h1>';

        echo(Hash::make("ZOKY"));


        echo '<br><h1>PASSWORD:</h1>';






        if (Hash::check("ZOKY", Hash::make("ZOKY"))) {
            echo 'The passwords match..';
        } else {
            echo 'Password does not match..';
        }




        if (Hash::check("BOKY", Hash::make("BOKY"))) {

            echo 'The passwords  BOKY match..';
        } ELSE {
            echo 'Password  BOKY does not match..';
        }


        echo '<br><h1>REHASH:</h1>';
        $hashed = Hash::make("ZOKY");

        if (Hash::needsRehash($hashed)) {
            $hashed = Hash::make('plain-text');

            echo '<br>' . $hashed;
        }


        echo '<br><h1>SQL injection: </h1>';

        $user = DB::table('users')->where('name', "zoky001")->first();

        $someVariable = " ' OR '1'='1 ";
        $user = DB::select(DB::raw("SELECT * FROM users WHERE name = '$someVariable'"));




        if ($user != null) {

            echo "<br> IME KORISNIKA: " . $user[0]->name . "<br>";
            echo "E-mail KORISNIKA: " . $user[0]->email;
        } else {

            echo "NE postoji korisnik: ";
        }


        //return view('iss_home');
    }

}
