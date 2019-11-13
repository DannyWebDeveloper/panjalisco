<?php

namespace App\Policies;

use App\User;
use App\Pagina;


use Illuminate\Auth\Access\HandlesAuthorization;

class PaginaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function pass(User $user, Pagina $pagina){
        return $user->id == $pagina->id_user;
    }
}
