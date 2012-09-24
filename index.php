<html>

  <head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.blockUI.js"></script>

    <script type="text/javascript" src="js/survey.js"></script>

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/redmond/jquery-ui.css" type="text/css" />
    <link rel="stylesheet" href="css/survey.css" type="text/css" />

    <script>
      $(document).ready(function() {
        init(); //emailer.js
      });
    </script>

  </head>

  <body>

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
        
        <input id="updates" name="updates" type="checkbox" checked/>
        <label id="updatesLabel" for="updates">Receive email updates?</label><br /><br />

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

    </div> <!-- content -->

    <!-- stuff for the social media dialogs -->
    <div id="fb_content" style="display: none;">
      <a href="http://facebook.com/spectrumpreschool" target="_blank">
        facebook.com/spectrumpreschool</a><br /><br />
      <iframe src="http://www.facebook.com/plugins/like.php?href=spectrumprek.com"
        scrolling="no" frameborder="0"
        style="border:none; width:360px; height:300px;">
      </iframe> 
    </div>

  </body>

</html>