<?php 
    include_once 'header.php';
?>

<script>
 //Function for Response Word Count
 function countWords(loc){
        
        var resp = document.getElementById('response' + loc);
        var textR = resp.value;
        
        var count = 0;
        
        var words = textR.split(' ');
        
        for(var i = 0; i<words.length; i++){
            if(words[i]!=  ''){
                count++;
            }
        }
        
        var counter = document.getElementById('wc'+loc);
        counter.innerHTML = count;

        var max = parseInt(document.getElementById('wl' + loc).textContent);
        
        if(count>max || count == 0){
            if(count>max){
                counter.classList.add('text-danger');
            }
            document.getElementById('check'+loc).checked = false;
            document.getElementById('check'+loc).disabled = true;
        } else{
            document.getElementById('check'+loc).disabled = false;
            counter.classList.remove('text-danger');
        }

    }
</script>
<title>Essays</title>  
<!--Container with Essay Finder Scrollspy Opener-->
  <main style = "scroll-padding-top: 70px;">
  <div class = "sticky-top mt-1 container-fluid bg-light d-flex" style= "z-index: 1;">

  <h3 class = " mb-none pt-2">
  <?php echo $_SESSION['currentName'] ?>
  <button class="btn btn-primary " type="button" data-bs-toggle="offcanvas" data-bs-target="#quickNav">
        Find Essay
  </button>
</h3>
    </div>
      
    <div class="offcanvas offcanvas-start" tabindex="-1" id="quickNav" style="width: 300px;">
        <div class="card card-body" style="width: 300px;">
        <h3> Essay Navigation </h3>
        <div id="list-example" class="list-group">
        <?php
            //Get Database Data for Scrollspy
            $uid = $_SESSION["userid"];
            $cCol = $_SESSION['cCollege'];
            $sql = "SELECT * FROM essays WHERE userId = $uid AND collegeId = $cCol;";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            //Add Essays to Scrollspy
            if($num>0){
                echo "<h6>Click on Essay to Quickly Scroll</h6>";
                $n = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $prompt = mysqli_real_escape_string($conn,$row['essayPrompt']);
                    $essayRef = '#ep'.$n;
                    echo "<a class=\"list-group-item text-truncate list-group-item-action\" href=\"$essayRef\">$prompt</a>";
                    $n++;
                }
                
            }else{
                echo "<h6>Added Essays will be Displayed Here</h6>";
            }
        ?>
        <!--Link to return to Colleges Page-->
        <p>Return to <a href = "colleges.php">Colleges</a> </p>
      </div>
        </div>
    </div>
    
  
    <div class = "container-fluid mt-3 mx-auto" data-bs-spy= "scroll" data-bs-target="#quickNav" data-bs-offset="0" tabindex="0"  style = "max-width:1000px">
    
    <?php 
    //Get Database Data for Essay Cards
    $uid = $_SESSION["userid"];
    $cCol = $_SESSION['cCollege'];
    $sql = "SELECT * FROM essays WHERE userId = $uid AND collegeId = $cCol;";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    //Create Cards
    if($num > 0){
      $n = 1;
      while($row = mysqli_fetch_assoc($result)){
          //Create Session Variable
          $id = $row['essayId'];
          $_SESSION['eID'.$n] = $id;
          //Store Data
          $prompt = mysqli_real_escape_string($conn,$row['essayPrompt']);
          $limit = $row['wordLimit'];
          $response = mysqli_real_escape_string($conn, $row['response']);
          $notes = mysqli_real_escape_string($conn,$row['notes']);
          $comp = $row['completed'];
          
          //Unique HTML ID Creation
          $essay = 'essay'.$n;
          $ep = 'ep'.$n;
          $wl = 'wl'.$n;
          $rsp = 'response'.$n;
          $wc = 'wc'.$n;
          $nt = 'notes'.$n;
          $check = 'check'.$n;
          
          //Display Essay Card
          echo " <!--Essay 1-->
          <div class=\"card mx-auto mb-4\"  id = \"$essay\">
              <div class=\"card-header\">
                  <!--Essay Name-->
                  <h4 class = \"d-inline-block text-wrap\" style = \"padding-top:75px; margin-top:-75px;\" id=\"$ep\">$prompt</h4>
                  <!--Edit and Delete Buttons-->
                  <button type=\"button\" class=\"btn btn-danger float-end mx-1\"  data-bs-toggle=\"modal\" data-bs-target=\"#delEssay\" data-bs-whatever=\"$n\" >
                      <i class=\"bi bi-trash\" data-bs-toggle=\"tooltip\" title=\"Deletes this essay from your list\"></i>
                  </button>
                  <button type=\"button\" class=\"btn btn-secondary float-end\" data-bs-toggle=\"modal\" data-bs-target=\"#editEssay\" data-bs-whatever=\"$n\">
                      <i class=\"bi bi-pencil-square\" data-bs-toggle=\"tooltip\" title=\"Edit essay information\"></i>
                  </button>
                  <div class = \"justify-content-end\"> 
                          <h6 class = \"d-inline-block\">Word Limit:</h6>
                          <h6 class = \"d-inline-block\" id = \"$wl\">$limit</h6>
                  </div>
              </div>
              <form action = \"includes/essay.inc.php\" method = \"post\">
                <div class = \"card-body bg-light\">
                    <label for=\"$rsp\" class=\"form-label\">Response:</label>
                    <textarea class=\"form-control\" id=\"$rsp\" oninput = \"countWords($n)\" rows=\"12\" name = \"rsp\"></textarea>
                    <div class = \"justify-content-end\"> 
                          <h6 class = \"d-inline-block\">Word Count:</h6>
                          <h6 class = \"d-inline-block\" id = \"$wc\">250</h6>
                    </div>
                    <label for=\"$nt\" class=\"form-label mt-2\">Notes:</label>
                    <textarea class=\"form-control\" id=\"$nt\" name= \"nt\" rows=\"5\"></textarea>
                </div>
                <div class = \"card-footer\">
                    <div class = \"row justify-content-between\">
                    <div class=\"form-check col-md-10 ms-3\">
                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"$check\" name = \"complete\">
                        <label class=\"form-check-label\" for=\"$check\">
                            Completed
                        </label>
                    </div>
                    <div class=\"col-md-1\">
                        <button type=\"submit\" class=\"btn btn-primary mb-1\" value = '$n' name = \"save\">Save</button> 
                    </div>
                    </div>
                </div>   
                </form>     
          </div>";
          
          //Fill in existing responses/notes/completion
          //Update word count
          echo "<script>
          
          var rsp = document.getElementById('response' + $n);
          rsp.value = '$response';
          
          var nt = document.getElementById('notes' + $n);
          nt.value = '$notes';

          var chk = document.getElementById('check' + $n);
          if('$comp' == 'Yes'){
            chk.checked = true;
          }
          
          countWords($n);
          
          </script>";
          $n++;
          
      }  
  }
  ?>
  
   

   
    <!--End of Cards-->
    <!--Add Essay Button-->
    <div class="mt-3 mb-2 text-center">
        <button type="button" class="btn btn-primary w-100"  data-bs-toggle="modal" data-bs-target="#addEssay" id = "addE">Add Essay</button>
    </div>
    </div>

    
    

    <!--Add Essay Modal-->
    <div class="modal fade" id="addEssay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Essay</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action = "includes/essay.inc.php" method = "post">
            <div class="mb-3">
                <label for="essay-prompt" class="col-form-label">Essay Prompt:</label>
                <input type="text" class="form-control" id="Nessay-prompt" name = "newPrompt">
            </div>
            <div class="mb-3">
                <label for="word-limit" class="col-form-label">Word Limit(Enter Integer)</label>
                <input type="number" class="form-control" id="Nword-limit" name = "newWord">
            </div>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name = "add">Add Essay</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!--Edit Essay Information Modal-->
    <div class="modal fade" id="editEssay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Essay Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action = "includes/essay.inc.php" method = "post">
                    <div class="mb-3">
                        <label for="essay-prompt" class="col-form-label">Essay Prompt:</label>
                        <input type="text" class="form-control" id="essay-prompt" name = "updateEP">
                    </div>
                    <div class="mb-3">
                        <label for="word-limit" class="col-form-label">Word Limit (Enter Integer)</label>
                        <input type="number" class="form-control" id="word-limit" name = "updateWL">
                    </div>
                    <div class="mb-3">
                        
                        <input type="hidden" class="form-control" id="essay-id" name = "getEID">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name = "updateEssay">Save Edits</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Delete Essay Confirmation Modal-->
    <div class="modal" id = "delEssay" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Essay?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this essay?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action = "includes/essay.inc.php" method = "post">
                <input type="hidden" class="form-control" id="del-eid" name = "delEID">
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name = "deleteE">Delete</button>
              </form>  
            </div>
          </div>
        </div>
      </div>



   

  
  
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  
  <script>
    
    

    //Tooltip Script
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    var loc = 1;
    //Open Edit Modal Listener
    var editModal = document.getElementById("editEssay");
    editModal.addEventListener("show.bs.modal", function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        // Extract essay number from data-bs-whatever 
        var essay = button.getAttribute("data-bs-whatever");
        
        var eNum = essay.substring(essay.length-1);
        loc = eNum;
        
        
        var ep = document.getElementById("ep" + eNum);
        var wl = document.getElementById("wl" + eNum);
        // Autofill modal's form fields content.
        var prompt = document.getElementById("essay-prompt");
        var limit = document.getElementById("word-limit");
        var hidden = document.getElementById("essay-id");
        prompt.value = ep.textContent;
        limit.value = wl.textContent;
        hidden.value = eNum;
    })

    //Deletion Modal Code
    var delModal = document.getElementById("delEssay");
    delModal.addEventListener("show.bs.modal", function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        // Extract essay number from data-bs-whatever 
        var essay = button.getAttribute("data-bs-whatever");
        var eNum = essay.substring(essay.length-1);
        
        var hidden = document.getElementById("del-eid");
        hidden.value = eNum;
        
    })

    
   

    
    
    

    document.addEventListener("DOMContentLoaded", function(event) { 
            var pos = sessionStorage.getItem('scrollpos');
            if (pos) window.scrollTo(0, pos);
        });

        window.onbeforeunload = function(e) {
            sessionStorage.setItem('scrollpos', window.scrollY);
        };

        

  </script>
</body>

</html>