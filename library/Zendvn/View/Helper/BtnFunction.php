<?php

namespace Zendvn\View\Helper;

use Zend\View\Helper\AbstractHelper;

class BtnFunction extends AbstractHelper{
    public function __invoke($controller){
        $this->renderTemplate($controller);
    }

    protected function renderTemplate($controller){
        if($controller == 'group' || $controller == 'user') {
            $show = 'Hủy Chặn';
            $hide = 'Chặn';
        }else{
            $show = 'Hiện';
            $hide = 'Ẩn';
        }
        if($controller == 'config')
            echo '<button type="submit" class="btn btn-info" form="configuration"><i class="fa fa-floppy-o"></i>save</button>';
        else
            echo '
                <button type="button" class="btn btn-info" id="add-category" onclick="showModal(\'data-modal\')"><i class="fa fa-plus-circle"></i>Thêm</button>
                <button type="button" class="btn btn-success" onclick="changeMultiStatus(1)"><i class="fa fa-check-circle"></i>'. $show .'</button>
                <button type="button" class="btn btn-warning" onclick="changeMultiStatus(0)"><span class="glyphicon glyphicon-remove-circle"></span>'. $hide .'</button>
                <button type="button" class="btn btn-danger" onclick="deleteMulti()"><i class="fa fa-trash-o"></i>Xóa</button>
            ';
    }
}