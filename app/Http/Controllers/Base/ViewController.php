<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
// use App\Models\Message;

class ViewController extends BaseController
{
    public function list_base(Request $request){
    	// $this->params = [
    	// 	'phone_number' => $request['phone_number']
    	// ];
    	$api = $this->callApi('api/sms/list-message',$this->params,Request::METHOD_GET);
    	$this->data['sms'] = $api['data']['sms']['data'];
    	return view('index_test',$this->data);	
    }
    public function list_phone_number(Request $request){
    	$api = $this->callApi('api/sms/list-phone-number',$this->params,Request::METHOD_GET);
        $this->data['sms'] = $api['data']['sms'];
    	return view('index',$this->data);	
    }
    public function send_base(Request $request){

    	$this->params = [
    		'phone_number' =>$request['phone_number'] ,
    		'from_phone_number' =>'12012660825',
    		'text'=>$request['text']
    	];
    	
    	$api = $this->callApi('api/sms/send-message',$this->params,Request::METHOD_POST);
    	return response()->json($api['data']);

    }
    public function send_list_base(Request $request){
    	$this->params = [
    		'phone_number' =>$request['phone_number'] ,
    		'from_phone_number' =>'12012660825',
    		'text'=>$request['text']
    	];

    	$api = $this->callApi('api/sms/send-message',$this->params,Request::METHOD_POST);
    	 $this->params = [];
    	 $myApi = $this->callApi('api/sms/list-phone-number',$this->params,Request::METHOD_GET);  	
    	 $this->data['sms'] = $myApi['data']['sms'];
    	 // print_r($this->data['sms']);
    	return  view('search_list_phone',$this->data);

    }
     public function search_chat(Request $request, $search){
     	$this->params = [
     		'phone_number' =>$request['phone_number']
     	];

     	$api = $this->callApi('api/sms/search-chat/'. $search ,$this->params,Request::METHOD_GET);
    	
    	$this->data['sms'] = $api['data']['sms']['data'];
    	return view('search_chat',$this->data);

     }
     public function search_phone(Request $request, $search){

     	$api = $this->callApi('api/sms/search-phone/'. $search ,$this->params,Request::METHOD_GET);
    	$this->data['sms'] = $api['data']['sms'];
    	return view('search_phone',$this->data);

     }
    public function list_base_id(Request $request,$id){
    	// $this->params = [
    	// 	'phone_number' => $request['phone_number']
    	// ];
    	$api = $this->callApi('api/sms/seach-id/'.$id,$this->params,Request::METHOD_GET);
    	$this->data['sms'] = $api['data']['sms'];
    	return response()->json($this->data);
    	// return view('view_chat',$this->data);	
     }
    public function list_base_list(Request $request){
    	$this->params = [
    		'phone_number' => $request['phone_number'],
    		'page' => $request['page']
    	];
    	$api = $this->callApi('api/sms/list-message',$this->params,Request::METHOD_GET);
    	$this->data['sms'] = array_reverse($api['data']['sms']['data']);

    	if($request['page'] > $api['data']['sms']['last_page']){
    	  	return null;
    	}else{
    		return view('view_chat',$this->data);	
    	}
    	
    }

}
