<?php include 'include/header.php';?>
<?php $table_heading = "Outlate Setup";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
 <?php
        $tbl_name="gen_outlates";        //your table name
        $targetpage = "outlate_setup.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user']['USER_NO'];
    $ORGANIZATION_NO =$_SESSION['user']['ORGANIZATION_NO'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE OUTLATE_NO = $ID";
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
           $BIT_NO =$_POST['BIT_NO'];
           $OUTLATE_NAME = mysqli_real_escape_string($con,trim($_POST['OUTLATE_NAME']));
           $OUTLATE_CODE = strtoupper(mysqli_real_escape_string($con,trim($_POST['OUTLATE_CODE'])));
           $ROAD_NO = mysqli_real_escape_string($con,trim($_POST['ROAD_NO']));
           $HOUSE_NO = mysqli_real_escape_string($con,trim($_POST['HOUSE_NO']));
           $BLOCK_NO = mysqli_real_escape_string($con,trim($_POST['BLOCK_NO']));
           $CONTACT_NO = mysqli_real_escape_string($con,trim($_POST['CONTACT_NO']));
           $OWNER_NAME = mysqli_real_escape_string($con,trim($_POST['OWNER_NAME']));
           $OUTLATE_DUE_LIMIT = mysqli_real_escape_string($con,trim($_POST['OUTLATE_DUE_LIMIT']));
           $ADDRESS = mysqli_real_escape_string($con,trim($_POST['ADDRESS']));
          $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `BIT_NO` = '$BIT_NO' AND `ORGANIZATION_NO` = '$ORGANIZATION_NO' AND `OUTLATE_NAME` = '$OUTLATE_NAME' AND UPPER(`OUTLATE_CODE`) = '$OUTLATE_CODE'  ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name (  `OUTLATE_NAME` ,`OUTLATE_CODE` ,`BIT_NO` ,`ORGANIZATION_NO` ,`OWNER_NAME`,`CONTACT_NO` ,`ROAD_NO` , `HOUSE_NO` ,`BLOCK_NO`,   `OUTLATE_DUE_LIMIT`,`ADDRESS`,  `CREATED_BY` , `CREATED_ON`) VALUES( '$OUTLATE_NAME','$OUTLATE_CODE', '$BIT_NO', '$ORGANIZATION_NO','$OWNER_NAME','$CONTACT_NO','$ROAD_NO','$HOUSE_NO','$BLOCK_NO',  '$OUTLATE_DUE_LIMIT','$ADDRESS', '$user_no', '$CURR_TIME')";
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
            $OUTLATE_NO = $_POST['OUTLATE_NO'];
            $BIT_NO =$_POST['BIT_NO'];
           $OUTLATE_NAME = mysqli_real_escape_string($con,trim($_POST['OUTLATE_NAME']));
           $OUTLATE_CODE = strtoupper(mysqli_real_escape_string($con,trim($_POST['OUTLATE_CODE'])));
           $ROAD_NO = mysqli_real_escape_string($con,trim($_POST['ROAD_NO']));
           $HOUSE_NO = mysqli_real_escape_string($con,trim($_POST['HOUSE_NO']));
           $BLOCK_NO = mysqli_real_escape_string($con,trim($_POST['BLOCK_NO']));
           $CONTACT_NO = mysqli_real_escape_string($con,trim($_POST['CONTACT_NO']));
           $OWNER_NAME = mysqli_real_escape_string($con,trim($_POST['OWNER_NAME']));
           $OUTLATE_DUE_LIMIT = mysqli_real_escape_string($con,trim($_POST['OUTLATE_DUE_LIMIT']));
           $ADDRESS = mysqli_real_escape_string($con,trim($_POST['ADDRESS']));
           
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `BIT_NO` = '$BIT_NO' AND `ORGANIZATION_NO` = '$ORGANIZATION_NO' AND `OUTLATE_NAME` = '$OUTLATE_NAME' AND UPPER(`OUTLATE_CODE`) = '$OUTLATE_CODE'  AND `OUTLATE_NO` != '$OUTLATE_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1): 
                
                $sql = "UPDATE $tbl_name SET  `OUTLATE_NAME` = '$OUTLATE_NAME' ,`OUTLATE_CODE` = '$OUTLATE_CODE' , `BIT_NO` = '$BIT_NO' , `ORGANIZATION_NO` = '$ORGANIZATION_NO' ,`OWNER_NAME` = '$OWNER_NAME',`CONTACT_NO` = '$CONTACT_NO' ,`ROAD_NO` = '$ROAD_NO' ,`HOUSE_NO` = '$HOUSE_NO' ,`BLOCK_NO` = '$BLOCK_NO' , `OUTLATE_DUE_LIMIT` = '$OUTLATE_DUE_LIMIT',`ADDRESS` = '$ADDRESS' , `IS_UPDATED` = 1, `UPDATED_BY` = '$user_no' ,`UPDATED_ON` = '$CURR_TIME'  WHERE OUTLATE_NO = $OUTLATE_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `OUTLATE_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="OUTLATE_NO" value="<?=$result['OUTLATE_NO']?>" />
            </div>
        </div>
        
      <div class="form-group ">
            <label for="BIT_NO" class="control-label col-lg-3">Select Bit </label>
            <div class="col-lg-5">
                <select class="form-control" name="BIT_NO" id="BIT_NO">
                        <?php
                            $sql = "SELECT * FROM `gen_bits` where IS_DELETED=0 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['BIT_NO']?>" <?php if($result['BIT_NO'] == $row['BIT_NO'])  echo 'selected'; ?>><?=$row['BIT_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="OUTLATE_NAME" class="control-label col-lg-3">Outlate Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OUTLATE_NAME" type="text" value="<?=$result['OUTLATE_NAME']?>"  />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="OUTLATE_CODE" class="control-label col-lg-3">Outlate Code </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OUTLATE_CODE" type="text" value="<?=$result['OUTLATE_CODE']?>"  />
            </div>
            
        </div>
         <div class="form-group ">
            <label for="OWNER_NAME" class="control-label col-lg-3">Owner Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OWNER_NAME" type="text" value="<?=$result['OWNER_NAME']?>" required  />
            </div>
            
        </div>
         <div class="form-group ">
            <label for="CONTACT_NO" class="control-label col-lg-3">Contact No</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CONTACT_NO" type="text" value="<?=$result['CONTACT_NO']?>"  required/>
            </div>
            
        </div>
         <div class="form-group ">
            <label for="ROAD_NO" class="control-label col-lg-3">Road No </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ROAD_NO" type="text" value="<?=$result['ROAD_NO']?>"  required/>
            </div>
            
        </div>
         <div class="form-group ">
            <label for="HOUSE_NO" class="control-label col-lg-3">House No</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="HOUSE_NO" type="text" value="<?=$result['HOUSE_NO']?>" required />
            </div>
            
        </div>
         <div class="form-group ">
            <label for="BLOCK_NO" class="control-label col-lg-3">Block No </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="BLOCK_NO" type="text" value="<?=$result['BLOCK_NO']?>"  />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="OUTLATE_DUE_LIMIT" class="control-label col-lg-3">Outlate Due Limit </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OUTLATE_DUE_LIMIT" type="number" value="<?=$result['OUTLATE_DUE_LIMIT']?>" min="0"/>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Address</label>
            <div class="col-lg-5">
                <textarea class="form-control" name="ADDRESS"><?=$result['ADDRESS']?></textarea>
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
            <label for="BIT_NO" class="control-label col-lg-3">Select Bit </label>
            <div class="col-lg-5">
                <select class="form-control" name="BIT_NO" id="BIT_NO">
                        <?php
                            $sql = "SELECT * FROM `gen_bits` where IS_DELETED=0 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['BIT_NO']?>" ><?=$row['BIT_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="OUTLATE_NAME" class="control-label col-lg-3">Outlate Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OUTLATE_NAME" type="text"   />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="OUTLATE_CODE" class="control-label col-lg-3">Outlate Code </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OUTLATE_CODE" type="text"   />
            </div>
            
        </div>
         
         <div class="form-group ">
            <label for="OWNER_NAME" class="control-label col-lg-3">Owner Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OWNER_NAME" type="text" required  />
            </div>
            
        </div>
         <div class="form-group ">
            <label for="CONTACT_NO" class="control-label col-lg-3">Contact No</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CONTACT_NO" type="text"   required/>
            </div>
            
        </div>
         <div class="form-group ">
            <label for="ROAD_NO" class="control-label col-lg-3">Road No </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="ROAD_NO" type="text"   required/>
            </div>
            
        </div>
         <div class="form-group ">
            <label for="HOUSE_NO" class="control-label col-lg-3">House No</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="HOUSE_NO" type="text"  required />
            </div>
            
        </div>
         <div class="form-group ">
            <label for="BLOCK_NO" class="control-label col-lg-3">Block No</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="BLOCK_NO" type="text"  />
            </div>
            
        </div>
        <div class="form-group ">
            <label for="OUTLATE_DUE_LIMIT" class="control-label col-lg-3">Outlate Due Limit </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="OUTLATE_DUE_LIMIT" type="number"  min="0"/>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Address</label>
            <div class="col-lg-5">
                <textarea class="form-control" name="ADDRESS"></textarea>
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
    $sql = "SELECT * FROM $tbl_name   LEFT JOIN `gen_bits` ON `gen_bits`.`BIT_NO`=$tbl_name.`BIT_NO` LEFT JOIN `gen_organizations` ON `gen_organizations`.`ORGANIZATION_NO`=$tbl_name.`ORGANIZATION_NO`   WHERE $tbl_name.`IS_DELETED` = 0       
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
<div style="overflow: auto">
    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
            <th><center>Organization Name</center></th>
            <th><center>Bit Name</center></th>
            <th><center>Outlate Name</center></th>
             <th><center>Outlate Code</center></th>
            <th><center>Owner Name</center></th>
            <th><center>Contact No</center></th>
            <th><center>Road No</center></th>
            <th><center>House No</center></th>
            <th><center>BLOCK_NO</center></th>
            <th><center>Outlate Due Limit</center></th>
            <th><center>Address</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['ORGANIZATION_NAME']?></td>
            <td><?=$row['BIT_NAME']?></td>
            <td><?=$row['OUTLATE_NAME']?></td>
            <td><?=$row['OUTLATE_CODE']?></td>
            <td><?=$row['OWNER_NAME']?></td>
            <td><?=$row['CONTACT_NO']?></td>
            <td><?=$row['ROAD_NO']?></td>
            <td><?=$row['HOUSE_NO']?></td>
            <td><?=$row['BLOCK_NO']?></td>
            <td><?=$row['OUTLATE_DUE_LIMIT']?></td>
            <td><?=$row['ADDRESS']?></td>
           <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['OUTLATE_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['OUTLATE_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
</div>
<?=$pagination?>
    
    <!---main content end---->
<?php include 'include/footer.php';?>