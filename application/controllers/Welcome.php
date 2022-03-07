<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model','MM');
	}
	public function index()
	{
		$this->load->view('LoginView');
	}
	public function get360degreesData()
	{
		$Result = $this->MM->get360degrees();
		echo json_encode($Result);
	}
	public function Landing360()
	{
		$this->load->view('360View');
	}
	public function OrderStatus()
	{
		$this->load->view('OrderStatusView');
	}
	public function DelerLogin()
	{
		$data = json_decode(file_get_contents("php://input"),true);
		$result = $this->MM->getDelerLogin($data);
		$_SESSION['dealerDetails'] = $result;
		echo json_encode($result);
	}
	public function Dashboard()
	{
		$this->load->view('index');
	}
	public function DealerProfile()
	{
		$this->load->view('DealerProfile');
	}
	public function generateSession($id)
	{
		$result = $this->MM->goAndGenerate($id);
		echo json_encode($result);
	}
	public function editProfile()
	{
		$data = json_decode(file_get_contents("php://input"),true);
		$result = $this->MM->editDealerProfile($data);
		echo json_encode($result);
	}
	public function productAnnouncement()
	{
		$this->load->view('ProductsAnnouncement');
	}
	public function CreateOrder()
	{
		$this->load->view('CreateOrder');
	}
	public function totalProducts()
	{
		$limit = $_GET['limit'];
		$search = $_GET['search'];
		$result = $this->MM->totalProductData($limit, $search);
		echo json_encode($result);
	}
	public function totalProductsBYCOLOR()
	{
		$color = $_GET['color'];
		$result = $this->MM->totalProductByColor($color);
		echo json_encode($result);
	}
	public function Cart()
	{
		$this->load->view('CartView');
	}
	public function CreateDealerOrder()
	{
		$data = json_decode(file_get_contents("php://input"),true);
		$result = $this->MM->insertOrder($data);
		echo json_encode($result);
	}
	public function ViewOrder()
	{
		$this->load->view('OrderView');
	}
	public function totalOrders($id,$pageIndex = 0,$limit=8)
	{	
		$result = $this->MM->totalorderData($id,$pageIndex,$limit);
		echo json_encode($result);
	}
	public function ProductPortal()
	{
		$this->load->view('ProductView');
	}
	public function GetProductsData($pageIndex = 0, $limit = 5)
	{
		$text = isset($_GET['search']) ? $_GET['search'] : '';
		$result = $this->MM->fetchingData($pageIndex, $limit,$text);
		echo json_encode($result);
	}
	public function GetProductsDataWithStock($pageIndex = 0, $limit = 5)
	{
		$text = isset($_GET['search']) ? $_GET['search'] : '';
		$result = $this->MM->fetchingDataWithStock($pageIndex, $limit,$text);
		echo json_encode($result);
	}
	public function Invoice()
	{
		$this->load->view('InvoiceView');
	}
	public function Stock()
	{
		$this->load->view('StockView');
	}
	public function OrderInvoice()
	{
		$this->load->view('OrderInvoiceView');
	}
	public function SingleOrderData($id)
	{
		$result = $this->MM->getSingleOrder($id);
		echo json_encode($result);
	}
	public function completePayment()
	{
		if(is_uploaded_file($_FILES['paymentImg']['tmp_name']))
 			{
				$path = 'Uploads/';
				$config['upload_path'] = './'.$path;
				$config =[
					'upload_path' => './'.$path,
					'allowed_types' => 'gif|jpg|png|jpeg', 
					'overwrite' => true
				];
			$ext = explode(".", $_FILES['paymentImg']['name']);
			$time = time();
			$config['file_name'] = $time.".".$ext[1];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('paymentImg')){
				echo json_encode(array('status'=>400,'message'=>$this->upload->display_errors()));
				return ;
			}
			else
				$_POST['paymentImg'] = base_url().$path.$config['file_name'];
			}
			$response = $this->MM->addPayment($_POST);
			echo json_encode($response);
	}

	public function completeWarranty()
	{
		if(is_uploaded_file($_FILES['clainAvatar']['tmp_name']))
 			{
				$path = 'Uploads/';
				$config['upload_path'] = './'.$path;
				$config =[
					'upload_path' => './'.$path,
					'allowed_types' => 'gif|jpg|png|jpeg', 
					'overwrite' => true
				];
			$ext = explode(".", $_FILES['clainAvatar']['name']);
			$time = time();
			$config['file_name'] = $time.".".$ext[1];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('clainAvatar')){
				echo json_encode(array('status'=>400,'message'=>$this->upload->display_errors()));
				return ;
			}
			else
				$_POST['clainAvatar'] = base_url().$path.$config['file_name'];
			}
			$response = $this->MM->warranyClaim($_POST);
			echo json_encode($response);
	}
	public function checkingPayment($id)
	{
		$result = $this->MM->checkPayment($id);
		echo json_encode($result);
	}
	public function OutStanding()
	{
		$this->load->view('OutStandingView');
	}
	public function ReturnOrder()
	{
		$this->load->view('ReturnOrder');
	}
	public function returnOrders($id,$pageIndex = 0,$limit=8)
	{
		$result = $this->MM->returnOrdersData($id,$pageIndex,$limit);
		echo json_encode($result);
	}
	public function InitreturnOrder($id)
	{
		$result = $this->MM->returnOrderData($id);
		echo json_encode($result);
	}
	public function CreditNote()
	{
		$this->load->view('CreditNoteView');
	}
	public function DebitNote()
	{
		$this->load->view('DebitNoteView');
	}
	public function Warranty()
	{
		$this->load->view('WarrantyView');
	}
	public function CreditNoteData($id,$pageIndex = 0,$limit=8)
	{
		$result = $this->MM->creditNoteData($id,$pageIndex,$limit);
		echo json_encode($result);
	}
	public function DebitNoteData($id,$pageIndex = 0,$limit=8){
		$result = $this->MM->debitNoteData($id,$pageIndex,$limit);
		echo json_encode($result);
	}
	public function WarrantyData($pageIndex = 0, $limit = 5)
	{
		$text = isset($_GET['search']) ? $_GET['search'] : '';
		$result = $this->MM->warrantyData($pageIndex, $limit,$text);
		echo json_encode($result);
	}
	public function Create_Request(){
		$this->load->view('Create_Request_view');
	}
	public function ServiceRequestView(){
		$this->load->view('RequestView');
	}
	public function AddServiceRequest(){

		if(is_uploaded_file($_FILES['servicePhoto']['tmp_name']))
		{
		   $path = 'Uploads/';
		   $config['upload_path'] = './'.$path;
		   $config =[
			   'upload_path' => './'.$path,
			   'allowed_types' => 'gif|jpg|png|jpeg', 
			   'overwrite' => true
		   ];
	   $ext = explode(".", $_FILES['servicePhoto']['name']);
	   $time = time();
	   $config['file_name'] = $time.".".$ext[1];
	   $this->load->library('upload', $config);
	   $this->upload->initialize($config);
	   if (!$this->upload->do_upload('servicePhoto')){
		   echo json_encode(array('status'=>400,'message'=>$this->upload->display_errors()));
		   return ;
	   }
	   else
		   $_POST['servicePhoto'] = base_url().$path.$config['file_name'];
	   }
	   $response = $this->MM->dataService($_POST);
	   echo json_encode($response);
	}
	public function GetServiceRequest($pageIndex = 0,$limit = 8){
		$text = isset($_GET['search']) ? $_GET['search'] : '';
		$response = $this->MM->dataServiceRequest($pageIndex,$limit,$text);
		echo json_encode($response);
	}

}
