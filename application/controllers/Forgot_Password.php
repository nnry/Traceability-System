<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Forgot_Password extends CI_Controller
{
    private $theme;

	public function __construct()
	{
		parent::__construct();

		## asset config
		$theme = $this->config->item('theme');
		$this->theme = $theme;

		$this->asset_url = $this->config->item('asset_url');
		$this->js_url = $this->config->item('js_url');
		$this->css_url = $this->config->item('css_url');
		$this->image_url = $this->config->item('image_url');

		$this->img_path = $this->image_url;

		$this->template->write('js_url', $this->js_url);
		$this->template->write('css_url', $this->css_url);
		$this->template->write('asset_url', $this->asset_url);
		$this->template->write('image_url', $this->image_url);
		// ini_set('display_errors', 1);
		// error_reporting(E_ALL);
	}
    public function forgotPassword()
	{
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_forgot_password.php');
		$this->template->render();
		// $forEmail = $_POST["forEmail"];
		// $forPass =$_POST["forPass"];
		// echo $forEmail;
		// echo $forPass;
		// exit();
	}
    public function checkEmail(){
        $forEmail = $_POST["Email"];
		$forPass =md5($_POST["Pass"]);
	
        $rscheckForgot = $this->backoffice_model-> checkForgot($forEmail);

        if($rscheckForgot === true){

            $rsForpass  = $this->backoffice_model -> forgotPass($forEmail,$forPass);
            echo  $rsForpass;
        }else{
			echo $rscheckForgot;
		}   

    }
}
?>