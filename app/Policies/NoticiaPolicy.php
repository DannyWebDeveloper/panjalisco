<?php

namespace App\Policies;

use App\User;
use App\Noticia;

use Illuminate\Auth\Access\HandlesAuthorization;

class NoticiaPolicy
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

    public function pass(User $user, Noticia $noticia){
        return $user->id == $noticia->id_user;
    }
}
