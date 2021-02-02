<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Content;

class ContentPolicy extends Policy
{
    public function update(User $user, Content $content)
    {
        // return $content->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Content $content)
    {
        return true;
    }
}
