<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Message;
use Validator;
class SMSController extends BaseApi
{
	
    public function send_message(Request $request){
    	//$basic  = new \Nexmo\Client\Credentials\Basic('ae9a22bd','afoghp2fbWx5rgEN');
    	$client = new \Nexmo\Client(new \Nexmo\Client\Credentials\Basic('ae9a22bd', 'afoghp2fbWx5rgEN'));  
	         	
		try {
			
			$vali = Validator::make($request->all(), [
				 'phone_number' => 'required',
				 'from_phone_number' => 'required',
				 'text'=>'required'
			]);
			if($vali->fails()){
				return $this->responseSuccessWithData([
					"success" =>false,
					"error" =>$vali->errors()
				]);
			}

			// DEMO
			
		    $message = $client->message()->send([
		        'to' =>  $request['phone_number'],
		        'from' => $request['from_phone_number'],
		        'text' => $request['text']
		    ]);
		    
		   
		    $response = $message->getResponseData();
		    if($response['messages'][0]['status'] == 0) {
		    	$data = Message::where('phone_number',$request['phone_number'])
		    	->where('from_phone_number',$request['from_phone_number'])
		    	->update(['check_phone'=> 0]);

                $data = new Message([
                  'phone_number' =>$request['phone_number'],
                  'from_phone_number'=> $request['from_phone_number'],
                  'text' =>$request['text'],
                  'check_phone' => 1
                ]);
                $data->save();
                $data->id;
	         	return $this->responseSuccessWithData([
	         		"id" =>$data['id'],
	         		"text" => $request['text'],
	         		"phone_number" =>$request['phone_number'],
	         		"check_phone" => 1,
	         		"created_at"=> date('H:i', strtotime($request['created_at'])),
	         		"from_phone_number" =>$request['from_phone_number'],
			        "message" => "The message was sent successfully\n",
			        "success" => true
			    ]);
		    } else {
		    	return $this->responseSuccessWithData([
		         "message" =>  "The message failed with status: " . $response['messages'][0]['status'] . "\n",
		         "success" => false

		        ]);
		    }
		} catch (Exception $e) {
			return $this->responseSuccessWithData([
		    	 "message" => "The message was not sent. Error: " . $e->getMessage() . "\n"
		     ]);
		}
    }

    public function list_message(Request $request){
    //	$params = array();
    	$data = Message::where(function ($q) use ($request){
    		if(!empty($request['text'])) $q->where('text', 'like', '%'.$request['text'].'%');
    		if(!empty($request['phone_number'])) $q->where('phone_number', $request['phone_number']);
    		if(!empty($request['from_phone_number'])) $q->where('from_phone_number', $request['from_phone_number']);
		})->orderBy('id','desc')->paginate(10);

    	return $this->responseSuccessWithData([
		    "sms" => $data
		]);
    }

    public function list_phone_number(Request $request){

    	$data = Message::where('check_phone',1)->orderBy('id','desc')
    	->get();
    	return $this->responseSuccessWithData([
		    "sms" =>$data
		]);
    }
     public function search_from_phone(Request $request,$search){
     	$data = Message::where('from_phone_number',$search)
    	->first();
    	return $this->responseSuccessWithData([
		    "sms" => $data
		]);
     }

    public function search_id(Request $request,$id){
    
    	$data = Message::where('id',$id)
    	->orderBy('id','desc')->first();
    	
    	return $this->responseSuccessWithData([
		    "sms" => $data

		]);
    }
    public function search_phone(Request $request,$search){
    	
    	$data = Message::where('phone_number', 'like', '%'.$search.'%')
    	->groupBy('phone_number')->orderBy('id','desc')->get();
    	return $this->responseSuccessWithData([
		    "sms" => $data
		]);
    }
    public function search_chat(Request $request,$search){
    	
    	$data = Message::where('phone_number',$request['phone_number'])
    	->where('text', 'like', '%'.$search.'%')
    	->paginate(20);
    	return $this->responseSuccessWithData([
		    "sms" => $data
		]);
    }
    public function search_message(Request $request){
    	$params = array();
    	if(!empty($request['text'])){
    		$params['text'] = $request['text'];
       	}
       	if(!empty($request['phone_number']))
    	{
    		$params['phone_number'] = $request['phone_number'];
    	}
    	if(!empty($request['from_phone_number']))
    	{
    		$params['from_phone_number'] = $request['from_phone_number'];
    	}
    	$data = Message::where('id',$request['id'])->update($params);
    	return $this->responseSuccessWithData([
		    "data" => "The message was sent successfully\n"
		]);
    }

    public function remove_message(Request $request){
    	$data = Message::where('id',$request['id'])->delete();
    	return $this->responseSuccessWithData([
		    "data" => "The message was sent successfully\n"
		]);
    }
}
