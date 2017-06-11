<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Auth;
use Debugbar;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     public function users()
    {
        $userid=Auth::user()->id;
        $client = new Client();
        $response = $client->get('http://192.168.109.1/~nanostima/relationuser.php?idUserProfessional='.$userid);


        $code = $response->getStatusCode();
        $message = $response->getBody();

        $obj = json_decode($response->getBody());
          // echo $obj->alldata->status->status;

        if( $obj->alldata->status->status!=7)
            {
               $usersPatients=0;
           }
          else
            {
              $usersPatients= $obj->alldata->data->result;
              $usersPatientsAllDailyRec = array();
                       
              foreach ($usersPatients as $userPatientDailyRec)
              {
                    $clientDailyRec = new Client();
                    $responseDailyRec = $clientDailyRec->get('http://192.168.109.1/~nanostima/dailyrecord.php?idUser='.$userPatientDailyRec->idUserPatient);

                    $codeDailyRec = $responseDailyRec->getStatusCode();
                    $messageDailyRec = $responseDailyRec->getBody();
                     
                    $objDailyRec = json_decode($responseDailyRec->getBody());
                    
                    if( $objDailyRec->alldata->status->status==7)
                        {
                         
                      $usersPatientsAllDailyRec[$userPatientDailyRec->idUserPatient]=$objDailyRec->alldata->data->result;
                        
         
                        }
              }
                      
           }
        //return view('admin.users')->with('usersPatients', $usersPatients);
         return view('admin.users')->with('data', ['usersPatients'=>$usersPatients, 'usersPatientsAllDailyRec' => $usersPatientsAllDailyRec]);
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function warnings()
    {
        return view('admin.warnings');
    }
}
