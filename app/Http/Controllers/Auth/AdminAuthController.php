<?php
namespace employment_bank\Http\Controllers\Auth;
use employment_bank\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Created by Manash Sonowal.
 * User: msonowal
 * Date: 5/08/2015
 * Time: 14:30
 */
class AdminAuthController extends Controller{

    private $content  = 'admin.layouts.';
    /**
     * Create a new User authentication controller instance.
     */
    public function __construct(){

        $this->middleware('guest.admin', ['except' => 'getLogout']);
    }
    /**
     * Return the Admin login view
     *
     * @return view
     */
    public function getLogin(){

        return view($this->content.'login');
    }
    /**
     * Attempt login as user with given credentials
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request){

        $this->validate($request, ['email' => 'required|email|exists:admins,email', 'password' => 'required'], ['email.exists'=>'Email does not exists in our system']);

        $auth = Auth::admin()->attempt(['email' => $request->get('email'),'password' => $request->get('password'), 'status' => 1]);

        if(!$auth){
            return back()->withInput()
            ->with(['error'=> 'Either Username or Password is Incorrect! or Acount is Not Yet Activated']);
        }

        $adminfullname = Auth::admin()->get()->fullname;

        Session::put('userfullname', $adminfullname);

        return redirect()->route('admin.home');
    }

    /**
     * Logout the admin
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout(){

        Auth::admin()->logout();
        return redirect()->route('admin.login');
    }
}
