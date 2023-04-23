<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetUserController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\GetUserController
     */
    private $getUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\GetUserController $getUserController)
    {
        $this->getUserController = $getUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = new UserResource($this->getUserController->__invoke($request));

        return response($user, 200);
    }
}
