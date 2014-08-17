

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
                        <h3 class="panel-title">Search something</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" id="form-student">
                            <fieldset>
                                <div class="form-group">
                                    <input id="id-student" class="form-control" placeholder="Ticket Number" name="student_id" type="text" maxlength="11"  autofocus>
                                </div>
                                <!-- <div class="form-group">
                                    <input id="lastname" class="form-control" placeholder="Name" name="lastname" type="text" disabled>
                                </div>
                                <div class="form-group">
                                    <input id="firstname" class="form-control" placeholder="Name" name="firstname" type="text" disabled>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <button type="submit" class="btn btn-lg btn-success btn-block" name="search"> -->
                            </fieldset>
                        </form>
                    </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h3><span>Student No.  :	</span><b><span class="student_id"></span></b></h3>
                                            <h3><span>Name 		   :	</span><b><span class="name"></span></b></h3>
                                            <h3><span>Ticket Status:	</span><b><span class="ticket_status"></span></b></h3>
                                        </div>
                                        <div class="modal-footer">
                                           	<form id="form-register" method="post">
	                                            <button type="button" class="btn btn-default dismiss" data-dismiss="modal">No</button>
	                                            <input id="form-register" type="hidden" value="true" name="form-register" >
	                                            <input id="student_no" type="hidden" value="" name="student_no" >
	                                            <input id="ticket_id" type="hidden" value="" name="ticket" >

	                                            <button type="submit" class="btn btn-primary">Register!</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
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
    <script type="text/javascript" src="includes/script.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	  $("document").ready(function(){
	    	$(".dismiss").click(function(){
	    			$("#form-student")[0].reset();
	    	});
	    });
    </script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="lib/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="lib/js/sb-admin-2.js"></script>

</body>

</html>
