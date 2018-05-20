

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- 
		css for this file is written in index.css as this file is only used in index.php
	-->
</head>
<body>
<div id="wrapper">

    <div id="blur">
        
    </div>

	  <div id="upload_box"  style="display:block; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Upload songs</div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/musicmania/uploads/upload.php">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="Playlist Category" class="col-md-3 control-label">Playlist Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="category" placeholder="Choose a category for this song">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="Name of song" class="col-md-3 control-label">Name of song</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="song_name" placeholder="Name of song" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Singer" class="col-md-3 control-label">Singer</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="singer" placeholder="optional">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Choose song to upload" class="col-md-3 control-label">Choose song</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="fileToUpload" >
                                    </div>
                                </div>
                                    
                               

                                
                              
                                

                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">                                          
                                        
                                <!-- <div class="form-group"> -->
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input id="btn-signup" value="Upload" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>
                                       &nbsp &nbsp &nbsp <button id="btn-signup" type="button" class="btn btn-info" onclick ="hide_upload_box()">Cancel</button>
                                    </div>
                                <!-- </div> -->
                                </div>
                                
                                                          
                            </form>
                         </div>
                    </div>
           
         </div> 
 </div>
</body>
</html>