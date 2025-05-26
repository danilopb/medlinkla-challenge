<?php

namespace App\Factory;

use App\Items\AgedBrieUpdater;
use App\Items\BackstagePassUpdater;
use App\Items\SulfurasUpdater;
use App\Items\ConjuredUpdater;
use App\Items\NormalItemUpdater;
use App\Contracts\ItemUpdaterContract;
use App\GildedRose;

class ItemUpdaterFactory
{
    public static function create(GildedRose $item): ItemUpdaterContract
    {
        if ($item->name === 'Aged Brie') {
            return new AgedBrieUpdater();
        } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
            return new BackstagePassUpdater();
        } elseif ($item->name === 'Sulfuras, Hand of Ragnaros') {
            return new SulfurasUpdater();
        } elseif (strpos($item->name, 'Conjured') !== false) {
            return new ConjuredUpdater();
        } else {
            return new NormalItemUpdater();
        }
    }
}
