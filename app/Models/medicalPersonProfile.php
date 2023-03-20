<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;

class medicalPersonProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'bio',
        'occupation',
        'specialization',
        'experience',
        'Identification_card',
        'license',
        'certificate',

    ];

    
    // public static function checkuser()
    // {
    //     if(Auth::user()->type == "عامل في المجال الطبي"){
    //         $medical = medicalPersonProfile::find(Auth::user()->id);
    //         return $medical;
    //         // if(count($medical) < 1){
    //         //     $data = [
    //         //         'user_id' => Auth::user()->id,
    //         //     ];
    //         //     Self::create($data);

    //         // }
    //         // return Self::first();

    //     }
    // }
}
