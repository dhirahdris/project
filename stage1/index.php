<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image</title>
    <link rel="icon" href="" type="image/gif" sizes="16x16">
  	<link rel="stylesheet" href="styleHome.css">
  	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">Stage 1 Multimedia Database</div>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li>
          <a href="index.php" class="active">
            <span class="icon"><i class="fas fa-images"></i></span>
            <span class="title">Image</span>
          </a>
        </li>
        <li>
          <a href="video.php">
            <span class="icon"><i class="fas fa-video"></i></span>
            <span class="title">Video</span>
          </a>
        </li>
        <li>
          <a href="audio.php">
            <span class="icon"><i class="fas fa-file-audio"></i></span>
            <span class="title">Audio</span>
          </a>
        </li>
    </ul>
  </div>
  
  <div class="main_container">
    <div class="check">
      <div class="container" style="width:900px;">  
         <h3 align="center">Insert Image</h3>  
         <br />
         <div align="right">
          <button type="button" name="add" id="add" class="btn btn-success">Add</button>
         </div>
         <br />
         <div id="image_data">

         </div>
        </div>  
       </body>  
      </html>

      <div id="imageModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Image</h4>
         </div>
         <div class="modal-body">
          <form id="image_form" method="post" enctype="multipart/form-data">
           <p><label>Select Image</label>
           <input type="file" name="image" id="image" /></p><br />
           <input type="hidden" name="action" id="action" value="insert" />
           <input type="hidden" name="image_id" id="image_id" />
           <input type="submit" name="insert" id="insert" value="Insert" />
            
          </form>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
        </div>
       </div>
      </div>
 
<script>  
$(document).ready(function(){
 
 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("Add Image");
  $('#image_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var image_name = $('#image').val();
  if(image_name == '')
  {
   alert("Please Select Image");
   return false;
  }
  else
  {
   var extension = $('#image').val().split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#image').val('');
    return false;
   }
   else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   }
  }
 });
 $(document).on('click', '.update', function(){
  $('#image_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Update Image");
  $('#insert').val("Update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var action = "delete";
  if(confirm("Are you sure you want to remove this image from database?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{image_id:image_id, action:action},
    success:function(data)
    {
     alert(data);
     fetch_data();
    }
   })
  }
  else
  {
   return false;
  }
 });
});  
</script>
    </div>    
  </div>
</div>
	
</body>
</html>