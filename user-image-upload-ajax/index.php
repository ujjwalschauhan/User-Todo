<?php 
session_start();
include('../navbarUserData.php');
?>

   <h2>View and upload file</h2>
   <br />
   <div class="container-fluid shadow" style="width:70%;height:500px;">
   <form action="" class="form-group" method="POST">
   <br/><br/>
   <label for="name">Name:</label>
   <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['name']; ?>">
   
   <label for="email">Email:</label>
   <input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
   <label for="date">D-O-B:</label>
   <input type="date" name="date" id="date" class="form-control">

   <label for="address">Address:</label>
   <input type="text" name="address" id="address" class="form-control" placeholder="address">

   <label>Select Image:</label>
   <input type="file" name="file" id="file" class="form-control" />
   <br />
   <span id="uploaded_image"></span>
   <input type="submit" class="btn btn-primary" id="submitBtn" name="submitBtn" value="submit"></input>
   </form>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) === -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});
</script>