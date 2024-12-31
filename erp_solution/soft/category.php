<?php include 'include/header.php';?>
<?php $table_heading = " Category Setup";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
 <?php
        $tbl_name="gen_cataegories";        //your table name
        $targetpage = "category.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user']['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE CATEGORIES_NO = $ID";
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
           $CATEGORIES_NAME = mysqli_real_escape_string($con,trim($_POST['CATEGORIES_NAME']));
           $CATEGORIES_CODE = mysqli_real_escape_string($con,trim($_POST['CATEGORIES_CODE']));
           $GROUP_NO = trim($_POST['GROUP_NO']);
           $SUB_GROUP_NO = trim($_POST['SUB_GROUP_NO']);

            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `CATEGORIES_NAME` = '$CATEGORIES_NAME' AND `CATEGORIES_CODE` = '$CATEGORIES_CODE'";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name SET `CATEGORIES_NAME` = '$CATEGORIES_NAME',`CATEGORIES_CODE` = '$CATEGORIES_CODE',`GROUP_NO` = '$GROUP_NO',`SUB_GROUP_NO`= '$SUB_GROUP_NO'";
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
           $CATEGORIES_NO = trim($_POST['CATEGORIES_NO']);
           $CATEGORIES_NAME = trim($_POST['CATEGORIES_NAME']);
           $CATEGORIES_CODE = trim($_POST['CATEGORIES_CODE']);
           $GROUP_NO = trim($_POST['GROUP_NO']);
           $SUB_GROUP_NO = trim($_POST['SUB_GROUP_NO']);

            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `CATEGORIES_NAME` = '$CATEGORIES_NAME' AND `CATEGORIES_CODE` = '$CATEGORIES_CODE' AND `CATEGORIES_NO` != '$CATEGORIES_NO' ";
            $COUNT = mysqli_num_rows(mysqli_query($con,$SQL));
            if($COUNT < 1): 
                
              $sql = "UPDATE $tbl_name SET `CATEGORIES_NAME` = '$CATEGORIES_NAME',`CATEGORIES_CODE` = '$CATEGORIES_CODE',`GROUP_NO` = '$GROUP_NO',`SUB_GROUP_NO`= '$SUB_GROUP_NO',`IS_UPDATED`= 1, `UPDATED_BY`= '$user_no' WHERE CATEGORIES_NO = $CATEGORIES_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `CATEGORIES_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($con,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-5 col-md-offset-3 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="CATEGORIES_NO" value="<?=$result['CATEGORIES_NO']?>" />
            </div>
        </div>
        
      
        <div class="form-group ">
            <label for="CATEGORIES_NAME" class="control-label col-lg-3">Categories Name: </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CATEGORIES_NAME" type="text" value="<?=$result['CATEGORIES_NAME']?>"
                  required />
            </div>
        </div>

        <div class="form-group ">
            <label for="CATEGORIES_CODE" class="control-label col-lg-3">Caregories Code:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CATEGORIES_CODE" type="text"  value="<?=$result['CATEGORIES_CODE']?>"  required />
            </div>
        </div>
       
        

        <!-- update er somoy bosamu  -->
        <div class="form-group ">
            <label for="GROUP_NO" class="control-label col-lg-3">Group No </label>
            <div class="col-lg-5">
                <select class="form-control" name="GROUP_NO" id="GROUP_NO">
                        <?php
                            $sql = "SELECT * FROM `gen_groups` where 1 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['GROUP_NO']?>" <?php if($result['GROUP_NO'] == $row['GROUP_NO'])  echo 'selected'; ?>><?=$row['GROUP_NO']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>
        <!-- end -->
        <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">Sub Category No</label>
            <div class="col-lg-5" >
                <select class="form-control" id="SUB_GROUP_NO" name="SUB_GROUP_NO">
                    <option>--Select District--</option>
                    <?php
                        $sql = "SELECT `SUB_GROUP_NO`, `SUB_GROUP_NO` FROM `gen_sub_groups` WHERE `GROUP_NO` = ".$result['GROUP_NO'];
                        $query = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?=$row['SUB_GROUP_NO']?>"<?php if($result['SUB_GROUP_NO'] == $row['SUB_GROUP_NO'])  echo 'selected'; ?>><?=$row['SUB_GROUP_NO']?></option>
                    <?php endwhile;?>
                </select>     
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
            <label for="CATEGORIES_NAME" class="control-label col-lg-3">Categories Name: </label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CATEGORIES_NAME" type="text" 
                  required />
            </div>
        </div>

        <div class="form-group ">
            <label for="CATEGORIES_CODE" class="control-label col-lg-3">Categories Code:</label>
            <div class="col-lg-5">
                <input class=" form-control" id="" name="CATEGORIES_CODE" type="text"   required />
            </div>
        </div>
       
        
        
        <!-- insert er somoy bosamu  -->
        <div class="form-group ">
            <label for="GROUP_NO" class="control-label col-lg-3">Group No </label>
            <div class="col-lg-5">
                <select class="form-control" name="GROUP_NO" id="GROUP_NO">
                    <option value="-1">--Select Group--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_groups` where 1 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['GROUP_NO']?>" ><?=$row['GROUP_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            
        </div>
        <!-- end -->
        <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">Sub Group No</label>
            <div class="col-lg-5" >
                <select class="form-control" id="SUB_GROUP_NO" name="SUB_GROUP_NO">
                    <option value="-1">--Select Sub Group--</option>
                </select>     
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
    $sql = "SELECT * FROM $tbl_name LEFT JOIN `gen_groups` ON `gen_groups`.`GROUP_NO`=$tbl_name.`GROUP_NO` LEFT JOIN `gen_sub_groups` ON `gen_sub_groups`.`SUB_GROUP_NO`=$tbl_name.`SUB_GROUP_NO`  WHERE $tbl_name.`IS_DELETED` = 0  LIMIT $start, $limit";
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
            <th><center>Categories Name</center></th>
            <th><center>Categories Code</center></th>
            <th><center>Group No</center></th>
            <th><center>Sub Group No</center></th>
            <th><center>Action</center></th>
            
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['CATEGORIES_NAME']?></td>
            <td><?=$row['CATEGORIES_CODE']?></td>
            <td><?=$row['GROUP_NO']?></td>
            <td><?=$row['SUB_GROUP_NO']?></td>
           <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['CATEGORIES_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['CATEGORIES_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
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
        $("#GROUP_NO").on("change",function(){
            var GROUP_NO = $(this).val();
            if(GROUP_NO!= -1){
                $.post("ajax/get_sub_group.php",{GROUP_NO:GROUP_NO},function(data){
                   // console.log(data.trim().length);
                    if(data.trim().length > 0){
                        $("#SUB_GROUP_NO").html(data);
                       /* $("#ABC").html("<option value='-1'>--Select Upazila--</option>");*/
                    }
                });


            }else{
                $("#SUB_GROUP_NO").html("<option value='-1'>--Select District--</option>");
               
            }
        });

        
    });
</script>


