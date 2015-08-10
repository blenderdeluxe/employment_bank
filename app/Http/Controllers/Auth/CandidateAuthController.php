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
class CandidateAuthController extends Controller{

    private $content  = 'webfront.candidate.';
    /**
     * Create a new User authentication controller instance.
     */
    public function __construct(){

        $this->middleware('guest.candidate', ['except' => 'getLogout']);
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

        $this->validate($request, ['username' => 'required|min:3|exists:candidates,username', 'password' => 'required'], ['username.exists'=>'Username does not exists in our system']);

        $auth = Auth::candidate()->attempt(['username' => $request->get('username'),'password' => $request->get('password'), 'status' => 1]);

        if(!$auth){
            return back()->withInput()
            ->with(['error'=> 'Either Username or Password is Incorrect! or Acount is Not Yet Activated']);
        }

        $candidatefullname = Auth::candidate()->get()->fullname;

        Session::put('userfullname', $candidatefullname);

        return redirect()->route('candidate.home');
    }

    /**
     * Logout the candidate
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {
        Auth::candidate()->logout();
        return redirect()->route('candidate.login');
    }
}
