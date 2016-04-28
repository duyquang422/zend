<?php
/**
 * Created by PhpStorm.
 * User: Quang
 * Date: 9/12/2015
 * Time: 8:58 AM
 */

namespace Zendvn\View\Helper;


use Zend\View\Helper\AbstractHelper;

class Modal extends AbstractHelper{
    public function __invoke($id, $content,$size = null,$title = null,$button = null,$enableButton = true)
    {
        if($enableButton) {
            $buttonFooter = $button ? $button : '<div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    <button type="button" id="save-item" class="btn btn-primary" form="data-form">Lưu Lại</button>
                                </div>';
        }else{
            $buttonFooter = '';
        }
        $header = $title ? '<div class="modal-header">
                            <span class="modal-title" id="myModalLabel">'. $title .'</span>
                        </div>' : '';
        echo '<div class="modal fade bs-example-modal-lg data-modal" id="'. $id .'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog '. $size .'" >
                    <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        . $header .'
                        <div class="modal-body">
                            '. $content .'
                        </div>
                        '. $buttonFooter .'
                    </div>
                </div>
            </div>';
    }
}