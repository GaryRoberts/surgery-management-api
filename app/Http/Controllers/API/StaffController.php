<?php
   
namespace App\Http\Controllers\API;
 
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Staff as StaffResource;
use App\Http\Resources\Surgery as SurgeryResource;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use App\Models\Surgery;

   
class StaffController extends BaseController
{
    /* Gets a list of all doctors */
    public function all_doctors()
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}
       
        $staff = Staff::where('staffType','DOCTOR')->get();
        return $this->sendResponse(StaffResource::collection($staff), 'Doctors retrieved successfully.');
    }


    /* Stores a new staff */
    public function store(Request $request)
    {
        
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['ADMIN'])){ return $response = ['message' =>"user not authorized"];}
       
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'email' => 'required|email|max:255|regex:/(.*)@speurgroup\.com/i|unique:staff',
            'staffType' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password', // input used to confirm password
            'phone' => 'required|min:10',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']); //encrypts user password for storing
        $staff = Staff::create($input);
        $success['jwt'] =  $staff->createToken('MyApp')->accessToken;
        $success['user'] =  $staff;
   
        return $this->sendResponse($success, 'Staff registered successfully.');
    } 
   

    /* Shows a specific staff's details */
    public function show($staffId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $staff = Staff::find($staffId);
  
        if (is_null($staff)) {
            return $this->sendError('No results found');
        }
   
        return $this->sendResponse(new StaffResource($staff), 'Staff retrieved successfully.');
    }


   /* Gets a list of all my surgeries as a doctor */
    public function my_surgeries($doctorId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $surgeries=Surgery::get();
        $surgery_for_doc=[];

        foreach ($surgeries as $surgery) {
            if(in_array($doctorId,json_decode($surgery->doctors)))
            {
                $surgery_for_doc[] = $surgery->id;  //get all surgery id for doctor
            }
        }

        $surgeryList=Surgery::findMany($surgery_for_doc); //find all the surgeries with doctor assigned to it
        return $this->sendResponse(SurgeryResource::collection($surgeryList), 'Successfully returned your surgeries');
    }


    /* Gets a list of available doctors */
    public function available_doctors(Request $request)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'startTime' => 'required',
            'endTime' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $from = min(new \DateTime($input['startTime']),new \DateTime($input['endTime']));
        $till = max(new \DateTime($input['startTime']),new \DateTime($input['endTime']));

        $surgeries=Surgery::where('startDate', '>=', $from)->Where('endDate', '<=', $till)->get();

        $available_docs=array();

        foreach ($surgeries as $surgery) {
        
            $available_docs= array_merge($available_docs,json_decode($surgery->doctors)); 
        }


        $doctorsList=Staff::whereNotIn('id',$available_docs)->get(); //find all doctors that are not working in time period

        return $this->sendResponse(StaffResource::collection($doctorsList), 'Successfully returned available doctors');
    }


    
   /* Updates a specific staff's details */
    public function update(Request $request,$staffId, Staff $staff)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        if($staff_auth->id!=$staffId && $staff_auth->staffType!="ADMIN"){return $response = ['message' =>"user not authorized to update this record"];}
       
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'email' => 'required|email|max:255|regex:/(.*)@speurgroup\.com/i|unique:users',
            'staffType' => 'required',
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'phone' => 'required|min:10',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
  
        
        $staff = Staff::find($staffId);
        $staff->email= $input['email'];
        $staff->staffType= $input['staffType'];
        $staff->fname= $input['fname'];
        $staff->lname= $input['lname'];
        $staff->phone= $input['phone'];
        $staff->save();
   
        return $this->sendResponse(new StaffResource($staff), 'Staff updated successfully.');
    }


   
  /* Deletes a specific staff */
    public function delete($staffId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $staff = Staff::find($staffId);

        $staff->delete();
   
        return $this->sendResponse([], 'Staff deleted successfully.');
    }
}