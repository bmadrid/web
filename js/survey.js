  
function init() {

  $( '#submit' ).button();

  $( '#submit' ).click( function() {

    $( '#submit' ).button( "option", "disabled", true );
    $( '#name' ).attr( "disabled", "disabled" );
    $( '#email' ).attr( "disabled", "disabled" );
    $( '#updates' ).attr( "disabled", "disabled" );
    $( '#age' ).attr( "disabled", "disabled" );
    $( '#diagnosis' ).attr( "disabled", "disabled" );
    $( '#needs' ).attr( "disabled", "disabled" );
    $( '#interventionYes' ).attr( "disabled", "disabled" );
    $( '#interventionNo' ).attr( "disabled", "disabled" );
    $( '#abaYes' ).attr( "disabled", "disabled" );
    $( '#abaNo' ).attr( "disabled", "disabled" );
    $( '#screeningYes' ).attr( "disabled", "disabled" );
    $( '#screeningNo' ).attr( "disabled", "disabled" );
    $( '#referer' ).attr( "disabled", "disabled" );

    if ( validate() ) {

      var intervention = $("input[name='intervention']:checked").val();
      intervention = intervention == undefined || intervention == 'no' ? 'no' : 'yes';

      var aba =  $("input[name='aba']:checked").val();
      aba = aba == undefined || aba == 'no' ? 'no' : 'yes';

      var screening =  $("input[name='screening']:checked").val();
      screening = screening == undefined || screening == 'no' ? 'no' : 'yes';

      $.ajax({
        type: "POST",
        url: "emailer.php",
        data: { 
          name: $( '#name' ).val(), 
          email: $( '#email' ).val(),
          updates: $( '#updates' ).is( ':checked' ).toString(),
          age: $( '#age' ).val(),
          diagnosis: $( '#diagnosis' ).val(),
          needs: $( '#needs' ).val(),
          intervention: intervention,
          aba: aba,
          screening: screening,
          referer: $( '#referer' ).val()
        },
        beforeSend: function() {
          $.blockUI({ message: $('<p>').html("Sending survey...<br />") });
        },
        success: function( data, textStatus, xhr ) {
          $.unblockUI({
            onUnblock: function() { 
              $.growlUI('Sucess!', 'Thanks for your feedback!'); 
              setTimeout( 'window.location = "http://spectrumprek.blogspot.com"', 3000);
            }
          });
        },
        error: function( jqXHR, exception ) {
          $.unblockUI
          notify( 'Error', 'oops, there was an error' );
        }
      });
    }
    else {

      $('#submit').button("option", "disabled", false);
      $('#name').removeAttr("disabled");
      $('#email').removeAttr("disabled");
      $('#updates').removeAttr("disabled");
      $('#age').removeAttr("disabled");
      $('#diagnosis').removeAttr("disabled");
      $('#needs').removeAttr("disabled");
      $('#interventionYes').removeAttr("disabled");
      $('#interventionNo').removeAttr("disabled");
      $('#abaYes').removeAttr("disabled");
      $('#abaNo').removeAttr("disabled");
      $('#screeningYes').removeAttr("disabled");
      $('#screeningNo').removeAttr("disabled");
      $('#referer').removeAttr("disabled");
      return false;
    }
  }); // submit

} // init

function validate() {

  var valid_data = true;
  var error = '';

  if ( $('#name').val().length == 0 ) {
    error += 'Please enter your name.<br />';
    valid_data = false;
  }
  if ( $( '#email').val().length == 0 ) {
    error += 'Please enter your email.<br />';
    valid_data = false;
  }
  if( error != '' ){
    notify( 'Validation', error );  
  }
  return valid_data;
} // validate

function notify( title, message ){
  $('<p>').html(message).dialog( {
    title: title,
    modal: true
  });
} // notify

function fb_click() { 
  $('#fb_content').dialog({
    width: 400,
    height: 140,
    position: { 
      my: 'left bottom',
      at: 'top',
      of: $('#fb')
    }
  });
} //fb_click
