<!DOCTYPE html><html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet" type="text/css">
  </head>
  <body style="padding-top: 70px">
  	<div class="container-fluid">
  	  <div class="container">
  	    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light"> 
		<a class="navbar-brand" href="home.html"> <img src="images/BookMart_logo.png" alt="" width="120" height="48"  class="logo" ></a>
  	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  	      <div class="collapse navbar-collapse" id="navbarSupportedContent1">
  	        <ul class="navbar-nav mr-auto">
  	          <li class="nav-item active"> <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a> </li>
  	          
  	          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Categories </a>
  	            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
					<a class="dropdown-item" href="novels.html">Novels</a> 
					<a class="dropdown-item" href="shortstory.html">Short Story</a>
                  <a class="dropdown-item" href="fantacy.html">Fantasy</a>
				  <a class="dropdown-item" href="thriller.html">Thriller</a> 
					<a class="dropdown-item" href="fiction.html">Fiction</a>
			    </div>
              </li>
				<li class="nav-item"> <a class="nav-link" href="about.html">About&nbsp;</a> </li>
  	          <li id="scrollButton" class="nav-item"> <a class="nav-link" style="cursor: pointer">Contact Us&nbsp;</a></li>
			  <script>
					// script.js
					document.addEventListener("DOMContentLoaded", function () {
					var scrollButton = document.getElementById("scrollButton");
					// Add a click event listener to the button
					scrollButton.addEventListener("click", function () {
					// Scroll to the bottom of the page
					window.scrollTo(0, document.body.scrollHeight);
					});
					});
    		 </script>
				
  	          <li class="nav-item"> <a class="nav-link" href="signin.html">Sign In&nbsp;</a></li>
            </ul>
  	        <form class="form-inline my-2 my-lg-0">
  	          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  	          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
		
		<div class="row">
            <div class="col-2">
                <h1><u> Novels</u></h1>
					<p>A novel is an invented prose narrative of significant length and complexity that deals
					imaginatively with human experience. Its roots can be traced back thousands of years,
					 though its origins in English are traditionally placed in the 18th century....
					</p>
                    
                </div>


        
        <div class="col-2">
            <img src="">
        </div>
		
		
      
		
<div class="container" style="margin-top:70px;">
		<h2 class="category_name">Novels</h2>	
	  <hr class="hr-category">
	    <div class="row ">
		  <div class="col-md-2 ">
		    <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book1.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Uththara</h5>
                <p class="card-text"> Chandrika Kumari</p>
                <p class="card-price">LKR855.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div>
	      </div>
		  <div class="col-md-2">
			  <div class="card  col-md-13"> <img class="card-img-top" src="images/Novels/book2.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Meedum Salu</h5>
                <p class="card-text"> Nisansala Senadeera</p>
                <p class="card-price">LKR1800.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book3.jpg" alt="Card image cap">
              <div class="card-body">Santhulana</h5>
                <p class="card-text"> Ashirna Ekanayke</p>              
                <p class="card-price">LKR2214.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book4.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Binara Mala</h5>
                <p class="card-text"> Dilini Weerakoon</p>      
                <p class="card-price">LKR1557.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
		    <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book5.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Amathaka Mathaka</h5>
                <p class="card-text"> Chalani Weerasinghe</p>               
                <p class="card-price">LKR1350.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a>
			  </div>
		    </div>
		  </div>
		  <div class="col-md-2">
		    <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book6.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Alu Pata Handewa</h5>
                <p class="card-text"> Nikini Naweenna</p>              
                <p class="card-price">LKR1530.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div>
		  </div>
    </div>

	<br><br>
	    <div class="row ">
		  <div class="col-md-2 ">
		    <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book7.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Deshadrohiya</h5>
                <p class="card-text"> Senanayaka P B</p>
                <p class="card-price">LKR630.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div>
	      </div>
		  <div class="col-md-2">
			  <div class="card  col-md-13"> <img class="card-img-top" src="images/Novels/book8.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Uragala</h5>
                <p class="card-text"> Senanayake G B</p>
                <p class="card-price">LKR900.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book9.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Paharada</h5>
                <p class="card-text"> Aravinda Rathmalgama</p>              
                <p class="card-price">LKR1080.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book10.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Wisekari</h5>
                <p class="card-text"> Alana maduragoda</p>      
                <p class="card-price">LKR1215.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
		    <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book11.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Anunada</h5>
                <p class="card-text"> Prabhodani Edirisinge</p>               
                <p class="card-price">LKR1620.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a>
			  </div>
		    </div>
		  </div>
		  <div class="col-md-2">
		    <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book12.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Darmapuram</h5>
                <p class="card-text"> Manohari Silika</p>              
                <p class="card-price">LKR1170.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div>
		  </div>
    </div>
	<br><br>
	    <div class="row ">
		<div class="col-md-2 ">
		  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book13.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Prabahsawara</h5>
			  <p class="card-text"> Dilini Kausalya</p>
			  <p class="card-price">LKR891.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div>
		</div>
		<div class="col-md-2">
			<div class="card  col-md-13"> <img class="card-img-top" src="images/Novels/book14.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Kayili</h5>
			  <p class="card-text"> Wasana Perera</p>
			  <p class="card-price">LKR1710.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div></div>
		<div class="col-md-2">
			<div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book15.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Veeduru</h5>
			  <p class="card-text"> Sithumini Palipanne</p>              
			  <p class="card-price">LKR1800.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div></div>
		<div class="col-md-2">
			<div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book16.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Drohee</h5>
			  <p class="card-text">Kathleen Jayawardana</p>      
			  <p class="card-price">LKR2070.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div></div>
		<div class="col-md-2">
		  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book17.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Uthpaththi</h5>
			  <p class="card-text"> Keerthi Welisarage</p>               
			  <p class="card-price">LKR1040.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a>
			</div>
		  </div>
		</div>
		<div class="col-md-2">
		  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book18.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Ayemath</h5>
			  <p class="card-text"> Parami Henadheera</p>              
			  <p class="card-price">LKR1728.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div>
		</div>

		
		
	</div>
	<br><br>
	    <div class="row ">
		<div class="col-md-2 ">
		  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book19.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Herikada</h5>
			  <p class="card-text"> Roshan Rathnppuli</p>
			  <p class="card-price">LKR1665.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div>
		</div>
		<div class="col-md-2">
			<div class="card  col-md-13"> <img class="card-img-top" src="images/Novels/book20.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Shesha Kandu</h5>
			  <p class="card-text"> Thisaranie D Nirmani</p>
			  <p class="card-price">LKR2340.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div></div>
		<div class="col-md-2">
			<div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book21.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Nirmana</h5>
			  <p class="card-text"> Thisaranie D Nirmani</p>              
			  <p class="card-price">LKR1575.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div></div>
		<div class="col-md-2">
			<div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book22.jpg" alt="Card image cap">
			<div class="card-body">
			  <Snehaye class="card-title">Snehaye Dasi</h5>
			  <p class="card-text"> Tharhari Abeysekara</p>      
			  <p class="card-price">LKR900.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div></div>
		<div class="col-md-2">
		  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book23.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">Gangula</h5>
			  <p class="card-text"> Shanthi Dissanayake</p>               
			  <p class="card-price">LKR1980.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a>
			</div>
		  </div>
		</div>
		<div class="col-md-2">
		  <div class="card col-md-13"> <img class="card-img-top" src="images/Novels/book24.jpg" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">THawathinisa</h5>
			  <p class="card-text"> Apoorwa mandarami</p>              
			  <p class="card-price">LKR1215.00</p>
			  <a href="#" class="btn btn-primary">Add To Cart</a></div>
		  </div>
		</div>
	</div>
	
    
      <br><br>

	<footer>
      <div class="row">
    <div class="col-md-6">
	  <img src="images/BookMart_logo.png" width="160" class="footer-imglogo img-fluid">
    </div>
    <div class="col-md-6">
	  <table>
	    <tr>
		  <td><img class="social-media-logo img-fluid" src="images/Footer/fb.png" alt="Facebook" style="width:2.15em; height:2.15em"></td>
		  <td><img class="social-media-logo img-fluid" src="images/Footer/insta.png" alt="Instagram"></td>
		  <td><img class="social-media-logo img-fluid" src="images/Footer/linke.png" alt="Linkedin"></td>
		  <td><img class="social-media-logo img-fluid" src="images/Footer/pint.png" alt="Pinterest"></td>
	    </tr>
	  </table>
    </div>
    </div>
	  
	  <hr style="height:1px;border-width:0;color:gray;background-color:darkgrey; width:95%;">
	  <div class="row" >
	    <div class="col-md-3 left-padding">
		 
		  <h6 style="text-transform: uppercase">&ensp;Categories</h6>
		  <ul>
			<li><a href="novels.html" >Novels</a> </li>
			<li><a href="shortstory.html">Short Story</a></li>
			<li><a href="fantacy.html">Fantasy</a></li>
			<li> <a href="thriller.html">Thriller</a> </li>
			<li><a href="fiction.html">Fiction</a></li>			
		  </ul>
			
		</div>
	    <div class="col-md-3">
		  <h6 style="text-transform: uppercase">&ensp;Quick Links</h6>
		  <ul>
			<li><a href="index.html" >Home</a> </li>
			<li><a href="about.html">About</a></li>
			<li><a href="contactus.html">Contact us</a></li>
			<li> <a href="signin.html">Sign in</a> </li>		
		  </ul>
		</div>
	    <div class="col-md-3"> 
			<dl>
			<h6 >CONTACT US</h6>
  		        <dd>&ensp;No.21, Stanly road, Nugegoda.</dd>
				<dd>&ensp;+94 112 456 456</dd>
				<dd>&ensp;bookmart@gmail.com</dd>
			</dl>
		</div>
	    <div class="col-md-3">
		  <h6>SIGN IN</h6>
	  	  <form>
		  <div style="padding-top:5px; padding-bottom: 10px" >	  
				 <input type="email" id="email" class="input-field" placeholder="Enter your email address" /> 			   
		  </div>
		  </form>    
		  <div class="blue-btn">
  					<a class="first-link" href=""> Get Started</a>
		  </div>
			 
		</div>
      </div>
	  <hr style="height:1px;border-width:0;color:gray;background-color:darkgrey; width:95%;">
	  <div class="footer-copyright">
		<p>© 2023 BookMart.lk. Designed by Group 31. All Rights Reserved.</p>
	  </div>
  </footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>