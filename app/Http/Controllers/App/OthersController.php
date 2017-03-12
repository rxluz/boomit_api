<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\App\OthersRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use \JD\Cloudder\Facades\Cloudder;
use Hash;


/**
 * @resource /app/others
 *
 */

class OthersController extends Controller
{

  /**
   * [post] /contacts
   *
   * `Requires authentication: no`
   */
  public function storeContacts(OthersRequest $request){
    $contacts_data=new \App\Models\OtherContact([
      'name'=>$request->name,
      'email'=>$request->email,
      'message'=>$request->message
    ]);

    $contacts_data->save();

    return response('', 200);
  }

  public function storeShellQuiz(OthersRequest $request){
    return response('ola mundo', 200);
  }

  public function updateShellQuiz(OthersRequest $request){
    return response('ola mundo', 200);
  }


}
