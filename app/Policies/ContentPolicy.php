<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Content;

class ContentPolicy extends Policy
{
    public function update(User $user, Content $content)
    {
        return $user->isAuthorOf($content);
    }

    public function destroy(User $user, Content $content)
    {
        return $user->isAuthorOf($content);
    }
}
