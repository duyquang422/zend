<?php

namespace Zendvn\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Datatable extends AbstractHelper{
    public function __invoke($nameTable, $arr = array()){
        echo '<div class="page-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="widget">
                            <div class="widget-body">
                                <table id="'. $nameTable .'-table" class="datatables display table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr role="row">
                                            <th><input type="checkbox" id="checkall" style="height: 15px; width: 15px;"></th>
                                            '. $this->view->partialLoop('admin/partial/row_datatables.phtml',$arr) .'
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}