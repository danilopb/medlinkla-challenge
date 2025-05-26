<?php

namespace App\Items;

use App\Contracts\ItemUpdaterContract;
use App\GildedRose;

class SulfurasUpdater implements ItemUpdaterContract
{
    public function update(GildedRose $item)
    {
        // Sulfuras: there are not changes
    }
}
