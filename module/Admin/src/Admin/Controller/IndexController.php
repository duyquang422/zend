<?php

namespace Admin\Controller;
use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;
use Zendvn\User\Visitors;

class IndexController extends ActionController{

    protected $use;
    protected $order;
    protected $product;

    public function init(){
        $this->_getHelper('HeadLink',$this->getServiceLocator())
            ->appendStylesheet($this->basePath. '/public/template/backend/css/dashboard.css');
        $this->user = $this->getServiceLocator()->get('Admin\Model\UserTable');
        $this->order = $this->getServiceLocator()->get('Admin\Model\CartTable');
        $this->product = $this->getServiceLocator()->get('Admin\Model\ProductsTable');
    }

    public function indexAction() {
        $visistor = new Visitors();
        return new ViewModel([
           'onlineUser' => $visistor->CountVisitors(),
            'productTotal' => $this->product->countProduct(),
            'order' => [
                'new' => $this->order->countNew(),
                'inProcess' => $this->order->countInProcess(),
                'pending' => $this->order->countPending(),
                'shipped' => $this->order->countShipped(),
                'complete' => $this->order->countComplete(),
                'canceled' => $this->order->countCanceled()
            ],
            'productsSold' => $this->order->countProductsSold(),
            'weeklyStatistics' => $this->weeklyOrderStatistics(),
            'day' => date("N"), //cho biết ngày hiện tại là thứ mấy trong tuần,
            'month' => date('m'),
            'monthlyStatistics' => $this->monthlyOrderStatistics(),
            'year' => $this->order->getAllYear(),
            'yearlyStatistics' => $this->yearlyOrderStatistics(),
            'weeklyIncomeStatistics' => $this->weeklyIncomeStatistics(),
            'monthlyIncomeStatistics' => $this->monthlyIncomeStatistics(),
            'yearlyIncomeStatistics' => $this->yearlyIncomeStatistics()
        ]);
    }
    //lấy ngày hiện tại trừ đi số ngày truyền vào
    public function truNgay($soNgay){
        $now = date('Y-m-d H:i');
        $date = new \DateTime($now);
        date_sub($date, date_interval_create_from_date_string($soNgay.' days'));
        return date_format($date, 'Y-m-d');
    }

    public function weeklyIncomeStatistics(){
        $dataArr = array();
        for($i = 6; $i >= 0; $i--) {
            $dataArr[$i] = $this->order->income(['day' => $this->truNgay($i)], ['task' => 'weekly']);
        }
        return $dataArr;
    }

    public function weeklyOrderStatistics(){
        $dataArr = array();
        for($i = 6; $i >= 0; $i--) {
            $dataArr[$this->truNgay($i)] = $this->order->countOrders(['day' => $this->truNgay($i)], ['task' => 'weekly']);
        }
        return $dataArr;
    }

    public function monthlyOrderStatistics(){
        $dataArr = array();
        for($i = 1; $i <= 12; $i++)
            $dataArr[$i] = $this->order->countOrders(['month' => $i],['task' => 'monthly']);
        return $dataArr;
    }

    public function monthlyIncomeStatistics(){
        $dataArr = array();
        for($i = 1; $i <= 12; $i++)
            $dataArr[$i] = $this->order->income(['month' => $i],['task' => 'monthly']);
        return $dataArr;
    }

    public function yearlyOrderStatistics(){
        foreach($this->order->getAllYear() as $key => $val){
            $dataArr[$key] = $this->order->countOrders(['year' => $val['year']],['task' =>'yearly']);
        }
        return $dataArr;
    }
    public function yearlyIncomeStatistics(){
        foreach($this->order->getAllYear() as $key => $val){
            $dataArr[$val['year']] = $this->order->income(['year' => $val['year']],['task' =>'yearly']);
        }
        return $dataArr;
    }
}
