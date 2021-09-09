<?php
    if(
            (isset($_POST['form_id']) && $_POST['form_id'] != '') 
        ){
            $form_id =    $_POST['form_id'];
            $user_id =    $_POST['form_id'];
            //$this->db->where('user_name', $user_name);
            //$this->db->where('user_id !=', $user_id);
            $curl = curl_init();
            $api_url = 'https://bigcloud.work/api/category/read_form.php?';
            curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url.'form_id='.$form_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
        
            echo $response = curl_exec($curl);
            //echo json_encode($response);
            curl_close($curl);
            //$reponse_arr = json_decode($response, true);
            //echo '<pre>'; print_r($reponse_arr );echo '</pre>';
            //$this->db->from('users');
            //$query = $this->db->get();
            /*if ($query->num_rows() > 0) {
                echo json_encode(array('result'=>'true'));
            }else{
                echo json_encode(array('result'=>'false'));
            }*/
        }
        exit;
