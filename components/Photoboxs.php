<?php namespace Eriks\Photobox\Components;

use Cms\Classes\ComponentBase;
use Eriks\Photobox\Models\ImageManager;

class Photoboxs extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Photoboxs Component',
            'description' => 'Photobox responsive'
        ];
    }

    public function defineProperties()
    {
        return [
            'photoBoxId' => [
                'title'             => 'Выбор менеджера изображений',
//                'description'       => 'Photobox selected was use!',
                'default'           => 1,
                'type'              => 'dropdown',
                'required'          => true,
                'options'           => ImageManager::lists('name', 'id')
            ],
            'thimbSize' => [
                'title'             => 'Select Photobox',
                'description'       => 'Photobox selected was use!',
                'default'           => 'smaller',
                'type'              => 'dropdown',
                'required'          => true,
                'options'           => [
                    'smaller' => 'минимальные',
                    'small' => 'маленькие',
                    'medium' => 'средние',
                    'big' => 'большие',
                    'bigest' => 'огромные',
                ]
            ]
        ];
    }

//    public function getPhotoBoxIdOptions()
//    {
//        return ImageManager::lists('name', 'id');
//    }

//    public function getThimbSizeOptions()
//    {
//        return [
//            'smaller' => 'минимальные',
//            'small' => 'маленькие',
//            'medium' => 'средние',
//            'big' => 'большие',
//            'bigest' => 'огромные',
//        ];
//    }

    public function onRun(){
        $this->addCss('/plugins/eriks/photobox/assets/css/styles_dev.css');
        $this->addCss('/plugins/eriks/photobox/assets/css/photobox.css');
        $this->addJs('/plugins/eriks/photobox/assets/js/jquery.photobox.js');
        $this->addJs('/plugins/eriks/photobox/assets/js/gallery.photobox.js');

        $this->page['size'] = $this->property('thimbSize');
        $this->page['photos'] = ImageManager::where('id', $this->property('photoBoxId'))->first();
    }

}