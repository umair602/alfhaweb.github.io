<style type="text/css" media="screen">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	header{
		width: 100%;
		height: 100vh;
		background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('image/cover.jpg');
		background-size: cover;
		background-position: center;
	}
	header .wrapper{
		height: 100vh;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	header .wrapper .header h1{
		color: white;
		font-size: 4rem;
		font-family: 'Righteous', cursive;
	}
	header .wrapper .form_wrapper{
		border-radius: 5px;
	}
	header .wrapper .form_wrapper .warning{
		border-radius: 5px;
		margin: 10px 0; 
		padding: 10px;
		font-size: 1.3rem;
	}


	@media screen and (max-width: 800px){
		header{
			height: 100%;
		}
		header .wrapper{
			display: inline-table;
			padding-top: 10%;
		}
		header .wrapper .header{
			font-size: 1rem;
			text-align: center;
			padding-left: 20px;
		}
		header .wrapper .form_wrapper{
			width: 110%;
			margin: 0px auto;
		}
	}
</style>