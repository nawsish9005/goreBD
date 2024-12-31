<?php include 'include/header.php';?>
<?php $table_heading = "Load Delivery Vehicle";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php include 'functions/common_function.php';?>
<?php
   /* $FACTORY_NO = $_SESSION['user']['FACTORY_NO'];
    $WAREHOUSE_NO = $_SESSION['user']['WAREHOUSE_NO'];
    $DEPO_NO = $_SESSION['user']['DEPO_NO'];
    $DP_NO = $_SESSION['user']['DP_NO'];
    if($DP_NO != 0){
        $STORE_TYPE_NO = 4;
        $FROM_STORE_ID = $DP_NO;
    }else if($DEPO_NO != 0){
        $STORE_TYPE_NO = 3;
        $FROM_STORE_ID = $DEPO_NO;
    }else if($WAREHOUSE_NO != 0){
        $FROM_STORE_TYPE = 2;
        $FROM_STORE_ID = $WAREHOUSE_NO;
    }else if($FACTORY_NO != 0){
        $FROM_STORE_TYPE = 1;
        $FROM_STORE_ID = $FACTORY_NO;
        $FROM_NAME = getDeliveryVehicle($con,$FACTORY_NO);
    }else{
        echo "<meta http-equiv='refresh' content='0; url=access_denied.php' />";
    } */
?>
        <form class="cmxform form-horizontal " id="signupForm" method="post" action="" >
            
			<div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Employee No</label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMPLOYEE_NO" name="EMPLOYEE_NO" type="text"   />
            </div>
            
        </div>
       
        <div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Employee Name</label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMPLOYEE_NAME" name="EMPLOYEE_NAME" type="text" />
            </div>
            
        </div>
		
			<div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Employee Address</label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMPLOYEE_ADD" name="EMPLOYEE_ADD" type="text" />
            </div>
            
            </div>

            
                
             <fieldset class="scheduler-border">
                <legend class="scheduler-border">Item Details</legend>
              
                <div class="form-group ">
            <label for="MOBILE_NO" class="control-label col-lg-3">Mobile No</label>
            <div class="col-lg-5">
                <input class=" form-control" id="MOBILE_NO" name="MOBILE_NO" type="number"   />
            </div>
            
        </div>
       
        <div class="form-group ">
            <label for="EMAIL_NAME" class="control-label col-lg-3">Email</label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMAIL_NAME" name="EMAIL_NAME" type="email" />
            </div>
            
                    <div class=" col-lg-4">
                        <input type="button" class="btn btn-primary"  id="addItem" name="add" value="Add" />
                        
                    </div>
        </div>
                                
          </fieldset> 
        </form>
    <form method="post">
    <div style="overflow: auto;">
    <table class="table table-bordered table-hover dataTable" max-width="90%">
        <thead>
            <tr>
                <th>Mobile</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="item_details">
        </tbody>
        </table>
    </div>
    </form>
       <input type="button" class="btn btn-primary col-lg-offset-10" id="loadAll" value="Load">
    <!---main content end---->
<?php include 'include/footer.php';?>
<script type="text/javascript">
    $(document).ready(function(){
        //load store
        
        //Load Unit.....
        //$("#ITEM_NO").on("change",function(){
          //  var html = "";
            //if($(this).val() != 0){
              //  $.post("ajax/get_item_unit.php",{ITEM_NO: $(this).val()},
                //function(data,status){
                  //  html+=data;
                    //$("#UNIT_NO").html(html);
               // });
           // }
            //$("#UNIT_NO").html(html);
        //});

        function duplicate_item_no_check(MOBILE_NO,EMAIL_NAME){
            var is_duplicate = 0;
            $(".edit_list").each(function(){
                var CHK_MOBILE_NO = $(this).attr("MOBILE_NO");
                var CHK_EMAIL_NAME = $(this).attr("EMAIL_NAME");
                var is_edit = $(this).attr("is_edit");
                if(isNaN(is_edit)){
                    is_edit = 0;
                }
                if(CHK_MOBILE_NO == MOBILE_NO && CHK_EMAIL_NAME == EMAIL_NAME && is_edit == 0)
                    is_duplicate = 1;
            });
            return is_duplicate;
        }

        //remove set edit.
		function remove_set_edit(){
            $(".set_edit").each(function(){
                $(this).removeAttr("class");
            });
        }

        //add list item
        $("#addItem").on("click",function(){
           
            var MOBILE_NO = $("#MOBILE_NO").val();
			var EMAIL_NAME = $("#EMAIL_NAME").val();
            var is_duplicate = duplicate_item_no_check(MOBILE_NO,EMAIL_NAME);
            if(is_duplicate == 0){
                var html = "";
                var innerHtml = "";
                html+="<tr>";
                innerHtml+="<td>"+MOBILE_NO+"</td>";
                innerHtml+="<td>"+EMAIL_NAME+"</td>";
                innerHtml+="<td><a class='btn btn-danger remove_list'>Remove</a><a class='btn btn-success edit_list' MOBILE_NO = '"+MOBILE_NO+"' EMAIL_NAME = '"+EMAIL_NAME+"'>Edit</a></td>";
                html+=innerHtml;
                html+="</tr>";
                if($(this).val() == "Add"){
                    $("#item_details").append(html);
                }else{
                    $(this).val("Add");
                    $("#item_details tr.set_edit").html(innerHtml);	    
                }
				
				$("#MOBILE_NO").val("");
				$("#EMAIL_NAME").val("");
            }else{
                alert("Duplicate Record Found");
            }
        });

        //remove from list
        $(document).on("click",".remove_list",function(){
            var con = confirm("Are you Sure to Remove?");
            if(con){
                $(this).parents('tr').remove();
            }
        });


        //edit list item
        $(document).on("click",".edit_list",function(){
			alert("Are you want to edit?");
            remove_set_edit();
            $(this).parents('tr').attr("class","set_edit");
            $(this).attr("is_edit",1);
            var MOBILE_NO = $(this).attr("MOBILE_NO");
            var EMAIL_NAME = $(this).attr("EMAIL_NAME");
			$("#MOBILE_NO").val(MOBILE_NO);
			$("#EMAIL_NAME").val(EMAIL_NAME);
            $("#addItem").val("Update");
        });

        //save all data
        $("#loadAll").on("click",function(){
            var empty_child = 1;
            var mobile_no_list = [];
            var email_name_list = []; 
            $(".edit_list").each(function(){
                empty_child = 0;
                mobile_no_list.push($(this).attr("MOBILE_NO"));
                email_name_list.push($(this).attr("EMAIL_NAME"));
            });
            if(empty_child == 1){
                alert("Items Required!");
                return false;
            }
            var EMPLOYEE_ADD  = $("#EMPLOYEE_ADD").val();
            var EMPLOYEE_NAME =$("#EMPLOYEE_NAME").val();
             var EMPLOYEE_NO  =$("#EMPLOYEE_NO").val();

             $.post("save_delivery_product_load.php",{ EMPLOYEE_NO :EMPLOYEE_NO , EMPLOYEE_NAME :EMPLOYEE_NAME,
                EMPLOYEE_ADD:EMPLOYEE_ADD,
				mobile_no_list : mobile_no_list.toString(), email_name_list : email_name_list.toString() },
                function(data,status){
                    if(data == true){
                        alert("Data Saved Successfully");
                    }
					$("#EMPLOYEE_ADD").val("");
				    $("#EMPLOYEE_NAME").val("");
					$("#EMPLOYEE_NO").val("");
				    $("#item_details").html("");
                });
		
        });

    });
	
</script>