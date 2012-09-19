<html>

  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        
        $( '#name' ).val( 'Erik' );
        $( '#email' ).val( 'bmadrid@spectrumprek.com' );
        $( '#age' ).val( '3' );
        $( '#diagnosis' ).val( 'autism' );
        $( '#needs' ).val( 'these are some things that we need' );
        $( '#interest' ).val( 'yes' );
        $( '#referer' ).val( 'internet' );

      });
    </script>
  </head>

  <body>

    <center>
      Welcome to Spectrum PreSchool!
      <br />
      Thanks for stopping by.
      <br />
      Our website is currently being developed.
      <br />
      We'd very much appreciate it if you could take a moment to fill out the survey below.
      <br />
      We'd love to hear from you & all about your concerns. 
      <br />
      We're here for you.
    </center>

    <form id="contact-form" name="contact-form" method="post" action="emailer.php">

      <label for="name">Name:</label>
      <input id="name" type="text" />
      <br />
      <br />

      <label for="email">Email:</label>
      <input id="email" type="text" />
      <br />
      <br />

      <label for="age">How old is your child?</label>
      <input id="age" />
      <br />
      <br />

      <label for="diagnosis">What is your child's specific diagnosis?</label>
      <input id="diagnosis" />
      <br />
      <br />

      <label for="needs">What are your family's needs?</label>
      <input id="needs" />
      <br />
      <br />

      <label for="interest">Would you be interested in meeting us to explore the possibility of receiving in-home early intervention services and ABA therapy with our team?</label>
      <input id="interest" />
      <br />
      <br />

      <label for="referer">How did you hear about us?</label>
      <input id="referer" />
      <br />
      <br />

      <input type="submit" text="submit" />

      <p id="error">error here</p>

    </form>

  </body>

</html>