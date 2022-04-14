<html>
	<head>
	<title>SU Fraternity Greek Life</title>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
	</script>

	<script src="js/main.js"></script>
	<style>
	
	div.TopNav
	{
		position: fixed;
		color: white;
		background-color: maroon;
		width: 100%;
		left: 0;
		top: 0;
		font-size: 18px;
	}	

	div.TopNav a
	{
		float: left;
		color: white;
		text-align: center;
		text-decoration: none;
		padding: 14px 16px;
	}
	
	div.TopNav a:hover
        {
                background-color: red;
		color: yellow;
        }

	div.NavSpace
	{
		width:100%;
		height:45px;
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
	
	div.TopNav a.Loginbutton
	{
		float: right;
		font-size: 15px;
		padding: 16px;
	}

	div.SliderContainer
	{
		width: 540px; 
		margin:40px auto;
		overflow:auto;
	}
	
	div.SliderInner
	{
		width:  500px;
		height: 300px;
		position: relative;
		overflow:hidden;
		float:left;
		padding:3px;
		border:#666 solid 1px;
	}
	
	div.SliderInner img
	{
		display:none;
		width:500px;
		height:300px;
	}

	div.SliderInner img.active
        {
                display: inline-block;
        }
	
	.prev, .next
	{
		float: left;
		margin-top:130px;
		cursor: pointer;
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
                margin-left: -45px;
                z-index:100;
        }	

	div.SliderOuter
	{

	}

	div.InfoContainer
	{
		left: 0;
		width: 100%;
		height: 35%;
		overflow: hidden;
		position: relative;
		margin-bottom: 10px;
	}
	
	</style>
	</head>

	<body>
	
	<div class="TopNav">
		<a href="#Home" class="active"> Salisbury University Fraternity Greek Life</a>
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
				<img src="images/image1.jpg" class="active">
				<img src="images/image2.jpg">
				<img src="images/image2.jpg">
			</div>
			<img src="images/arrow_right.png" class="next">
        	</div> 
        </div>

	<div class="InfoContainer">
	<p>This section will include information of some kind about the various fraternities<p>
	</div>
	
	<div class="FooterContainer">
	<footer>Global Admin Contact Information Here</footer>
	</div>
	</body>
</html>
