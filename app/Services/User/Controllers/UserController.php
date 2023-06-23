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

    public function getUser()
    {
        $aResult = $this->oUserService->getUser();
        return response()->json($aResult, $aResult['code']);
    }
}
