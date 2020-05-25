<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Checkout;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

/**
 * Class BaseApi
 * @package App\Http\Controllers\Api
 *
 */
class BaseApi extends Controller
{
	private function baseResponseWithData($data, $status, $message, $success)
	{
		$response = response()->json([
			'status' => $status,
			'message' => $message,
			'success' => $success,
			'data' => $data
		], $status);
		return $response->header('Content-Type', 'application/json');
	}
	
	private function baseResponseWithOutData($status, $message, $success)
	{
		$response = response()->json([
			'status' => $status,
			'message' => $message,
			'success' => $success
		], $status);
		return $response->header('Content-Type', 'application/json');
	}
	
	/**
	 * @param int $status
	 * @param string $message
	 * @param bool $success
	 * @param array $data
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function responseSuccessWithData($data = [], $status = Response::HTTP_OK, $message = 'OK', $success = true)
	{
		return $this->baseResponseWithData($data, $status, $message, $success);
	}
	
	/**
	 * @param int|null $status
	 * @param string $message
	 * @param bool|null $success
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function responseSuccessWithOutData($status = Response::HTTP_OK, $message = 'OK', $success = true)
	{
		if (func_num_args() == 1) {
			$message = $status;
			$status = Response::HTTP_OK;
		}
		return $this->baseResponseWithOutData($status, $message, $success);
	}
	
	/**
	 * @param int $status
	 * @param string $message
	 * @param bool $success
	 * @param array $data
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function responseErrorWithData($data = [], $status = Response::HTTP_INTERNAL_SERVER_ERROR, $message = 'Internal server error', $success = false)
	{
		return $this->baseResponseWithData($data, $status, $message, $success);
	}
	
	/**
	 * @param int $status
	 * @param string $message
	 * @param bool $success
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function responseErrorWithOutData($status = Response::HTTP_INTERNAL_SERVER_ERROR, $message = 'Internal server error', $success = false)
	{
		if (func_num_args() == 1) {
			$message = $status;
			$status = Response::HTTP_INTERNAL_SERVER_ERROR;
		}
		return $this->baseResponseWithOutData($status, $message, $success);
	}


}
