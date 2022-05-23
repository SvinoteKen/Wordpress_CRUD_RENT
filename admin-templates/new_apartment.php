<?php
if(isset($_REQUEST['entryid']) && $_REQUEST['entryid']!='') {
  global $wpdb;
  $data = $wpdb->get_row( "SELECT * FROM `apartment` WHERE id = '".$_REQUEST['entryid']."'" );
?>
  <div class="wrap wqmain_body">
    <h3 class="wqpage_heading">Edit Apartment</h3>
    <div class="wqform_body">
      <form name="update_apartment_form" id="update_apartment_form">
        <input type="hidden" name="wqentryid" id="wqentryid" value="<?=$_REQUEST['entryid']?>" />
        <div class="wqlabel">Address</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqaddress" id="wqaddress" placeholder="Enter Address" value="<?=$data->address?>" />
        </div>
        <div id="wqaddress_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Square</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqsquare" id="wqsquare" placeholder="Enter Square" value="<?=$data->square?>" />
        </div>
        <div id="wqsquare_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Price</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqprice" id="wqprice" placeholder="Enter Price" value="<?=$data->price?>" />
        </div>
        <div id="wqprice_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Number of rooms</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqnumber_of_rooms" id="wqnumber_of_rooms" placeholder="Enter Number of rooms" value="<?=$data->number_of_rooms?>" />
        </div>
        <div id="wqnumber_of_rooms_message" class="wqmessage"></div>

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
  <h3 class="wqpage_heading">New Apartment</h3>
  <div class="wqform_body">
    <form name="entry_apartment_form" id="entry_apartment_form">

    <div class="wqlabel">Address</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqaddress" id="wqaddress" placeholder="Enter Address" value="" />
        </div>
        <div id="wqaddress_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Square</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqsquare" id="wqsquare" placeholder="Enter Square" value="" />
        </div>
        <div id="wqsquare_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Price</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqprice" id="wqprice" placeholder="Enter Price" value="" />
        </div>
        <div id="wqprice_message" class="wqmessage"></div>

        <div>&nbsp;</div>

        <div class="wqlabel">Number of rooms</div>
        <div class="wqfield">
          <input type="text" class="wqtextfield" name="wqnumber_of_rooms" id="wqnumber_of_rooms" placeholder="Enter Number of rooms" value="" />
        </div>
        <div id="wqnumber_of_rooms_message" class="wqmessage"></div>

        <div>&nbsp;</div>

      <div><input type="submit" class="wqsubmit_button" id="wqadd" value="Add" /></div>
      <div>&nbsp;</div>
      <div class="wqsubmit_message"></div>

    </form>
  </div>
</div>
<?php } ?>