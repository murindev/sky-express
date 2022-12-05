<?php

namespace App\Models\Props;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropsDeliveryStatus extends Model
{
    use SoftDeletes;

    protected $table = 'props_delivery_statuses';
}
