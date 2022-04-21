<html>
	<head>
	<title>SU Fraternity Life</title>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
	</script>

	<script src="js/main.js"></script>
	<style>
	
	div.TopNav
	{
		position: absolute;
		color: white;
		background-color: maroon;
		width: 100%;
		left: 0;
		top: 0;
		font-size: 20px;
	}	

	div.TopNav a
	{
		position: relative;
		float: left;
		color: white;
		text-align: center;
		text-decoration: none;
		font-family: Arial;	
		padding: 35px 18px;
		transition: color 0.4s, background-color 0.4s;
	}

	#HomeIcon
	{
		position: static;
		margin-right: 70px;
		width:250px;
		padding: 19px 18px;
		font-size: 25px;
		font-family: "times new roman", georgia;
	}
	
	div.TopNav a:hover
        {
                background-color: #bf110c;
		color: yellow;
        }

	div.NavSpace
	{
		background-color: green;
		width:100%;
		height:85px;
	}
	
	div.FooterContainer
        {
		background-color: maroon;
		color: white;
		width: 100%;
		height: 4%;
		position: fixed;
		left: 0;
		bottom: 0; 
	}
	
	div.FooterContainer footer
	{
		text-align: left;
		font-size: 14px;
	}
	
	div.TopNav a.LoginButton
	{
		position: absolute;
		padding: 5px;
		top: 35%;
		right: 20;
		font-size: 15px;
		background-color: maroon;	
	}
		
	div.SliderContainer
	{
		/*background-color: black;*/
		width: 750px; 
		margin:40px auto;
		overflow:auto;
	}
	
	div.SliderInner
	{
		width:  735px; /*500px;*/
		height: 400px; /*300px;*/
		position: relative;
		overflow:hidden;
		float:left;
		padding:3px;
	
		border:#666 solid 1px;
	}
	
	div.SliderInner img
	{	visibility: hidden;
		position: absolute;
		width:735px;
		height:400px;
		transition: visibility 1s;
	}

	div.SliderInner img.active
	{
		visibility: visible;	
        }
	
	.prev, .next
	{
		float: left;
		margin-top:130px;
		cursor: pointer;
		width: 20px;
		height:20px;
	}
	
	.prev
	{
		position:relative;
		margin-right: -45px;
		z-index:100;
	}

	 .next
        {
                position:relative;
                margin-left: -20px;
                z-index:100;
        }	

	div.SlideIndicator
	{
		width: 50px;
		position: relative;
		left: 48%;
		bottom: 35px;
		
	}

	div.SlideIndicator p
	{
		text-align: center;
		width:25px;
		padding: 3px;
		background-color: maroon;
		color: white;
		border:#666 solid 1px;
	}

	div.InfoContainer
	{
		border:#666 solid 1px;
		left: 0;
		width: 100%;
		height: 30%;
		background-color: darkgrey;
		overflow: hidden;
		position: relative;
		margin-bottom: 10px;
	}
	
	</style>
	</head>
		
	<body>
		
	<div class="TopNav">
		<a href="#Home" id="HomeIcon"> Salisbury University Fraternity Life</a>
		<a href="#SigmaPi"> Sigma Pi</a>
		<a href="#KappaSigma">Kappa Sigma</a>
		<a href="#SigmaAlphaEpsilon">Sigma Alpha Epsilon</a>
		<a href="#SigmaTau">Sigma Tau</a>
		<a href="#SigmaEpsilon">Sigma Epsilon</a>
		<a href="#AlphaSigma">Alpha Sigma</a>
		<a href="#Login" class="LoginButton">Login</a>
	</div>
	
	<div class="NavSpace">
	<p></p>
	</div>

	

	<div class="SliderContainer">
		<div class="SliderOuter">
			<img src="images/arrow_left.png" class="prev">
        		<div class="SliderInner">	
				<img src="images/image1.jpg" class="active" id="first">
				<img src="images/image2.jpg">
				<img src="images/image3.jpg" id="last">
			</div>
			<img src="images/arrow_right.png" class="next">
		</div>
        </div>
	<div class="SlideIndicator">
	<p><span id="slideNum">1</span>/3</p>
	</div>
	

	<div class="InfoContainer">
	<p>This section will include information of some kind about the various fraternities<p>
	</div>
	
	<div class="FooterContainer">
	<footer>Global Admin Contact Information Here</footer>
	</div>
	</body>
</html>

