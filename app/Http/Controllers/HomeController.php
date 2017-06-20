<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
//use Illuminate\Http\Request;
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
         //id do utilizador autenticado
        $userid=Auth::user()->id;
        
        //pedido ao webservice para saber quais são os pacientes que o profissional logado tem (na bd -  relationuser)
        $client = new Client();
        $response = $client->get('http://192.168.109.1/~nanostima/relationuser.php?idUserProfessional='.$userid);


        $obj = json_decode($response->getBody());
       

        if( $obj->alldata->status->status!=7) //se não existir uma  relação entre o profissional de saúde e ALGUM paciente, então retorna 0 senão retorna um array com vários dados dos pacientes (DailyRec, WalkRec, Steps...) 
            {
               $usersPatients=0;
           }
          else
            {
              
              //resultados em json, com um array de relationuser (id de utilizadorProfissional e id de utilizadorPaciente)
              $usersPatients= $obj->alldata->data->result;
              
              
              
             //......INICIO CÓDIGO PARA IR BUSCAR A CADA PACIENTE OS REGISTOS DAILYREC......
              $usersPatientsAllDailyRec = array(); //array para armazenar os dailyrecords de cada paciente que o utilizador Profissional de Saúde logado tem
              
              
              $usersPatientsAllStep= array();//array para armazenar os Steps de cada paciente que o utilizador Profissional de Saúde logado tem
               
              $usersPatientsEmail= array();
              
                $usersPatientsAllWalkRec= array(); //array para armazenar os dailyrecords de cada paciente que o utilizador Profissional de Saúde logado tem
                
              foreach ($usersPatients as $userPatientRelationUserInfo)
              {
                  
                  //......INICIO CÓDIGO PARA IR BUSCAR A CADA PACIENTE O SEU EMAIL A PARTIR DO ID (CHAVE PRIMARIA) ......
                    $clientUser = new Client();
                    $responseUser = $clientUser->get('http://192.168.109.1/~nanostima/user.php?id='.$userPatientRelationUserInfo->idUserPatient);

                    $codeUser = $responseUser->getStatusCode();
                    $messageUser = $responseUser->getBody();
                     
                    $objUser = json_decode($responseUser->getBody());
                    
                    if( $objUser->alldata->status->status==7)
                        {
                         
                      $usersPatientsEmail[$userPatientRelationUserInfo->idUserPatient]=$objUser->alldata->data->result[0]->email;

                       }
                     //......FIM CÓDIGO PARA IR BUSCAR A CADA PACIENTE O SEU EMAIL A PARTIR DO ID (CHAVE PRIMARIA) ......
                  
                    $clientDailyRec = new Client();
                    $responseDailyRec = $clientDailyRec->get('http://192.168.109.1/~nanostima/dailyrecord.php?idUser='.$userPatientRelationUserInfo->idUserPatient);

                    $codeDailyRec = $responseDailyRec->getStatusCode();
                    $messageDailyRec = $responseDailyRec->getBody();
                     
                    $objDailyRec = json_decode($responseDailyRec->getBody());
                    
                    if( $objDailyRec->alldata->status->status==7)
                        {
                         
                      $usersPatientsAllDailyRec[$userPatientRelationUserInfo->idUserPatient]=$objDailyRec->alldata->data->result;

                      
                    
                         //......INICIO CÓDIGO PARA IR BUSCAR A CADA PACIENTE OS REGISTOS STEP......
                         //como cada registo STEP está relacionada com um registo DailyRecord, é armazenado no array multidimensional $usersPatientsAllStep o id do paciente e o id do respectivo dailyrecord. E.g. $usersPatientsAllStep[$userPatientRelationUserInfo->idUserPatient][$usersPatientsStepsBasedOnDailyRec->idDailyRec]
                         
                         $usersPatientsAllStep[$userPatientRelationUserInfo->idUserPatient]= array();
                            foreach ($usersPatientsAllDailyRec[$userPatientRelationUserInfo->idUserPatient] as $usersPatientsStepsBasedOnDailyRec)
                            {    
                                
                                   
                                  $clientStep= new Client();
                                  $responseStep = $clientStep->get('http://192.168.109.1/~nanostima/step.php?idDailyRec='.$usersPatientsStepsBasedOnDailyRec->idDailyRec);
                             
                                  $objStep = json_decode($responseStep->getBody());

                                  if( $objStep->alldata->status->status==7)
                                      {
                                    $usersPatientsAllStep[$userPatientRelationUserInfo->idUserPatient][$usersPatientsStepsBasedOnDailyRec->idDailyRec]=$objStep->alldata->data->result;
                                   
                                 
                                    
                                        
                            
                                      }
                            }
                           
                          
                            //......FIM CÓDIGO PARA IR BUSCAR A CADA PACIENTE OS REGISTOS STEP......
                         
                        }
                        
                        
                        //......FIM CÓDIGO PARA IR BUSCAR A CADA PACIENTE OS REGISTOS DAILYREC......
                        
                        
                          //......INICIO CÓDIGO PARA IR BUSCAR A CADA PACIENTE OS REGISTOS WALKREC......
                           
                            $clientWalkRec = new Client();
                    $responseWalkRec = $clientWalkRec->get('http://192.168.109.1/~nanostima/walkrecord.php?idUser='.$userPatientRelationUserInfo->idUserPatient);

                    $codeWalkRec = $responseWalkRec->getStatusCode();
                    $messageWalkRec = $responseWalkRec->getBody();
                     
                    $objWalkRec = json_decode($responseWalkRec->getBody());
                    
                    if( $objWalkRec->alldata->status->status==7)
                        {
                         
                      $usersPatientsAllWalkRec[$userPatientRelationUserInfo->idUserPatient]=$objWalkRec->alldata->data->result;
                        }
                        //......FIM CÓDIGO PARA IR BUSCAR A CADA PACIENTE OS REGISTOS WALKREC......
            
              }
              
                      
           }
          
           //limpa todos os elementos vazios e elementos-filhos vazios do array  $usersPatientsAllStep
          $usersPatientsAllStep= array_filter(array_map('array_filter', $usersPatientsAllStep));
           
           Debugbar::info( "Todos os registos dos Steps dos pacientes associados ao profissional de saúde");  
             Debugbar::info(  $usersPatientsAllStep);  
                          Debugbar::info(  $usersPatientsAllWalkRec);  
             
         return view('admin.users')->with('data', ['usersPatients'=>$usersPatients, 'usersPatientsAllDailyRec' => $usersPatientsAllDailyRec, 'usersPatientsAllStep' => $usersPatientsAllStep, 'usersPatientsEmail' => $usersPatientsEmail,'usersPatientsAllWalkRec' => $usersPatientsAllWalkRec]);
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function warnings()
    {
        return view('admin.warnings');
    }
      public function quick()
    {
        return view('admin.quickstart');
    }
}
