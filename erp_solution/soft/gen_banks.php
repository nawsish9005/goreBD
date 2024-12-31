<?php include 'include/header.php';?>
<?php $table_heading = " Bank Setup";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
 <?php
        $tbl_name="gen_banks";        //your table name
        $targetpage = "gen_banks.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user']['user_no'];
    $CURR_TIME = date('Y-m-d :H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE BANKS_NO = $ID";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            $mgs = "Data Delete Successfully!";
            $class = "green_color alert alert-success col-md-6 alert-dismissable";
        }
        else
        {
            $mgs = "Data Delete Fail!";
            $class = "red_color alert alert-warning alert-dismissable col-md-6";
        }
    }
    if(isset($_POST['submit']))
    {
           $BANK_NAME = trim($_POST['BANK_NAME']);
           $ACCOUNT_NUMBER = trim($_POST['ACCOUNT_NUMBER']);
           $ADDRESS = trim($_POST['ADDRESS']);
           $OPENING_BALANCE = trim($_POST['OPENING_BALANCE']);
           $ACCOUNT_TYPE_NO = trim($_POST['ACCOUNT_TYPE_NO']);
		   
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `BANK_NAME` = '$BANK_NAME' AND `ACCOUNT_NUMBER` = '$ACCOUNT_NUMBER' AND 
            `ADDRESS` = '$ADDRESS' AND `OPENING_BALANCE` = '$OPENING_BALANCE' AND 
            `ACCOUNT_TYPE_NO` = '$ACCOUNT_TYPE_NO' ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name ( `BANK_NAME` ,`ACCOUNT_NUMBER` , `ADDRESS` ,`OPENING_BALANCE` ,`ACCOUNT_TYPE_NO` , `CREATED_BY` , `CREATED_ON`) VALUES(  '$BANK_NAME', '$ACCOUNT_NUMBER', '$ADDRESS','$OPENING_BALANCE','$ACCOUNT_TYPE_NO','$user_no', '$CURR_TIME')";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    $mgs = "Data Insert Successfully!";
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                }
                else
                {
                    $mgs = "Data Insert Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            else:
                $mgs = "Duplicate Entry!";
                $class = "red_color alert alert-warning alert-dismissable col-md-6 alert alert-warning alert-dismissable col-md-6";
            endif;
    }
    if(isset($_POST['update']))
    {
           $BANKS_NO = $_POST['BANKS_NO'];
           $BANK_NAME = trim($_POST['BANK_NAME']);
           $ACCOUNT_NUMBER = trim($_POST['ACCOUNT_NUMBER']);
           $ADDRESS = trim($_POST['ADDRESS']);
           $OPENING_BALANCE = trim($_POST['OPENING_BALANCE']);
           $ACCOUNT_TYPE_NO = trim($_POST['ACCOUNT_TYPE_NO']);
           
		   
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND ((`BANK_NAME` = '$BANK_NAME' OR `ACCOUNT_NUMBER` = '$ACCOUNT_NUMBER') 
			 AND `ADDRESS` = '$ADDRESS' AND `OPENING_BALANCE` = '$OPENING_BALANCE' OR `ACCOUNT_TYPE_NO` = '$ACCOUNT_TYPE_NO') AND `BANKS_NO` != '$BANKS_NO' ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1): 
                
                $sql = "UPDATE $tbl_name SET   `BANK_NAME` = '$BANK_NAME' ,`ACCOUNT_NUMBER` = '$ACCOUNT_NUMBER' , `ADDRESS` = '$ADDRESS' , `OPENING_BALANCE` = '$OPENING_BALANCE' , `ACCOUNT_TYPE_NO` = '$ACCOUNT_TYPE_NO' , `IS_UPDATED` = 1, `UPDATED_BY` = '$user_no' , `UPDATED_ON` = '$CURR_TIME'  WHERE `BANKS_NO` = '$BANKS_NO' ";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    $mgs = "Data Update Successfully!";
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                }
                else
                {
                    $mgs = "Data Update Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            else:
                $mgs = "Duplicate Entry!";
                $class = "red_color alert alert-warning alert-dismissable col-md-6";
            endif;
    }
?> 
    <?php
        if(isset($_GET['edit'])):
        $id = $_GET['edit'];
        $sql = "SELECT * FROM $tbl_name WHERE `BANKS_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="BANKS_NO" value="<?=$result['BANKS_NO']?>" />
            </div>
        </div>
        
      <div class="form-group ">
            <label for="BANK_NAME" class="control-label col-lg-3">Bank Name</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="BANK_NAME" type="text" value="<?=$result['BANK_NAME']?>" required />
            </div>
            
        </div>
		
		<div class="form-group ">
            <label for="ACCOUNT_NUMBER" class="control-label col-lg-3">Account Number</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ACCOUNT_NUMBER" type="text" value="<?=$result['ACCOUNT_NUMBER']?>" required />
            </div>
            
        </div>
		
		<div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Address</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ADDRESS" type="text" value="<?=$result['ADDRESS']?>" required />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="OPENING_BALANCE" class="control-label col-lg-3">Opening Balance</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OPENING_BALANCE" type="text" value="<?=$result['OPENING_BALANCE']?>" required />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="ACCOUNT_TYPE_NO" class="control-label col-lg-3">Account Type</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ACCOUNT_TYPE_NO" type="text" value="<?=$result['ACCOUNT_TYPE_NO']?>" required />
            </div>
            
        </div>
        
     <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="update" value="Update" />
                
            </div>
        </div>
    </form>
    
    <?php
        else:
    ?>

    <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
       
         
      <div class="form-group ">
            <label for="BANK_NAME" class="control-label col-lg-3">Bank Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="BANK_NAMES" name="BANK_NAME" type="text"  />
                <span class="error_message" id="bank_name_error"></span>
            </div>
            
        </div>
		
		<div class="form-group ">
            <label for="ACCOUNT_NUMBER" class="control-label col-lg-3">Account Number </label>
            <div class="col-lg-5">
                <input class=" form-control" id="ACCOUNT_NUMBERS" name="ACCOUNT_NUMBER" type="text" />
                <span class="error_message" id="account_number_error"></span>
            </div>
            
        </div>
		
		
        <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Address</label>
            <div class="col-lg-5">
                <input class=" form-control" id="ADDRESSS" name="ADDRESS" type="text" />
                <span class="error_message" id="address_error"></span>
            </div>
            
        </div>
		<div class="form-group ">
            <label for="OPENING_BALANCE" class="control-label col-lg-3">Opening Balance</label>
            <div class="col-lg-5">
                <input class=" form-control" id="OPENING_BALANCES" name="OPENING_BALANCE" type="text" />
                <span class="error_message" id="opening_balance_error"></span>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="ACCOUNT_TYPE_NO" class="control-label col-lg-3">Account Type</label>
            <div class="col-lg-5">
                <input class=" form-control" id="ACCOUNT_TYPE_NOS" name="ACCOUNT_TYPE_NO" type="text" />
                <span class="error_message" id="account_type_error"></span>
            </div>
            
        </div>
	
		
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="btnAdd" name="submit" value="Add" />
                
            </div>
        </div>
    </form>
    
    <?php
        endif;
		?>
    <form method="post" class="cmxform form-horizontal ">
        <fieldset class="scheduler-border">
                <legend class="scheduler-border">Search</legend>
              
                <div class="form-group ">
                     
                 <label for="location" class="control-label col-lg-2">Bank Name </label>
                <div class="col-lg-4">

                <input class=" form-control" id="BANK_NAME" name="BANK_NAME" type="text"  style="" >
                        
                    </div>
					
					<label for="location" class="control-label col-lg-2">Account Number </label>
                <div class="col-lg-4">

                <input class=" form-control" id="ACCOUNT_NUMBER" name="ACCOUNT_NUMBER" type="text"  style="" >
                        
                </div>
				
                </div>
                <div class="form-group ">
                    
                <label for="location" class="control-label col-lg-2">Address</label>
                <div class="col-lg-4">

                <input class=" form-control" id="ADDRESS" name="ADDRESS" type="text"  style="" >
                        
                </div>
				
				<label for="location" class="control-label col-lg-2">Opening Balance  </label>
                <div class="col-lg-4">

                <input class=" form-control" id="OPENING_BALANCE" name="OPENING_BALANCE" type="text"  style="" >
                        
                </div>
				
				
                <label for="item" class="control-label col-lg-2">Account Type</label>
                <div class="col-lg-4">
                <input class=" form-control" id="ACCOUNT_TYPE_NO" name="ACCOUNT_TYPE_NO" type="text"  style="" >
                </div>
                     </br>
                    <div class=" col-lg-4">
                        <input type="submit" class="btn btn-primary" id="searchBtn" name="searchBtn" value="Search" />
                        
                    </div>
                </div>
                
                 
          </fieldset> 
        </form>

    <?php
    $where = "";
    if(isset($_POST['searchBtn']))
    {
        
        $BANK_NAME =mysqli_real_escape_string($con,trim($_POST['BANK_NAME']));
          if($BANK_NAME != ""){
            $where.=" AND `gen_banks`.`BANK_NAME` LIKE '$BANK_NAME'";
          }
          $ACCOUNT_NUMBER =$_POST['ACCOUNT_NUMBER'];
          if($ACCOUNT_NUMBER != ""){
            $where.=" AND `gen_banks`.`ACCOUNT_NUMBER` LIKE '%$ACCOUNT_NUMBER%'";
          }
         
          $ADDRESS =$_POST['ADDRESS'];
          if($ADDRESS != ""){
            $where.=" AND `gen_banks`.`ADDRESS` LIKE '%$ADDRESS%'";
          }
		  
		  $OPENING_BALANCE =$_POST['OPENING_BALANCE'];
          if($OPENING_BALANCE != ""){
            $where.=" AND `gen_banks`.`OPENING_BALANCE` LIKE '%$OPENING_BALANCE%'";
          }
		  
		  $ACCOUNT_TYPE_NO =$_POST['ACCOUNT_TYPE_NO'];
          if($ACCOUNT_TYPE_NO != ""){
            $where.=" AND `gen_banks`.`ACCOUNT_TYPE_NO` LIKE '%$ACCOUNT_TYPE_NO%'";
          }
    }
    
    
    // How many adjacent pages should be shown on each side?
    $adjacents = 3;
    
    /* 
       First get total number of rows in data table. 
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
    $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE `IS_DELETED` = 0";
    $total_pages = mysqli_fetch_array(mysqli_query($con,$query));
    $total_pages = $total_pages['num'];
    
    /* Setup vars for query. */
    $limit = 15; 
    if(isset($_GET['page']))
    {                               //how many items to show per page
        $page = $_GET['page'];
    }
    else
    $page = 1;
    
    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0
    
    /* Get data. */
  
	   $sql = "SELECT * FROM $tbl_name  WHERE $tbl_name.`IS_DELETED` = 0 $where ORDER BY $tbl_name.`BANKS_NO` DESC 
            LIMIT $start, $limit";
    $result = mysqli_query($con,$sql);
    
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1
    
    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1) 
            $pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
        else
            $pagination.= "<span class=\"disabled\"><< previous</span>";    
        
        //pages 
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))        
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
            }
        }
        
        //next button
        if ($page < $counter - 1) 
            $pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
        else
            $pagination.= "<span class=\"disabled\">next >></span>";
        $pagination.= "</div>\n";       
    }
?>

    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
            <th><center>Bank Name</center></th>
            <th><center>Account Number</center></th>
            <th><center>Address</center></th>
            <th><center>Opening Balance</center></th>
            <th><center>Account Type</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['BANK_NAME']?></td>
            <td><?=$row['ACCOUNT_NUMBER']?></td>
            <td><?=$row['ADDRESS']?></td>
            <td><?=$row['OPENING_BALANCE']?></td>
            <td><?=$row['ACCOUNT_TYPE_NO']?></td>
           <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['BANKS_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['BANKS_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>

<?=$pagination?>
    
    <!---main content end---->
<?php include 'include/footer.php';?>

<script type="text/javascript">
    $(document).ready(function() {
    
    $("#btnAdd").on("click",function() {
        $("#bank_name_error").html("&nbsp;");
        $("#account_number_error").html("&nbsp;");
        $("#address_error").html("&nbsp;");
        $("#opening_balance_error").html("&nbsp;");
        $("#account_type_error").html("&nbsp;");

        $("#BANK_NAMES").attr("class","form-control");
        $("#ACCOUNT_NUMBERS").attr("class","form-control");
        $("#ADDRESSS").attr("class","form-control");
        $("#OPENING_BALANCES").attr("class","form-control");
        $("#ACCOUNT_TYPE_NOS").attr("class","form-control");
       
        var BANK_NAMES = $("#BANK_NAMES").val().trim();
        var ACCOUNT_NUMBERS = $("#ACCOUNT_NUMBERS").val().trim();
        var ADDRESSS = $("#ADDRESSS").val().trim();
        var OPENING_BALANCES = $("#OPENING_BALANCES").val().trim();
        var ACCOUNT_TYPE_NOS = $("#ACCOUNT_TYPE_NOS").val().trim();

        if(BANK_NAMES == "") {
            $("#bank_name_error").text("Bank Name is required");
            $("#BANK_NAMES").attr("class","form-control error_input");
            $("#BANK_NAMES").focus();
            return false;
        }
        if(ACCOUNT_NUMBERS == "") {
            $("#account_number_error").text("Account Number is required");
            $("#ACCOUNT_NUMBERS").attr("class","form-control error_input");
            $("#ACCOUNT_NUMBERS").focus();
            return false;
        }
        if(ADDRESSS == "") {
            $("#address_error").text("Address is required");
            $("#ADDRESSS").attr("class","form-control error_input");
            $("#ADDRESSS").focus();
            return false;
        }
        if(OPENING_BALANCES == "") {
            $("#opening_balance_error").text("Opening Balance is required");
            $("#OPENING_BALANCES").attr("class","form-control error_input");
            $("#OPENING_BALANCES").focus();
            return false;
        }
        if(ACCOUNT_TYPE_NOS == "") {
            $("#account_type_error").text("Account Type is required");
            $("#ACCOUNT_TYPE_NOS").attr("class","form-control error_input");
            $("#ACCOUNT_TYPE_NOS").focus();
            return false;
        }
        
       
    });
});

</script>