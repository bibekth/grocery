<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($message = 'success', $code = 200, mixed $data = null)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendData(mixed $data = null, $message = 'success', $code = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendPaginatedData($message = 'success', $code = 200, mixed $data = null, mixed $pagination = null)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        if ($pagination !== null) {
            $response['pagination'] = $pagination;
        }

        return response()->json($response, $code);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send201()
    {
        $response = [
            'success' => true,
            'message' => 'Data has been created.',
        ];


        return response()->json($response, 201);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send202()
    {
        $response = [
            'success' => true,
            'message' => 'Data has been accepted.',
        ];

        return response()->json($response, 202);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send204()
    {
        return response()->json(null, 204);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error401()
    {
        $response = [
            'success' => false,
            'message' => 'User is not authorized.',
        ];
        return response()->json($response, 401);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error402()
    {
        $response = [
            'success' => false,
            'message' => 'Payment required. Please make a payment first',
        ];
        return response()->json($response, 402);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error403()
    {
        $response = [
            'success' => false,
            'message' => 'User is forbidden for this action.',
        ];
        return response()->json($response, 403);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error404()
    {
        $response = [
            'success' => false,
            'message' => 'Data not found.',
        ];
        return response()->json($response, 404);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function error500(mixed $errorMessages, $code = 500)
    {
        $response = [
            'success' => false,
            'message' => $errorMessages,
        ];
        return response()->json($response, $code);
    }
}
