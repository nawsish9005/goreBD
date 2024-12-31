<?php include 'include/header.php';?>
<?php $table_heading = " Organization Setup";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
 <?php
        $tbl_name="gen_organizations";        //your table name
        $targetpage = "organization_setup.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE ORGANIZATION_NO = $ID";
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
           $ORGANIZATION_NAME = mysqli_real_escape_string($con,trim($_POST['ORGANIZATION_NAME']));
           $ORGANIZATION_CODE = mysqli_real_escape_string($con,trim($_POST['ORGANIZATION_CODE']));
           $DIVISION_NO = trim($_POST['DIVISION_NO']);
           $DISTRICT_NO = trim($_POST['DISTRICT_NO']);
           $UPAZILA_NO = trim($_POST['UPAZILA_NO']);
           $BUILDING_NAME = trim($_POST['BUILDING_NAME']);
           $CONTACT_EMAIL = trim($_POST['CONTACT_EMAIL']);
           $CONTACT_NUM = trim($_POST['CONTACT_NUM']);
           $ROAD_NUM = trim($_POST['ROAD_NUM']);
           $HOUSE_NUM = trim($_POST['HOUSE_NUM']);
           $BLOCK_NUM = trim($_POST['BLOCK_NUM']);
           $ORGANIZATION_ADDRESS =mysqli_real_escape_string($con,trim($_POST['ORGANIZATION_ADDRESS']));

            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `ORGANIZATION_NAME` = '$ORGANIZATION_NAME' AND `ORGANIZATION_CODE` = '$ORGANIZATION_CODE'  AND `CONTACT_EMAIL`= '$CONTACT_EMAIL' AND `CONTACT_NUM`= '$CONTACT_NUM' ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name SET `ORGANIZATION_NAME` = '$ORGANIZATION_NAME',`ORGANIZATION_CODE` = '$ORGANIZATION_CODE',`DIVISION_NO` = '$DIVISION_NO',`DISTRICT_NO`= '$DISTRICT_NO', `UPAZILA_NO`= '$UPAZILA_NO',`BUILDING_NAME`= '$BUILDING_NAME',`CONTACT_EMAIL`= '$CONTACT_EMAIL',`CONTACT_NUM`= '$CONTACT_NUM',`ROAD_NUM`= '$ROAD_NUM', `HOUSE_NUM`= '$HOUSE_NUM', `BLOCK_NUM`= '$BLOCK_NUM', `ORGANIZATION_ADDRESS`= '$ORGANIZATION_ADDRESS'";
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
           $ORGANIZATION_NO = trim($_POST['ORGANIZATION_NO']);
           $ORGANIZATION_NAME = trim($_POST['ORGANIZATION_NAME']);
           $ORGANIZATION_CODE = trim($_POST['ORGANIZATION_CODE']);
           $DIVISION_NO = trim($_POST['DIVISION_NO']);
           $DISTRICT_NO = trim($_POST['DISTRICT_NO']);
           $UPAZILA_NO = trim($_POST['UPAZILA_NO']);
           $BUILDING_NAME = trim($_POST['BUILDING_NAME']);
           $CONTACT_EMAIL = trim($_POST['CONTACT_EMAIL']);
           $CONTACT_NUM = trim($_POST['CONTACT_NUM']);
           $ROAD_NUM = trim($_POST['ROAD_NUM']);
           $HOUSE_NUM = trim($_POST['HOUSE_NUM']);
           $BLOCK_NUM = trim($_POST['BLOCK_NUM']);
           $ORGANIZATION_ADDRESS = trim($_POST['ORGANIZATION_ADDRESS']);

            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `ORGANIZATION_NAME` = '$ORGANIZATION_NAME' AND `ORGANIZATION_CODE` = '$ORGANIZATION_CODE'  AND `CONTACT_EMAIL`= '$CONTACT_EMAIL' AND `CONTACT_NUM`= '$CONTACT_NUM' AND `ORGANIZATION_NO` != '$ORGANIZATION_NO' ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1): 
                
              $sql = "UPDATE $tbl_name SET `ORGANIZATION_NAME` = '$ORGANIZATION_NAME',`ORGANIZATION_CODE` = '$ORGANIZATION_CODE',`DIVISION_NO` = '$DIVISION_NO',`DISTRICT_NO`= '$DISTRICT_NO', `UPAZILA_NO`= '$UPAZILA_NO',`BUILDING_NAME`= '$BUILDING_NAME',`CONTACT_EMAIL`= '$CONTACT_EMAIL',`CONTACT_NUM`= '$CONTACT_NUM',`ROAD_NUM`= '$ROAD_NUM', `HOUSE_NUM`= '$HOUSE_NUM', `BLOCK_NUM`= '$BLOCK_NUM', `ORGANIZATION_ADDRESS`= '$ORGANIZATION_ADDRESS',`IS_UPDATED`= 1, `UPDATED_BY`= '$user_no' WHERE ORGANIZATION_NO = $ORGANIZATION_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `ORGANIZATION_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="ORGANIZATION_NO" value="<?=$result['ORGANIZATION_NO']?>" />
            </div>
        </div>
        
      
        <div class="form-group ">
            <label for="ORGANIZATION_NAME" class="control-label col-lg-3">Organization Name: </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ORGANIZATION_NAME" type="text" value="<?=$result['ORGANIZATION_NAME']?>"
                  required />
            </div>
        </div>

        <div class="form-group ">
            <label for="ORGANIZATION_CODE" class="control-label col-lg-3">Organization Code:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ORGANIZATION_CODE" type="text"  value="<?=$result['ORGANIZATION_CODE']?>"  required />
            </div>
        </div>
       
         <div class="form-group ">
            <label for="BUILDING_NAME" class="control-label col-lg-3">Buliding Name:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="BUILDING_NAME" type="text" value="<?=$result['BUILDING_NAME']?>"   required />
            </div>
        </div>

         <div class="form-group ">
            <label for="CONTACT_EMAIL" class="control-label col-lg-3"> Contact Email:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CONTACT_EMAIL" type="text" value="<?=$result['CONTACT_EMAIL']?>"   required />
            </div>
        </div>


         <div class="form-group ">
            <label for="CONTACT_NUM" class="control-label col-lg-3">Contact No:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CONTACT_NUM" type="text" value="<?=$result['CONTACT_NUM']?>"   required />
            </div>
        </div>

         <div class="form-group ">
            <label for="ROAD_NUM" class="control-label col-lg-3">Road No:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ROAD_NUM" type="text" value="<?=$result['ROAD_NUM']?>"   required />
            </div>
        </div>
        
         <div class="form-group ">
            <label for="HOUSE_NUM" class="control-label col-lg-3">House No:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="HOUSE_NUM" type="text" value="<?=$result['HOUSE_NUM']?>"    required />
            </div>
        </div>
        
        <div class="form-group ">
            <label for="BLOCK_NUM" class="control-label col-lg-3">Block No:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="BLOCK_NUM" type="text" value="<?=$result['BLOCK_NUM']?>"    required />
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
            <label for="ORGANIZATION_ADDRESS" class="control-label col-lg-3">Organization Details:</label>
            <div class="col-lg-5">
                <textarea class="form-control" name="ORGANIZATION_ADDRESS"><?=$result['ORGANIZATION_ADDRESS']?></textarea>
            </div>
        </div>
        
        
     <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="update" value="Update"/> 
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
            <label for="ORGANIZATION_NAME" class="control-label col-lg-3">Organization Name: </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ORGANIZATION_NAME" type="text" 
                  required />
            </div>
        </div>

        <div class="form-group ">
            <label for="ORGANIZATION_CODE" class="control-label col-lg-3">Organization Code:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ORGANIZATION_CODE" type="text"   required />
            </div>
        </div>
       
         <div class="form-group ">
            <label for="BUILDING_NAME" class="control-label col-lg-3">Buliding Name:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="BUILDING_NAME" type="text"   required />
            </div>
        </div>

         <div class="form-group ">
            <label for="CONTACT_EMAIL" class="control-label col-lg-3">Email:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CONTACT_EMAIL" type="text"   required />
            </div>
        </div>


         <div class="form-group ">
            <label for="CONTACT_NUM" class="control-label col-lg-3">Contact No:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CONTACT_NUM" type="text"   required />
            </div>
        </div>

         <div class="form-group ">
            <label for="ROAD_NUM" class="control-label col-lg-3">Road No:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ROAD_NUM" type="text"   required />
            </div>
        </div>
        
         <div class="form-group ">
            <label for="HOUSE_NUM" class="control-label col-lg-3">House Number:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="HOUSE_NUM" type="text"   required />
            </div>
        </div>
        
        <div class="form-group ">
            <label for="BLOCK_NUM" class="control-label col-lg-3">Block No:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="BLOCK_NUM" type="text"   required />
            </div>
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
            <label for="ORGANIZATION_ADDRESS" class="control-label col-lg-3">Organization Details:</label>
            <div class="col-lg-5">
                 <textarea class="form-control" name="ORGANIZATION_ADDRESS"></textarea>
            </div>
        </div>
        
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="submit"  />
                
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
    $sql = "SELECT * FROM $tbl_name LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=$tbl_name.`DIVISION_NO` LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=$tbl_name.`DISTRICT_NO` LEFT JOIN `gen_upazila` ON `gen_upazila`.`UPAZILA_NO`=$tbl_name.`UPAZILA_NO`  WHERE $tbl_name.`IS_DELETED` = 0  LIMIT $start, $limit";
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
<div style="overflow: auto">
    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>

            <th><center>Sl</center></th>
            <th><center>Organization Name</center></th>
            <th><center>Org Code</center></th>
            <th><center>Division</center></th>
            <th><center>District</center></th>
            <th><center>Upazila</center></th>
            <th><center>Email</center></th>
            <th><center>Contact No</center></th>
            <th><center>Building Name</center></th>
            <th><center>Road No</center></th>
            <th><center>House No</center></th>
            <th><center>Block No</center></th>
            <th><center>Organization Address</center></th>
            <th><center>Action</center></th>
            
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['ORGANIZATION_NAME']?></td>
            <td><?=$row['ORGANIZATION_CODE']?></td>
            <td><?=$row['DIVISION_NAME']?></td>
            <td><?=$row['DISTRICT_NAME']?></td>
            <td><?=$row['UPAZILA_NAME']?></td>
            <td><?=$row['CONTACT_EMAIL']?></td>
            <td><?=$row['CONTACT_NUM']?></td>
            <td><?=$row['BUILDING_NAME']?></td>
           <td><?=$row['ROAD_NUM']?></td>
            <td><?=$row['HOUSE_NUM']?></td>
            <td><?=$row['BLOCK_NUM']?></td>
            <td><?=$row['ORGANIZATION_ADDRESS']?></td>
           <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['ORGANIZATION_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['ORGANIZATION_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
</div>
<?=$pagination?>
    
    <!---main content end---->
<?php include 'include/footer.php';?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#DIVISION_NO").on("change",function(){
            var DIVISION_NO = $(this).val();
            if(DIVISION_NO!= -1){
                $.post("ajax/get_districts.php",{DIVISION_NO:DIVISION_NO},function(data){
                   // console.log(data.trim().length);
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


