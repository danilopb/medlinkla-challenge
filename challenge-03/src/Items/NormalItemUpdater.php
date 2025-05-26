<?php

namespace App\Items;

use App\Contracts\ItemUpdaterContract;
use App\GildedRose;

class NormalItemUpdater implements ItemUpdaterContract
{
    public function update(GildedRose $item)
    {
        $item->sellIn--;
        
        if ($item->quality > 0) {
            $item->quality--;
            if ($item->sellIn < 0 && $item->quality > 0) {
                $item->quality--;
            }
        }
    }
}
