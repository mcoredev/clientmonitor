<?php namespace Mcore\ClientMonitor\Models;

use Model;

/**
 * Setting Model
 */
class MonitorSetting extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = [
        \System\Behaviors\SettingsModel::class
    ];

    /**
     * @var string settingsCode unique to this model
     */
    public $settingsCode = 'mcore_monitor_setting';

    /**
     * @var string settingsFields configuration
     */
    public $settingsFields = 'fields.yaml';


    /**
     * @var array rules for validation
     */
    public $rules = [];

  
}
