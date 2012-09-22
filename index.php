<html>

  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" type="text/css" />
    <script>
      $(document).ready(function() {

        $( '#submit' ).button()
        
        $( '#submit' ).click( function() {

          $( '#submit' ).button( "option", "disabled", true );
          $( '#email' ).attr( "disabled", "disabled" );
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
                age: $( '#age' ).val(),
                diagnosis: $( '#diagnosis' ).val(),
                needs: $( '#needs' ).val(),
                intervention: intervention,
                aba: aba,
                screening: screening,
                referer: $( '#referer' ).val()
              },
              beforeSend: function() {
                $( '#submit' ).attr( 'disabled', 'disabled' );
              },
              success: function( data, textStatus, xhr ) {
                alert( 'Thanks!' );
              },
              error: function( jqXHR, exception ) {
                alert( 'oops, there was an error' + jqXHR.responseText );
              }
            });
          }
          else {
            return false;
          }
        }); //submit

      }); //document ready

      function validate() {

        var valid_data = true;
        var error = '';

        if ( $('#name').val().length == 0 ) {
          error += 'Please enter your name.';
          valid_data = false;
        }
        if ( $( '#email').val().length == 0 ) {
          error += 'Please enter your email.';
          valid_data = false;
        }
        return valid_data;
      }

    </script>

    <style type="text/css">

      body { font-family: "Arial"; font-size: 10pt; }
      center { margin-bottom: 10px; }
      .error { color: #FF4500; }
      #name, #email, #age, #referer 
        { width: 445px; }

      label { margin-left: 400px; float: left; width: 500px; }
      textarea { margin-left: 420px; }
      input { margin-left: 420px; }

      #submit { margin-left: 400px; }

    </style>
  </head>

  <body>

    <center>
      Welcome to Spectrum PreSchool!
      <br />
      Our website is under development.
      <br />
      Please take a moment to fill out the survey below.
      <br />
      We'd love to know how we can help. 
    </center>

    <label id="nameLabel" for="name">*Name:</label><br />
    <input id="name" name="name" type="text" /><br /><br />
    
    <label id="emailLabel" for="email">*Email:</label><br />
    <input id="email" name="email" type="text" /><br /><br />
    
    <label id="ageLabel" for="age">How old is your child? (y/m)</label><br />
    <input id="age" /><br /><br />
    
    <label id="diagnosisLabel" for="diagnosis">What is your child's specific diagnosis?</label><br />
    <textarea id="diagnosis" rows="2" cols="61"></textarea><br /><br />
  
    <label id="needsLabel" for="needs">What are your family's needs?</label><br />
    <textarea id="needs" rows="2" cols="61"></textarea><br /><br />
  
    <label id="interventionLabel" for="intervention">Are you interested in receiving in-home early intervention services?</label><br />
    <input id="interventionYes" type="radio" name="intervention" value="yes" /> Yes
    <div>
      <input id="interventionNo" type="radio" name="intervention" value="no" /> No
    </div><br />
    
    <label id="abaLabel" for="aba">Are you interested in receiving ABA therapy?</label><br />
    <input id="abaYes" type="radio" name="aba" value="yes" /> Yes
    <div>
      <input id="abaNo" type="radio" name="aba" value="no" /> No
    </div><br />

    <label id="screeningLabel" for="screening">**Would you be interested in a free screening?</label><br />
    <input id="screeningYes" type="radio" name="screening" value="yes" /> Yes
    <div>
      <input id="screeningNo" type="radio" name="screening" value="no" /> No
    </div><br />

    
    <label for="referer">How did you hear about us?</label><br />
    <input id="referer" name="referer" type="text" /><br /><br />
    
    <input id="submit" type="button" value="submit" /><br />
    <br />

    <label>* Required</label><br />
    <label style="margin-bottom: 10px;">** This does not substitute a diagnosis, however a screening with professionals with extensive experience 
      working with individuals with Autism Spectrum Disorders can be valuable.</label>
    <br />
    <br />
    <br />
    <br />

    <center>
      <a href="http://www.facebook.com/spectrumpreschool" target="_blank">
        <img src="images/facebook.png"/>
      </a>
      <a href="http://spectrumprek.blogspot.com" target="_blank">
        <img src="images/blogger.png" width="32" height="32" />
      </a>
      <a href="http://www.twitter.com/spectrumprek" target="_blank">
        <img src="images/twitter.png" />
      </a>
    </center>
  </body>

</html>