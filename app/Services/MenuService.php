<?php

namespace App\Services;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Collection;

class MenuService
{
    /**
     * @return Collection
     */
    public function fetchMenuItems(): Collection
    {
        return MenuItem::with('children')->get();
    }
}