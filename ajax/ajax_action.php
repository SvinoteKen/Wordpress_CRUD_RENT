<?php
add_action('wp_ajax_wqnew_landlord', 'wqnew_landlord_callback_function');
add_action('wp_ajax_nopriv_wqnew_landlord', 'wqnew_landlord_callback_function');

function wqnew_landlord_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `landlord` WHERE `full_name` = '".$_POST['wqfull_name']."' AND `phone` = '".$_POST['wqphone']."' AND `email` = '".$_POST['wqemail']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->insert("landlord", array(
      "full_name" => $_POST['wqfull_name'],
      "phone" => $_POST['wqphone'],
      "email" => $_POST['wqemail'],
      "created_at" => time(),
      "updated_at" => time()
    ));

    $response = array('message'=>'Data Has Inserted Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}



add_action('wp_ajax_wqedit_landlord', 'wqedit_landlord_callback_function');
add_action('wp_ajax_nopriv_wqedit_landlord', 'wqedit_landlord_callback_function');

function wqedit_landlord_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `landlord` WHERE `full_name` = '".$_POST['wqfull_name']."' AND `phone` = '".$_POST['wqphone']."' AND `email` = '".$_POST['wqemail']."' AND `id`!='".$_POST['wqentryid']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->update("landlord", array(
      "full_name" => $_POST['wqfull_name'],
      "phone" => $_POST['wqphone'],
      "email" => $_POST['wqemail'],
      "updated_at" => time()
    ), array('id' => $_POST['wqentryid']) );

    $response = array('message'=>'Data Has Updated Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}

add_action('wp_ajax_wqnew_tenant', 'wqnew_tenant_callback_function');
add_action('wp_ajax_nopriv_wqnew_tenant', 'wqnew_tenant_callback_function');

function wqnew_tenant_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `tenant` WHERE `full_name` = '".$_POST['wqfull_name']."' AND `phone` = '".$_POST['wqphone']."' AND `email` = '".$_POST['wqemail']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->insert("tenant", array(
      "full_name" => $_POST['wqfull_name'],
      "phone" => $_POST['wqphone'],
      "email" => $_POST['wqemail'],
      "created_at" => time(),
      "updated_at" => time()
    ));

    $response = array('message'=>'Data Has Inserted Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}



add_action('wp_ajax_wqedit_tenant', 'wqedit_tenant_callback_function');
add_action('wp_ajax_nopriv_wqedit_tenant', 'wqedit_tenant_callback_function');

function wqedit_tenant_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `tenant` WHERE `full_name` = '".$_POST['wqfull_name']."' AND `phone` = '".$_POST['wqphone']."' AND `email` = '".$_POST['wqemail']."' AND `id`!='".$_POST['wqentryid']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->update("tenant", array(
      "full_name" => $_POST['wqfull_name'],
      "phone" => $_POST['wqphone'],
      "email" => $_POST['wqemail'],
      "updated_at" => time()
    ), array('id' => $_POST['wqentryid']) );

    $response = array('message'=>'Data Has Updated Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}

add_action('wp_ajax_wqnew_apartment', 'wqnew_apartment_callback_function');
add_action('wp_ajax_nopriv_wqnew_apartment', 'wqnew_apartment_callback_function');

function wqnew_apartment_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `apartment` WHERE `address` = '".$_POST['wqaddress']."' AND `square` = '".$_POST['wqsquare']."' AND `price` = '".$_POST['wqprice']."'  AND `number_of_rooms` = '".$_POST['wqnumber_of_rooms']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->insert("apartment", array(
      "address" => $_POST['wqaddress'],
      "square" => $_POST['wqsquare'],
      "price" => $_POST['wqprice'],
      "number_of_rooms" => $_POST['wqnumber_of_rooms'],
      "created_at" => time(),
      "updated_at" => time()
    ));

    $response = array('message'=>'Data Has Inserted Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}



add_action('wp_ajax_wqedit_apartment', 'wqedit_apartment_callback_function');
add_action('wp_ajax_nopriv_wqedit_apartment', 'wqedit_apartment_callback_function');

function wqedit_apartment_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `apartment` WHERE `address` = '".$_POST['wqaddress']."' AND `square` = '".$_POST['wqsquare']."' AND `price` = '".$_POST['wqprice']."'  AND `number_of_rooms` = '".$_POST['wqnumber_of_rooms']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->update("apartment", array(
      "address" => $_POST['wqaddress'],
      "square" => $_POST['wqsquare'],
      "price" => $_POST['wqprice'],
      "number_of_rooms" => $_POST['wqnumber_of_rooms'],
      "updated_at" => time()
    ), array('id' => $_POST['wqentryid']) );

    $response = array('message'=>'Data Has Updated Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}

add_action('wp_ajax_wqnew_deal', 'wqnew_deal_callback_function');
add_action('wp_ajax_nopriv_wqnew_deal', 'wqnew_deal_callback_function');

function wqnew_deal_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `deal` WHERE `landlord_id` = '".$_POST['wqlandlord_id']."' AND `tenant_id` = '".$_POST['wqtenat_id']."' AND `price` = '".$_POST['wqprice']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->insert("deal", array(
      "landlord_id" => $_POST['wqlandlord_id'],
      "tenant_id" => $_POST['wqtenat_id'],
      "price" => $_POST['wqprice'],
      "created_at" => time(),
      "updated_at" => time()
    ));

    $response = array('message'=>'Data Has Inserted Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}



add_action('wp_ajax_wqedit_deal', 'wqedit_deal_callback_function');
add_action('wp_ajax_nopriv_wqedit_deal', 'wqedit_deal_callback_function');

function wqedit_deal_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `deal` WHERE `landlord_id` = '".$_POST['wqlandlord_id']."' AND `tenant_id` = '".$_POST['wqtenat_id']."' AND `price` = '".$_POST['wqprice']."' AND `id`!='".$_POST['wqentryid']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->update("deal", array(
      "landlord_id" => $_POST['wqlandlord_id'],
      "tenant_id" => $_POST['wqtenat_id'],
      "price" => $_POST['wqprice'],
      "updated_at" => time()
    ), array('id' => $_POST['wqentryid']) );

    $response = array('message'=>'Data Has Updated Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}