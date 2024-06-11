<?php 
    global $cost;
    global $packages;
include 'config.php';
 $price = 0;
    if(isset($_GET['package_id'])){
    $packages = $conn->query("SELECT cost FROM `packages` where (id) = '{$_GET['package_id']}'");

    if($packages->num_rows > 0){
          
            foreach($packages->fetch_assoc() as $key => $val){
                $price = $val;
            

             }
    
     
     } 
           
    }
    
    
?>
   


 
<div class="container-fluid">
    <form action="#" id="book-form">
        <div class="form-group">
            <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>" >
             
            <b>Check in Date</b> <input type="date"class="form form-control" name="Check_in_date" 
            id="checkin" required="ture"/>
            <b>Check out Date </b><input type="date"class="form form-control" name="Check_out_date" id="checkout" required="ture" />
            <b>MobileNumber</b><input type="tel"class="form form-control" name="MobileNumber" pattern="[1-9]{1}[0-9]{9}" title="error message" id="mobil.no" required="ture" />
            <b>Email </b><input type="email" class="form form-control" name="Email" id="email" required="" />

            <!--new code-->

            
            <b>Number of Persons</b><input type="hidden" name="Number_guest" value="<?php echo $row['Number_guest'];?>"/>
                <input type="number" required tile="Number of Person" max="500" min="0" 
                name="Number_guest" class="form-control" value="1" style="text-align:center" id="NumberofGuest"/>
                <input type="hidden" name="payment" id="price" 
                value="<#?#php echo number_format($cost) ?>"/>
               
            
            <br>

                    
                  <span class="rounded-0 btn-flat btn-sm btn-primary d-flex align-items-center justify-content-between" id="finalPrice"><i class="fa fa-tag"></i> <span class="ml-1">
                   <?php echo "Rs". (number_format($price));?></span></span>

            <br>
                        
           
            <!--<input type="submit" name="save" id="save" value="Save" class="form form-control" font-color="fff"/>-->

        </div>
    </form>
</div> 
<script>


    $(function(){
        var finalPrice = <?php echo $price; ?>;    
        $('#NumberofGuest').on('change', function(){
            if($(this).val() > 1) {
                $('#finalPrice').html(finalPrice * $(this).val());
            } else {
                $('#finalPrice').html(finalPrice);
            }
        });
        
        $('#book-form').submit(function(e){
            e.preventDefault();
            start_loader()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=book_tour",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        alert_toast("Book Request Successfully sent.")
                        $('.modal').modal('hide')
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader()
                }
            })
        })
    })
</script>
