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
		transition: color 0.4s, background-color 0.4s;
	}
	
	div.TopNav a:hover
        {
                background-color: #bf110c;
		color: yellow;
        }

	div.NavSpace
	{
		width:100%;
		height:41px;
		 background-color: blue;
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
		

	div.InfoContainer
	{
		position: absolute;
		z-index: -10;
		left: 0;
		width: 100%;
		height: 100%;
		overflow: hidden;
		
		background-color: darkgrey;
	}

	#Toprow, #Bottomrow
	{
	
		margin-left: 255px;
		display: flex;
	}

	
	
	div.InfoContainer span 
	{
		padding: 5px;
		margin-right: 40px;
		margin-left: 40px;
		margin-top: 20px;
		border-style:solid;
		border-width:2px;
		width:250px;
		height:275px;
		background-color: lightgrey;
	}
	
	</style>
	</head>

	<body>
	
	<div class="TopNav">
		<a href="#Home" class="Selected"> Salisbury University Fraternity Greek Life</a>
		<a href="#Members">Members</a>
		<a href="#Alumni">Alumni</a>
		<a href="#Community Service">Community Service</a>
		<a href="#Attendence">Attendence</a>
		<a href="#Dues">Dues</a>
		<a href="#Logout" class="LogoutButton">Login</a>
	</div>
	
	<div class="NavSpace">
	</div>
	
	<div class="InfoContainer">
	
	<div id="Toprow">
		<span class="indented">This section will contain a description about the logged-in fraternity's members</span>
		<span>This section will contain a description about the logged-in fraternity's alumni</span>
		<span>This section will contain a description about the logged-in fraternity's community service</span>
	</div>
	
	<div id="Bottomrow">
		<span class="indented">This section will contain a description about the logged-in fraternity's attendence</span>
		<span>This section will contain a description about the logged-in fraternity's dues</span>
		<span>This section will contain a description about the logged-in fraternity's Potential New Members</span>
	</div>
	
	</div>
	
	<div class="FooterContainer">
	<footer>Global Admin Contact Information Here</footer>
	</div>
	</body>
</html>

