<?php
   
namespace App\Http\Controllers\API;
 
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Patient as PatientResource;
use App\Models\Patient;
use App\Models\Staff;
use Validator;

   
class PatientController extends BaseController
{
   
    /* Gets a list of all patients */
    public function all_patients()
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $patients = Patient::all();
    
        return $this->sendResponse(PatientResource::collection($patients), 'Patients retrieved successfully.');
    }
    
     
    /* Stores a new patient  */
    public function store(Request $request)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'dob' => 'required|max:20|date_format:d-m-Y',
            'contactNumber' => 'required|min:10'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $patient = Patient::create($input);
   
        return $this->sendResponse(new PatientResource($patient), 'Patient created successfully.');
    } 
   


    /* Shows a specific patient's details  */
    public function show($patientId)
    {

        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $patient = Patient::find($patientId);
  
        if (is_null($patient)) {
            return $this->sendError('Patient not found.');
        }
   
        return $this->sendResponse(new PatientResource($patient), 'Patient retrieved successfully.');
    }
    
    
    /* Updates a spefic patient's details  */
    public function update(Request $request,$patientId, Patient $patient)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'dob' => 'required|max:20|date_format:d-m-Y',
            'contactNumber' => 'required|min:10'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $patient = Patient::find($patientId);
        $patient->email= $input['email'];
        $patient->fname= $input['fname'];
        $patient->lname= $input['lname'];
        $patient->dob= $input['dob'];
        $patient->contactNumber= $input['contactNumber'];
        $patient->save();
   
        return $this->sendResponse(new PatientResource($patient), 'Patient updated successfully.');
    }
   

   /* Deletes a specific patient */
    public function delete($patientId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $patient= Patient::find($patientId);

        $patient->delete();
   
        return $this->sendResponse([], 'Patient deleted successfully.');
    }
}