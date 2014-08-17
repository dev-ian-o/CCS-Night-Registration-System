<?php include("includes\config.php"); ?>
<?php include("includes\database.php"); ?>	

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="lib/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="lib/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="lib/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    	.loader{
	        font-size: 30px;
	        position: fixed;
	        top: 50%;
	        left: 50%;
	        z-index: 100;
	    
	    }
		.animated {
		    animation-duration: .5s;
		    animation-iteration-count: infinite;
		    animation-timing-function: linear;
		    -webkit-animation-duration: .5s;
		    -webkit-animation-iteration-count: infinite;
		    -webkit-animation-timing-function: linear;

		}

		.animated.infinite {
		  -webkit-animation-iteration-count: infinite;
		  animation-iteration-count: infinite;
		}

		@-webkit-keyframes rotateIn {
		   from { -webkit-transform: rotate(0deg); }
		    to { -webkit-transform: rotate(360deg); }
		}

		.rotateIn {
		  -webkit-animation-name: rotateIn;
		  animation-name: rotateIn;
		}
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="animated rotateIn infinite loader glyphicon glyphicon-refresh"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add something</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" id="form-insert">
                            <fieldset>
                                <div class="form-group">
                                    <input id="id-student" class="form-control" placeholder="Student ID" name="student_id" type="text" maxlength="8"  autofocus required value="<?php if(isset($_POST['student_id'])){ echo $_POST['student_id'];} ?>">
                                </div>
                                <div class="form-group input-group">

                                	<span class="input-group-addon">LIVITUP-</span>
                                    <input id="lastname" class="form-control" placeholder="Ticket Number" name="ticket_number" type="text" maxlength="3" value="<?php if(isset($_POST['ticket_number'])){ echo $_POST['ticket_number'];} ?>" required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="submit">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery Version 1.11.0 -->
    <script src="lib/js/jquery-1.11.0.js"></script>
    <script>
        
	    $(window).load(function() {
	        $(".loader").fadeOut("slow");
	    });

	</script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="lib/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="lib/js/sb-admin-2.js"></script>

</body>

</html>

<?php 
	if(isset($_POST['submit']))
	{
		$row = array();
		
		$row['student_id'] = strtoupper($_POST['student_id']);
		$row['ticket_number'] = "LIVITUP-".$_POST['ticket_number'];
		$row['ticket_status'] = "CLAIMED";
		$row['balance'] = 290;
		if(!search_ticket_stid($row,$conn)){
			if(!search_ticket_no($row,$conn)){
				add_ticket($row,$conn);		
			}else{
				echo "<script>alert('Existing Ticket ID!');</script>";
			}
		}else{
			echo "<script>alert('Existing Student ID!');</script>";
		}

	}
?>