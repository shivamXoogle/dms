<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model extends CI_Model
{
    public function get360degrees()
    {
        $result = $this->db->get('degree_360')->result_array();
        if($result)
        return array('status'=>200,'data'=>$result);
        else
        return array('status'=>404);
    }   
    public function getDelerLogin($data)
    {
        $result = $this->db->get_where('dealer',array('email'=>$data['email'],'password'=>$data['password']))->row_array();
        if($result)
        return array('status'=>200,'data'=>$result);
        else
        return array('status'=>404);
    }
    public function goAndGenerate($id)
    {
        $result=  $this->db->get_where('dealer',array('_id'=>$id))->row_array();
        if($result)
        return array('status'=>200,'data'=>$result);
        else
        return array('status'=>404);
    }
    public function editDealerProfile($data)
    {
        $this->db->where('_id',$data['_id']);
        $result =$this->db->update('dealer',$data);
        if($result)
        return array('status'=>200);
        else
        return array('status'=>404);
    }
    public function totalProductData($limit, $search = '')
    {
        $where = $search ? "WHERE ProductName like '%{$search}%' OR Price like '%{$search}%'" : "";
       $result =  $this->db->query("SELECT * FROM products {$where}  ORDER BY ProductID DESC LIMIT {$limit} ")->result_array();
        if($result)
        return array('status'=>200,'data'=>$result);
        else
        return array('status'=>404);
    }
    public function totalProductByColor($color)
    {
        $result = $this->db->query("SELECT * FROM products WHERE Color = '{$color}' ")->result_array();
        if($result)
        return array('status'=>200,'data'=>$result);
        else
        return array('status'=>404);
    }
    public function insertOrder($data)
    {

        $data2 = array(
            'dealerID'=>$data['globalID'],
            'coupoun'=>$data['coupoun'],
            'orderAmount'=>$data['orderAmount']
        );
        $this->db->insert('orders',$data2);
        $insertID = $this->db->insert_id();
        foreach($data['products'] as $orderDetails)
        {
            $data3 = array(
                'orderID'=>$insertID,
                'quantity' => $orderDetails['quantity'],
                'productID'=>$orderDetails['productID'],
                'price'=>$orderDetails['price']
            );
            $result = $this->db->insert('orderDetails',$data3);
        }
        if($result)
        {
            $data3 = array(
                'orderID'=>$insertID
            );
            $resultNew =  $this->db->insert('completedPayment',$data3);
        }
        if($resultNew)
        return array('status'=>200);
        else
        return array('status'=>404);
    }   
    public function totalorderData($id,$pageIndex,$limit)
    {
        $count = $this->db->query("SELECT COUNT(orderID) AS total from orders WHERE dealerID = {$id} LIMIT 1 ")->row_array()['total'];
        $result = $this->db->query("SELECT * FROM orders   WHERE dealerID = {$id} ORDER BY orderID DESC LIMIT " . $pageIndex * $limit . ', '.$limit)->result_array();
        $response = array();
        if($result){
            foreach($result as $row){
                $response[]  = $this->orderDetails($row['orderID']);
            }
            return array('status'=>200,'page'=>$pageIndex,'limit'=>$limit,'total'=>$count,'data'=>$response);
        }
        else
        return array('status'=>400);
    }
    public function orderDetails($id=0)
    {
        $queryString = $this->db->query("SELECT * FROM orders JOIN dealer ON orders.dealerID = dealer._id JOIN completedPayment ON completedPayment.orderID = orders.orderID WHERE orders.orderID={$id}")->row_array();
        $ProductsID = $this->db->query("SELECT * FROM orderDetails WHERE orderID = {$id} ")->result_array();
            $data = array();    
            foreach($ProductsID as $singleProduct){
                $result = array();
                $result =  $this->getproducts($singleProduct['productID']);
                $singleProduct['product'] = $result;
                $data[] = $singleProduct;
            }
            return array(
                'orderDetails'=>$queryString,
                'products'=>$data
            );
    }
    public function getproducts($id)
    {
        $result =  $this->db->query("SELECT * FROM products WHERE ProductID = {$id} ")->row_array();
        return array(
            'title'=>$result['ProductName'],
            'price'=>$result['Price'],
            'id'=>$result['ProductID']
        );
    }
    public function fetchingData($pageIndex = 0, $limit = 5,$text)
    {
        $keyword = $text ? " where ( ProductName like '%".$text."%' OR Price like '%".$text."%' OR Color like '%".$text."%') " : '';
        $total = $this->db->query("select count(ProductID) as total from products ".$keyword." limit 1")->row_array()['total'];
        $response = ['status' => 200, 'total' => $total, 'page' => $pageIndex, 'limit' => $limit, 'data' => []];
        if ($total == 0) {
            $response['status'] = 404;
            return $response;
        }
        $queryStr = " SELECT * from products ".$keyword." ORDER BY ProductID DESC LIMIT " . $pageIndex * $limit . ', '.$limit;
        $result = $this->db->query($queryStr)->result_array();
        if (!$result)
            $response['status'] = 404;
        else {
            $response['status'] = 200;
            $response['data'] = $result;
        }
        return $response;
    }
    public function fetchingDataWithStock($pageIndex, $limit,$text)
    {
        $keyword = $text ? " where ( ProductName like '%".$text."%' OR Price like '%".$text."%' OR Color like '%".$text."%') " : '';
        $total = $this->db->query("select count(ProductID) as total from products ".$keyword." limit 1")->row_array()['total'];
        $response = ['status' => 200, 'total' => $total, 'page' => $pageIndex, 'limit' => $limit, 'data' => []];
        if ($total == 0) {
            $response['status'] = 404;
            return $response;
        }
        $queryStr = " SELECT * from products  JOIN stocks ON products.ProductID = stocks.productID ".$keyword." ORDER BY products.ProductID DESC LIMIT " . $pageIndex * $limit . ', '.$limit;
        $result = $this->db->query($queryStr)->result_array();
        if (!$result)
            $response['status'] = 404;
        else {
            $response['status'] = 200;
            $response['data'] = $result;
        }
        return $response;
    }
    public function getSingleOrder($id)
    {
        $Query = $this->db->query("SELECT * FROM orders JOIN dealer ON orders.dealerID =  dealer._id  JOIN completedPayment ON completedPayment.orderID = orders.orderID WHERE orders.orderID = {$id}")->row_array();
        if($Query){
        $ProductsID = $this->db->query("SELECT * FROM orderDetails WHERE orderID = {$Query['orderID']} ")->result_array();
            $data = array();    
            foreach($ProductsID as $singleProduct){
                $result = array();
                $result =  $this->getproducts($singleProduct['productID']);
                $singleProduct['product'] = $result;
                $data[] = $singleProduct;
            }
            return array(
                'orderDetails'=>$Query,
                'products'=>$data
            );
        }   
        else
        return array('status' =>400);
    }
    public function addPayment($data)
    {
        
       $result = $this->db->get_where('completedPayment',array('orderID' =>$data['orderID']))->row_array();
        $newValue = $result['amountPaid'] += $data['amountPaid'];
        $data2 =array(
            'orderID'=>$data['orderID'],
            'paymentType'=>$data['paymentType'],
            'comment'=>$data['comment'],
            'paymentImg'=>$data['paymentImg'],
            'amountPaid'=>$newValue
        );
        $this->db->where('orderID',$data['orderID']);
        $result2 = $this->db->update('completedPayment',$data2);
        if($result2)
        return array('status' =>200);
        else
        return array('status' =>400);
    }
    public function checkPayment($id)
    {
        $result =$this->db->get_where('completedPayment',array('orderID'=>$id))->row_array();
        if($result)
        return array('status' =>200,'data'=>$result);
        else
        return array('status' =>404);
    }
    public function returnOrdersData($id,$pageIndex,$limit)
    {
        $count = $this->db->query("SELECT COUNT(orderID) AS total from orders WHERE dealerID = {$id} LIMIT 1 ")->row_array()['total'];
        $result = $this->db->query("SELECT * FROM orders  JOIN dealer ON dealer._id = orders.dealerID WHERE dealerID = {$id} ORDER BY orderID DESC LIMIT " . $pageIndex * $limit . ', '.$limit)->result_array();
        $response = array();
        if($result){
            return array('status'=>200,'page'=>$pageIndex,'limit'=>$limit,'total'=>$count,'data'=>$result );
        }
        else
        return array('status'=>400);  
    }
    public function returnOrderData($id)
    {
        $this->db->where('orderID',$id);
        $result = $this->db->update('orders',array('returnStatus'=>2));
        if($result)
        return array ('status'=>200);
        else
        return array('status'=>404);
    }
    public function creditNoteData($id,$pageIndex,$limit)
    {
        $count = $this->db->query("SELECT COUNT(orderID) AS total from orders WHERE dealerID = {$id} LIMIT 1 ")->row_array()['total'];
        $result = $this->db->query("SELECT * FROM orders   WHERE dealerID = {$id} ORDER BY orderID DESC LIMIT " . $pageIndex * $limit . ', '.$limit)->result_array();
        $response = array();
        if($result){
            foreach($result as $row){
                $response[]  = $this->orderDetails2($row['orderID']);
            }
            return array('status'=>200,'page'=>$pageIndex,'limit'=>$limit,'total'=>$count,'data'=>$response);
        }
        else
        return array('status'=>400); 
    }
    public function orderDetails2($id=0)
    {
        $queryString = $this->db->query("SELECT * FROM orders JOIN dealer ON orders.dealerID = dealer._id JOIN completedPayment ON completedPayment.orderID = orders.orderID JOIN creditNote ON creditNote.dealerID =  dealer._id WHERE orders.orderID={$id}")->row_array();
        $ProductsID = $this->db->query("SELECT * FROM orderDetails WHERE orderID = {$id} ")->result_array();
            $data = array();    
            foreach($ProductsID as $singleProduct){
                $result = array();
                $result =  $this->getproducts2($singleProduct['productID']);
                $singleProduct['product'] = $result;
                $data[] = $singleProduct;
            }
            return array(
                'orderDetails'=>$queryString,
                'products'=>$data
            );
    }
    public function getproducts2($id)
    {
        $result =  $this->db->query("SELECT * FROM products WHERE ProductID = {$id} ")->row_array();
        return array(
            'title'=>$result['ProductName'],
            'price'=>$result['Price'],
            'id'=>$result['ProductID']
        );
    }
    public function debitNoteData($id,$pageIndex,$limit)
    {
        $count = $this->db->query("SELECT COUNT(orderID) AS total from orders WHERE dealerID = {$id} LIMIT 1 ")->row_array()['total'];
        $result = $this->db->query("SELECT * FROM orders   WHERE dealerID = {$id} ORDER BY orderID DESC LIMIT " . $pageIndex * $limit . ', '.$limit)->result_array();
        $response = array();
        if($result){
            foreach($result as $row){
                $response[]  = $this->orderDetails3($row['orderID']);
            }
            return array('status'=>200,'page'=>$pageIndex,'limit'=>$limit,'total'=>$count,'data'=>$response);
        }
        else
        return array('status'=>400); 
    }
    public function orderDetails3($id=0)
    {
        $queryString = $this->db->query("SELECT * FROM orders JOIN dealer ON orders.dealerID = dealer._id JOIN completedPayment ON completedPayment.orderID = orders.orderID JOIN debitNote ON debitNote.dealerID =  dealer._id WHERE orders.orderID={$id}")->row_array();
        $ProductsID = $this->db->query("SELECT * FROM orderDetails WHERE orderID = {$id} ")->result_array();
            $data = array();    
            foreach($ProductsID as $singleProduct){
                $result = array();
                $result =  $this->getproducts3($singleProduct['productID']);
                $singleProduct['product'] = $result;
                $data[] = $singleProduct;
            }
            return array(
                'orderDetails'=>$queryString,
                'products'=>$data
            );
    }
    public function getproducts3($id)
    {
        $result =  $this->db->query("SELECT * FROM products WHERE ProductID = {$id} ")->row_array();
        return array(
            'title'=>$result['ProductName'],
            'price'=>$result['Price'],
            'id'=>$result['ProductID']
        );
    }
    public function warrantyData($pageIndex = 0, $limit = 5,$text)
    {
        $keyword = $text ? " where ( ProductName like '%".$text."%' ) " : '';
        $total = $this->db->query("select count(ProductID) as total from products ".$keyword." limit 1")->row_array()['total'];
        $response = ['status' => 200, 'total' => $total, 'page' => $pageIndex, 'limit' => $limit, 'data' => []];
        if ($total == 0) {
            $response['status'] = 404;
            return $response;
        }
        $queryStr = " SELECT * from products  ".$keyword."  ORDER BY ProductID DESC LIMIT " . $pageIndex * $limit . ', '.$limit;
        $result = $this->db->query($queryStr)->result_array();
        if (!$result)
            $response['status'] = 404;
        else {
            $response['status'] = 200;
            $response['data'] = $result;
        }
        return $response;
    }
    public function warranyClaim($data)
    {
        $response =  $this->db->insert('claim',$data);
        if($response)
        return array('status' => 200);
        else
        return array('status' =>404);
    }
    public function dataService($data)
    {
        $response=  $this->db->insert('ServiceRequest',$data);
        if($response)
        return array('status' => 200);
        else
        return array('status' =>404);
    }
    public function dataServiceRequest($pageIndex,$limit,$text){
        $keyword = $text ? " and ( requestType like '%".$text."%' ) " : '';
        $total = $this->db->query("select count(ServiceRequestID) as total from ServiceRequest  ".$keyword." limit 1")->row_array()['total'];
        $response = ['status' => 200, 'total' => $total, 'page' => $pageIndex, 'limit' => $limit, 'data' => []];
        if ($total == 0) {
            $response['status'] = 404;
            return $response;
        }
        $queryStr = " SELECT * from ServiceRequest   ".$keyword."  ORDER BY ServiceRequestID DESC LIMIT " . $pageIndex * $limit . ', '.$limit;
        $result = $this->db->query($queryStr)->result_array();
        if (!$result)
            $response['status'] = 404;
        else {
            $response['status'] = 200;
            $response['data'] = $result;
        }
        return $response;

    }

}

