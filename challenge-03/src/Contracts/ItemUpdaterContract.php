<?php

namespace App\Contracts;

use App\GildedRose;

interface ItemUpdaterContract
{
    public function update(GildedRose $item);
}
