<?php
namespace Home\Controller;

use Zendvn\Controller\ActionController;
use Zend\View\Model\ViewModel;

class NoticeController extends ActionController
{
	public function init(){
	}
	
    public function noDataAction()
    {
    	
    }
    
    public function registerSuccessAction()
    {
    	 
    }
    
    public function activeSuccessAction()
    {
    
    }
    
    public function activeFinishAction()
    {
    
    }
    
    public function noAccessAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }
}
