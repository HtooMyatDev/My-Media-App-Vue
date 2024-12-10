<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::select('name', 'email', 'phone', 'address', 'gender')->where('id', $id)->first();
        // dd($user->toArray());
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {

        $this->checkValidation($request, 'profile');
        $data = $this->getUserData($request);
        User::where("id", Auth::user()->id)->update($data);
        Alert::success('Account Updated', 'Account Updated Successfully!');
        return back();
    }

    public function changePasswordPage()
    {
        return view('admin.profile.changePassword');
    }

    public function changePassword(Request $request)
    {
        $this->checkValidation($request, 'password');
        if (Hash::check($request->oldPassword, Auth::user()->password)) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
            Alert::success('Changed', 'Account Password Changed Successfully!');
            return to_route('admin#profile');
        }
        return back();
    }
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender
        ];
    }
    private function checkValidation($request, $action)
    {
        if ($action == 'profile') {
            $validationRules = [
                "name" => "required",
                'email' => "required",
                'phone' => 'required|numeric',
                'address' => 'required',
                'gender' => 'required'
            ];
        } elseif ($action == 'password') {
            $validationRules = [
                "oldPassword" => "required",
                'newPassword' => "required",
                'confirmPassword' => "required",

            ];
        }

        $request->validate($validationRules);
    }
}
