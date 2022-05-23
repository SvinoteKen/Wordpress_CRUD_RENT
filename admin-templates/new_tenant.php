<?php
if(isset($_REQUEST['entryid']) && $_REQUEST['entryid']!='') {
  global $wpdb;
  $data = $wpdb->get_row( "SELECT * FROM `tenant` WHERE id = '".$_REQUEST['entryid']."'" );
?>
  <div class="wrap wqmain_body">
    <h3 class="wqpage_heading">Edit Tenant</h3>
    <div class="wqform_body">
      <form name="update_tenant_form" id="update_tenant_form">
        <input type="hidden" name="wqentryid" id="wqentryid" value="<?=$_REQUEST['entryid']?>" />
        <div class="wqlabel">Full Name</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqfull_name" id="wqfull_name" placeholder="Enter Full Name" value="<?=$data->full_name?>" />
        </div>
        <div id="wqfull_name_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Phone</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqphone" id="wqphone" placeholder="Enter Phone" value="<?=$data->phone?>" />
        </div>
        <div id="wqphone_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Email</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqemail" id="wqemail" placeholder="Enter Email" value="<?=$data->email?>" />
        </div>
        <div id="wqemail_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div><input type="submit" class="wqsubmit_button" id="wqedit" value="Edit" /></div>
        <div>&nbsp;</div>
        <div class="wqsubmit_message"></div>

      </form>
    </div>
  </div>
<?php
} else {
?>
<div class="wrap wqmain_body">
  <h3 class="wqpage_heading">New Tenant</h3>
  <div class="wqform_body">
    <form name="entry_tenant_form" id="entry_tenant_form">

      <div class="wqlabel">Full Name</div>
      <div class="wqfield">
        <input type="text" class="wqtextfield" name="wqphone" id="wqphone" placeholder="Enter Full Name" value="" />
      </div>
      <div id="wqfull_name_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div class="wqlabel">Phone</div>
      <div class="wqfield">
        <input type="text" class="wqtextfield" name="wqfull_name" id="wqfull_name" placeholder="Enter Phone" value="" />
      </div>
      <div id="wqphone_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div class="wqlabel">Email</div>
      <div class="wqfield">
        <input type="text" class="wqtextfield" name="wqemail" id="wqemail" placeholder="Enter Email" value="" />
      </div>
      <div id="wqemail_message" class="wqmessage"></div>

      <div>&nbsp;</div>

      <div><input type="submit" class="wqsubmit_button" id="wqadd" value="Add" /></div>
      <div>&nbsp;</div>
      <div class="wqsubmit_message"></div>

    </form>
  </div>
</div>
<?php } ?>