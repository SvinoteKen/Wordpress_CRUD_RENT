jQuery(document).ready(function(){

  $(document).on('submit','#entry_landlord_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqfull_name = $('#wqfull_name').val();
    var wqphone = $('#wqphone').val();
    var wqemail = $('#wqemail').val();

    if(wqfull_name=='') {
      $('#wqfull_name_message').html('Full Name is Required');
    }
    if(wqphone=='') {
      $('#wqphone_message').html('Phone is Required');
    }
    if(wqemail=='') {
      $('#wqemail_message').html('Email is Required');
    }

    if(wqfull_name!='' && wqphone!='' && wqemail!='') {
      var fd = new FormData(this);
      var action = 'wqnew_landlord';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('#entry_landlord_form')[0].reset();
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#update_landlord_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqfull_name = $('#wqfull_name').val();
    var wqphone = $('#wqphone').val();
    var wqemail = $('#wqemail').val();

    if(wqfull_name=='') {
      $('#wqfull_name_message').html('Full Name is Required');
    }
    if(wqphone=='') {
      $('#wqphone_message').html('Phone is Required');
    }
    if(wqemail=='') {
      $('#wqemail_message').html('Email is Required');
    }

    if(wqfull_name!='' && wqphone!='' && wqemail!='') {
      var fd = new FormData(this);
      var action = 'wqedit_landlord';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });


  $(document).on('submit','#entry_tenant_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqfull_name = $('#wqfull_name').val();
    var wqphone = $('#wqphone').val();
    var wqemail = $('#wqemail').val();

    if(wqfull_name=='') {
      $('#wqfull_name_message').html('Full Name is Required');
    }
    if(wqphone=='') {
      $('#wqphone_message').html('Phone is Required');
    }
    if(wqemail=='') {
      $('#wqemail_message').html('Email is Required');
    }

    if(wqfull_name!='' && wqphone!='' && wqemail!='') {
      var fd = new FormData(this);
      var action = 'wqnew_tenant';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('#entry_tenant_form')[0].reset();
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#update_tenant_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqfull_name = $('#wqfull_name').val();
    var wqphone = $('#wqphone').val();
    var wqemail = $('#wqemail').val();

    if(wqfull_name=='') {
      $('#wqfull_name_message').html('Full Name is Required');
    }
    if(wqphone=='') {
      $('#wqphone_message').html('Phone is Required');
    }
    if(wqemail=='') {
      $('#wqemail_message').html('Email is Required');
    }

    if(wqfull_name!='' && wqphone!='' && wqemail!='') {
      var fd = new FormData(this);
      var action = 'wqedit_tenant';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#entry_apartment_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqaddress = $('#wqaddress').val();
    var wqsquare = $('#wqsquare').val();
    var wqprice = $('#wqprice').val();
    var wqnumber_of_rooms = $('#wqnumber_of_rooms').val();


    if(wqaddress=='') {
      $('#wqaddress_message').html('Address is Required');
    }
    if(wqsquare=='') {
      $('#wqsquare_message').html('Square is Required');
    }
    if(wqprice=='') {
      $('#wqprice_message').html('Price is Required');
    }
    if(wqnumber_of_rooms=='') {
      $('#wqnumber_of_rooms_message').html('Number of rooms is Required');
    }

    if(wqaddress!='' && wqsquare!='' && wqprice!='' && wqnumber_of_rooms!='') {
      var fd = new FormData(this);
      var action = 'wqnew_apartment';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('#entry_apartment_form')[0].reset();
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#update_apartment_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqaddress = $('#wqaddress').val();
    var wqsquare = $('#wqsquare').val();
    var wqprice = $('#wqprice').val();
    var wqnumber_of_rooms = $('#wqnumber_of_rooms').val();


    if(wqaddress=='') {
      $('#wqaddress_message').html('Address is Required');
    }
    if(wqsquare=='') {
      $('#wqsquare_message').html('Square is Required');
    }
    if(wqprice=='') {
      $('#wqprice_message').html('Price is Required');
    }
    if(wqnumber_of_rooms=='') {
      $('#wqnumber_of_rooms_message').html('Number of rooms is Required');
    }

    if(wqaddress!='' && wqsquare!='' && wqprice!='' && wqnumber_of_rooms!='') {
      var fd = new FormData(this);
      var action = 'wqedit_apartment';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#entry_deal_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqlandlord_id = $('#wqlandlord_id').val();
    var wqtenat_id = $('#wqtenat_id').val();
    var wqprice = $('#wqprice').val();
    
    if(wqlandlord_id=='') {
      $('#wqlandlord_id_message').html('Id is Required');
    }if(wqtenat_id=='') {
      $('#wqtenat_id_message').html('Id is Required');
    }
    if(wqprice=='') {
      $('#wqprice_message').html('Price is Required');
    }

    if(wqlandlord_id!='' && wqtenat_id!='' && wqprice!='') {
      var fd = new FormData(this);
      var action = 'wqnew_deal';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('#entry_deal_form')[0].reset();
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#update_deal_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var wqlandlord_id = $('#wqlandlord_id').val();
    var wqtenat_id = $('#wqtenat_id').val();
    var wqprice = $('#wqprice').val();
    
    if(wqlandlord_id=='') {
      $('#wqlandlord_id_message').html('Id is Required');
    }if(wqtenat_id=='') {
      $('#wqtenat_id_message').html('Id is Required');
    }
    if(wqprice=='') {
      $('#wqprice_message').html('Price is Required');
    }

    if(wqlandlord_id!='' && wqtenat_id!='' && wqprice!='') {
      var fd = new FormData(this);
      var action = 'wqedit_deal';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });
});
