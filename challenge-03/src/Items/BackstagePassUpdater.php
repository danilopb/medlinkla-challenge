<?php

namespace App\Items;

use App\Contracts\ItemUpdaterContract;
use App\GildedRose;

class BackstagePassUpdater implements ItemUpdaterContract
{
    public function update(GildedRose $item)
    {
        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = 0;
            return;
        }

        if ($item->quality < 50) {
            $item->quality++;
            if ($item->sellIn < 10 && $item->quality < 50) {
                $item->quality++;
            }
            if ($item->sellIn < 5 && $item->quality < 50) {
                $item->quality++;
            }
        }
    }
}
