  <div class="p-4 float-right" style="position:fixed; z-index: 4;right: 0%;top: 0;">
    <form action="index.php" method="POST" class="was-validated">
      <div class="form-inline">
        <label class="sr-only" for="inlineFormInput">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="userlogin" id="inlineFormInput" placeholder="User or Email" required>

        <label class="sr-only" for="inlineFormInputGroup">Password</label>      
        <input type="Password" class="form-control" id="inlineFormInputGroup" name="Passwordlogin" placeholder="Password" required>           
      </div>
      <div class="form-inline pt-1 pb-2">
      <button class="btn btn-sm btn-succsess float-right" style="background-color: #212529;color: white;">Submit</button>              
        <div class="form-check mb-2 mr-sm-2 mb-sm-0 pl-2 form-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Remember me
          </label>               
        </div>                            
      </div>
      <p class="p-3 mb-2 bg-dark text-white">If you can not start with the email use your username</p>  
    </form>
  </div>


<?php 

 ?>