<?php
namespace Phppot;

use Phppot\DataSource;
require_once __DIR__ . '/lib/UserModel.php';
$userModel = new UserModel();
if (isset($_POST["import"])) {
    $response = $userModel->readUserRecords();
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
function validateFile() {
    var csvInputFile = document.forms["frmCSVImport"]["file"].value;
    if (csvInputFile == "") {
      error = "No source found to import";
      $("#response").html(error).addClass("error");;
      return false;
    }
    return true;
  }
$(document).ready(function(){
    $("#p").click(function(){
        window.location.href='index.php';
        return false;
    })
})
</script>
</head>
<body>
  
    <div class="outer-scontainer">
        <div class="row">
            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data"
                onsubmit="return validateFile()">
                <div Class="input-row">
                
                    <div class="import">
                        <input type="file" name="file" id="file"
                                    class="file" accept=".csv,.xls,.xlsx"><br>
                        <!-- <button type="submit" id="submit" name="export"> -->
                        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Import
                        </button>
                        <button type="submit" id="submit" name="import"
                            class="btn-submit">Export</button>
                                      


                        
                    </div>
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Download Demo File</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                   
                                    <label>Coose your file. <a href="./import-template.csv" download>Download
				                        template</a></label> <br>
                                    
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" id="p" class="btn btn-primary">Upload</button>
                                    </div>
                                 </div>
                             </div>
                        </div>
                </div>
            </form>
        </div><?php  require_once __DIR__ . '/list.php';?></div>
    <div id="response"
        class="<?php if(!empty($response["type"])) { echo $response["type"] ; } ?>">
        <?php if(!empty($response["message"])) { echo $response["message"]; } ?>
        </div>
</body>
</html>