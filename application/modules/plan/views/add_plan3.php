<style type="text/css">
::placeholder {

font-size:15px;
}
.form-control { font-size:15px;}
@media (min-width: 992px) {
::placeholder {

font-size:12px;
}
.form-control { font-size:12px;}
select ::placeholder {font-size: 8px;}
.input-group-text
{
font-size:10px;
}
}
.input-group-text
{
font-size:15px;
}
#ajax_indicator
{
position: absolute;
top:40%;
left:50%;
z-index: 3000;
font-size: 30px;
}
table
{
  line-height: 0.5;
  height: 200px;

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
}

</style>
<div id="ajax_indicator"><i class="fa fa-spinner fa-spin" style="font-size:44px;"></i></div>
<div class="row">
  <div class="col-md-10">
    <div class="card">
      
      <form id="form" method="post">
        <div class="card-header">
          <div class="row">
            <div class="col-md-2">
              <h3 class="card-title">Add Plan</h3>
            </div>
            <div class="col-md-5">
              <label style="font-weight:200"><input type="checkbox"  name="service_enable" value="1" id="check" checked> Enabled </label>
            </div>
          </div>
          <!-- <div class="checkbox"> -->
          <!-- </div> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="plan_name"  class="form-control plan_name" id="plan_name" required placeholder="plan name" autofocus  tabindex=1 data-toggle="tooltip" title="plan name">
                <!-- <label class="form-control-placeholder" for="name">Name</label> -->
                <span class="text-danger plan_name_error"></span>
              </div>
              <!-- </div> -->
              <!-- <div class="col-md-5"> -->
              <div class="form-group" tabindex=3>
                
                <select class="form-control select2 plan_type"  id="plan_type" onfocusin="validation_plan()"   tabindex=3  data-placeholder="Plan type" multiple style="width: 100%;" >
                  <!-- <option value="" disable>Plan Type</option> -->
                  <?php
                  // var_dump($plan_type);
                  $length=count($plan_type);
                  // echo $length;
                  for($i=0;$i<$length;$i++) { ?>
                  <option value="<?= $plan_type[$i]['id'] ?>"><?= $plan_type[$i]['type'] ?></option>
                  <!-- <option value="postpaid">Postpaid</option> -->
                  <!-- <option value="advance_rental">Advance Rental</option> -->
                  <?php } ?>
                </select>
              </div>
              
              <div class="input-group">
                <input type="text" name="validity" placeholder="Validity" class="form-control" id="validity" disabled onkeypress="return isNumberKey(event)"  tabindex=5>
                <select disabled tabindex=5  name="validity_unit" class="form-control" id="validity_unit" ><option value="">Select</option><option value="1">Days</option><option value="2">Week</option><option value="3">Month</option>
                  <option value="4">Year</option></select>
                <input class="form-control" disabled type="text" name="amount" id="amount" placeholder="Amount" tabindex="6" onkeypress="return isNumberKey(event)">
                <span class="input-group-addon"><button type="button" tabindex="7" class="btn btn-success addMutipleValidity" >Add</button></span>
              </div>
              <br>
            </div>
            <!-- </div> -->
            <div class="col-md-6">
              <div class="form-group">
                <textarea placeholder="Plan description"  class="form-control" id="discription" onfocusin="validation_plan()" onfocusout="enableValidity()"  rows="3" tabindex=2></textarea>
                <span class="text-danger nas_error"></span>
              </div>
            
            </div>
            </div><!-- /row -->
            
            <div id="addValidityId"></div>
            <br><br>
            <div class="row" id="form_2" style="display:none">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label  class="col-md-10 control-label"><span class="text-danger">*</span>Type of Service</label> -->
                  <select class="form-control"  name="priority" id="priority" required tabindex=10>
                    <option value="">Priority</option>

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label  class="col-md-10 control-label"><span class="text-danger">*</span>Type of Service</label> -->
                  <select class="form-control"  name="vacation_mode" id="vacation_mode" tabindex=11 required>
                    <option value="" hidden >Vacation mode </option>
                    <option value="1" default>Enable</option>
                    <option value="0">Disable</option>
                  </select>
                </div>
              </div>
              <!-- <div id="totalbox"> -->
              <!-- </div> -->
              <div class="col-md-6" id="addRowsExtra"></div>
              <!-- </div> -->
              <!-- ./totalbox -->
              </div><!-- /.row -->
             <!--  <div class="modal fade" id="burstModals" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                      <div class="modal-body div3">
                     
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">ok</button>
                    </div>
                  </div>
                </div>
                </div> -->
                <!-- /# burst modal -->
                </div><!-- /row under body  -->
                </div><!-- /card -->
                <div id="form_3"  style="display:none;">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 col-sm-6" id="add_row" >
                          <div class="row boxstylerow">
                            <!-- <div class="col-md-1 col-sm-1"><span class="input-group-text">dl</span></div> -->
                            <div class="col-md-3 col-sm-3">
                              <input type="text" name="download_data" placeholder="Download data"  class="form-control download_data download_data1" onkeyup="disableTotalData(1);" tabindex=12 data-toggle="tooltip" title="bydefault download data limit is 0,here 0 indicate unlimited">
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-3">
                              <input type="text" name="upload_data"  class="form-control upload_data upload_data1"  placeholder="Upload data" onkeyup="disableTotalData(1);" tabindex=13 data-toggle="tooltip" title="bydefault upload data limit is 0,here 0 indicate unlimited">
                            </div>
                            <div class="col-md-3 col-sm-3">
                              <input type="text" name="data_transfer"  class="form-control data_transfer data_transfer1" placeholder="Data Transfer" onkeyup="disableOther(1)" data-toggle="tooltip" title="bydefault data transfer limit is 0,here 0 indicate unlimited" tabindex=14>
                            </div>
                            <div class="col-md-2 col-sm-3">
                              <select class="form-control data_unit" tabindex=15><option value="2">Mb</option><option value="1">Kb</option><option value="3">Gb</option></select>
                            </div>
                            <div class="col-md-3">
                              <input type="text" name="" placeholder="Download Speed" onkeypress="return isNumberKey(event)"  class="form-control download_speed download_speed1" tabindex=16 onkeyup="disableTotalSpeed(1)">
                            </div>
                              <div class="col-md-3">
                                <input type="text" name="upload_speed[]" onkeypress="return isNumberKey(event)"  class="form-control upload_speed upload_speed1" placeholder="Upload Speed" data-toggle="tooltip" title="upload speed" tabindex=17 onkeyup="disableTotalSpeed(1)">
                              </div>
                              <div class="col-md-3">
                                <input type="text" name="transfer_speed" onkeypress="return isNumberKey(event)" class="form-control transfer_speed transfer_speed1" placeholder="Transfer Speed" data-toggle="tooltip" title="transfer speed" tabindex=18 onkeyup="disableOther(1)" >
                              </div>
                              <div class="col-md-2">
                                <select class="form-control speed_unit"  tabindex=19> <option value="2">Mb/s</option><option value="1">Kb/s</option><option value="3">Gb/s</option></select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6" id="datalimitselect">
                                <div class="row">
                                  <div class="col-md-4">
                                    <!-- <div class="form-group"> -->
                                    <input type="text" name="limit_in_no" class="form-control limit_in_no" placeholder="Limit" data-toggle="tooltip" title="write number which you want to give limit after cross this limit primary data and speed restart" tabindex=20>
                                    <!-- </div> -->
                                  </div>
                                  <div class="col-md-4">
                                    <!-- <div class="form-group"> -->
                                    
                                    <select class="form-control limit_validity_unit" tabindex=21  id="limit_validity_unit" ><option value="">select</option><option value="1">Days</option><option value="2">Week</option><option value="3">Month</option><option value="4">Year</option></select>
                                    
                                    <!-- </div> -->
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <!-- <label  class="col-md-10 control-label"><span class="text-danger">*</span>Type of Service</label> -->
                                      <select class="form-control repeat_mode" tabindex=22 name="repeat_mode" id="repeat_mode" data-toggle="tooltip" title="unlimited means plans speed and data repeat until validity is not over " >
                                        <option value="">Repeat Mode</option>
                                        <option value="1">Once</option>
                                        <option value="2">Unlimited</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="input-group">
                                  <input type="text" name="" placeholder="00 H" onkeypress="return isNumberKey(event)" tabindex=23 class="form-control startH">
                                  <!-- <span class="input-group-addon">:</span> -->
                                  <input type="text" name="" placeholder="00 M" onkeypress="return isNumberKey(event)" tabindex=24 class="form-control startM">
                                  <span class="input-group-text">To</span>
                                  <input type="text" name="" placeholder="23 H" onkeypress="return isNumberKey(event)"  tabindex=24 class="form-control endH">
                                  <input type="text" name="" placeholder="59 M" onkeypress="return isNumberKey(event)"  tabindex=25 class="form-control endM">
                                </div>
                              </div>
                              <!-- </div> -->
                              </div><!-- /.row -->
                              <!-- <div class="col-md-12"> -->
                                
                                <div class="row">
                                  <div class="col-md-3">
                                
                                  <div class="form-group">
                                    
                                    <select class="form-control burst_mode1 burst_mode_array required" data-toggle="tooltip" title="burst mode" name="burst" id="burst_mode"  onchange="custom(1);" required tabindex=26>
                                      <option value="">Burst mode</option>
                                      <option value="1">disable</option>
                                      <option value="2">enable by double rate</option>
                                      <option value="3">custom</option>
                                    </select>
                                    <span class="text-danger burst_error"></span>
                                  </div>
                                </div>
                                <div class="col-md-9 pull-right">
                                    <!-- Default inline 1-->
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Monday">
                                      <input type="checkbox"   class="monday" value="1" checked>&nbsp M
                                    </label>&nbsp&nbsp
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Tuesday">
                                      <input type="checkbox" class="tuesday" value="1" checked>&nbspT
                                    </label>&nbsp&nbsp
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Wednesday">
                                      <input type="checkbox"  class="wednesday" value="1" checked>&nbspW
                                    </label>&nbsp&nbsp
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Thrusday">
                                      <input type="checkbox" class="thrusday" value="1" checked>&nbspT
                                    </label>&nbsp&nbsp
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Friday">
                                      <input type="checkbox" class="friday" value="1" checked>&nbspF
                                    </label>&nbsp&nbsp
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Saturday">
                                      <input type="checkbox" class="saturday" value="1" checked>&nbspS
                                    </label>&nbsp&nbsp
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Sunday">
                                      <input type="checkbox" class="sunday" value="1" checked>&nbspSu
                                    </label>

                                  </div>
                                    <!--  <div class="custom-control custom-checkbox custom-control-inline" data-toggle="tooltip" title="thrusday">
                                      <input type="checkbox" class="custom-control-input thrusday" id="defaultInline4" value="1" checked>
                                      <label class="custom-control-label" for="defaultInline4">T</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline" data-toggle="tooltip" title="friday">
                                      <input type="checkbox" class="custom-control-input friday" id="defaultInline5" value="1" checked>
                                      <label class="custom-control-label" for="defaultInline5">F</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline" data-toggle="tooltip" title="saturday">
                                      <input type="checkbox" class="custom-control-input saturday" id="defaultInline6" value="1"  checked>
                                      <label class="custom-control-label" for="defaultInline6">S</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline" data-toggle="tooltip" title="sunday">
                                      <input type="checkbox" class="custom-control-input sunday" id="defaultInline7" value="1" checked>
                                      <label class="custom-control-label" for="defaultInline7">S</label>
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                              <div class="row">
<div class="col-md-12"> <div class="table-responsive"><table class="table table-bordered">
<tr><th></th><th>dl</th><th>ul</th><th>transfer</th></tr><tr><td> <span class="input-group-text">Burst limit</span></td><td><input type="text" class="form-control dlburstlimit dlburstlimit1" tabindex="27"   onkeypress="return isNumberKey(event)" name="dlburstlimit"   /></td><td> <input type="text" class="form-control ulburstlimit ulburstlimit1" tabindex="28" onkeypress="return isNumberKey(event)" name="ulburstlimit"  /></td><td><input type="text" class="form-control totalburstlimit totalburstlimit1" tabindex="29" onkeypress="return isNumberKey(event)" name="totalburstlimit"  /></td></tr><tr><td> <span class="input-group-text"> Burst threshold</span></td><td><input type="text" class="form-control dlburstthreshold dlburstthreshold1" onkeypress="return isNumberKey(event)" tabindex="30" name="dlburstthreshold"  /></td><td><input type="text" class="form-control ulburstthreshold ulburstthreshold1" tabindex="31" onkeypress="return isNumberKey(event)" name="ulburstthreshold"  /></td><td><input type="text" class="form-control totalburstthreshold totalburstthreshold1" onkeypress="return isNumberKey(event)" tabindex="32" name="totalburstthreshold"  /></td></tr><tr><td> <span class="input-group-text"> Burst time(in sec)</span></td><td><input type="text" class="form-control dlbursttime dlbursttime1" tabindex="33" onkeypress="return isNumberKey(event)" name="dlbursttime" /></td><td><input type="text" class="form-control ulbursttime ulbursttime1" tabindex="34" onkeypress="return isNumberKey(event)" name="ulbursttime" /></td><td><input type="text" class="form-control totalbursttime totalbursttime1" tabindex="35" onkeypress="return isNumberKey(event)" name="totalbursttime" /></td></tr><tr><td> <span class="input-group-text">Priority</span></td><td colspan="3"> <input type="text" class="form-control burst_priority burst_priority1" name="priority" onkeypress="return isNumberKey(event)" tabindex="36" value="8" /></td></tr>
</table></div></div>
                              </div>
                            </div>
                          </div>
                        </div>
                    <button type="button" class="btn btn-info pull-right"  id="addMultipleRow" style="display:none;" >Add More</button>
                      </div>
                    </div>
                    <!--  <div id="div1" style="display:none"  class="col-md-5" align="center">
                          <div class="burstmode" style="overflow:hidden;">
                       
                        <div class="card">
                          <div class="card-body">
                            <table class="table table-bordered">
                              <tr><th></th><th>dl(kbps)</th><th>ul(kbps)</th></tr><tr><td> <span class="input-group-text">Burst limit</span></td><td><input type="text" class="form-control dlburstlimit" tabindex="14"   onkeypress="return isNumberKey(event)" name="dlburstlimit"   /></td><td> <input type="text" class="form-control ulburstlimit" tabindex="15" onkeypress="return isNumberKey(event)" name="ulburstlimit"  /></td></tr><tr><td> <span class="input-group-text"> Burst threshold</span></td><td><input type="text" class="form-control dlburstthreshold" onkeypress="return isNumberKey(event)" tabindex="16" name="dlburstthreshold"  /></td><td><input type="text" class="form-control ulburstthreshold" tabindex="17" onkeypress="return isNumberKey(event)" name="ulburstthreshold"  /></td></tr><tr><td> <span class="input-group-text"> Burst time</span></td><td><input type="text" class="form-control dlbursttime" tabindex="18" onkeypress="return isNumberKey(event)" name="dlbursttime" /></td><td><input type="text" class="form-control ulbursttime" tabindex="19" onkeypress="return isNumberKey(event)" name="ulbursttime" /></td></tr><tr><td> <span class="input-group-text">Priority</span></td><td> <input type="text" class="form-control burst_priority" name="priority" onkeypress="return isNumberKey(event)" tabindex="20" value="8" /></td></tr>
                            </table>
                      
                       
                        
                      </div>
                    </div>
                  </div>
                  </div> -->



                    <div class="col-md-10" id="addRowsId"></div>
                    <div id="div2" style="display:none"  class="col-md-5" align="center"></div>
                    <!-- <div class="row"><div class="col">Time</div></div> -->
                      <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-5">
                        <button type="button" class="btn btn-success" id="submit" onclick="formSubmit()">Add Plan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- <table><th>Amount</th></table> -->
              <script type="text/javascript" src="<?= base_url() ;?>assets/admin/dist/js/jquery.validate.min.js"> </script>
             <script type="text/javascript">
    // $('#enable_burst').click(function() {
    //     $('.burstmode').toggle();
    // });
    // $('#selected_validity').click(function() {

    // });

    function enableValidity() {
      var plan_name = $('#plan_name').val();
      var plan_description = $('#discription').val();
      var plan_type = $('#plan_type').val();
// var burst_mode = $('#burstmode').val();
// console.log(plan_name);
// console.log(plan_description);
// console.log(plan_type);
          if (plan_name && plan_type && plan_description ) {
            $('#validity').prop("disabled", false);
            $('#validity_unit').prop("disabled", false);
            $('#amount').prop("disabled", false);
            $('#validity').focus();
            }
}
    $(document).ready(function() {
      $('.select2').select2();
        $('#ajax_indicator').hide();
      }); 
        var number = 1;
        $('.addMutipleValidity').click(function() {
            var validity = $('#validity').val();
            var validity_unit = $('#validity_unit').val();
            var amount = $('#amount').val();
            var plan_name = $('#plan_name').val();
            var plan_description = $('#discription').val();
            var plan_type = $('#plan_type').val();
            // var burst_mode = $('#burstmode').val();
            if (plan_name && plan_type && plan_description  && validity && validity_unit && amount) {
                $('#form_2').show();
                $('#form_3').show();
                $('#addMultipleRow').show();
                $("input[name=validity]").val('');
                // $("input[name=validity_unit]").val(' ');
                $('input[name=validity_unit]').prop('selectedIndex', 0);
                $("input[name=amount]").val('');
                // $('validity').val(' ');
                // $('amount').val(' ');
                number = number + 1;
                var tax = parseInt(calculateTax(amount));
                // var tax_rate=0.18;
                // var tax,total_amount;
                // tax=amount*tax_rate;
                total_amount = parseInt(amount) + parseInt(tax);
                var plan_detail = '<div class="row" id="row' + number + '"><div class="col-md-3"><div class="input-group"><span class="input-group-text">Validity</span><input type="number" name="" value="' + validity + '" class="form-control validity"  id="validity" tabindex=7 readonly> </div></div><div class="col-md-3"><div class="input-group"><span class="input-group-text">Amount</span><input type="number"  class="form-control amount" value="' + amount + '"  id="amount"  readonly tabindex=7> <span class="input-group-text"><i class="fa fa-inr"></i></span></div></div><input type="hidden" value="' + validity_unit + '"  class="validity_unit" id="validity_unit"><div class="col-md-2"> <div class="input-group"><span class="input-group-text">Tax</span><input type="number" value="' + tax + '" class="form-control"  readonly id="tax" tabindex=8> </div></div><div class="col-md-3"><div class="input-group"><span class="input-group-text">Total Amount</span> <input type="number" value="' + total_amount + '" class="form-control"  readonly="readonly" id="total_amount" tabindex=9> <span class="input-group-text"><i class="fa fa-inr"></i></span></div></div><div class="col-md-1"><button type="button" class="btn btn-danger removeplanlist"  data-row="row' + number + '"  onclick="removePlanAmountList()">-</button></div></div>';
                // calculateTotalAmount();
                $('#addValidityId').append(plan_detail);
            } else {
                alert('please fill all the field');
            }
        });
        function removePlanAmountList()
        {
        $(document).on('click', '.removeplanlist', function() {
            var delete_rows = $(this).data("row");

            $('#' + delete_rows).remove();
        });
      }
        var count = 1;
        $('#addMultipleRow').click(function() {
            count = count + 1;
            var newrow = '<div class="card" id="row'+count+'"><div class="card-body"><div class="row"><div class="col-md-6" id="add_row" > <div class="row boxstylerow"><div class="col-md-3 col-sm-3 "><input  type="text" name="download_data" placeholder="Download data"  class="form-control download_data download_data'+count+'" onkeyup="disableTotalData('+count+');" tabindex=12 data-toggle="tooltip" title="bydefault download data limit is 0,here 0 indicate unlimited"></div><div class="col-md-3 col-sm-3"><input type="text" name="upload_data"  class="form-control upload_data upload_data'+count+'"  placeholder="Upload data" onkeyup="disableTotalData('+count+');" tabindex=13 data-toggle="tooltip" title="bydefault upload data limit is 0,here 0 indicate unlimited"></div><div class="col-md-3 col-sm-3"><input type="text" name="data_transfer"  class="form-control data_transfer data_transfer'+count+'" placeholder="Data Transfer" onkeyup="disableOther('+count+')" tabindex=14></div><div class="col-md-2 col-sm-2"><select class="form-control data_unit" tabindex=15><option value="2">Mb</option><option value="1">Kb</option><option value="3">Gb</option></select> </div><div class="col-md-3"><input type="text" name="" placeholder="Download Speed"  class="form-control download_speed download_speed'+count+'" tabindex=16 onkeyup="disableTotalSpeed('+count+')"></div><div class="col-md-3"><input type="text" name="upload_speed[]"  class="form-control upload_speed upload_speed'+count+'" placeholder="Upload Speed" tabindex=17 onkeyup="disableTotalSpeed('+count+')"></div><div class="col-md-3"><input type="text" name="transfer_speed"  class="form-control transfer_speed transfer_speed'+count+'" placeholder="Transfer Speed" tabindex=18 onkeyup="disableOther('+count+')" ></div><div class="col-md-2"><select class="form-control speed_unit"  tabindex=19><option value="2">Mb/s</option><option value="1">Kb/s</option><option value="3">Gb/s</option></select></div> </div></div><div class="col-md-6"><div class="row"><div class="col-md-6" id="datalimitselect"><div class="row"><div class="col-md-4"><div class="form-group"><input type="text" name="" class="form-control limit_in_no" placeholder="Limit"></div></div><div class="col-md-4"><div class="form-group"><select class="form-control limit_validity_unit"  id="validity_unit" data-toggle="tooltip" title="write number which you want to give limit after cross this limit primary data and speed restart"><option value="">select</option><option value="1">Days</option><option value="2">Week</option><option value="3">Month</option><option value="4">Year</option></select></div></div><div class="col-md-4"><div class="form-group"><select class="form-control repeat_mode"  name="repeat_mode" id="repeat_mode" title="unlimited means plans speed and data repeat until validity is not over "><option value="">Repeat Mode</option><option value="1">Once</option><option value="2">Unlimited</option></select></div> </div></div> </div> <div class="col-md-6"><div class="input-group"><input type="text" name="" placeholder="00 H" class="form-control startH"><input type="text" name="" placeholder="00 M" class="form-control startM"><span class="input-group-text">To</span> <input type="text" name="" placeholder="23 H" class="form-control endH"><input type="text" name="" placeholder="59 M" class="form-control endM"></div></div></div><div class="row"><div class="col-md-3"><div class="form-group"><select class="form-control burst_mode_array burst_mode'+count+'" name="burst" required id="burst_mode" tabindex=4 onchange="custom('+count+')"><option value="">Burst mode</option><option value="1">disable</option><option value="2">enable by double rate</option><option value="3">custom</option></select><span class="text-danger burst_error"></span></div></div><div class="col-md-8 pull-right"><label class="checkbox-inline" data-toggle="tooltip" title="Monday"><input type="checkbox"   class="monday" value="1" checked>&nbsp M</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Tuesday"><input type="checkbox" class="tuesday" value="1" checked>&nbspT</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Wednesday"><input type="checkbox"  class="wednesday" value="1" checked>&nbspW</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Thrusday"><input type="checkbox" class="thrusday" value="1" checked>&nbspT</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Friday"><input type="checkbox" class="friday" value="1" checked>&nbspF</label>&nbsp&nbsp  <label class="checkbox-inline" data-toggle="tooltip" title="Saturday"><input type="checkbox" class="saturday" value="1" checked>&nbspS</label>&nbsp&nbsp  <label class="checkbox-inline" data-toggle="tooltip" title="Sunday"><input type="checkbox" class="sunday" value="1" checked>&nbspSu</label></div><button type="button" class="btn btn-danger form3row" data-row="row' + count + '">-</button></div> </div></div> </div><div class="col-md-12"> <table class="table table-bordered"><tr><th></th><th>dl</th><th>ul</th><th>transfer</th></tr><tr><td> <span class="input-group-text">Burst limit</span></td><td><input type="text" class="form-control dlburstlimit dlburstlimit'+count+'" tabindex="14"   onkeypress="return isNumberKey(event)" name="dlburstlimit"   /></td><td> <input type="text" class="form-control ulburstlimit ulburstlimit'+count+'" tabindex="15" onkeypress="return isNumberKey(event)" name="ulburstlimit"  /></td><td><input type="text" class="form-control totalburstlimit totalburstlimit'+count+'" tabindex="15" onkeypress="return isNumberKey(event)" name="totalburstlimit"  /></td></tr><tr><td> <span class="input-group-text"> Burst threshold</span></td><td><input type="text" class="form-control dlburstthreshold dlburstthreshold'+count+'" onkeypress="return isNumberKey(event)" tabindex="16" name="dlburstthreshold"  /></td><td><input type="text" class="form-control ulburstthreshold ulburstthreshold'+count+'" tabindex="17" onkeypress="return isNumberKey(event)" name="ulburstthreshold"  /></td><td><input type="text" class="form-control totalburstthreshold totalburstthreshold'+count+'" onkeypress="return isNumberKey(event)" tabindex="16" name="totalburstthreshold"  /></td></tr><tr><td> <span class="input-group-text"> Burst time (in sec )</span></td><td><input type="text" class="form-control dlbursttime dlbursttime'+count+'" tabindex="18" onkeypress="return isNumberKey(event)" name="dlbursttime" /></td><td><input type="text" class="form-control ulbursttime ulbursttime'+count+'" tabindex="19" onkeypress="return isNumberKey(event)" name="ulbursttime" /></td><td><input type="text" class="form-control totalbursttime totalbursttime'+count+'" tabindex="19" onkeypress="return isNumberKey(event)" name="totalbursttime" /></td></tr><tr><td> <span class="input-group-text">Priority</span></td><td colspan="3"> <input type="text" class="form-control burst_priority burst_priority'+count+'" name="priority" onkeypress="return isNumberKey(event)" tabindex="20" value="8" /></td></tr></table></div></div>';
            // var newrow='<br><div class="row  boxstylerow" id="row'+count+'"><div class="col-md-3 col-sm-3 "><input type="text" name="download_data" placeholder="Download data"  class="form-control download_data" onkeyup="disableTotalData();"></div><div class="col-md-3 col-sm-3"><input type="text" name="upload_data"  class="form-control upload_data"  placeholder="Upload data" onkeyup="disableTotalData();"></div><div class="col-md-3 col-sm-3"><input type="text" name="data_transfer"  class="form-control data_transfer" placeholder="Data Transfer" onkeyup="disableOther()"></div><div class="col-md-2 col-sm-2"><select class="form-control"><option>Mb</option><option>Kb</option><option>Gb</option></select></div><div class="col-md-1"><button name="remove" data-row="row'+count+'" class="btn btn-danger remove">-</button></div><div class="col-md-3 "><input type="text" name="" placeholder="Download Speed"  class="form-control download_speed" onkeyup="disableTotalSpeed()"></div><div class="col-md-3"><input type="text" name="upload_speed[]"  class="form-control upload_speed" placeholder="Upload Speed" onkeyup="disableTotalSpeed()"></div><div class="col-md-3"><input type="text" name="transfer_speed"  class="form-control transfer_speed" placeholder="Transfer Speed" onkeyup="disableOther()" ></div><div class="col-md-2"><select class="form-control"><option>Mb/s</option><option>Kb/s</option><option>Gb/s</option></select></div></div> </div><div class="row"></div>';
            // var i=$('.boxstylerow').val();
            $('#addRowsId').append(newrow);
        });
        $(document).on('click', '.form3row', function() {
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });
        $(document).on('click', '.remove', function() {
            var delete_row = $(this).data("row");
            $('#' + delete_row).remove();
        });
        function formSubmit()
        {
        // $("#form").on("submit", function(event) {
          // function submitPlan()
          // {
            // event.preventDefault();
            // $('#form').parsley();
            console.log($('#form').parsley().isValid());
            var form=$('#form');
              form.validate({
        errorElement: 'span',
        errorClass: 'help-block',
        highlight: function(element, errorClass, validClass) {
          $(element).closest('.form-group').addClass("has-error");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).closest('.form-group').removeClass("has-error");
        },
        rules: {

      plan_name: {
        required: true,
        placeholder:false

      },
      plan_type:
      {
        required: true,
      }



    },
    message: {

      plan_name: {
        required: "this field is require",
      },
    plan_type: {
        required: "this field is require",
      },
    }

  });


      if (form.valid() === true){
            var download_data = [];
            var upload_data = [];
            var data_transfer = [];
            var upload_speed = [];
            var download_speed = [];
            var transfer_speed = [];
            var data_unit = [];
            var validity = [];
            var validity_unit = [];
            var amount = [];
            var speed_unit = [];
            var start_hour = [];
            var start_minute = [];
            var end_hour = [];
            var end_minute = [];
            var sunday = [];
            var monday = [];
            var tuesday = [];
            var wednesday = [];
            var thrusday = [];
            var friday = [];
            var saturday = [];
            var limit_in_no = [];
            var limit_validity_unit = [];
            var repeat_mode = [];
            var dlburstlimit=[];
            var ulburstlimit=[];
            var ulburstlimit=[];
            var dlburstthreshold=[];
            var ulburstthreshold=[];
            var dlbursttime=[];
            var ulbursttime=[];
            var burst_priority=[];
            var burst_mode_array=[];
            var totalburstlimit=[];
            var totalburstthreshold=[];
            var totalbursttime=[];
            // var item_price = [];
            $('.download_data').each(function() {
                download_data.push($(this).val());
            });
            $('.upload_data').each(function() {
                upload_data.push($(this).val());
            });
            $('.data_transfer').each(function() {
                data_transfer.push($(this).val());
            });
            $('.upload_speed').each(function() {
                upload_speed.push($(this).val());
            });
            $('.download_speed').each(function() {
                download_speed.push($(this).val());
            });
            $('.transfer_speed').each(function() {
                transfer_speed.push($(this).val());
            });
            $('.data_unit').each(function() {
                data_unit.push($(this).val());
            });
            $('.validity').each(function() {
                validity.push($(this).val());
            });
            $('.amount').each(function() {
                amount.push($(this).val());
            });
            $('.validity_unit').each(function() {
                validity_unit.push($(this).val());
            });
            $('.speed_unit').each(function() {
                speed_unit.push($(this).val());
            });
            $('.startH').each(function() {
                start_hour.push($(this).val());
            });
            $('.startM').each(function() {
                start_minute.push($(this).val());
            });
            $('.endH').each(function() {
                end_hour.push($(this).val());
            });
            $('.endM').each(function() {
                end_minute.push($(this).val());
            });
            $('.sunday').each(function() {
                sunday.push(this.checked ? $(this).val() : 0);
            });
            $('.monday').each(function() {
                monday.push(this.checked ? $(this).val() : 0);
            });
            $('.tuesday').each(function() {
                tuesday.push(this.checked ? $(this).val() : 0);
            });
            $('.wednesday').each(function() {
                wednesday.push(this.checked ? $(this).val() : 0);
            });
            $('.thrusday').each(function() {
                thrusday.push(this.checked ? $(this).val() : 0);
            });
            $('.friday').each(function() {
                friday.push(this.checked ? $(this).val() : 0);
            });
            $('.saturday').each(function() {
                saturday.push(this.checked ? $(this).val() : 0);
            });
            $('.limit_in_no').each(function() {
                limit_in_no.push($(this).val());
            });
            $('.limit_validity_unit').each(function() {
                limit_validity_unit.push($(this).val());
            });
            $('.repeat_mode').each(function() {
                repeat_mode.push($(this).val());
            });



          /*for custom burst*/
          // $('.dlburstlimit').val();
           $('.dlburstlimit').each(function() {
                dlburstlimit.push($(this).val());
            });
             $('.ulburstlimit').each(function() {
                ulburstlimit.push($(this).val());
            });
             $('.dlburstthreshold').each(function() {
                dlburstthreshold.push($(this).val());
            });
             $('.ulburstthreshold').each(function() {
                ulburstthreshold.push($(this).val());
            });
           
              $('.dlbursttime').each(function() {
                dlbursttime.push($(this).val());
            }); 
              $('.ulbursttime').each(function() {
                ulbursttime.push($(this).val());
            }); 
             
              $('.burst_priority').each(function() {
                burst_priority.push($(this).val());
            });
              $('.burst_mode_array').each(function() {
                burst_mode_array.push($(this).val());
              }); 
               $('.totalbursttime').each(function() {
                totalbursttime.push($(this).val());
            });
               $('.totalburstthreshold').each(function() {
                totalburstthreshold.push($(this).val());
            });
                $('.totalburstlimit').each(function() {
                totalburstlimit.push($(this).val());
            });
              // console.log(ulbursttime);
              // console.log(burst_mode_array);
              // console.log(dlburstlimit);

            var plan_name = $('#plan_name').val();
            var plan_description = $('#discription').val();
            var plan_type = $('#plan_type').val();
            if (transfer_speed[0] || (upload_speed[0] && download_speed[0])) {
              // alert('please fill either transfer speed or uploading and downloading speed');
            // }
                if ($('#check').is(":checked")) {
                    // it is checked
                    var service = 1;
                } else {
                    var service = 0;
                }
                // var burst_mode = $('#burstmode').val();
            console.log(transfer_speed);
                var vacation_mode = $('#vacation_mode').val();
                var priority = $('#priority').val();
                // var day_limit = $('#day_limit').val();
                // var start = $('#starttimeH').val();
                // console.log(burst_mode_array);
                // if (burst_mode == '') {
                //     $('.burst_error').show();
                //     $('.burst_error').html('please select any field');
                //     $('#burstmode').focus();
                // } else {
                    $("#ajax_indicator").show();
                     
                    $.ajax({
                        url: "<?= base_url() ?>plan/add",
                        method: "POST",
                        data: {
                            plan_description: plan_description,
                            plan_name: plan_name,
                            plan_type: plan_type,
                            // burst_mode: burst_mode,
                            validity: validity,
                            validity_unit: validity_unit,
                            amount: amount,
                            vacation_mode: vacation_mode,
                            priority: priority,
                            download_data: download_data,
                            upload_data: upload_data,
                            data_transfer: data_transfer,
                            upload_speed: upload_speed,
                            download_speed: download_speed,
                            transfer_speed: transfer_speed,
                            data_unit: data_unit,
                            speed_unit: speed_unit,
                            start_hour: start_hour,
                            start_minute: start_minute,
                            end_hour: end_hour,
                            end_minute: end_minute,
                            sunday: sunday,
                            monday: monday,
                            tuesday: tuesday,
                            wednesday: wednesday,
                            thrusday: thrusday,
                            friday: friday,
                            saturday: saturday,
                            status: service,
                            repeat_mode: repeat_mode,
                            limit_unit: limit_validity_unit,
                            limit_in_no: limit_in_no,
                            burst_limit_ul:ulburstlimit,
                            burst_limit_dl:dlburstlimit,
                            burst_threshold_ul:ulburstthreshold,
                            burst_threshold_dl:dlburstthreshold,
                            burst_priority:burst_priority,
                            burst_time_ul:ulbursttime,
                            burst_time_dl:dlburstlimit,
                            total_burst_time:totalbursttime,
                            total_burst_limit:totalburstlimit,
                            total_burst_threshold:totalburstthreshold,
                            burst_mode:burst_mode_array

                        },
                        beforeSend: function() {
                          // console.log(data);
                            $('#submit').attr('disabled', 'disabled');
                            $('#submit').val('creating plan...');
                        },
                        success: function(data) {
                            $("#ajax_indicator").hide();
                            console.log('data'+data);
                            $('#submit').attr('disabled', false);
                            document.location.reload();
                        },
                    });
              }
              else
              {
                 alert('please fill either transfer speed or uploading and downloading speed');
              }
            }
       
} 
  

    function disableTotalData(count) {
        var upload_data = $('.upload_data'+count).val();
        var download_data = $('.download_data'+count).val();
        $('.data_transfer'+count).prop("disabled", false);
      
        if (download_data || upload_data) {
           
            $('.data_transfer'+count).prop("disabled", true);
        }
    }

    function disableTotalSpeed(count) {
        var upload_speed = $('.upload_speed'+count).val();
        var download_speed = $('.download_speed'+count).val();
        $('.transfer_speed'+count).prop("disabled", false);
      
        if (download_speed || upload_speed) {
            // console.log("download_data");
            $('.transfer_speed'+count).prop("disabled", true);
        }
    }

    function disableOther(count) {
        var data_transfer = $('.data_transfer'+count).val();
        var transfer_speed = $('.transfer_speed'+count).val();
        $('.upload_speed'+count).prop("disabled", false);
        $('.download_speed'+count).prop("disabled", false);
        $('.upload_data'+count).prop("disabled", false);
        $('.download_data'+count).prop("disabled", false);
        if (transfer_speed) {
            $('.upload_speed'+count).prop("disabled", true);
            $('.download_speed'+count).prop("disabled", true);
        }
        if (data_transfer) {
            $('.upload_data'+count).prop("disabled", true);
            $('.download_data'+count).prop("disabled", true);
        }
    }
    /*open popup in custom burst select*/
    // $('#burstmode').change(function() {
    //     var burstmode = $('#burstmode').val();
    //     if (burstmode == 'custom_burst_mode') {
    //         $('#burstModal').show();
    //         $('#burstModal').modal();
    //     }
    // });
    // function calculateTotalAmount()
    // {
    //   var amount=$('#amount').val();
    //   // var tax_rate=0.18;
    //   var tax=0;
    // /*used in future*/
    // $.ajax({
    //     url:"<?= base_url() ?>plan/add",
    //     method:"POST",
    //     data:{f_id:f_id,

    //     },

    //     success: function (data) {
    // var json=[{"cgst":"9"},{"sgst":"9"}];
    // var obj=JSON.parse(json);
    // var length=obj.length;
    // for($i=0;$i<length;$i++)
    // {
    //  tax +=(Object.values(obj[0])*amount)/100;
    // }
    // var total=amount+tax;

    //   $('#tax').val(tax);
    //   $('#total_amount').val(total_amount);
    // }
    // });
    // }
  
function custom(id)
{
// console.log($('.burst_mode'+id).val());
if($('.burst_mode'+id).val()==2)
{

var transfer_speed= $('.transfer_speed'+id).val();
var upload_speed= $('.upload_speed'+id).val();
var download_speed= $('.download_speed'+id).val();

console.log(transfer_speed);
console.log(upload_speed);
var double_transfer_limit=transfer_speed*2;
var double_upload_limit=upload_speed*2;
var double_download_limit=download_speed*2;
var half_transfer_threshold=transfer_speed*.50;
var half_upload_threshold=upload_speed*.50;
var half_download_threshold=download_speed*.50;

$('.dlburstlimit'+id).val(double_download_limit);
$('.ulburstlimit'+id).val(double_upload_limit);
$('.totalburstlimit'+id).val(double_transfer_limit);
$('.dlburstthreshold'+id).val(half_download_threshold);
$('.ulburstthreshold'+id).val(half_upload_threshold);
$('.totalburstthreshold'+id).val(half_transfer_threshold);
$('.dlbursttime'+id).val(12);
$('.ulbursttime'+id).val(12);
$('.totalbursttime'+id).val(12);
// $('.dlburstthreshold'+id).val(double_download_speed);

}
if($('.burst_mode'+id).val()==1)
{
$('.dlburstlimit'+id).val(0);
$('.ulburstlimit'+id).val(0);
$('.totalburstlimit'+id).val(0);
$('.dlburstthreshold'+id).val(0);
$('.ulburstthreshold'+id).val(0);
$('.totalburstthreshold'+id).val(0);
$('.dlbursttime'+id).val(0);
$('.ulbursttime'+id).val(0);
$('.totalbursttime'+id).val(0);
}
if($('.burst_mode'+id).val()==3)
{
$('.dlburstlimit'+id).val('');
$('.ulburstlimit'+id).val('');
$('.totalburstlimit'+id).val('');
$('.dlburstthreshold'+id).val('');
$('.ulburstthreshold'+id).val('');
$('.totalburstthreshold'+id).val('');
$('.dlbursttime'+id).val('');
$('.ulbursttime'+id).val('');
$('.totalbursttime'+id).val('');
}
// var table_data='<div class="card'+id+'"><div class="card-body"><table><tr><th></th><th>dl(kbps)</th><th>ul(kbps)</th></tr><tr><td> <span class="input-group-text">Burst limit</span></td><td><input type="text" class="form-control dlburstlimit" tabindex="14"   onkeypress="return isNumberKey(event)" name="dlburstlimit" value=""   /></td><td> <input type="text" class="form-control ulburstlimit" tabindex="15" onkeypress="return isNumberKey(event)" name="ulburstlimit"  /></td></tr><tr><td> <span class="input-group-text"> Burst threshold</span></td><td><input type="text" class="form-control dlburstthreshold" onkeypress="return isNumberKey(event)" tabindex="16" name="dlburstthreshold"  /></td><td><input type="text" class="form-control ulburstthreshold" tabindex="17" onkeypress="return isNumberKey(event)" name="ulburstthreshold"  /></td></tr><tr><td> <span class="input-group-text">Burst time</span></td><td><input type="text" class="form-control dlbursttime" tabindex="18" onkeypress="return isNumberKey(event)" name="dlbursttime" /></td><td><input type="text" class="form-control ulbursttime" tabindex="19" onkeypress="return isNumberKey(event)" name="ulbursttime" /></td></tr><tr><td> <span class="input-group-text">Priority</span></td><td> <input type="text" class="form-control burst_priority" name="priority" onkeypress="return isNumberKey(event)" tabindex="20" value="8" /></td></tr></table></div></div>';
// $("#div2").fadeOut();

// $("#burstModals").show();
// $('#burstModals').modal();
// $(".div3").html(table_data);
// $('<div class="modal fade" id="burstModals" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body div3'+id+'">'+table_data+'</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">ok</button></div></div></div></div>').modal();
  
// $("#div2").append(table_data);





}




    function validation_plan() 
    {
        // alert("sd");
        if ($('#plan_name').val() == '') {
             $('.plan_name_error').html('plan name should be mendatory');
            $('#plan_name').focus();
        } 
        else
         {
            $('.plan_name_error').hide();
        }
    }

    function calculateTax(amo) {
        var total = 0;
        $.ajax({
            url: "<?= base_url() ?>account/get_tax",
            async: false,
            method: "GET",
            success: function(data) {

                var amount = amo;
                var obj = JSON.parse(data);

                for (var i = 0; i < obj.length; i++) {

                    total += (Object.values(obj[i]) * amount) / 100;

                }
                // console.log(total);
            }
        });
        return total;
    }
</script>
