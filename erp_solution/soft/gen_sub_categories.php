<?php include 'include/header.php';?>
<?php $table_heading = " Gen Sub Categories Setup";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
 <?php
        $tbl_name="gen_sub_categories";        //your table name
        $targetpage = "gen_sub_categories.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user']['user_no'];
    $CURR_TIME = date('Y-m-d :H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE SUB_CATEGORIES_NO = $ID";
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
           $GROUP_NO = trim($_POST['GROUP_NO']);
           $SUB_GROUP_NO = trim($_POST['SUB_GROUP_NO']);
           $CATEGORIES_NO = trim($_POST['CATEGORIES_NO']);
           $SUB_CATEGORIES_NAME = trim($_POST['SUB_CATEGORIES_NAME']);
           $SUB_CATEGORIES_CODE = trim($_POST['SUB_CATEGORIES_CODE']);
           
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `GROUP_NO` = '$GROUP_NO' AND `SUB_GROUP_NO` = '$SUB_GROUP_NO' AND `CATEGORIES_NO` = '$CATEGORIES_NO' AND `SUB_CATEGORIES_NAME` = '$SUB_CATEGORIES_NAME' AND `SUB_CATEGORIES_CODE` = '$SUB_CATEGORIES_CODE' ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name ( `GROUP_NO`,`SUB_GROUP_NO`,`CATEGORIES_NO` ,`SUB_CATEGORIES_NAME`,`SUB_CATEGORIES_CODE`,  `CREATED_BY` , `CREATED_ON`) VALUES(  '$GROUP_NO','$SUB_GROUP_NO','$CATEGORIES_NO','$SUB_CATEGORIES_NAME','$SUB_CATEGORIES_CODE', '$user_no', '$CURR_TIME')";
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
            $SUB_CATEGORIES_NO = trim($_POST['SUB_CATEGORIES_NO']);
            $GROUP_NO = $_POST['GROUP_NO'];
            $SUB_GROUP_NO = $_POST['SUB_GROUP_NO'];
            $CATEGORIES_NO = $_POST['CATEGORIES_NO'];
            $SUB_CATEGORIES_NAME = $_POST['SUB_CATEGORIES_NAME'];
            $SUB_CATEGORIES_CODE = $_POST['SUB_CATEGORIES_CODE'];
            
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `GROUP_NO` = '$GROUP_NO' AND `SUB_GROUP_NO` = '$SUB_GROUP_NO' AND `CATEGORIES_NO` = '$CATEGORIES_NO' AND `SUB_CATEGORIES_NAME` = '$SUB_CATEGORIES_NAME' AND `SUB_CATEGORIES_CODE` = '$SUB_CATEGORIES_CODE' AND `SUB_CATEGORIES_NO` != '$SUB_CATEGORIES_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1): 
                
                $sql = "UPDATE $tbl_name SET   `GROUP_NO` = '$GROUP_NO' ,`SUB_GROUP_NO` = '$SUB_GROUP_NO' ,`CATEGORIES_NO` = '$CATEGORIES_NO' ,`SUB_CATEGORIES_NAME` = '$SUB_CATEGORIES_NAME' ,`SUB_CATEGORIES_CODE` = '$SUB_CATEGORIES_CODE' , `IS_UPDATED` = 1, `UPDATED_BY` = $user_no ,`UPDATED_ON` = '$CURR_TIME'  WHERE SUB_CATEGORIES_NO = $SUB_CATEGORIES_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `SUB_CATEGORIES_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="SUB_CATEGORIES_NO" value="<?=$result['SUB_CATEGORIES_NO']?>" />
            </div>
        </div>

        <div class="form-group ">
            <label for="GROUP_NO" class="control-label col-lg-3">Group</label>
            <div class="col-lg-5">
                <select class="form-control" name="GROUP_NO" id="GROUP_NO">
                        <?php
                            $sql = "SELECT * FROM `gen_groups` where 1 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['GROUP_NO']?>" <?php if($result['GROUP_NO'] == $row['GROUP_NO'])  echo 'selected'; ?>><?=$row['GROUP_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>

        <div class="form-group ">
            <label for="SUB_GROUP_NO" class="control-label col-lg-3">Sub Group</label>
            <div class="col-lg-5">
                <select class="form-control" name="SUB_GROUP_NO" id="SUB_GROUP_NO">
                        <?php
                            $sql = "SELECT * FROM `gen_sub_groups` where 1 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['SUB_GROUP_NO']?>" <?php if($result['SUB_GROUP_NO'] == $row['SUB_GROUP_NO'])  echo 'selected'; ?>><?=$row['SUB_GROUP_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>

        <div class="form-group ">
            <label for="CATEGORIES_NO" class="control-label col-lg-3">Category</label>
            <div class="col-lg-5">
                <select class="form-control" name="CATEGORIES_NO" id="CATEGORIES_NO">
                        <?php
                            $sql = "SELECT * FROM `gen_cataegories` where 1 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['CATEGORIES_NO']?>" <?php if($result['CATEGORIES_NO'] == $row['CATEGORIES_NO'])  echo 'selected'; ?>><?=$row['CATEGORIES_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>
        
      <div class="form-group ">
            <label for="SUB_CATEGORIES_NAME" class="control-label col-lg-3">Sub Categories Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="SUB_CATEGORIES_NAME" type="text" value="<?=$result['SUB_CATEGORIES_NAME']?>" required />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="SUB_CATEGORIES_CODE" class="control-label col-lg-3">Sub Categories Code</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="SUB_CATEGORIES_CODE" type="text" value="<?=$result['SUB_CATEGORIES_CODE']?>" required />
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
            <label for="GROUP_NO" class="control-label col-lg-3">Group Name:</label>
            <div class="col-lg-5">
                <select class="form-control" id="GROUP_NO" name="GROUP_NO">
                    <option value="-1">--Select Group--</option>
                    <?php
                        $sql="SELECT * FROM `gen_groups` WHERE `IS_DELETED`=0";
                        $query=mysqli_query($con,$sql);
                       while($row=mysqli_fetch_array($query)):
                    ?>
                    <option value="<?=$row['GROUP_NO']?>"><?=$row['GROUP_NAME']?></option>
                    <?php endwhile; ?>
                </select>
                <p class="error_message" id="group_error"></p>
            </div>
        </div>

        <div class="form-group ">
            <label for="SUB_GROUP_NO" class="control-label col-lg-3">Sub Group Name:</label>
            <div class="col-lg-5">
                <select class="form-control" id="SUB_GROUP_NO" name="SUB_GROUP_NO">
                    <option value="-1">--Select Sub Group--</option>
                </select>
                <p class="error_message" id="sub_group_error"></p>
            </div>
        </div> 
        <div class="form-group ">
            <label for="CATEGORIES_NO" class="control-label col-lg-3">Category Name:</label>
            <div class="col-lg-5">
                <select class="form-control" id="CATEGORIES_NO" name="CATEGORIES_NO">
                    <option value="-1">--Select Category--</option>
                </select>
                <p class="error_message" id="categories_error"></p>
            </div>
        </div>
       
        <div class="form-group ">
            <label for="SUB_CATEGORIES_NAME" class="control-label col-lg-3">Sub Categories Name</label>
            <div class="col-lg-5">
                <input class=" form-control" id="SUB_CATEGORIES_NAME" name="SUB_CATEGORIES_NAME" type="text"  required />
                <p class="error_message" id="sub_categories_name_error"></p>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="SUB_CATEGORIES_CODE" class="control-label col-lg-3">Sub Categories Code</label>
            <div class="col-lg-5">
                <input class=" form-control" id="SUB_CATEGORIES_CODE" name="SUB_CATEGORIES_CODE" type="text" />
                <p class="error_message" id="sub_categories_code_error"></p>
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
                     
                   


        <div class="form-group ">
            <label for="location" class="control-label col-lg-2"> Group No</label>
            <div class="col-lg-4">
                <select class="form-control" id="GROUP_NO" name="GROUP_NO">
                    <option value="-1">--Select Group--</option>
                    <?php
                        $sql="SELECT * FROM `gen_groups` WHERE `IS_DELETED`=0";
                        $query=mysqli_query($con,$sql);
                       while($row=mysqli_fetch_array($query)):
                    ?>
                    <option value="<?=$row['GROUP_NO']?>"><?=$row['GROUP_NAME']?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
		
		<div class="form-group ">
            <label for="location" class="control-label col-lg-2"> Sub Group Name:</label>
            <div class="col-lg-4">
                <select class="form-control" id="SUB_GROUP_NO" name="SUB_GROUP_NO">
                    <option value="-1">--Select Group--</option>
                    <?php
                        $sql="SELECT * FROM `gen_sub_groups` WHERE `IS_DELETED`=0";
                        $query=mysqli_query($con,$sql);
                       while($row=mysqli_fetch_array($query)):
                    ?>
                    <option value="<?=$row['SUB_GROUP_NO']?>"><?=$row['SUB_GROUP_NAME']?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>

                   
                    <label for="item" class="control-label col-lg-2">Sub Categories Name</label>
                    <div class="col-lg-4">

                        <input class=" form-control" id="SUB_CATEGORIES_NAME" name="SUB_CATEGORIES_NAME" type="text"  style="" >
                        
                    </div>

                </div>
                <div class="form-group ">
                    
                <label for="location" class="control-label col-lg-2">Sub Categories Code </label>
                <div class="col-lg-4">

                <input class=" form-control" id="SUB_CATEGORIES_CODE" name="SUB_CATEGORIES_CODE" type="text"  style="" >
                        
                    </div>
                     
                    <label for="location" class="control-label col-lg-2"></label>
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
        
        $GROUP_NO =mysqli_real_escape_string($con,trim($_POST['GROUP_NO']));
          if($GROUP_NO != "-1"){
            $where.=" AND `gen_sub_categories`.`GROUP_NO`='$GROUP_NO'";
          }
          $SUB_GROUP_NO =$_POST['SUB_GROUP_NO'];
          if($SUB_GROUP_NO != "-1"){
            $where.=" AND `gen_sub_categories`.`SUB_GROUP_NO` ='$SUB_GROUP_NO'";
          }
         
          $CATEGORIES_NO =$_POST['CATEGORIES_NO'];
          if($CATEGORIES_NO != "-1"){
            $where.=" AND `gen_sub_categories`.`CATEGORIES_NO` = '$CATEGORIES_NO'";
          }
		  
		  $SUB_CATEGORIES_NAME =$_POST['SUB_CATEGORIES_NAME'];
          if($SUB_CATEGORIES_NAME != ""){
            $where.=" AND `gen_sub_categories`.`SUB_CATEGORIES_NAME` LIKE '%$SUB_CATEGORIES_NAME%'";
          }
		  $SUB_CATEGORIES_CODE =$_POST['SUB_CATEGORIES_CODE'];
          if($SUB_CATEGORIES_CODE != ""){
            $where.=" AND `gen_sub_categories`.`SUB_CATEGORIES_CODE` LIKE '%$SUB_CATEGORIES_CODE%'";
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
    $sql = "SELECT * FROM $tbl_name LEFT JOIN `gen_groups` ON `gen_groups`.`GROUP_NO`=$tbl_name.`GROUP_NO` LEFT JOIN 
	`gen_sub_groups` ON `gen_sub_groups`.`SUB_GROUP_NO`=$tbl_name.`SUB_GROUP_NO` LEFT JOIN `gen_cataegories` ON 
	`gen_cataegories`.`CATEGORIES_NO`=$tbl_name.`CATEGORIES_NO` WHERE $tbl_name.`IS_DELETED` = 0 
	$where ORDER BY $tbl_name.`SUB_CATEGORIES_NO` DESC LIMIT $start, $limit";
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
            $pagination.= "<p class=\"disabled\"><< previous</p>";    
        
        //pages 
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<p class=\"current\">$counter</p>";
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
                        $pagination.= "<p class=\"current\">$counter</p>";
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
                        $pagination.= "<p class=\"current\">$counter</p>";
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
                        $pagination.= "<p class=\"current\">$counter</p>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
            }
        }
        
        //next button
        if ($page < $counter - 1) 
            $pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
        else
            $pagination.= "<p class=\"disabled\">next >></p>";
        $pagination.= "</div>\n";       
    }
?>

    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
            <th><center>Group No</center></th>
            <th><center>Sub Group No</center></th>
            <th><center>Categories No</center></th>
            <th><center>Sub Categories Name</center></th>
            <th><center>Sub Categories CODE</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['GROUP_NAME']?></td>
            <td><?=$row['SUB_GROUP_NAME']?></td>
            <td><?=$row['CATEGORIES_NAME']?></td>
            <td><?=$row['SUB_CATEGORIES_NAME']?></td>
            <td><?=$row['SUB_CATEGORIES_CODE']?></td>
           <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['SUB_CATEGORIES_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['SUB_CATEGORIES_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>

<?=$pagination?>
    
    <!---main content end---->
<?php include 'include/footer.php';?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#GROUP_NO").on("change",function(){
            var GROUP_NO = $(this).val();
            if(GROUP_NO!= -1){
                $.post("ajax/get_sub_group.php",{GROUP_NO:GROUP_NO},function(data){
                   // console.log(data.trim().length);
                     $("#SUB_GROUP_NO").html(data);
                        
                    
                });
            }else{
                
                 $("#SUB_GROUP_NO").html("<option value='-1'>--Select Sub Group--</option>");
            }
        });

        $(document).on("change","#SUB_GROUP_NO",function(){
            var SUB_GROUP_NO = $(this).val();
            if(SUB_GROUP_NO!= "-1"){
                $.post("ajax/categories.php",{SUB_GROUP_NO:SUB_GROUP_NO},function(data){
                   // console.log(data.trim().length);
                    $("#CATEGORIES_NO").html(data);
                    
                });
            }else{
                $("#CATEGORIES_NO").html("<option value='-1'>--Select Categories--</option>");
            }
        });
        
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    
    $("#btnAdd").on("click",function() {
        $("#group_error").html("");
        $("#sub_group_error").html("");
        $("#categories_error").html("");
        $("#sub_categories_name_error").html("");
        $("#sub_categories_code_error").html("");

        $("#GROUP_NO").attr("class","form-control");
        $("#SUB_GROUP_NO").attr("class","form-control");
        $("#CATEGORIES_NO").attr("class","form-control");
        $("#SUB_CATEGORIES_NAME").attr("class","form-control");
        $("#SUB_CATEGORIES_CODE").attr("class","form-control");
       
        var GROUP_NO = $("#GROUP_NO").val().trim();
        var SUB_GROUP_NO = $("#SUB_GROUP_NO").val().trim();
        var CATEGORIES_NO = $("#CATEGORIES_NO").val().trim();
        var SUB_CATEGORIES_NAME = $("#SUB_CATEGORIES_NAME").val().trim();
        var SUB_CATEGORIES_CODE = $("#SUB_CATEGORIES_CODE").val().trim();

        if(GROUP_NO == "-1") {
            $("#group_error").text("Group Name is required");
            $("#GROUP_NO").attr("class","form-control error_input");
            $("#GROUP_NO").focus();
            return false;
        }
        if(SUB_GROUP_NO == "-1") {
            $("#sub_group_error").text("Sub Group Name is required");
            $("#SUB_GROUP_NO").attr("class","form-control error_input");
            $("#SUB_GROUP_NO").focus();
            return false;
        }
        if(CATEGORIES_NO == "-1") {
            $("#categories_error").text("Categories is required");
            $("#CATEGORIES_NO").attr("class","form-control error_input");
            $("#CATEGORIES_NO").focus();
            return false;
        }
        if(SUB_CATEGORIES_NAME == "") {
            $("#sub_categories_name_error").text("Sub Categories Name is required");
            $("#SUB_CATEGORIES_NAME").attr("class","form-control error_input");
            $("#SUB_CATEGORIES_NAME").focus();
            return false;
        }
        if(SUB_CATEGORIES_CODE == "") {
            $("#sub_categories_code_error").text("Sub Categories Code is required");
            $("#SUB_CATEGORIES_CODE").attr("class","form-control error_input");
            $("#SUB_CATEGORIES_CODE").focus();
            return false;
        }
        
       
    });
});

</script>