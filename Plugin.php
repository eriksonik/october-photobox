<?php namespace Eriks\Photobox;

use Backend;
use System\Classes\PluginBase;

/**
 * Photobox Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Photobox',
            'description' => 'Photobox by Vuonxa Team, revision by Eriks',
            'author'      => 'Vuonxa/Eriks',
            'icon'        => 'icon-camera'
        ];
    }

    public function registerComponents()
    {
        return [
            'Eriks\Photobox\Components\Photoboxs'       => 'photoBox',
            'Eriks\Photobox\Components\SinglePhoto'     => 'singlePhoto'
        ];
    }

    public function registerPermissions()
    {
        return [
            'eriks.photobox.access_photobox'         => ['tab' => 'Photobox', 'label' => 'Photobox']
        ];
    }

    public function registerNavigation()
    {
        return [
            'photobox' => [
                'label'       => 'Photobox',
                'url'         => Backend::url('eriks/photobox/imagemanagers'),
                'icon'        => 'icon-camera',
                'permissions' => ['eriks.photobox.*'],
                'order'       => 500,
            ]
        ];
    }

}
