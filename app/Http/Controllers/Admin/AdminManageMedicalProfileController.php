<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\medicalPersonProfile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManageMedicalProfileController extends Controller
{
    //
    public function index(){
        $profiles =User::where('type','عامل في المجال الطبي')->get();
        return view('admin.medical.index')->with(compact('profiles'));

    }
 
}
