<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteUserController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\DeleteUserController
     */
    private $deleteUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\DeleteUserController $deleteUserController)
    {
        $this->deleteUserController = $deleteUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->deleteUserController->__invoke($request);

        return response([], 204);
    }
}
