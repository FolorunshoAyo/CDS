<?php
    require(dirname(dirname(dirname(__DIR__))) . '/auth-library/resources.php');
     
    if(isset($_POST['submit'])){
        $aid = $_SESSION['agent_id'];
        $wid = $db->real_escape_string($_POST['wid']);
        $daily_payment = $db->real_escape_string($_POST['daily_payment']);
        $days = $db->real_escape_string($_POST['days']);
        $pwd = $db->real_escape_string($_POST['pwd']);

        if(empty($wid) || empty($amount) || empty($pwd)){
            echo json_encode(array('success' => 0, 'error_title' => "Update Wallet", 'error_msg' => 'One or more fields are empty'));
        }else{
            $sql_agent_details = $db->query("SELECT passkey FROM agents WHERE agent_id='$aid'");

            $agent_passcode = $sql_agent_details->fetch_assoc()['passkey'];

            if(password_verify($pwd, $agent_passcode)){
                $sql_wallet_details = $db->query("SELECT total_amount FROM agent_wallets WHERE wallet_id='$wid'");
                
                $total_amount = intval($sql_wallet_details->fetch_assoc()['total_amount']);

                $balance = $total_amount + (intval($days) * intval($daily_payment));

                $sql_update_wallet = $db->query("UPDATE agent_wallets SET total_amount='$balance' WHERE wallet_id='$wid'");

                if($sql_update_wallet){
                    echo json_encode(array('success' => 1));
                }
            }else{
                echo json_encode(array('success' => 0, 'error_title' => "Update Wallet", 'error_msg' => 'Password is incorrect, please try again.'));
            }
        }
    }else{
        echo json_encode(array('success' => 0, 'error_title' => 'Fatal', 'error_msg' => 'Unable to fetch wallet detailss'));
    }
?>