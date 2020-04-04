<?php

/**
 * @author Daniel Hoover <https://github.com/danielhoover>
 */
class AddressDetailController extends Controller
{
	protected $viewFileName = "addressdetail"; //this will be the View that gets the data...
	protected $loginRequired = true;


	public function run()
	{
		$this->view->title = "Addressdetails";
		$this->view->username = $this->user->username;

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $this->view->address = AddressModel::getAddressById($id);
            if($this->view->address !== null && $this->view->address->userId != $this->user->id)
            {
                $this->view->address = null;
            }
        }



		//$this->view->address = AddressModel::getAddressesById($id);
	}

}