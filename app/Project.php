<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public const STATUS_PLANNED = 'planned';
    public const STATUS_RUNNING = 'running';
    public const STATUS_ON_HOLD = 'on_hold';
    public const STATUS_FINISHED = 'finished';
    public const STATUS_CANCEL = 'cancel';


    /**
     * @var string[] Available statuses
     */
    public static $statuses = [
        self::STATUS_PLANNED,
        self::STATUS_RUNNING,
        self::STATUS_ON_HOLD,
        self::STATUS_FINISHED,
        self::STATUS_CANCEL,
    ];
}
