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
    public function __invoke($title,$id, $filename = null, $size = null,$allowStt = null,$stt = null){
        $linkImage = $filename ? $this->view->basePath('public/files/upload/') . $filename : $this->view->basePath('public/template/frontend/images/no-image.png');
        $size = $size ? $size : 'col-sm-5';
        if($allowStt)
            $inputFile = '<input type="file" name="image['. $stt .']" class="form-control col-sm-2 picture" data-id="'. $stt .'">';
        else
            $inputFile = '<input type="file" name="image" class="form-control col-sm-2 picture">';

        echo '<div class="control-group img-instead '. $size .'">
                <label for="status" class="control-label">'. $title .'</label>
                <hr>
                <div class="control-group" id="'. $id .'">
                    <img src="'. $linkImage .'">
                </div>
                '. $inputFile .'
                <input type="submit" value="upload" id="upload" class="form-control" style="display: none;">
            </div>';
    }
}
