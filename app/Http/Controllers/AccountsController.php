<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountsRequest;
use App\Models\Accounts;
use App\Models\password_resets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts= Accounts::withCount('posts')->get();
        return view('AdminPanel.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.accounts.add');
    }

    private function registerNewUser( $request)
    {

        $validated = $request->validated();

        $hashedPassword = Hash::make($request->password);

        Accounts::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'emailAddress' => $request->emailAddress,
            'phoneNumber' => $request->phoneNumber,
            'password' => $hashedPassword,
            'option' => $request->option
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountsRequest $request)
    {
        $validated = $request->validated();

        $this->registerNewUser($request);

        return redirect('/admin/login');
    }

    public function register(AccountsRequest $request)
    {
        $validated = $request->validated();

        $this->registerNewUser($request);

        return redirect('admin/Account')->with('message','account create Successfully   .');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Accounts $accounts
     * @return \Illuminate\Http\Response
     */
//    public function show(Accounts $accounts)
    public function show()
    {
        $id = auth()->user()->id;
        $account = Accounts::withCount('posts')->where('id',$id )->get();

            return view('AdminPanel.dashbord',compact('account'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Accounts $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Accounts::find($id);
//
       return view('AdminPanel.accounts.edit',['account'=>$account]);
    }
    public function editinfo($id)
    {
        $account = Accounts::find($id);
//
        return view('AdminPanel.informationUser',['account'=>$account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accounts $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(AccountsRequest $request, $id)
    {

        $validated = $request->validated();

        $account=Accounts::find($id);
        $account->update($validated);

        return redirect('admin/Account')->with('message','account update Successfully  .');

    }
public function passupdate(Request $request){
    $request->validate([
        'password' => ['required']
    ]);
    $account=Accounts::find($request->hidden);
    $hashedPassword = Hash::make($request->password);
    $account->update([
        'password' => $hashedPassword,

    ]);
    return redirect()->back()->with('message','password update Successfully  .');

}
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Accounts $accounts
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $account = Accounts::find($id);


        $valid = true;
        $message = 'Record successffully deleted';
        try {
            if(auth()->user()->option !='admin'){
                $account->delete();

            }

        } catch (\Exception $exception) {
            $valid = false;
            $message = $exception->getMessage();
        }
        return json_encode([
            'valid' => $valid,
            'message' => $message
        ]);
    }
    public function resetform(){
        return view('AdminPanel.EmailresetPassword');
    }
    public function  resetpassword(Request $request){
        $request->validate([
            'emailAddress' => ['required','email','exists:accounts,emailAddress']
        ]);

//        password_resets::create([
//            'email' => $request->email,
//            'token'=>$request->email,
//
//        ]);
//        $action_link=route('resetPasswordForm',['token'=>$request->_token, 'email'=>$request->$request->emailAddress]);
//        $body="we are received a request".$request->emailAddress.".you can reset your password the link below";
//        Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body],function ($message)use($request){
//            $message->from('ali@example.com'.'royanews');
//            $message->to($request->emailAddress,'royanews')
//            ->subject('reset Password');
//        });
//        return back()->with('success','we have send in your email');
    }
}
