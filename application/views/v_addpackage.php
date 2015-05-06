<html>
<body>
<form name="form" method="POST" action="<?php echo site_url('managePackage/addpackage'); ?>">

<div class="form-group">
  <label class="control-label col-sm-2" for="txtpackagename">Package Name</label>
  <div class="controls">
    <input id="txtpackagename" name="txtpackagename" cols="50" rows="1" type="text" placeholder="package name" class="input-xlarge">
    
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="txtdescription">Description</label>
  <div class="controls">
    <input id="txtdescription" name="txtdescription" type="text" cols="50" rows="10" placeholder="description" class="input-xlarge">
    
  </div>
</div>


<!-- Button -->
<div class="form-group">

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default"> Save</button>
    </div>
  </div>
</div>

</form>
</body>
</html>