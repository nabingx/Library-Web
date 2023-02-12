<?php
	include_once('help.php');
	require_once("../database/connect.php");

	if(isset($_GET['done_id'])){
		$done_id = $_GET['done_id'];
        //echo $done_id;
		$sql = "update \"Request\" SET \"status\" = 'Done' where \"Request_ID\" ='$done_id'";
		execute($sql);
	}
	if(isset($_GET['cancel_id'])){
		$cancel_id = $_GET['cancel_id'];
		$sql = "update \"Request\" SET \"status\" = 'Cancel' where \"Request_ID\" ='$cancel_id'";
		execute($sql);
	}
?>

<html>
<head>
    <link rel="stylesheet" href="Css/book.css">
</head>
<body>
    <div class = "cateMother_div">
        <div>
            <h1>Request</h1>
        </div>
        <div class="taskbar"><a href="index.php">Dashboard</a>&nbsp;/&nbsp;<a href="request.php">Request</a></div>
        <div class= "table">
            <div class= "tableLable"><i class="fa-solid fa-user-pen"></i>User Request</div>
                <table class="container">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Request ID</th>
                            <th>User Name</th>
                            <th>Content</th>
                            <th width = "150px"></th>
                            <th width = "150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once('help.php');
                            include ("../database/connect.php");
                            if( $connect){
                                //echo 'connected';
                            }

                            $result = pg_query( $connect, 'SELECT * FROM "Request" as e LEFT JOIN "User" as c ON e."User_ID" = c."User_ID"');
                            $data = array();
                            while ( $row = pg_fetch_array($result)){
                                $data[]= $row;
                            }
                            //echo $data[0]['ID_Product'];
                            pg_close( $connect);
                            for($i = 0; $i < count($data); $i++){
                                // $id = $data[$i]['ID_Order'];
                                echo '<tr>
                                    <td>'.($i+1).'</td>
                                    <td>'.$data[$i]['Request_ID'].'</td>
                                    <td>'.$data[$i]['Name'].'</td>
                                    <td>'.$data[$i]['Content'].'</td>
                                    <td> <a href=  "?done_id='.$data[$i]['Request_ID'].'"><button class="btn btn-success" style="width: 100px; font-size: 20px;"> Done</button></a></td>
                                    <td> <a href="?cancel_id='.$data[$i]['Request_ID'].'"><button class="btn btn-warning" style="width: 100px; font-size: 20px;"> Cancel</button></a> </td>
                                </tr>';
                            }
                            
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
</body>
</html>

