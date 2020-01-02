 <style type="text/css">
  /* .input-group-text
   {
    font-size: 13px;
   }
   ::placeholder {

font-size:12px;
}
.form-group {
  position: relative;
  margin-bottom: 1.5rem;
}

.form-control-placeholder {
  position: absolute;
  top: 0;
  padding: 7px 0 0 13px;
  transition: all 200ms;
  opacity: 0.5;
}

.form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
  font-size: 75%;
  transform: translate3d(0, -100%, 0);

  opacity: 1;
}*/
input:focus ~ .floating-label,
input:not(:focus):valid ~ .floating-label{
  top: 8px;
  bottom: 10px;
  left: 20px;
  font-size: 11px;
  opacity: 1;
}

.inputText {
  font-size: 14px;
  width: 200px;
  height: 35px;
}

.floating-label {
  position: absolute;
  pointer-events: none;
  left: 20px;
  top: 18px;
  transition: 0.2s ease all;
}
 </style>







 <div class="card col-md-10">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 col-sm-6" id="add_row" >
                          <div class="row boxstylerow">
                            <!-- <div class="col-md-1 col-sm-1"><span class="input-group-text">dl</span></div> -->
                            <div class="col-md-3 col-sm-3" data-toggle="tooltip" title="bydefault download data limit is 0,here 0 indicate unlimited">
                              <div class="form-group">
                              <!-- <div class="input-group-prepend" ><span class="input-group-text">dl  data</span></div> -->
                              <input type="text" name="download_data"  class="form-control download_data download_data1" onkeyup="disableTotalData(1);" tabindex="12">
                               <label class="form-control-placeholder" for="download_data">download data</label>
                             </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-3" data-toggle="tooltip" title="bydefault upload data limit is 0,here 0 indicate unlimited">
                              <!-- <div class="input-group-prepend" ><span class="input-group-text">ul  data</span></div> -->
                              <div class="form-group">
                              <input type="text" name="upload_data"  class="form-control upload_data upload_data1"  onkeyup="disableTotalData(1);" tabindex=13 >
                               <label class="form-control-placeholder" for="upload_data">upload_data</label>
                            </div>
                          </div>
                            <div class="input-group col-md-3 col-sm-3" data-toggle="tooltip" title="total data(0 means unlimited)">
                              <div class="input-group-prepend" ><span class="input-group-text">total data</span></div>
                              <input type="text" name="data_transfer"  class="form-control data_transfer data_transfer1" placeholder="Data Transfer" onkeyup="disableOther(1)" data-toggle="tooltip"  tabindex=14>
                            </div>
                            <div class="col-md-2 col-sm-3">
                              <select class="form-control data_unit" tabindex=15><option value="2">Mb</option><option value="1">Kb</option><option value="3">Gb</option></select>
                            </div>
                            <div class="input-group col-md-3">
                              <div class="input-group-prepend" data-toggle="tooltip" title="downloading speed (0 means unlimited)"><span class="input-group-text">dl speed</span></div>
                              <input type="text" name="" placeholder="Download Speed" onkeypress="return isNumberKey(event)"  class="form-control download_speed download_speed1" tabindex=16 onkeyup="disableTotalSpeed(1)">
                            </div>
                              <div class="input-group col-md-3" data-toggle="tooltip" title="upload speed (0 means unlimited)">
                                <div class="input-group-prepend" ><span class="input-group-text">ul speed</span></div>
                                <input type="text" name="upload_speed[]" onkeypress="return isNumberKey(event)"  class="form-control upload_speed upload_speed1" placeholder="Upload Speed"  tabindex=17 onkeyup="disableTotalSpeed(1)">
                              </div>
                              <div class="input-group col-md-3" data-toggle="tooltip" title="transfer speed (0 means unlimited)">
                                <div class="input-group-prepend" ><span class="input-group-text">total data</span></div>
                                <input type="text" name="transfer_speed" onkeypress="return isNumberKey(event)" class="form-control transfer_speed transfer_speed1" placeholder="Transfer Speed"  tabindex=18 onkeyup="disableOther(1)" >
                              </div>
                              <div class="col-md-2">
                                <select class="form-control speed_unit"  tabindex=19> <option value="2">Mb/s</option><option value="1">Kb/s</option><option value="3">Gb/s</option></select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>




<div>
  <input type="text" class="inputText form-control" required/>
  <span class="floating-label">Your email address</span>
</div>













 <script type="text/javascript">
       $(document).ready(function(){
      // var date=[];
      // console.log(empty(date));
      getEndDate();
});





function getEndDate()
{
 var r="i am vivek";
  $.ajax({
   method: "POST",
   url: "<?= base_url() ?>test/ajaxtest",
    // dataType:"  ",
   data: { parent:r.trim() },

  success: function (data) {

   // result = data;
        console.log(data);
      },
    });
}
    
 </script>
