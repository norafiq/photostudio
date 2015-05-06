<html>
<head>
<!-- jQuery (necessary for Bootstrap's Javascript plugins)-->
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-2.0.3.min.js?>"></script>
</head>
<body>

<form id="updateuser" name="updateuser"  method="POST" action="<?php echo site_url()?>/test/insertBookingReq">
<!-- action="<?=site_url()?>/text/view" -->
<!-- <form action="<?php site_url(); ?>"> -->
 <h1 align="center">&nbsp;</h1>
		<h1 align="center">VIEW BOOKING</h1>
		  <table align="center" width="100%" border="1">
		  	<tr align="center" class="odd">
      <td scope="5"><strong>NO</strong></td>
      <td scope="20"><strong>CUSTOMER NAME</strong></td>
      <td scope="15"><strong>PACKAGE NAME</strong></td>
      <td scope="15"><strong>CUSTOMER PHONE</strong></td>
      <td scope="15"><strong>CUSTOMER EMAIL</strong></td>
      <td scope="15"><strong>CUSTOMER ADDRESS</strong></td>
      <td scope="15"><strong>DATE FROM</strong></td>
      <td scope="15"><strong>DATE END</strong></td>
    </tr>
		  
		   <?php 
      // print_r($customer);
		    foreach ($customer as $viewBook){
		    	$cuname = $viewBook ->cu_fullname;
          $phone = $viewBook ->cu_tel_no;
          $email = $viewBook ->cu_email;
          $address = $viewBook ->cu_address;
		    
$noCount = 1
		    ?>
    <tr align="center">
        
        <td><?php echo $noCount++ ?><input type="hidden" name="cus_id" value="<?php echo $viewBook ->cu_id;?>"></td>
        <td><?php echo $cuname ?><input type="hidden" name="cus_name" value="<?php echo $viewBook ->cu_fullname;?>"></td>
        <td><?php echo $selectpackage ?><input type="hidden" name="selectpackage" value="<?php echo $selectpackage ?>"></td>
        <td><?php echo $phone ?><input type="hidden" name="phone_no" value="<?php echo $viewBook ->cu_tel_no;?>"></td>
        <td><?php echo $email ?><input type="hidden" name="email" value="<?php echo $viewBook ->cu_email;?>"></td> 
        <td><?php echo $address ?><input type="hidden" name="address" value="<?php echo $viewBook ->cu_address;?>"></td>
        <td><?php echo $date ?><input type="hidden" name="startdate" value="<?php echo $date ?>"></td>
        <td><?php echo $enddate ?><input type="hidden" name="enddate" value="<?php echo $enddate ?>"></td>
        <!-- <td><a href="#">View</a></td> -->
    </tr>
 <?php }?>
    <tr>	
		      <td colspan="8" align="center"><input type="submit" value="Submit" class="submit" />
		        </td>
	        </tr>
	        
	      </table>
	      
	  
	<!-- end id-form  -->
    </form>
    </body>
    </html>