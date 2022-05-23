<?php
/*
Plugin Name: CRUD Application
Plugin URI: https://github.com/SvinoteKen/Wordpress_CRUD_RENT.git
Description: A Plugin For WordPress CRUD
Author: Podluzhny Stanislav
Author URI: https://github.com/SvinoteKen
Version: 1.0.0
*/

global $wpdb;
define('CRUD_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('CRUD_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

register_activation_hook( __FILE__, 'activate_crud_plugin_function' );
register_deactivation_hook( __FILE__, 'deactivate_crud_plugin_function' );

function activate_crud_plugin_function() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name1 = 'landlord';
  $table_name2 = 'tenant';
  $table_name3 = 'apartment';
  $table_name4 = 'deal';

  $sql = "CREATE TABLE $table_name1 (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `full_name` varchar(255),
    `phone` varchar(255),
    `email` varchar(255),
    `created_at` varchar(255),
    `updated_at` varchar(255),
    PRIMARY KEY  (id)
  ) $charset_collate;";
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  $sql = "CREATE TABLE $table_name2 (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `full_name` varchar(255),
    `phone` varchar(255),
    `email` varchar(255),
    `created_at` varchar(255),
    `updated_at` varchar(255),
    PRIMARY KEY  (id)
  ) $charset_collate;";
  dbDelta( $sql );

  $sql = "CREATE TABLE $table_name3 (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `address` varchar(255),
    `square` varchar(255),
    `price` int,
    `number_of_rooms` int,
    `created_at` varchar(255),
    `updated_at` varchar(255),
    PRIMARY KEY  (id)
  ) $charset_collate;";
  dbDelta( $sql );

  $sql = "CREATE TABLE $table_name4 (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `landlord_id` int unsigned,
    `tenant_id` int unsigned,
    `price` int,
    `created_at` varchar(255),
    `updated_at` varchar(255),
    PRIMARY KEY  (id),
    FOREIGN KEY (tenant_id) REFERENCES $table_name2(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (landlord_id) REFERENCES $table_name1(id) ON DELETE RESTRICT ON UPDATE RESTRICT
  ) $charset_collate;";
  dbDelta( $sql );

  $wpdb->insert("landlord", array(
    "full_name" => 'Михальченкова Римма Васильевна',
    "phone" => '+7 (940) 797-55-43',
    "email" => 'rimma5027@gmail.com',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("landlord", array(
    "full_name" => 'Ткачёва Лана Захаровна',
    "phone" => '+7 (949) 790-44-97',
    "email" => 'vera.tyutcheva@hotmail.com',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("landlord", array(
    "full_name" => 'Грабарь Николай Нифонтович',
    "phone" => '+7 (949) 332-20-55',
    "email" => 'nikolay1989@gmail.com',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("tenant", array(
    "full_name" => 'Карантирова Ярослава Степановна',
    "phone" => '+7 (994) 789-87-37',
    "email" => 'yaroslava39@ya.ru',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("tenant", array(
    "full_name" => 'Тихоненко Ирина Арсеньевна',
    "phone" => '+7 (934) 379-33-84',
    "email" => 'irina02071968@yandex.ru',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("tenant", array(
    "full_name" => 'Кузубова Клавдия Игнатьевна',
    "phone" => '+7 (936) 313-42-82',
    "email" => 'klavdiya1996@mail.ru',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("apartment", array(
    "address" => '256700, Магаданская область, город Пушкино, наб. Домодедовская, 97',
    "square" => '200',
    "price" => '50000',
    "number_of_rooms" => '4',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("apartment", array(
    "address" => '352856, Московская область, город Озёры, пер. Косиора, 78',
    "square" => '100',
    "price" => '30000',
    "number_of_rooms" => '3',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("apartment", array(
    "address" => '080930, Ярославская область, город Озёры, ул. Домодедовская, 25',
    "square" => '120',
    "price" => '35000',
    "number_of_rooms" => '3',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("deal", array(
    "landlord_id" => '2',
    "tenant_id" => '3',
    "price" => '45000',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("deal", array(
    "landlord_id" => '2',
    "tenant_id" => '1',
    "price" => '40000',
    "created_at" => time(),
    "updated_at" => time()
  ));
  $wpdb->insert("deal", array(
    "landlord_id" => '1',
    "tenant_id" => '2',
    "price" => '70000',
    "created_at" => time(),
    "updated_at" => time()
  ));
  //ПОЧЕМУ ЭТО НЕ РАБОТАЕТ!!!!!!!!!!!!!!!!!!!!!!!!
  $wpdb->query("INSERT INTO $table_name1
            (full_name, phone, email, created_at, updated_at)
            VALUES
            ('Михальченкова Римма Васильевна', '+7 (940) 797-55-43', 'rimma5027@gmail.com', current_time('mysql'), current_time('mysql')),
            ('Ткачёва Лана Захаровна', '+7 (949) 790-44-97', 'vera.tyutcheva@hotmail.com', current_time('mysql'), current_time('mysql')),
            ('Грабарь Николай Нифонтович', '+7 (949) 332-20-55', 'nikolay1989@gmail.com', current_time('mysql'), current_time('mysql'))");
}

function deactivate_crud_plugin_function() {
  global $wpdb;
  $table_name1 = 'landlord';
  $table_name2 = 'tenant';
  $table_name3 = 'apartment';
  $table_name4 = 'deal';
  $sql = "DROP TABLE IF EXISTS $table_name4";
  $wpdb->query($sql);
  $sql = "DROP TABLE IF EXISTS $table_name1";
  $wpdb->query($sql);
  $sql = "DROP TABLE IF EXISTS $table_name2";
  $wpdb->query($sql);
  $sql = "DROP TABLE IF EXISTS $table_name3";
  $wpdb->query($sql);
}

function load_custom_css_js() {
  wp_register_style( 'my_custom_css', CRUD_PLUGIN_URL.'/css/style.css', false, '1.0.0' );
  wp_enqueue_style( 'my_custom_css' );
  wp_enqueue_script( 'my_custom_script1', CRUD_PLUGIN_URL. '/js/custom.js' );
  wp_enqueue_script( 'my_custom_script2', CRUD_PLUGIN_URL. '/js/jQuery.min.js' );
  wp_localize_script( 'my_custom_script1', 'ajax_var', array( 'ajaxurl' => admin_url('admin-ajax.php') ));
}
add_action( 'admin_enqueue_scripts', 'load_custom_css_js' );

require_once(CRUD_PLUGIN_PATH.'/ajax/ajax_action.php');

add_action('admin_menu', 'my_menu_pages');
function my_menu_pages(){
    add_menu_page('CRUD', 'CRUD', 'manage_options', 'new-entry', 'my_menu_output1' );
    add_submenu_page('new-entry', 'CRUD Application', 'New Landlord', 'manage_options', 'new-landlord', 'my_menu_output1' );
    add_submenu_page('new-entry', 'CRUD Application', 'View Landlord', 'manage_options', 'view-landlords', 'my_submenu_output1' );
    add_submenu_page('new-entry', 'CRUD Application', 'New Tenant', 'manage_options', 'new-tenant', 'my_menu_output2' );
    add_submenu_page('new-entry', 'CRUD Application', 'View Tenant', 'manage_options', 'view-tenants', 'my_submenu_output2' );
    add_submenu_page('new-entry', 'CRUD Application', 'New Apartment', 'manage_options', 'new-apartment', 'my_menu_output3' );
    add_submenu_page('new-entry', 'CRUD Application', 'View Apartment', 'manage_options', 'view-apartments', 'my_submenu_output3' );
    add_submenu_page('new-entry', 'CRUD Application', 'New Deal', 'manage_options', 'new-deal', 'my_menu_output4' );
    add_submenu_page('new-entry', 'CRUD Application', 'View Deal', 'manage_options', 'view-deals', 'my_submenu_output4' );
}

function my_menu_output1() {
  require_once(CRUD_PLUGIN_PATH.'/admin-templates/new_landlord.php');
}
function my_menu_output2() {
  require_once(CRUD_PLUGIN_PATH.'/admin-templates/new_tenant.php');
}
function my_menu_output3() {
  require_once(CRUD_PLUGIN_PATH.'/admin-templates/new_apartment.php');
}
function my_menu_output4() {
  require_once(CRUD_PLUGIN_PATH.'/admin-templates/new_deal.php');
}

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class LandlordListTable extends WP_List_Table {

  function __construct() {
    global $status, $page;
    parent::__construct(array(
      'singular' => 'Entry Data',
      'plural' => 'Entry Datas',
    ));
  }

  function column_default($item, $column_name) {
      switch($column_name){
        case 'action': echo '<a href="'.admin_url('admin.php?page=new-landlord&entryid='.$item['id']).'">Edit</a>';
      }
      return $item[$column_name];
  }

  function column_feedback_name($item) {
    $actions = array( 'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id']) );
    return sprintf('%s %s', $item['id'], $this->row_actions($actions) );
  }

  function column_cb($item) {
    return sprintf( '<input type="checkbox" name="id[]" value="%s" />', $item['id'] );
  }

  function get_columns() {
    $columns = array(
      'cb' => '<input type="checkbox" />',
      'full_name'=> 'Full Name',
      'phone'=> 'Phone',
      'email'=> 'Email',
      'action' => 'Action'
    );
    return $columns;
  }

  function get_sortable_columns() {
    $sortable_columns = array(
      'full_name' => array('full_name', true)
    );
    return $sortable_columns;
  }

  function get_bulk_actions() {
    $actions = array( 'delete' => 'Delete' );
    return $actions;
  }

  function process_bulk_action() {
    global $wpdb;
    $table_name = "landlord";
      if ('delete' === $this->current_action()) {
          $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
          if (is_array($ids)) $ids = implode(',', $ids);
          if (!empty($ids)) {
              $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
          }
      }
  }

  function prepare_items() {
    global $wpdb,$current_user;

    $table_name = "landlord";
    $per_page = 10;
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->process_bulk_action();
    $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

    $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;
    $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
    $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

    if(isset($_REQUEST['s']) && $_REQUEST['s']!='') {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE `full_name` LIKE '%".$_REQUEST['s']."%' OR `phone` LIKE '%".$_REQUEST['s']."%' OR `email` LIKE '%".$_REQUEST['s']."%' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    } else {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    }

    $this->set_pagination_args(array(
      'total_items' => $total_items,
      'per_page' => $per_page,
      'total_pages' => ceil($total_items / $per_page)
    ));
  }
}
class TenantListTable extends WP_List_Table {

  function __construct() {
    global $status, $page;
    parent::__construct(array(
      'singular' => 'Entry Data',
      'plural' => 'Entry Datas',
    ));
  }

  function column_default($item, $column_name) {
      switch($column_name){
        case 'action': echo '<a href="'.admin_url('admin.php?page=new-tenant&entryid='.$item['id']).'">Edit</a>';
      }
      return $item[$column_name];
  }

  function column_feedback_name($item) {
    $actions = array( 'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id']) );
    return sprintf('%s %s', $item['id'], $this->row_actions($actions) );
  }

  function column_cb($item) {
    return sprintf( '<input type="checkbox" name="id[]" value="%s" />', $item['id'] );
  }

  function get_columns() {
    $columns = array(
      'cb' => '<input type="checkbox" />',
      'full_name'=> 'Full Name',
        'phone'=> 'Phone',
        'email'=> 'Email',
      'action' => 'Action'
    );
    return $columns;
  }

  function get_sortable_columns() {
    $sortable_columns = array(
      'full_name' => array('full_name', true)
    );
    return $sortable_columns;
  }

  function get_bulk_actions() {
    $actions = array( 'delete' => 'Delete' );
    return $actions;
  }

  function process_bulk_action() {
    global $wpdb;
    $table_name = "tenant";
      if ('delete' === $this->current_action()) {
          $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
          if (is_array($ids)) $ids = implode(',', $ids);
          if (!empty($ids)) {
              $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
          }
      }
  }

  function prepare_items() {
    global $wpdb,$current_user;

    $table_name = "tenant";
    $per_page = 10;
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->process_bulk_action();
    $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

    $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;
    $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
    $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

    if(isset($_REQUEST['s']) && $_REQUEST['s']!='') {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE `full_name` LIKE '%".$_REQUEST['s']."%' OR `phone` LIKE '%".$_REQUEST['s']."%'  OR `email` LIKE '%".$_REQUEST['s']."%' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    } else {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    }

    $this->set_pagination_args(array(
      'total_items' => $total_items,
      'per_page' => $per_page,
      'total_pages' => ceil($total_items / $per_page)
    ));
  }
}
class ApartmentListTable extends WP_List_Table {

  function __construct() {
    global $status, $page;
    parent::__construct(array(
      'singular' => 'Entry Data',
      'plural' => 'Entry Datas',
    ));
  }

  function column_default($item, $column_name) {
      switch($column_name){
        case 'action': echo '<a href="'.admin_url('admin.php?page=new-apartment&entryid='.$item['id']).'">Edit</a>';
      }
      return $item[$column_name];
  }

  function column_feedback_name($item) {
    $actions = array( 'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id']) );
    return sprintf('%s %s', $item['id'], $this->row_actions($actions) );
  }

  function column_cb($item) {
    return sprintf( '<input type="checkbox" name="id[]" value="%s" />', $item['id'] );
  }

  function get_columns() {
    $columns = array(
      'cb' => '<input type="checkbox" />',
      'address'=> 'Address',
      'square'=> 'Square',
      'price'=> 'Price',
      'number_of_rooms'=> 'Number of rooms',
      'action' => 'Action'
    );
    return $columns;
  }

  function get_sortable_columns() {
    $sortable_columns = array(
      'price' => array('price', true),
      'number_of_rooms' => array('number_of_rooms', true)
    );
    return $sortable_columns;
  }

  function get_bulk_actions() {
    $actions = array( 'delete' => 'Delete' );
    return $actions;
  }

  function process_bulk_action() {
    global $wpdb;
    $table_name = "apartment";
      if ('delete' === $this->current_action()) {
          $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
          if (is_array($ids)) $ids = implode(',', $ids);
          if (!empty($ids)) {
              $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
          }
      }
  }

  function prepare_items() {
    global $wpdb,$current_user;

    $table_name = "apartment";
    $per_page = 10;
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->process_bulk_action();
    $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

    $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;
    $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
    $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

    if(isset($_REQUEST['s']) && $_REQUEST['s']!='') {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE `address` LIKE '%".$_REQUEST['s']."%' OR `square` LIKE '%".$_REQUEST['s']."%' OR `price` LIKE '%".$_REQUEST['s']."%' OR `number_of_rooms` LIKE '%".$_REQUEST['s']."%' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    } else {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    }

    $this->set_pagination_args(array(
      'total_items' => $total_items,
      'per_page' => $per_page,
      'total_pages' => ceil($total_items / $per_page)
    ));
  }
}
class DealListTable extends WP_List_Table {

  function __construct() {
    global $status, $page;
    parent::__construct(array(
      'singular' => 'Entry Data',
      'plural' => 'Entry Datas',
    ));
  }

  function column_default($item, $column_name) {
      switch($column_name){
        case 'action': echo '<a href="'.admin_url('admin.php?page=new-deal&entryid='.$item['id']).'">Edit</a>';
      }
      return $item[$column_name];
  }

  function column_feedback_name($item) {
    $actions = array( 'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id']) );
    return sprintf('%s %s', $item['id'], $this->row_actions($actions) );
  }

  function column_cb($item) {
    return sprintf( '<input type="checkbox" name="id[]" value="%s" />', $item['id'] );
  }

  function get_columns() {
    $columns = array(
      'cb' => '<input type="checkbox" />',
      'landlord_id'=> 'Landlord',
      'tenant_id'=> 'Tenant',
      'price'=> 'Price',
      'action' => 'Action'
    );
    return $columns;
  }

  function get_sortable_columns() {
    $sortable_columns = array(
      'landlord_id' => array('landlord_id', true),
      'tenant_id' => array('tenant_id', true)
    );
    return $sortable_columns;
  }

  function get_bulk_actions() {
    $actions = array( 'delete' => 'Delete' );
    return $actions;
  }

  function process_bulk_action() {
    global $wpdb;
    $table_name = "deal";
      if ('delete' === $this->current_action()) {
          $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
          if (is_array($ids)) $ids = implode(',', $ids);
          if (!empty($ids)) {
              $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
          }
      }
  }

  function prepare_items() {
    global $wpdb,$current_user;

    $table_name = "deal";
    $per_page = 10;
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->process_bulk_action();
    $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

    $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;
    $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
    $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

    if(isset($_REQUEST['s']) && $_REQUEST['s']!='') {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE `title` LIKE '%".$_REQUEST['s']."%' OR `description` LIKE '%".$_REQUEST['s']."%' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    } else {
      $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged * $per_page), ARRAY_A);
    }

    $this->set_pagination_args(array(
      'total_items' => $total_items,
      'per_page' => $per_page,
      'total_pages' => ceil($total_items / $per_page)
    ));
  }
}

function my_submenu_output1() {
  global $wpdb;
  $table = new LandlordListTable();
  $table->prepare_items();
  $message = '';
  if ('delete' === $table->current_action()) {
    $message = '<div class="div_message" id="message"><p>' . sprintf('Items deleted: %d', count($_REQUEST['id'])) . '</p></div>';
  }
  ob_start();
  ?>
    <div class="wrap wqmain_body">
      <h3>View LandLords</h3>
      <?php echo $message; ?>
      <form id="entry-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->search_box( 'search', 'search_id' ); $table->display() ?>
      </form>
    </div>
  <?php
    $wq_msg = ob_get_clean();
    echo $wq_msg;
}
function my_submenu_output2() {
  global $wpdb;
  $table = new TenantListTable();
  $table->prepare_items();
  $message = '';
  if ('delete' === $table->current_action()) {
    $message = '<div class="div_message" id="message"><p>' . sprintf('Items deleted: %d', count($_REQUEST['id'])) . '</p></div>';
  }
  ob_start();
  ?>
    <div class="wrap wqmain_body">
      <h3>View Tenants</h3>
      <?php echo $message; ?>
      <form id="entry-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->search_box( 'search', 'search_id' ); $table->display() ?>
      </form>
    </div>
  <?php
    $wq_msg = ob_get_clean();
    echo $wq_msg;
}
function my_submenu_output3() {
  global $wpdb;
  $table = new ApartmentListTable();
  $table->prepare_items();
  $message = '';
  if ('delete' === $table->current_action()) {
    $message = '<div class="div_message" id="message"><p>' . sprintf('Items deleted: %d', count($_REQUEST['id'])) . '</p></div>';
  }
  ob_start();
  ?>
    <div class="wrap wqmain_body">
      <h3>View Apartment</h3>
      <?php echo $message; ?>
      <form id="entry-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->search_box( 'search', 'search_id' ); $table->display() ?>
      </form>
    </div>
  <?php
    $wq_msg = ob_get_clean();
    echo $wq_msg;
}
function my_submenu_output4() {
  global $wpdb;
  $table = new DealListTable();
  $table->prepare_items();
  $message = '';
  if ('delete' === $table->current_action()) {
    $message = '<div class="div_message" id="message"><p>' . sprintf('Items deleted: %d', count($_REQUEST['id'])) . '</p></div>';
  }
  ob_start();
?>
  <div class="wrap wqmain_body">
    <h3>View Deals</h3>
    <?php echo $message; ?>
    <form id="entry-table" method="GET">
      <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
      <?php $table->search_box( 'search', 'search_id' ); $table->display() ?>
    </form>
  </div>
<?php
  $wq_msg = ob_get_clean();
  echo $wq_msg;
}
