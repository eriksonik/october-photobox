<?php
/**
 * Created by PhpStorm.
 * User: eriks
 * Date: 04.05.2018
 * Time: 17:08
 */

namespace Eriks\Photobox\Components;

use Cms\Classes\ComponentBase;

class SinglePhoto extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'Single Photo',
            'description' => 'Отображение одного изображения'
        ];
    }

    public function defineProperties()
    {
        return [
            'img' => [
                'title' => 'Ссылка на изображение',
                'type' => 'string',
            ],
            'title' => [
                'title' => 'Наименование изображения',
                'type' => 'string',
            ],
            'thumb' => [
                'title' => 'Ссылка на миниатюру',
                'type' => 'string',
                'depends' => ['fa_icon'],
            ],
            'thimbSize' => [
                'title' => 'Select Photobox',
                'description' => 'Photobox selected was use!',
                'default' => 'smaller',
                'type' => 'dropdown',
                'required' => true,
                'options' => [
                    'smaller' => 'минимальные',
                    'small' => 'маленькие',
                    'medium' => 'средние',
                    'big' => 'большие',
                    'bigest' => 'огромные',
                ],
            ],
            'fa_icon' => [
                'title' => 'FontAwesome вместо миниатюры',
                'description' => 'Используйте отличительный идентификатор гарнитуры',
                'type' => 'string',
            ],
        ];
    }


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


    public function onRun()
    {
        $this->addCss('/plugins/eriks/photobox/assets/css/styles_dev.css');
        $this->addCss('/plugins/eriks/photobox/assets/css/photobox.css');
        $this->addJs('/plugins/eriks/photobox/assets/js/jquery.photobox.js');
        $this->addJs('/plugins/eriks/photobox/assets/js/single.photobox.js');
    }


    public function onRender()
    {
        $this->page['singleImg'] = $this->property('img');
        $this->page['singleTitle'] = $this->property('title');
        $this->page['singleThumb'] = $this->property('thumb');
        $this->page['singleIcon'] = $this->property('fa_icon');
        $this->page['singleSize'] = $this->property('thimbSize');

        if (!$this->property('thumb') && !$this->property('fa_icon')) {
            $this->page['singleThumb'] = $this->property('img');
        }
    }
}