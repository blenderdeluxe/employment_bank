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

    public function showActivate(){

        return view('employer.activate_otp');
    }
    public function doActivate(Request $request){

        $messages = ['username.exists' => 'Username Does not exists in our System'];
        $validator = Validator::make($data = $request->all(), ['username'=>'exists:employers,username'], $messages);

        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

          $employer = Employer::where('username', $request->username)->first();

          if($employer->confirmation_code == $employer->confirmation_code){
              $employer->status = 1;
              $employer->confirmation_code = '';
              $employer->save();
              return Redirect::route('employer.login')->with('message', 'Youre account is activated <br>Now Login with your username and password');
          }else
            return Redirect::back()->withInput()->with('message', 'The OTP Doesnot match!.');
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
        $profile_photo  = Auth::employer()->get()->photo;
        $contact_name = Auth::employer()->get()->contact_name;
        $photo_url = Auth::employer()->get()->photo;
        $user_since = Auth::employer()->get()->created_at->diffforhumans();
        Session::put('organization_name', $organization_name);
        Session::put('profile_photo', $profile_photo);
        Session::put('contact_name', $contact_name);
        Session::put('user_photo', $photo_url);
        Session::put('user_since', $user_since);
        Session::put('employer_info', Auth::employer()->get());

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
