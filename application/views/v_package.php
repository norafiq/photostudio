<body>
<!-- <legend>Package</legend> -->
<form class="form-horizontal">

 <div class="container">
<fieldset>
     <header class="image-bg-fluid-height">
        <img class="img-responsive" alt="" align="center">
    </header>
    </fieldset>
 </div>
 <br>
 <div class="table">
<table id="package" class="table table-bordred table-striped">

           <thead>
             <th><input type="checkbox" id="checkall" /></th>
             <th>ID</th>
             <th>Package Name</th>
             <th>Description</th>
             <th>Edit</th>
             <th>Delete</th>
           </thead>
           <tbody>
            <?php
             // print_r($userData);

             foreach($package as $key)
             {
                //print_r($key);
                //$packageID = $key['package'];
             
            ?>
             <tr>
               <td><input type="checkbox" class="checkthis" /></td>
               <td><span><?=$key->package_id?></span></td>
               <td><span><?=$key->package_name?></span></td>
               <td><span><?=$key->description?></span></td>

               <td>
                 <!-- Button HTML (to Trigger Modal) -->
                 <button type="button" class="btn1 btn1-primary" data-toggle="modal" data-target="#myModal1" data-title="Feedback" onclick="viewEditPackage(<?=$key->package_id?>)">Edit</button>
                               

              </td>
              </tr>
              <?php
              }
              ?>
           </tbody>

 </div>

                  <!-- Modal HTML -->
                 <div id="myModal1" class="modal fade">
                   <div class="modal-dialog">
                     <form id="updPackageform" name="updPackageform" action="<?=site_url()?>/managePackage/updatePackage" method="POST">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                 <legend><h4>Package Details</h4></legend>
                             </div>
                             
                             <div class="modal-body">
                                 
                               <div class="form-group">
                                 <label for="txtpackagename" class="control-label">Package Name:<font color="red">* &nbsp;</font></label>
                                 <input name="name" type="text" class="form-control" size="50"  value="" id="txtpackagename">
                               </div>

                               <div class="form-group">
                                 <label for="txtdescription" class="control-label">Description:<font color="red">* &nbsp;</font></label>
                                 <input name="details" type="text" class="form-control" size="50" value="" id="txtdescription">
                               </div>

                               <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                  <button type="submit" value="update" name="btn_add" class="btn btn-primary">Submit</button>
                              </div>

                              <!-- <td> <?php echo anchor('managePackage/delPackage/'.$key->package_id, 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')" ));?> </td>
                               <input type="hidden" name="package_id" id="package_id" value=""> -->
                                                              
                             </div>
      <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.2.min.js?>"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js?>"></script>

      <script type="text/javascript">
var site_url = "<?=site_url()?>";

$(document).ready(function(){
  $("#myModal1").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title'); // Extract value from data-* attributes
        $(this).find('.modal-title').text(titleData + ' Form');
    });
  $("#myModal2").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title'); // Extract value from data-* attributes
        $(this).find('.modal-title').text(titleData + ' Form');
    });
  $("#myModal3").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title'); // Extract value from data-* attributes
        $(this).find('.modal-title').text(titleData + ' Form');
    });
});

function viewEditInfo(pkgID)
{
  //alert(subID);
  //hntr melalui ajax
  var request = $.ajax({
    url:site_url +"/managePackage/viewUpdateData",
    type:"POST",
    data:{packageID:pkgID},
    dataType:"json"
  });
</script>
</body>