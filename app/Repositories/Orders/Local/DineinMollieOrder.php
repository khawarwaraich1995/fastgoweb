<?php

namespace App\Repositories\Orders\Local;
use App\Repositories\Orders\LocalOrderRepository;
use App\Traits\Payments\HasMollie;
use App\Traits\Expedition\HasDineIn;

class DineinMollieOrder extends LocalOrderRepository
{
    use HasDineIn;
    use HasMollie;
}