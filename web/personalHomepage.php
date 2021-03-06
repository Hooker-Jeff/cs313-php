<!DOCTYPE html>
<html>
<head>
<title>Personal Homepage</title>
<link rel="stylesheet" href="personalHomepageStyles.css">
<script type = "text/javascript" src = "personalHomepageJavascript.js" ></script>
</head>

<body id="body">
<center>
      <h1>Welcome to Jeff Hooker's Personal Page</h1><hr>
      <h3>About me</h3>
      <p id="p1">As it says above, my name is Jeff Hooker.</p>  
      <p id="p2">I'm working towards my degree in software engineering and have a few more years to go.  I live in Oregon House, CA, but I've moved around
	  a fair bit growing up so I've lived in a few other states as well.  Living with me is my wife of almost 8 years and our four year old daughter.  We just
	  received a Great Pyrenees puppy as a housewarming gift/potential guard dog and we are in the process of getting chickens into their coop as I write this code.</p><br><br>
	  
	  <?php 
		echo 'Todays date and current time is ' . date("l, F jS Y h:i:s A");
	  ?>	  
	  
	  <br><br>
	  <h3>Quote and thought of the month</h3>
	  
	  <br>
	  
      <blockquote>"Did you ever try to put a broken piece of glass back together? Even if the pieces fit, you can't make it whole again the way it was. But if you're clever, you can still use the pieces to make other useful things. Maybe even something wonderful, like a mosaic. Well, the world broke just like glass. And everyone's trying to put it back together like it was, but it'll never come together in the same way." -Moira Brown
      </blockquote>
	  
      <br><br><br>
      <img src="https://78.media.tumblr.com/7ddd8930a551e23d109f8e6908123fcb/tumblr_p0xlt9BHya1wdbviro1_500.jpg" alt="Thought of the Day" height="280" width="350">
      <br><br>
	  
	  <h3>Classes I'm taking this term</h3>
	  
	  <hr>
	  <table>
        <tr>
          <th>Course #</th>
          <th>Course Description</th>
          <th>Section #</th>
          <th>Class Time</th>
          <th>Class Location</th>
        </tr>
        <tr>
          <th>CIT 261</th>
          <th>This course covers the basics of design, coding, and using HTM5L, CSS3, and JavaScript to produce Single Page Applications (SPAs) for mobile devices.  You will learn about some standard HTML5, CSS3, and JavaScript tools and functions you haven't seen before and see how they work.  With these tools in your belt you will have an opportunity to write SPAs that will run inside a web browser.  You will also learn about and be assessed on your professionalism.</th>
		  <th>03</th>
          <th>Online</th>
          <th>Online</th>
        </tr>
        <tr><th></th><th></th><th></th><th></th><th></th></tr>
        <tr>
          <th>CS 313</th>
          <th>This course builds upon Web Engineering I, allowing students to create more advanced web applications and services. The emphasis of this course will be on server-side technologies and n-tier applications using relational database technology. Different server-side technologies will be used for creating dynamic n-tier web applications. Client-side technologies will be enhanced and combined with server-side technologies to create rich web applications.</th>
          <th>03</th>
          <th>Online</th>
          <th>Online</th>
        </tr>
        <tr><th></th><th></th><th></th><th></th><th></th></tr>
        <tr>
          <th>CS 364</th>
          <th>Software engineering overview: software requirements engineering including elicitation and specification; software design </th>
          <th>03</th>
          <th>Online</th>
          <th>Online</th>
        </tr>
        <tr><th></th><th></th><th></th><th></th><th></th></tr>
        <tr>
          <th>REL 275</th>
          <th>This course is required for graduation. This course focuses on doctrine and themes found throughout the writings, teachings, and sermons of the Book of Mormon. Emphasis is given to prophetic witnesses of Heavenly Father and His Son, Jesus Christ. This course builds upon students previous sequential and topical gospel study experiences. Both FDREL 121 and FDREL 122 can be taken to fulfill this requirement.</th>
          <th>40</th>
          <th>Online</th>
          <th>Online</th>
        </tr>
      </table>
	  <hr><br>
	  
	  <p id="p2">Is that a lot of classes in your opinion? (Click your choice)</p>
	  <p id="yes" onclick="changeY()">Yes</p>
	  <p id="no" onclick="changeN()">No</p>
	  <br>
	  
      </center>
      <hr>
      <nav>
      <ul>
        <li><a href="assignments.html">Assignments</a></li>
        <li><a href="http://radio.garden/live/">Listen to radio stations from anywhere on Earth</a></li>
		</ul>
      </nav><br>
	  	  
   </body>
</html>