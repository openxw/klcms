<?php

function route_class()
{
    # code...
    return str_replace('.', '-', Route::currentRouteName());
}
