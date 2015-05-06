<html>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link href="<?=base_url()?>assets/js/jquery-1.11.2.min?>">
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

  <script>
  $(function() {
    $(".datepicker").datepicker();


  });

  </script>
<legend>Booking</legend>

<form class="form-horizontal" action="<?=site_url()?>/welcome/booking" method="POST">

<!-- Select Basic -->
<div class="form-group">
  <label class="col-sm-2 control-label" for="selectpackage">Select Package</label>
  <br>
  <br>
  <div class="col-sm-2 control-label">
    <select id="selectpackage" name="selectpackage" class="input-xlarge validate[required]">    
    
    <?php 
    $Package=0;
    foreach ($booking as $row) 
    {
      if($Package==0)
      {
        $package_name = $row->package_name;
 ?>       
 <option value="<?php echo $row->package_name;?>"><?php echo $row->description; ?></option>
 <?php
        $Package=1;
      }
      else
      {
       // $package_name = $row->package_name; -->
       ?>
        <option value="<?php echo $row->package_name;?>"><?php echo $row->description;?></option>
        <?php
      }
    } ?>
    </select>
    <div class= "form-group">
    <label class="col-sm-2 control-label" for="description">Description</label>
     <td class="col-sm-2"value="<?$row->package_name?>"><?=$row->description?></td>
    </div>

  </div>
</div>
<br>
<div class="form-group">
<label for="startdate" id="startdate"  class="col-sm-2 control-label">Select Start Date</label>
<br>
<br>
  <div class="col-sm-2 control-label">
  <p>Date: <input type="text" name="startdate" class="datepicker"></p>
  </div>
</div>

<div class="form-group">
<label for="enddate" id="enddate"  class="col-sm-2 control-label">Select End Date</label>
<br>
<br>
  <div class="col-sm-2 control-label">
  <p>Date: <input type="text" name="enddate" class="datepicker"></p>
  </div>
</div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit">Next</button>
    </div>
  </div>
</form>
</html>