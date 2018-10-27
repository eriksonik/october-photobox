<?php namespace Eriks\Photobox\Controllers;

use BackendMenu;
use Flash;
use Backend\Classes\Controller;
use Eriks\Photobox\Models\ImageManager;

/**
 * Image Managers Back-end Controller
 */
class ImageManagers extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Eriks.Photobox', 'photobox', 'imagemanagers');
    }

    /**
     * Deleted checked users.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $photoboxId) {
                if (!$photobox = ImageManager::find($photoboxId)) continue;
                $photobox->delete();
            }

            Flash::success('Deleted');
        }
        else {
            Flash::error('Failed');
        }

        return $this->listRefresh();
    }
}