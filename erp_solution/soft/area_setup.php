<?php include 'include/header.php';?>
<?php $table_heading = "Area Setup";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
 <?php
    $tbl_name="gen_area";        //your table name
    $targetpage = "area_setup.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user']['USER_NO'];
    $ORGANIZATION_NO =$_SESSION['user']['ORGANIZATION_NO'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
    $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE AREA_NO = $ID";
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
            $DIVISION_NO = trim($_POST['DIVISION_NO']);
           $DISTRICT_NO = trim($_POST['DISTRICT_NO']);
           $UPAZILA_NO = trim($_POST['UPAZILA_NO']);
           $AREA_NAME = mysqli_real_escape_string($con,trim($_POST['AREA_NAME']));
            $AREA_CODE = mysqli_real_escape_string($con,trim($_POST['AREA_CODE']));
           $AREA_REMARKS = mysqli_real_escape_string($con,trim($_POST['AREA_REMARKS']));
           $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `ORGANIZATION_NO` = '$ORGANIZATION_NO' AND `DIVISION_NO` = '$DIVISION_NO' AND `DISTRICT_NO` = '$DISTRICT_NO' AND`UPAZILA_NO` = '$UPAZILA_NO' AND `AREA_NAME` = '$AREA_NAME' AND `AREA_CODE` = '$AREA_CODE'  ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name (`ORGANIZATION_NO`, `DIVISION_NO` ,`DISTRICT_NO` , `UPAZILA_NO` , `AREA_NAME` ,`AREA_CODE` ,`AREA_REMARKS`,  `CREATED_BY` , `CREATED_ON`) VALUES('$ORGANIZATION_NO',  '$DIVISION_NO','$DISTRICT_NO', '$UPAZILA_NO','$AREA_NAME','$AREA_CODE','$AREA_REMARKS', '$user_no', '$CURR_TIME')";
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
            $DIVISION_NO = trim($_POST['DIVISION_NO']);
            $DISTRICT_NO = trim($_POST['DISTRICT_NO']);
           $UPAZILA_NO = trim($_POST['UPAZILA_NO']);
          
            $AREA_NAME = mysqli_real_escape_string($con,trim($_POST['AREA_NAME']));
            $AREA_CODE = mysqli_real_escape_string($con,trim($_POST['AREA_CODE']));
           $AREA_REMARKS = mysqli_real_escape_string($con,trim($_POST['AREA_REMARKS']));
            $AREA_NO = $_POST['AREA_NO'];
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `ORGANIZATION_NO` = '$ORGANIZATION_NO' AND `DIVISION_NO` = '$DIVISION_NO' AND `DISTRICT_NO` = '$DISTRICT_NO' AND`UPAZILA_NO` = '$UPAZILA_NO' AND `AREA_NAME` = '$AREA_NAME' AND `AREA_CODE` = '$AREA_CODE' AND `AREA_NO` != '$AREA_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1): 
                
                $sql = "UPDATE $tbl_name SET `ORGANIZATION_NO` = '$ORGANIZATION_NO',  `DIVISION_NO` = '$DIVISION_NO' ,`DISTRICT_NO` = '$DISTRICT_NO',`UPAZILA_NO` = '$UPAZILA_NO',`AREA_NAME` = '$AREA_NAME' ,`AREA_CODE` = '$AREA_CODE' ,`AREA_REMARKS` = '$AREA_REMARKS' , `IS_UPDATED` = 1, `UPDATED_BY` = '$user_no' ,`UPDATED_ON` = '$CURR_TIME'  WHERE AREA_NO = $AREA_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `AREA_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
        <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="AREA_NO" value="<?=$result['AREA_NO']?>" />
            </div>
        </div>
        
        <div class="form-group ">
            <label for="DIVISION_NO" class="control-label col-lg-3">Division </label>
            <div class="col-lg-5">
                <select class="form-control" name="DIVISION_NO" id="DIVISION_NO">
                        <?php
                            $sql = "SELECT * FROM `gen_divisions` where 1 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['DIVISION_NO']?>" <?php if($result['DIVISION_NO'] == $row['DIVISION_NO'])  echo 'selected'; ?>><?=$row['DIVISION_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>
        <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">District</label>
            <div class="col-lg-5" >
                <select class="form-control" id="DISTRICT_NO" name="DISTRICT_NO">
                    <option>--Select District--</option>
                    <?php
                        $sql = "SELECT `DISTRICT_NO`, `DISTRICT_NAME` FROM `gen_districts` WHERE `DIVISION_NO` = ".$result['DIVISION_NO'];
                        $query = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?=$row['DISTRICT_NO']?>"<?php if($result['DISTRICT_NO'] == $row['DISTRICT_NO'])  echo 'selected'; ?>><?=$row['DISTRICT_NAME']?></option>
                    <?php endwhile;?>
                </select>     
            </div>
             
        </div>
        <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">Upazila</label>
            <div class="col-lg-5" >
                <select class="form-control" id="UPAZILA_NO" name="UPAZILA_NO">
                    <option>--Select Upazila--</option>
                    <?php
                        $sql = "SELECT `UPAZILA_NO`, `UPAZILA_NAME` FROM `gen_upazila` WHERE `DISTRICT_NO` = ".$result['DISTRICT_NO'];
                        $query = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?=$row['UPAZILA_NO']?>"<?php if($result['UPAZILA_NO'] == $row['UPAZILA_NO'])  echo 'selected'; ?>><?=$row['UPAZILA_NAME']?></option>
                    <?php endwhile;?>
                </select>     
            </div>
             
        </div>

        <div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Area Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="AREA_NAME" type="text" value="<?=$result['AREA_NAME']?>"  />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="AREA_CODE" class="control-label col-lg-3">Area Code </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="AREA_CODE" type="text" value="<?=$result['AREA_CODE']?>"  />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="AREA_REMARKS" class="control-label col-lg-3">Area Remarks </label>
            <div class="col-lg-5">
                <textarea class="form-control" name="AREA_REMARKS"><?=$result['AREA_REMARKS']?></textarea>
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
            <label for="DIVISION_NO" class="control-label col-lg-3">Division </label>
            <div class="col-lg-5">
                <select class="form-control" name="DIVISION_NO" id="DIVISION_NO">
                    <option value="-1">--Select Division--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_divisions` where 1 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['DIVISION_NO']?>" ><?=$row['DIVISION_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>
        <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">District</label>
            <div class="col-lg-5" >
                <select class="form-control" id="DISTRICT_NO" name="DISTRICT_NO">
                    <option>--Select District--</option>
                </select>     
            </div>
             
        </div>
        <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">Upazila</label>
            <div class="col-lg-5" >
                <select class="form-control" id="UPAZILA_NO" name="UPAZILA_NO">
                    <option>--Select Upazila--</option>
                </select>     
            </div>
             
        </div>
        <div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Area Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="AREA_NAME" type="text"   />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="AREA_CODE" class="control-label col-lg-3">Area Code </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="AREA_CODE" type="text"   />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="AREA_REMARKS" class="control-label col-lg-3">Area Remarks </label>
            <div class="col-lg-5">
                <textarea class="form-control" name="AREA_REMARKS"></textarea>
            </div>
            
        </div>
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="submit" value="Add" />
                
            </div>
        </div>
    </form>
    
    <?php
        endif;
    
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
    $sql = "SELECT * FROM $tbl_name LEFT JOIN `gen_organizations` ON `gen_organizations`.`ORGANIZATION_NO`=$tbl_name.`ORGANIZATION_NO` LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=$tbl_name.`DIVISION_NO` LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=$tbl_name.`DISTRICT_NO` LEFT JOIN `gen_upazila` ON `gen_upazila`.`UPAZILA_NO`=$tbl_name.`UPAZILA_NO`  WHERE $tbl_name.`IS_DELETED` = 0       
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
            <th><center>Organization</center></th>
            <th><center>Division Name</center></th>
            <th><center>District Name</center></th>
            <th><center>Upazila Name</center></th>
            <th><center>Area Name</center></th>
            <th><center>Area Code</center></th>
            <th><center>Area Remarks</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['ORGANIZATION_NAME']?></td>
            <td><?=$row['DIVISION_NAME']?></td>
            <td><?=$row['DISTRICT_NAME']?></td>
            <td><?=$row['UPAZILA_NAME']?></td>
            <td><?=$row['AREA_NAME']?></td>
            <td><?=$row['AREA_CODE']?></td>
            <td><?=$row['AREA_REMARKS']?></td>
           <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['AREA_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['AREA_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>

<?=$pagination?>
    
    <!---main content end---->
<?php include 'include/footer.php';?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#DIVISION_NO").on("change",function(){
            var DIVISION_NO = $(this).val();
            if(DIVISION_NO!= -1){
                $.post("ajax/get_districts.php",{DIVISION_NO:DIVISION_NO},function(data){
                   if(data.trim().length > 0){
                        $("#DISTRICT_NO").html(data);
                        $("#UPAZILA_NO").html("<option value='-1'>--Select Upazila--</option>");
                    }
                });


            }else{
                $("#DISTRICT_NO").html("<option value='-1'>--Select District--</option>");
                $("#UPAZILA_NO").html("<option value='-1'>--Select Upazila--</option>");
            }
        });

        $(document).on("change","#DISTRICT_NO",function(){
            var DISTRICT_NO = $(this).val();
            if(DISTRICT_NO!= -1){
                $.post("ajax/get_upazila.php",{DISTRICT_NO:DISTRICT_NO},function(data){
                   // console.log(data.trim().length);
                    if(data.trim().length > 0){
                        $("#UPAZILA_NO").html(data);
                        
                    }
                });
            }else{
                $("#UPAZILA_NO").html("<option value='-1'>--Select Upazila--</option>");
            }
        });
        

        
    });
</script>