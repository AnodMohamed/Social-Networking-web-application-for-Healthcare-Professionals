<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\medicalPersonProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminManageMedicalProfileController extends Controller
{
    //
    public function index(){
        $profiles =User::where('type','عامل في المجال الطبي')->get();
        return view('admin.medical.index')->with(compact('profiles'));

    }

    public function accept($user_id){
        $medical_profile = medicalPersonProfile::where('user_id', $user_id)->first();
        $medical_profile->status = "مقبول";
        $medical_profile->save();

        //success message
        Session::flash('message', 'تم القبول بنجاح');

        //redirect
        return redirect()->back();
    }
 
    
    public function reject($user_id){
        $medical_profile = medicalPersonProfile::where('user_id', $user_id)->first();
        $medical_profile->status = "مرفوض";
        $medical_profile->save();

        //success message
        Session::flash('message', 'تم الرفض بنجاح');

        //redirect
        return redirect()->back();
    }

    public function stop($user_id){
        $medical_profile = medicalPersonProfile::where('user_id', $user_id)->first();
        $medical_profile->status = "محظور";
        $medical_profile->save();

        //success message
        Session::flash('message', 'تم الحظر بنجاح');

        //redirect
        return redirect()->back();
    }
    
    public function unblock($user_id){
        $medical_profile = medicalPersonProfile::where('user_id', $user_id)->first();
        $medical_profile->status = "مقبول";
        $medical_profile->save();

        //success message
        Session::flash('message', 'تم الغاء الحظر بنجاح');

        //redirect
        return redirect()->back();
    }
}
