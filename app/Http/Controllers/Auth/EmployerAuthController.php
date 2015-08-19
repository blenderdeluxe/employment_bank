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
class EmployerAuthController extends Controller{

    private $content  = 'employer.layouts.';
    /**
     * Create a new User authentication controller instance.
     */
    public function __construct(){

        $this->middleware('guest.employer', ['except' => 'getLogout']);
    }
    /**
     * Return the employer login view
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

        $this->validate($request, ['contact_email' => 'required|email|exists:employers,contact_email', 'password' => 'required'], ['email.exists'=>'Email does not exists in our system']);

        $auth = Auth::employer()->attempt(['contact_email' => $request->get('contact_email'),'password' => $request->get('password'), 'status' => 1]);

        if(!$auth){
            return back()->withInput()
            ->with(['message'=> 'Either Username or Password is Incorrect! or Acount is Not Yet Activated']);
        }

        $organization_name = Auth::employer()->get()->organization_name;
        Session::put('userfullname', $organization_name);

        return redirect()->route('employer.home');
    }

    /**
     * Logout the employer
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout(){

        Auth::employer()->logout();
        return redirect()->route('employer.login');
    }
}
