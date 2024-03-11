<?php

use App\Models\User;


    function user(): ?User
    {
        if(auth()->check()){
            /** @var User $user */
            $user = auth()->user();
            return $user;
        }
        return null;
    }

