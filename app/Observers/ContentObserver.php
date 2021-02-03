<?php

namespace App\Observers;

use App\Models\Content;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ContentObserver
{
    public function saving(Content $content)
    {
        $content->excerpt = make_excerpt($content->body);
    }
}
