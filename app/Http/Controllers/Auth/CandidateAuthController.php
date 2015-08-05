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

    /**
     * Create a new User authentication controller instance.
     */
    public function __construct(){

        $this->middleware('guest.user', ['except' => 'getLogout']);
    }

    /**
     * Return the Admin login view
     *
     * @return view
     */
    public function getLogin(){

        return view('webfront.candidate.login');
    }

    /**
     * Attempt login as user with given credentials
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request){

        $this->validate($request, array('email' => 'required|email', 'password' => 'required'));

        $auth = Auth::candidate()->attempt(array('email' => $request->get('email'),'password' => $request->get('password'), 'status' => 1));

        if(!$auth){
            return back();
        }

        $candidatefullname = Auth::candidate()->get()->firstname.' '.Auth::candidate()->get()->lastname;

        Session::put('userfullname', $userfullname);

        return redirect('candidate.home');
    }

    /**
     * Logout the candidate
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {
        Auth::candidate()->logout();
        return redirect('webfront.login');
    }
}
