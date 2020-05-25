<?php

namespace App\Http\Controllers\Base;

use Cookie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
	protected $params = array();
    public $data = array(
    	
    );

    /**
	 * Function Call website
	 * @param string $url
	 * @param array|null $params
	 * @param string|null $method
	 * @return mixed
	 */
	protected static function callWebsite($url, $params = [], $method = Request::METHOD_POST)
	{
		if (!is_array($params)) {
			$method = $params;
			$params = [];
		}else{
			if($method == Request::METHOD_GET){
				$isFirst = true;
				foreach ($params as $key => $param) {
					$url .= ($isFirst == true ? '?' : '&').$key.'='.$param;
					$isFirst = false;
				}
			}
		}
		$client = new Client([
			'base_uri' => asset('')
		]);
		$response = $client->request($method, $url, [
			'http_errors' => false,
			'form_params' => $params,
			'verify'   => false,
			'headers' => [
				'Accept' => 'application/json',
			],
		]);
		return $response->getBody();
	}
    
	/**
	 * Function Call api
	 * @param string $url
	 * @param array|null $params
	 * @param string|null $method
	 * @return mixed
	 */
	protected static function callApi($url, $params = [], $method = Request::METHOD_POST, $react_access_token = null)
	{
		if (!is_array($params)) {
			$method = $params;
			$params = [];
		}else{
			if($method == Request::METHOD_GET){
				$isFirst = true;
				foreach ($params as $key => $param) {
					$url .= ($isFirst == true ? '?' : '&').$key.'='.$param;
					$isFirst = false;
				}
			}
		}
		$client = new Client([
			'base_uri' => asset('')
		]);

		
        
			
		

		$access_token = '';
		
		if(!empty($react_access_token)){
			$access_token = $react_access_token;
		}else{
			if (Cookie::get('access_token') === null) {
				// Cookie::put('access_token',$this->getAccessToken($client));
				$guzzle = new \GuzzleHttp\Client;

				$response = $guzzle->post('http://localhost/auth/public/oauth/token', [
				    'form_params' => [
				        'grant_type' => 'client_credentials',
				        'client_id' => '5',
				        'client_secret' => 'rAqP0rks7SmXoD3O5Ph9NKaQnyNXEuHC0yJOxiuO',
				        'scope' => '',
				    ],
				]);

				$data = json_decode((string) $response->getBody(), true);
				$access_token = $data['access_token'];
			
				Cookie::queue('access_token',$access_token,60);

				$response_client = $client->request($method, 'http://localhost/auth/public/'.$url, [
					'http_errors' => false,
					'form_params' => $params,
					'verify'  => false,
					'headers' => [
						'Accept' => 'application/json',
					    'Authorization' => 'Bearer '.$access_token,
					],
				]);
				return json_decode((string) $response_client->getBody(), true);

			}else{

				 $access_token = Cookie::get('access_token');	

				 $response_client = $client->request($method, 'http://localhost/auth/public/'.$url, [
					'http_errors' => false,
					'form_params' => $params,
					'verify'  => false,
					'headers' => [
						'Accept' => 'application/json',
					    'Authorization' => 'Bearer '.$access_token,
					],
				]);

				return json_decode((string) $response_client->getBody(), true);
			}
		}


		
		
		
	}

	protected static function getAccessToken($client)
	{
	    $response =  $client->request('POST','http://localhost/auth/public/oauth/token', [
	        'form_params' => [
	            'grant_type' => 'client_credentials',
	            'client_id' => '5',
	            'client_secret' => 'rAqP0rks7SmXoD3O5Ph9NKaQnyNXEuHC0yJOxiuO',
	            'scope' => '',
	        ],
	        'verify'   => false,
	    ]);
		return json_decode((string) $response->getBody(), true)['access_token'];
	}
}
