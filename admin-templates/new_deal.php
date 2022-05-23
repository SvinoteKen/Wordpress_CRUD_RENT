<?php
if(isset($_REQUEST['entryid']) && $_REQUEST['entryid']!='') {
    global $wpdb;
    $data = $wpdb->get_row( "SELECT * FROM `deal` WHERE id = '".$_REQUEST['entryid']."'" );
?>
  <div class="wrap wqmain_body">
    <h3 class="wqpage_heading">Edit Deal</h3>
    <div class="wqform_body">
      <form name="update_deal_form" id="update_deal_form">
        <input type="hidden" name="wqentryid" id="wqentryid" value="<?=$_REQUEST['entryid']?>" />
        <div class="wqlabel">Landlord</div>
        <div class="wqfield">
            <input type="text" class="wqtextfield" name="wqlandlord_id" id="wqlandlord_id" placeholder="Enter Landlord Id" value="<?=$data->landlord_id?>" />
        </div>
        <div id="wqlandlord_id_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Tenat</div>
        <div class="wqfield">
            <input type="text" class="wqtextfield" name="wqtenat_id" id="wqtenat_id" placeholder="Enter Tenat Id" value="<?=$data->tenant_id?>" />
        </div>
        <div id="wqtenat_id_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Price</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqprice" id="wqprice" placeholder="Enter Price" value="<?=$data->price?>" />
        </div>
        <div id="wqprice_message" class="wqmessage"></div>

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
  <h3 class="wqpage_heading">New Deal</h3>
  <div class="wqform_body">
    <form name="entry_deal_form" id="entry_deal_form">

        <div class="wqlabel">Landlord</div>
        <div class="wqfield">
            <input type="text" class="wqtextfield" name="wqlandlord_id" id="wqlandlord_id" placeholder="Enter Landlord Id" value="" />
        </div>
        <div id="wqlandlord_id_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Tenat</div>
        <div class="wqfield">
            <input type="text" class="wqtextfield" name="wqtenat_id" id="wqtenat_id" placeholder="Enter Tenat Id" value="" />
        </div>
        <div id="wqtenat_id_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Price</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqprice" id="wqprice" placeholder="Enter Price" value="" />
        </div>
        <div id="wqprice_message" class="wqmessage"></div>

        <div>&nbsp;</div>

      <div><input type="submit" class="wqsubmit_button" id="wqadd" value="Add" /></div>
      <div>&nbsp;</div>
      <div class="wqsubmit_message"></div>

    </form>
  </div>
</div>
<?php } ?>