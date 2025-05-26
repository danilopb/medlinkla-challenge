<?php

namespace App\Items;

use App\Contracts\ItemUpdaterContract;
use App\GildedRose;

class ConjuredUpdater implements ItemUpdaterContract
{
    public function update(GildedRose $item)
    {
        $item->sellIn--;

        if ($item->quality > 0) {
            $item->quality -= 2;
            if ($item->sellIn < 0) {
                $item->quality -= 2;
            }
            if ($item->quality < 0) {
                $item->quality = 0;
            }
        }
    }
}
