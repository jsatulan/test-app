<?php

namespace App\Services\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Services\User\Controllers
 * @author Jaybee Satulan <jsatulan@fullscale.io>
 * @since 2023.06.23
 */
class UserController extends Controller
{
    /**
     * @var UserService $oUserService
     */
    private UserService $oUserService;

    /**
     * UserController constructor.
     * @param UserService $oUserService
     */
    public function __construct(UserService $oUserService)
    {
        $this->oUserService = $oUserService;
    }

    //create function getUser that will return response()->json from UserService@getUser
    public function getUser()
    {
        $aResult = $this->oUserService->getUser();
        return response()->json($aResult, $aResult['code']);
    }

    //create function saveUser that will accept Request $oRequest and return response()->json from UserService@saveUser
    public function saveUser(Request $oRequest)
    {
        $aResult = $this->oUserService->saveUser($oRequest->all());
        return response()->json($aResult, $aResult['code']);
    }

    //create function deleteUser that will accept $id and return response()->json from UserService@deleteUser
    public function deleteUser($id)
    {
        $aResult = $this->oUserService->deleteUser($id);
        return response()->json($aResult, $aResult['code']);
    }

    //create function updateUser that will accept Request $oRequest and $id and return response()->json from UserService@updateUser
    public function updateUser(Request $oRequest, $id)
    {
        $aResult = $this->oUserService->updateUser($id, $oRequest->all());
        return response()->json($aResult, $aResult['code']);
    }
}
