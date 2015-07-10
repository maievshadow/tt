<?php
namespace zf\mvc;
class indexController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function indexAction(){
        $q = $this->request->get('q');
        $html = $this->template->render(VIEW_PATH . '/view.phtml');
        $this->response->set_response($html);
    }
}
