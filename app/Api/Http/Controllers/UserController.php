<?php
namespace App\Api\Http\Controllers;

use App\Api\Http\Controller;
use App\Api\Users\UserTransformer;
use App\Users\Requests\CreateUserRequest;
use App\Users\Requests\UpdateUserRequest;
use App\Users\User;
use App\Users\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var \App\Users\UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index(Request $request)
    {
        $q = $request->get('query');

        $users = $this->users->findAllUsersPaginated($q);

        return $this->response()->paginator($users, new UserTransformer());
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->users->create($request->all());

        return $this->response()->item($user, new UserTransformer());
    }

    public function show(User $user)
    {
        return $this->response()->item($user, new UserTransformer());
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = $this->users->update($user, $request->all());

        return $this->response()->item($user, new UserTransformer());
    }

    public function delete(User $user)
    {
        $this->users->delete($user);

        return $this->response()->noContent();
    }

    public function resetPassword(User $user)
    {
        $user = $this->users->updatePassWord($user, 'vogelzang');

        return $this->response()->item($user, new UserTransformer());
    }
}
