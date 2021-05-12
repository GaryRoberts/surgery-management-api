<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class AuthController extends BaseController
{

  /* Login method for staff */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $staff = Auth::user(); 
            $success['jwt'] =  $staff->createToken('MyApp')-> accessToken; 
            $success['data'] = $staff;
   
            return $this->sendResponse($success, 'Successfully logged in');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorized']);
        } 
    }


     /* Logout method point */
     public function logout(Request $res)
     {
       if (Auth::user()) {
         $user = Auth::user()->token();
         $user->revoke();
 
         return response()->json([
           'success' => true,
           'message' => 'Logout successfully'
       ]);
       }else {
         return response()->json([
           'success' => false,
           'message' => 'Unable to Logout'
         ]);
       }
      }
}