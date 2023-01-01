<?php
    require(dirname(dirname(dirname(dirname(__DIR__)))) . '/auth-library/resources.php');
     
    if(isset($_POST['submit'])){
        $aid = $_SESSION['agent_id'];
        $wid = $db->real_escape_string($_POST['wid']);
        $daily_payment = $db->real_escape_string($_POST['daily_payment']);
        $days = $db->real_escape_string($_POST['days']);
        $pwd = $db->real_escape_string($_POST['pwd']);

        if(empty($wid) || empty($daily_payment) || empty($days) || empty($pwd)){
            echo json_encode(array('success' => 0, 'error_title' => "Update Wallet", 'error_msg' => 'One or more fields are empty'));
        }else{
            $sql_agent_details = $db->query("SELECT passkey FROM agents WHERE agent_id='$aid'");

            $agent_passcode = $sql_agent_details->fetch_assoc()['passkey'];

            if(password_verify($pwd, $agent_passcode)){
                // CHECKING THE DATABASE FOR ANY UPFRONT PAYMENTS
                $today = date("Y-m-d"); //YYYY-MM-DD
                $calculated_amount = intval($days) * intval($daily_payment);

                $sql_check_for_existing_savings = $db->query("SELECT * FROM easybuy_agent_savings WHERE start_date = '$today' OR end_date = '$today'");

                if($sql_check_for_existing_savings->num_rows > 0){
                    $sql_check_latest_savings = $db->query("SELECT * FROM easybuy_agent_savings WHERE wallet_id = '$wid' ORDER BY savings_id DESC LIMIT 1");

                    $last_savings_date = $sql_check_latest_savings->fetch_assoc()['end_date'];

                    $new_savings_start = date('Y-m-d', strtotime($last_savings_date . " + 1 days"));
                    $new_savings_end = date('Y-m-d', strtotime($new_savings_start . " + " . ($days - 1) . " days"));

                    //INSERT MORE PAYMENTS
                    $sql_insert_savings = $db->query("INSERT INTO easybuy_agent_savings (wallet_id, amount, savings_days, start_date, end_date) VALUES ('$wid', '$calculated_amount', '$days', '$new_savings_start', '$new_savings_end')");

                }else{
                    $new_savings_end = date("Y-m-d", strtotime($today . " + " . ($days - 1) . " days"));
                    // IF THERE ARE NO UPFRONT PAYMENT
                    $sql_insert_savings = $db->query("INSERT INTO easybuy_agent_savings (wallet_id, amount, savings_days, start_date, end_date) VALUES ('$wid', '$calculated_amount', '$days', '$today', '$new_savings_end')");
                }


                if($sql_insert_savings){
                    $sql_wallet_details = $db->query("SELECT total_amount FROM easybuy_agent_wallets WHERE wallet_id='$wid'");
                
                    $total_amount = intval($sql_wallet_details->fetch_assoc()['total_amount']);

                    $balance = $total_amount + $calculated_amount;

                    $sql_update_wallet = $db->query("UPDATE easybuy_agent_wallets SET total_amount='$balance' WHERE wallet_id='$wid'");

                    if($sql_update_wallet){

                        $sql_check_for_completed = $db->query("SELECT * FROM easybuy_agent_wallets WHERE wallet_id='$wid'");
                        $wallet_details = $sql_check_for_completed->fetch_assoc();
                        $total_amount = intval($wallet_details['total_amount']);
                        $product_id = $wallet_details['product_id'];

                        $sql_get_product_price = $db->query("SELECT price FROM products WHERE product_id='$product_id'");
                        $product_price = intval($sql_get_product_price->fetch_assoc()['price']);

                        if($product_price === $total_amount){
                            $update_wallet_status = $db->query("UPDATE easybuy_agent_wallets SET completed='1' WHERE wallet_id='$wid'");

                            if($update_wallet_status){
                                echo json_encode(array('success' => 1));
                                exit();
                            }
                        }

                        echo json_encode(array('success' => 1));
                    }
                }
            }else{
                echo json_encode(array('success' => 0, 'error_title' => "Update Wallet", 'error_msg' => 'Password is incorrect, please try again.'));
            }
        }
    }else{
        echo json_encode(array('success' => 0, 'error_title' => 'Fatal', 'error_msg' => 'Unable to fetch wallet detailss'));
    }
?>