<?php
   
namespace App\Http\Controllers\API;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Surgery as SurgeryResource;
use App\Models\Surgery;
use App\Models\Staff;
use Validator;

   
class SurgeryController extends BaseController
{

   /* Fetches all surgeries*/
    public function all_surgeries()
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}
        $surgeries = Surgery::all();
    
        return $this->sendResponse(SurgeryResource::collection($surgeries), 'Surgeries retrieved successfully.');
    }
    

    /* Stores a surgery */
    public function store(Request $request)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'requestedBy' => 'required|integer|min:1|',
            'room' => 'required|integer|min:1|',
            'patient' => 'required|integer|min:1|',
            'startDate' => 'required',
            'endDate' => 'required',
            'doctors' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $surgery = Surgery::create($input);
   
        return $this->sendResponse(new SurgeryResource($surgery), 'Surgery created successfully.');
    } 


   
    /* Fetches a specific a surgery */
    public function fetch_surgery($surgeryId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $surgery = Surgery::find($surgeryId);
  
        if (is_null($surgeryId)) {
            return $this->sendError('Surgery not found.');
        }
   
        return $this->sendResponse(new SurgeryResource($surgery), 'Surgery retrieved successfully.');
    }

   
    /* Get all doctors for a particular surgery */
    public function doctors_for_surgery($surgeryId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $surgery = Surgery::find($surgeryId);
  
        if (is_null($surgery)) {
            return $this->sendError('Records not found.');
        }
        $success['data']=Staff::findMany(json_decode($surgery->doctors));
        return $this->sendResponse($success,"Successfully returned doctors for surgery");
   
    }
    

    /* Updates a specific surgery's details */
    public function update(Request $request,$surgeryId, Surgery $surgery)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'requestedBy' => 'required|integer|min:1|',
            'room' => 'required|integer|min:1|',
            'patient' => 'required|integer|min:1|',
            'startDate' => 'required',
            'endDate' => 'required',
            'doctors' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $surgery = Surgery::find($surgeryId);
        $surgery->requestedBy= $input['requestedBy'];
        $surgery->room= $input['room'];
        $surgery->patient= $input['patient'];
        $surgery->startDate= $input['startDate'];
        $surgery->endDate= $input['endDate'];
        $surgery->doctors= $input['doctors'];
        $surgery->save();
   
        return $this->sendResponse(new SurgeryResource($surgery), 'Surgery updated successfully.');
    }
   

    /* Deletes a surgery */
    public function delete($surgeryId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $surgery = Surgery::find($surgeryId);

        $surgery->delete();
   
        return $this->sendResponse([], 'Surgery deleted successfully.');
    }
}