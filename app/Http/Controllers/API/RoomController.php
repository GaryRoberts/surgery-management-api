<?php
   
namespace App\Http\Controllers\API;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Room as RoomResource;
use App\Http\Resources\Surgery as SurgeryResource;
use App\Models\Room;
use App\Models\Surgery;
use App\Models\Patient;
use App\Models\Staff;


   
class RoomController extends BaseController
{
    
    /* Gets all rooms */
    public function all()
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $rooms = Room::all();

        if (is_null($rooms)) {
            return $this->sendError('No record found');
        }

        return $this->sendResponse(RoomResource::collection($rooms), 'Rooms retrieved successfully.');
    }


    
    /* Stores a new room */
    public function store(Request $request)
    {
           
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'roomName' => 'required|max:70'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $room = Room::create($input);
   
        return $this->sendResponse(new RoomResource($room), 'Room created successfully.');
    } 
   


    /* Shows a room by id */

    public function show($id)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}
       
        $room = Room::find($id);
  
        if (is_null($room)) {
            return $this->sendError('Room not found.');
        }
   
        return $this->sendResponse(new RoomResource($product), 'Room retrieved successfully.');
    }

 

    /* Displays the surgeries for a room */

    public function surgeries_for_room($roomId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['RECEPTIONIST','DOCTOR','ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $surgery = Surgery::where('room',$roomId)->get();
  
        if (is_null($surgery)) {
            return $this->sendError('No results found');
        }
   
        return $this->sendResponse(SurgeryResource::collection($surgery), 'Surgeries for room retrieved successfully.');

    }

    
    /* Updates room information*/
    public function update(Request $request,$roomId, Room $room)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['ADMIN'])){ return $response = ['message' =>"user not authorized"];}

        $input = $request->all();
   
        $validator = Validator::make($input, [
            'roomName' => 'required|max:70',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $room = Room::find($roomId);
        
        if (is_null($room)) {
            return $this->sendError('Record to update not found');
        }

        $room->roomName = $input['roomName'];
        $room->save();
   
        return $this->sendResponse(new RoomResource($room), 'Room updated successfully.');
    }



 /* Method to display all available rooms*/

    public function available_rooms(Request $request)
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


         $available_rooms = Room::select("roomName")->join("surgeries", "surgeries.room", "=", "rooms.id")
         ->where('endDate', '<', $from)->orWhere('startDate', '>', $till)->get();

        if (is_null($available_rooms)) {
            return $this->sendError('No available rooms found.');
        }
        

        return $this->sendResponse(RoomResource::collection($available_rooms), 'Available rooms retrieved successfully.'); 
    }

   

    /* Method to Remove a room*/

    public function delete($roomId)
    {
        $staff_auth=Auth::user(); 
        if(!$staff_auth::check_authority(['ADMIN'])){ return $response = ['message' =>"user not authorized"];}
        
        $room = Room::find($roomId);

        $room->delete();
   
        return $this->sendResponse([], 'Room deleted successfully.');
    }
}