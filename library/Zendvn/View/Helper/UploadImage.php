<?php
/**
 * Created by PhpStorm.
 * User: Quang
 * Date: 9/11/2015
 * Time: 10:50 AM
 */
namespace Zendvn\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class UploadImage extends AbstractHelper{
    public function __invoke($title,$id, $linkImage = null, $size = null){
        $linkImage = $linkImage ? $linkImage : $this->view->basePath('public/template/frontend/images/no-image.png');
        $size = $size ? $size : 'col-sm-4';
        echo '<div class="control-group img-instead '. $size .'">
                <label for="status" class="control-label">'. $title .'</label>
                <hr>
                <div class="control-group" id="'. $id .'">
                    <img src="'. $linkImage .'">
                </div>
                <input type="file" name="image" class="form-control col-sm-2 picture">
                <input type="submit" value="upload" id="upload" class="form-control" style="display: none;">
            </div>';
    }
}
