<?php namespace Mcore\ClientMonitor;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'ClientMonitor',
            'description' => 'No description provided yet...',
            'author' => 'Mcore',
            'icon' => 'icon-podcast'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Mcore\ClientMonitor\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mcore.clientmonitor.some_permission' => [
                'tab' => 'ClientMonitor',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'clientmonitor' => [
                'label' => 'Client monitor',
                'description' => 'Connection to the server for status monitoring',
                'category' => 'CATEGORY_CMS',
                'icon' => 'icon-podcast',
                'class' => \Mcore\ClientMonitor\Models\MonitorSetting::class,
                'size' => 'medium',
                'order' => -100,
            ]
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'clientmonitor' => [
                'label' => 'ClientMonitor',
                'url' => Backend::url('mcore/clientmonitor/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['mcore.clientmonitor.*'],
                'order' => 500,
            ],
        ];
    }
}
