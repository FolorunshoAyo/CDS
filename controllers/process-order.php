<?php
    require(dirname(__DIR__) . '/auth-library/resources.php');

    if(isset($_POST['submit'])){
        $pid = $db->real_escape_string($_POST['pid']);
        $uid = $db->real_escape_string($_POST['uid']);
        $total = $db->real_escape_string($_POST['total']);
        $amount = $db->real_escape_string($_POST['amount']);
        $order_no = rand(1000000000, 9999999999);
        
        if(empty($pid) || empty($uid) || empty($total) || empty($amount)){
            echo json_encode(array('success' => 0, 'error_title' => "Order Error", 'error_message' => "One or more field(s) were not provided"));
            exit();
        }else{
            // INSERT ORDER INTO DATABASE
            $sql_insert_order = $db->query("INSERT INTO orders (order_no, user_id, product_id, amount, purch_amt) VALUES ($order_no, $uid, $pid, $amount, $total)");
            if($sql_insert_order){
                $_SESSION['order_no'] = $order_no;
                echo json_encode(array('success' => 1));
                exit();
            }else{
                echo json_encode(array('success' => 0, 'error_title' => "Order Error", 'error_message' => "Unable to process order."));
            }
        }
    }else{
        echo json_encode(array('success' => 0, 'error_title' => "Order Error", 'error_message' => "Unable to process order."));
        exit();
    }
?>