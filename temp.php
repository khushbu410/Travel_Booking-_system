       
                        <?php 
                        if(isset($packages->status) && !empty($packages->status))
                        {
                        ?>






       Number of Seats
                    </td>
                    <td>
                      <form  action="process_booking.php" method="post">
                <input type="hidden" name="screen" value="<?php echo $screen['screen_id'];?>"/>
                <input type="number" required tile="Number of Seats" max="<?php echo $screen['seats']-$avl[0];?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
                <input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge'];?>"/>
                <input type="hidden" name="date" value="<?php echo $date;?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Amount
                    </td>
                    <td id="amount" style="font-weight:bold;font-size:18px">
                      Rs <?php echo $packages['cost'];?>
                    </td>
                  </tr>


























        <style type="text/css">
    label {
        display: inline-block;
        text-align: right;
    }
    </style>
        <div class="container-fluid">
    <form action="" id="book-form">
        <div class="section">
  <label for="guestname" class="field-label">Please Enter Your Name</label>
 <span class="field-icon"><i class="fa fa-user"></i></span> 
  <label for="guestname" class="field prepend-icon'">
 <input type="text" name="guestname" id="guestname" class="gui-input" required="" placeholder="John Doe">
  </label>

</div>
               
<div class="frm-row">
  <div class="section colm colm6">
    <label for="guestemail" class="field-label">Email Address</label>
    <span class="field-icon"><i class="fa fa-envelope"></i></span>  
    <label for="guestemail" class="field prepend-icon">
      <input type="email" name="guestemail" id="guestemail" class="gui-input" required="" placeholder="john@something.com"> 
    </label>
  </div>
   
  <div class="section colm colm6">
    <label for="guestelephone" class="field-label">Telephone / Mobile</label>
    <span class="field-icon"><i class="fa fa-phone-square"></i></span> 
    <label for="guestelephone" class="field prepend-icon">
      <input type="text" name="guestelephone" id="guestelephone" class="gui-input" required="" placeholder=" Mobile Number"> 
    </label>
  </div>
</div>
 
<div class="frm-row">
  <div class="section colm colm6">
    <label for="adults" class="field-label">Number of Adults</label>
    <span class="field-icon"><i class="fa fa-users"></i></span>  
    <label for="adults" class="field prepend-icon">
      <input type="number" id="adults" name="adults" class="gui-input" required="" placeholder="Number of adults">  
    </label>
  </div>
   
  <div class="section colm colm6">
    <label for="children" class="field-label">Number of Children</label>
    <span class="field-icon"><i class="fa fa-users"></i></span>  
    <label for="children" class="field prepend-icon">
      <input type="number" id="children" name="children" class="gui-input" required="" placeholder="Number of children">
  </div>
</div>
 
<div class="frm-row">
  <div class="section colm colm6">
    <label for="checkin" class="field-label">Check-in Date</label>
    <span class="field-icon"><i class="fa fa-calendar"></i></span>  
    <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>" >
            <input type="date" class='form form-control' required   name='schedule'>
      
    </label>
  </div>
   
  <div class="section colm colm6">
    <label for="checkout" class="field-label">Check-out Date</label>
    <span class="field-icon"><i class="fa fa-calendar"></i></span>  
    <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>" >
            <input type="date" class='form form-control' required   name='schedule'> 
    </label>
  </div>
</div>
 
<div class="spacer-t20 spacer-b30">
  <div class="tagline"><span>Please answer these questions for a pleasant stay</span></div>
</div>
 
<div class="frm-row">
  <div class="option-group field">
      
    <div class="section colm colm6">
      <label class="switch">
        <input type="checkbox" name="switch2" id="switch2" value="switch2">
        <span class="switch-label" data-on="YES" data-off="NO"></span>
        <span>Do you need us to pick you up?</span>
      </label>
    </div>
               
  </div>
</div>
 <div class="section">
  <label for="comment" class="field-label">Anything else we should know about?</label>
  <span class="field-icon"><i class="fa fa-comments"></i></span>
  <label for="comment" class="field prepend-icon">
    <textarea class="gui-textarea" id="comment" name="comment" placeholder="Let us know about any special accommodation needs"></textarea>
    
    <span class="input-hint"> 
     <br> <strong>Please:</strong> Be as descriptive as possible
    </span>   
  </label>
</div>
    </form>
</div>