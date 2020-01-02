                   <div class="row">
                     <div class="col-md-6">
                      <div class="card">
                      <div class="card-body">
                        <form method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Enter Username</label>
                            <input type="text" class="form-control" id="username"  placeholder="Enter current Username" required >
                          </div>
                          <div id="error_username" style="color:red"></div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">New Username</label>
                            <input type="text" class="form-control" id="newusername" name="newpassword" placeholder="New Username" onkeyup="checkUsername()" required>
                          </div>
                          <div id="error"></div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Username</label>
                            <input type="ctext" class="form-control" id="cusername" placeholder="Confirm Username" required>
                          </div>
                          <div id="error_match" style="color:red"></div>
                          <!-- <input type="hidden" name="user_id" value="<?= $userdata->auth_id ?>"> -->
                          
                          

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary submit" align="center">Submit</button>
                          </div>
                          <!-- /.card-body -->
                        </form>
                      </div>
                    </div>
                    </div>
                  </div>
                      <div id="success" style="color:green"></div>
                      <script type="text/javascript">
                        $(".submit").click(function(event) {
                          event.preventDefault();
                          var user_name = $("input#username").val();
                          var nuser_name = $("input#newusername").val();
                          var cuser_name = $("input#cusername").val();
                          var user_name_current= "<?= $this->session->username ?>";
                          var user_id= "<?= $this->session->user_id ?>";
// console.log(user_name);
if(user_name=='' || user_name==null)
{
  $('#error_username').html("username cannot be empty");
}
else if(user_name_current!=user_name)
{
  $('#error_username').html("please enter your current username");
}
else if(nuser_name!=cuser_name)
{
  $('#error_match').html("new username and confirm username is not matched");
}

else
{
  $('#error_username').hide();
  $('#error_match').hide();
  $('#error').hide();

  $.ajax({
    method: "POST",
    url:" <?= base_url() ?>profile/change_username", 
    data: {
      username:nuser_name,user_id:user_id
    },
    success: function(responseObject) {
      console.log(responseObject);
      if(responseObject==1)
      {
       $('#success').html("username successfully changed");
       $('#error_username').hide();
       $('#error_match').hide();
       alert('please logout and login again for change');
     }
   }



 });
}
});
                        function checkUsername()
                        {
                          var nuser_name = $("input#newusername").val();
                          if(nuser_name.length>1)
                          {
                           $.ajax({
                            method: "POST",
                            url:" <?= base_url() ?>profile/check_username", 
                            data: {
                              username:nuser_name
                            },
                            success: function(responseObject) {
                             console.log(responseObject);
                             var obj=JSON.parse(responseObject);

                             if(obj.length==0)
                             {
                               $('#error').html("username is available");
                               $('#error').css('color','green');
                               $('.submit').prop("disabled",false);

                             }
                             else
                             {
                              $('.submit').prop("disabled",true);
                              $('#error').html("username is already exist");
                              $('#error').css('color','red');
                            }
                          }
                        });
                         }
                       }
                     </script> 