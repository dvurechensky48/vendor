<?php

namespace Orchid\Setting\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use SettingTrait;

    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * Cache result.
     *
     * @var bool
     */
    public $cache = true;
    /**
     * @var string
     */
    protected $table = 'settings';
    /**
     * @var string
     */
    protected $primaryKey = 'key';
    /**
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'value' => 'array',
    ];
}
