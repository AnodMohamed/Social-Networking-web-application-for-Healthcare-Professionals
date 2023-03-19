<?php

namespace App\Http\Controllers\medical;

use App\Http\Controllers\Controller;
use App\Models\medicalPersonProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class editProfileController extends Controller
{
    //
    public function edit(){
        $profile =medicalPersonProfile::where('user_id',Auth::user()->id)->first();
        return view('medical.editprofile')->with(compact('profile'));
    }

    public function update(Request $request){
        //validate
        $data = $request->validate([
            'bio' => 'required',
            'occupation' => 'required',
            'specialization' => 'required',
            'degree' => 'required',
            'experience' => 'required|numeric|min:1',
            'Identification_card' => 'required|mimes:pdf',
            'license' => 'required|mimes:pdf',
            'certificate' => 'required|mimes:pdf',
        ]);

        //
        $profile = medicalPersonProfile::where('user_id',Auth::user()->id)->first();
        $profile->bio = $data['bio'];
        $profile->occupation = $data['occupation'];
        $profile->specialization = $data['specialization'];
        $profile->degree = $data['degree'];
        $profile->experience = $data['experience'];

        
        if ($request->hasFile('Identification_card')) {
            $file = $request->file('Identification_card');
             // to get the original name of the image for example test.png
            $newname = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $newname);
            $profile->Identification_card= $newname;  

        }
        if ($request->hasFile('license')) {

            $file = $request->file('license');
            // to get the original name of the image for example test.png
            $newname = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $newname);
            $profile->license= $newname;  
 
        }

        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            // to get the original name of the image for example test.png
            $newname = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $newname);
            $profile->certificate= $newname;
        }

        $profile->status = "قيد المراجعة";
        $profile->save();

         //success message
        Session::flash('message', 'تمت تعديل البيانات بنجاح');

        //redirect
        return redirect()->route('medical.edit');


    }
}
