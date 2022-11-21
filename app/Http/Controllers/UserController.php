<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\User;
use App\Policies\UserPolicy;
use App\Http\Requests\updateuserRequest;
use App\Http\Requests\AvatarRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){

     }

    public function index(Request $request)
    {
      if (Gate::denies('administrator')) {
          $request->session()->flash('permissionDenied', array(
          'flash_title' => 'Inconceivable!',
          'flash_message' => 'You don\'t have permission to this section',
          'flash_level' => 'error',
        ));
        return redirect()->back();

      }

        $users = User::where('name' , '!=', 'delete user')->get();
        return view('users', compact('users'));

  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(updateuserRequest $request)
    {

      User::create([
        'fullName' => $request->fullName,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'usergroup_id' => $request->usergroup_id,
        'position' => $request->position,
        'mobileNumber' => $request->mobileNumber,
        'isAdmin' => $request->isAdmin,
        'isDataEntry' => $request->isDataEntry,
        'Active' => $request->Active,
        'isDefaulPassword' => 1,

      ]);

      \Session::flash('updateUser', array(
        'flash_title' => 'Seccessfully',
        'flash_message' => 'User Created Successfully',
        'flash_level' => 'success',
        'flash_button' => 'Okay'
      ));

      return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateuserRequest $request)
    {
      \App\User::where('email', $request->email)
          ->update([
            'fullName' => $request->fullName,
            'email' => $request->email,
            'usergroup_id' => $request->usergroup_id,
            'position' => $request->position,
            'mobileNumber' => $request->mobileNumber,
            'isAdmin' => $request->isAdmin,
            'isDataEntry' => $request->isDataEntry,
            'Active' => $request->Active,
          ]);

      \Session::flash('updateUser', array(
        'flash_title' => 'Seccessfully',
        'flash_message' => 'User Updated Successfully',
        'flash_level' => 'success',
        'flash_button' => 'Okay'
      ));
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return redirect()->back();

    }


      public function profileIndex(){
        $user = User::find(\Auth::user()->id);
        return view('dashboards.profile', compact('user'));
      }

      public function updateInformation(Request $request){

        $user = User::find(\Auth::user()->id);
        $user->name = $request->name;
        $user->family = $request->family;
        $user->mobileNumber = $request->mobileNumber;
        $user->save();

        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => 'اطلاعات حساب کاربری با موفقیت بروز شد.',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));
        return redirect()->back();

      }


      public function updatePassword(Request $request){

        $user = User::find(\Auth::user()->id);
        $password = bcrypt($request->password);
        $user->password = $password;
        $user->save();

        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => 'رمز عبور با موفقیت تغییر کرد.',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));
        return redirect()->back();

      }


      public function updateAvatar(AvatarRequest $request){

        $avatarFile = $request->file('avatar');
        $avatarFileName = time() . "_" . $avatarFile->getClientOriginalName();
        $avatarFile->move('storage/Avatars', $avatarFileName);

        $user = User::find(\Auth::user()->id);
        $user->avatar = 'storage/Avatars/' . $avatarFileName;
        $user->save();

        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => 'تصویر پروفایل با موفقیت بروز شد',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));
        return redirect()->back();

      }

}
