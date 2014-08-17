<?php ob_start();?>
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

    <!-- DataTables CSS -->
    <link href="lib/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="lib/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="lib/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
    $row = print_all_tickets($conn);
    $row = json_decode($row);
    $row_students = print_all_students($conn);
    $row_students = json_decode($row_students);
    // echo $row[1]->ticket_number;
    // print_r($row[1]);
    // echo count($row);

?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Update something</div>
        <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>STUDENT ID</th>
                        <th>NAME</th>
                        <th>TICKET NUMBER</th>
                        <th>BALANCE</th>
                        <th>STATUS</th>
                        <th>PAYMENT</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    for($a = 0; $a < count($row); $a++){
                        echo '<tr class="gradeX">';
                        echo '  <td>'.$row[$a]->student_id.'</td>';

                        for($b = 0; $b < count($row_students); $b++){
                            if($row[$a]->student_id === $row_students[$b]->student_id){
                                echo '<td>'.$row_students[$a]->lastname.', '.$row_students[$a]->firstname.'</td>';
                            }
                            else{
                                echo "<td></td>";
                            }
                        }
                        echo "<form method='post'>"; // start-form

                        echo '  <td>'.$row[$a]->ticket_number.'</td>';
                        echo '  <td>'.$row[$a]->balance.'</td>';
                        echo '  <td>'.$row[$a]->ticket_status.'</td>';
                        echo '  <td>';
                            echo '<input type="text" name="payment" placeholder="payment" required>';
                            echo '<input type="hidden" name="student_id" value="'.$row[$a]->student_id.'">';
                            echo '<input type="hidden" name="balance" value="'.$row[$a]->balance.'">';

                        echo '</td>';
                        
                        echo '  <td>';
                            if(($row[$a]->ticket_status != "PAID_FULL") || ($row[$a]->ticket_status === "REGISTERED"))
                            {
                                echo "<input type='submit' name='submit' class='btn btn-primary'>";
                            }
                        echo '  </td>';
                        
                        echo '</tr>';

                        echo "</form>"; //end form


                    }

                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

 <!-- jQuery Version 1.11.0 -->
    <script src="lib/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="lib/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="lib/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="lib/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="lib/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>


<?php 
    if(isset($_POST['submit'])){
        $post = $_POST;
        // print_r($post);
        // echo ($post['balance'] != "0")."asd";
        if($post['payment']){
            if(($post['payment'] <= $post['balance']) && ($post['balance'] != "0")){
                $post['balance'] = $post['balance'] - $post['payment'];

                if($post['balance'] == 0){
                    $post['ticket_status'] = "PAID_FULL";
                }else{
                    $post['ticket_status'] = "PAID_WITHBALANCE";
                }
                update_balance($post,$conn);
                // header("Location : balance.php");
                echo "<script>window.location = 'balance.php';</script>";

                die();
            }else{
                echo "<script>alert('invalid payment');</script>";
            }
        }


    }

?>
<?php ob_flush(); ?>