<?php namespace Eriks\Photobox\Models;

use Model;

/**
 * ImageManager Model
 */
class ImageManager extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'eriks_photobox_image_managers';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $attachMany = ['photos' => ['System\Models\File']];

    public function getTotalImageAttribute(){
        return count($this->photos);
    }

}