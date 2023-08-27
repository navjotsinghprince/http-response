<?php

namespace Prince\Ferozepuria;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

/*
 * This file is a part of HTTP Response Service Provider.
 *
 * (c) Prince Ferozepuria
 * 
 * Feel Free to visit: https://navjotsinghprince.com
 * Contact Us: fzr@navjotsinghprince.com
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *  
 */

const SUCCESS = "Success";
const ALL_FIELDS_REQUIRED = "All fields are required";
const SOMETHING_WRONG = "Something went wrong !";
const SOMETHING_WRONG_LATER = "Something went wrong ! Please try again later.";

class HTTPResponse extends Controller
{

    public static $HTTP_OK = 200;
    public static $HTTP_BAD_REQUEST = 400;
    public static $HTTP_UNAUTHORIZED = 401;
    public static $HTTP_FAILED = 402;
    public static $HTTP_FORBIDDEN = 403;
    public static $HTTP_NOT_FOUND = 404;
    public static $HTTP_CONFLICT = 409;
    public static $HTTP_UNPROCESSABLE_ENTITY = 422;
    public static $HTTP_TOO_MANY_REQUESTS = 429;

    /**
     * Return successfull json response.
     * The HTTP 200 OK success status response code indicates that the request has succeeded.
     * @param string $message
     * @param [int,boolean,string,array,collection,class_object] $data
     * @return json
     */
    public function sendSuccess($message, $data = null)
    {
        $response = [
            "status" => self::$HTTP_OK,
            'message' => $message,
        ];
        if ($data != null) {
            $response['data'] = $data;
        }
        return Response::json($response, self::$HTTP_OK);
    }


    /**
     * Return successfull json response with your custom key value.
     * Custom Key: Your custom response key.
     * 
     * Custom Value: Your custom response value.
     * @param string $message
     * @param string $key
     * @param [int,boolean,string,array,collection,class_object] $value
     * @return json
     */
    public function sendSuccessForce($message, $key, $value)
    {
        $response = [
            "status" => self::$HTTP_OK,
            'message' => $message,
            $key => $value,
        ];
        return Response::json($response, self::$HTTP_OK);
    }


    /**
     * Return failed json response.
     * This response is sent when a request conflicts with the current state of the server.
     * @param string $message
     * @param string array $data
     * @return json
     */
    public function sendFailure($message, $data = null)
    {
        $response = [
            "status" => self::$HTTP_CONFLICT,
            'message' => $message,
        ];
        if ($data != null) {
            $response['data'] = $data;
        }
        return Response::json($response, self::$HTTP_CONFLICT);
    }


    /**
     * Return validation failed json response.
     * Unprocessable Entity The server does not want to execute it due to validation 
     * @param [string] $message
     * @param [collection] $errors
     * @return json
     */
    public function validationFailed($message, $errors)
    {
        $response = [
            "status" => self::$HTTP_UNPROCESSABLE_ENTITY,
            'message' => $message,
            'errors' => $errors,
        ];
        return Response::json($response, self::$HTTP_UNPROCESSABLE_ENTITY);
    }


    /**
     * Return not found json response.
     * The server can not find the requested resource
     * @param [string] $message
     * @param [array] $errors
     * @return json
     */
    public function notFound($message, $errors = null)
    {
        $response = [
            "status" => self::$HTTP_NOT_FOUND,
            'message' => $message,
            'errors' => is_null($errors) ? 'not specified' : $errors,
        ];
        return Response::json($response, self::$HTTP_NOT_FOUND);
    }


    /**
     * Return unauthorized json response.
     * Although the HTTP standard specifies "unauthorized", semantically this response means "unauthenticated".
     * That is, the client must authenticate itself to get the requested response
     * @param string $message
     * @return json
     */
    public function unauthorized($message)
    {
        $response = [
            "status" => self::$HTTP_UNAUTHORIZED,
            'message' => $message,
            'errors' => [$message]
        ];
        return Response::json($response, self::$HTTP_UNAUTHORIZED);
    }


    /**
     * Return forbidden json response.
     * The client does not have access rights to the content; that is, it is unauthorized, so the server is refusing to give the requested resource
     * @param [string] $message
     * @return json
     */
    public function forbidden($message)
    {
        $response = [
            "status" => self::$HTTP_FORBIDDEN,
            'message' => $message,
        ];
        return Response::json($response, self::$HTTP_FORBIDDEN);
    }


    /**
     * Return data process Failed json response.
     * The server cannot or will not process the request due to something that is perceived to be a client error (e.g., malformed request syntax, invalid request message framing, or deceptive request routing).
     * @param [string] $message
     * @return json
     */
    public function dataProcessFailed($message)
    {
        $response = [
            "status" => self::$HTTP_BAD_REQUEST,
            'message' => $message,
            'errors' => [$message]
        ];
        return Response::json($response, self::$HTTP_BAD_REQUEST);
    }
}
