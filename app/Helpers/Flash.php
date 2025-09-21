<?php

namespace App\Helpers;

class Flash
{
    /**
     * Create a new class instance.
     */
    public static function success($message)
    {
        session()->flash('success', $message);  
    }
}
