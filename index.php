<html>

  <head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.blockUI.js"></script>

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" type="text/css" />
    <script>
      $(document).ready(function() {

        $( '#submit' ).button();

        $( '#submit' ).click( function() {

          $('#submit').button("option", "disabled", true);
          $('#name').attr("disabled", "disabled");
          $('#email').attr("disabled", "disabled");
          $('#age').attr("disabled", "disabled");
          $('#diagnosis').attr("disabled", "disabled");
          $('#needs').attr("disabled", "disabled" );
          $('#interventionYes').attr("disabled", "disabled" );
          $('#interventionNo').attr("disabled", "disabled" );
          $('#abaYes').attr("disabled", "disabled" );
          $('#abaNo').attr("disabled", "disabled" );
          $('#screeningYes').attr("disabled", "disabled");
          $('#screeningNo').attr("disabled", "disabled");
          $('#referer').attr("disabled", "disabled");

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
                    //$.growlUI('Sucess!', 'Thanks for your feedback!'); 
                    window.location = "http://spectrumprek.blogspot.com";
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
        }); //submit

      }); //document ready

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
      }

      function notify( title, message ){
        $('<p>').html(message).dialog( {
          title: title,
          modal: true
        });
      }

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
      }

    </script>

    <style type="text/css">

      body { font-family: "Arial"; font-size: 10pt; }
      .ui-widget { font-family: Trebuchet MS, Tahoma, Verdana,
        Arial, sans-serif; font-size: 11px; }
      #logo { position: absolute; margin-left: 20px ; }
      
      center { margin-bottom: 10px; }
      #name, #email, #age, #diagnosis, #needs, #referer 
        { width: 40%; }

      label, #submit, #fbLike { float: left; margin-left: 25%; }
      input[type="radio"] { float: left; margin-left: 27%; width: 20px; }
      div#radio { width: 100%; height: 20px; margin-bottom: 5px; }
      span#radioLabel { float: left; width: 25px; }
      
      img { padding-right: 10px; }

    </style>
  </head>

  <body>

    <div id="fb_content" style="display: none;">
      <a href="http://facebook.com/spectrumpreschool" target="_blank">
        facebook.com/spectrumpreschool</a><br /><br />
      <iframe src="http://www.facebook.com/plugins/like.php?href=spectrumprek.com"
        scrolling="no" frameborder="0"
        style="border:none; width:360px; height:300px;">
      </iframe> 
    </div>

    <div id="logo">
      <img src="http://i.imgur.com/6HwCS.png" height="120" width="60" alt="logo" />
    </div>

    <div id="content">
      <center>
        <h1>Welcome to Spectrum Preschool!</h1>
        Our website is under development.
        <br />
        Please take a moment to fill out the survey below.
        <br />
        We'd love to know how we can help. 
      </center>

      <center>

        <label id="nameLabel" for="name">*Name:</label><br />
        <input id="name" name="name" type="text" /><br /><br />
      
        <label id="emailLabel" for="email">*Email:</label><br />
        <input id="email" name="email" type="text" /><br /><br />
        
        <label for="age">How old is your child? (y/m)</label><br />
        <input id="age" /><br /><br />
        
        <label for="diagnosis">What is your child's specific diagnosis?</label><br />
        <textarea id="diagnosis" rows="2" cols="61"></textarea><br /><br />

        <label for="needs">What are your family's needs?</label><br />
        <textarea id="needs" rows="2" cols="61"></textarea><br /><br />

        <label for="intervention">Are you interested in receiving in-home early intervention services?</label><br />
        <div id="radio">
          <input id="interventionYes" type="radio" name="intervention" value="yes"/>&nbsp;<span id="radioLabel">Yes</span>
        </div>
        <div id="radio">
          <input id="interventionNo" type="radio" name="intervention" value="no"/>&nbsp;<span id="radioLabel">No</span>
        </div>

        <label for="aba">Are you interested in receiving ABA therapy?</label><br />
        <div id="radio">
          <input id="abaYes" type="radio" name="aba" value="yes"/>&nbsp;<span id="radioLabel">Yes</span>
        </div>
        <div id="radio">
          <input id="abaNo" type="radio" name="aba" value="no"/>&nbsp;<span id="radioLabel">No</span>
        </div>

        <label for="screening">**Would you be interested in a free screening?</label><br />
        <div id="radio">
          <input id="screeningYes" type="radio" name="screening" value="yes"/>&nbsp;<span id="radioLabel">Yes</span>
        </div>
        <div id="radio">
          <input id="screeningNo" type="radio" name="screening" value="no"/>&nbsp;<span id="radioLabel">No</span>
        </div>
        <br />
        
        <label for="referer">How did you hear about us?</label><br />
        <input id="referer" name="referer" type="text" /><br /><br />
        
        <input id="submit" type="button" value="submit" /><br /><br /><br />
        

        <label>* Required</label><br />
        <label>** This does not substitute a diagnosis.</label><br />
         
      </center>

      <center>
        
        <span id="fb" onclick="fb_click();" target="_blank">
          <img src="images/facebook.png" alt="fb" border="0" title="fb"/></span>
        <a href="http://spectrumprek.blogspot.com" target="_blank">
          <img src="images/blogger.png" width="32" height="32"/></a>
        <a href="http://www.twitter.com/spectrumprek" target="_blank">
          <img src="images/twitter.png" /></a>
        <br />
        <br />

        <div>Spectrum Preschool &copy; 2012 <a href="#">Privacy Policy</a></div>
      </center>
    </div>
  </body>

</html>