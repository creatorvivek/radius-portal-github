<style type="text/css">
/*  input{
padding-bottom:20px;
}*/
#show_search_result{
background-color: #Fffffe;
list-style-type:none;
}
#show_search_result li:hover
{
background-color:grey;
/*color:white;*/
}
.list_design
{
font-size: 12px;
color:blue;
}
.card
{
z-index: 1000;
box-shadow: 10px 10px 1px 1px  #f2f2f2;
align-items: center;
alignment-baseline: 1px;
}
input::placeholder{
/*color:red;*/
/*font-family: sans-serif;*/
}
.button-color
{
/*background: linear-gradient(to left, #ccffff 0%, #0033cc 100%);*/
/*background-color:red;*/
}
/*.form-group
{
background-color: #ffebcc;
}*/
</style>
<div class="row align-items-center" >
  <div class="col-md-7">
    <div class="card" >
      <div class="card-header">
        <h2 class="card-title" align="center">Paid bill</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?= form_open('recharge/bill_paid_process',array("class"=>"form-horizontal form_validation")) ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" name="search" id="search" class="form-control search" onkeyup="searchResult();" data-toggle="tooltip" title="search here for username mobile number and caf id" placeholder="search here" autocomplete="off" data-toggle="dropdown" autofocus />
              <span class="text-danger search_error"></span>
            </div>
          <ul id="show_search_result" class="dropdown-menu customtable"></ul>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="username" value="<?php echo $this->input->post("username"); ?>" class="form-control username" autocomplete="off"  placeholder="username" required />
            <span class="text-danger username_error"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="previous_plan" value="<?php echo $this->input->post("previous_plan"); ?>" class="form-control previous_plan"  placeholder="previous plan" />
            <span class="text-danger p_plan_error"></span>
          </div>
        </div>
        <input type="hidden" name="caf_id" class="caf_id" >
        <input type="hidden" name="plan_id" class="pid" >
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="name" value="<?php echo $this->input->post("name"); ?>" class="form-control name"  placeholder="name" required />
            <span class="text-danger name_error"><?= form_error('name');?></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="mobile" value="<?php echo $this->input->post("mobile"); ?>" onkeypress="return isNumberKey(event)" class="form-control mobile" required  placeholder="registered mobile" maxlength=10 />
            <span class="text-danger mobile_error"><?= form_error('mobile');?></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="payer_name" value="<?php echo $this->input->post("payer_name"); ?>"  class="form-control payer_name"  placeholder="payer name" />
            <span class="text-danger payer_name_error"><?= form_error('payer_name');?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" name="payer_mobile" value="<?php echo $this->input->post("payer_mobile"); ?>" onkeypress="return isNumberKey(event)" class="form-control payer_mobile"  placeholder="payer mobile" maxlength=10 />
            <span class="text-danger payer_mobile_error"><?= form_error('payer_mobile');?></span>
          </div>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-info btn-block size same button-color" onclick="copyData();">Same</button>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" name="total_amount" value="<?php echo $this->input->post("amount"); ?>" required  onkeypress="return isNumberKey(event)" class="form-control amount"  placeholder="total amount" />
            <span class="text-danger amount_error"></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" name="discount" value="<?php echo $this->input->post("discount"); ?>" onkeypress="return isNumberKey(event)" class="form-control discount"  placeholder="discount" />
            <span class="text-danger discount_error"></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" name="paid_amount" value="<?php echo $this->input->post("paid_amount"); ?>" required onkeypress="return isNumberKey(event)" class="form-control paid_amount" onkeyup="balanceGenerate();"  placeholder="paid amount" />
            <span class="text-danger paid_amount_error"><?= form_error('paid_amount');?></span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" name="balance" value="<?php echo $this->input->post("balance"); ?>" data-toggle="tooltip" title="customer balance" onkeypress="return isNumberKey(event)" class="form-control balance"  placeholder="balance" />
            <span class="text-danger balance_error"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select name="pay_type" id="pay_type" required  class="form-control">
              <option value="">- PAYMENT TYPE -</option>
              <?php
              $length=count($payment_type);
              for($i=0;$i<$length;$i++)
              { ?>
              <option value="<?= $payment_type[$i]['id'] ?>"><?= $payment_type[$i]['name'] ?></option>
              <?php   } ?>
            </select>
            <span class="text-danger paid_type"><?= form_error('pay_type');?></span>
          </div>
        </div>
        <input type="hidden" name="crn_number" class="crn_number">
        <input type="hidden" name="end_date" class="end_date_recharge">
        <input type="hidden" name="plan_validity" class="plan_validity">
        <input type="hidden" name="schedule" class="schedule">
        <input type="hidden" name="hplan_name" class="hplan_name">
        <input type="hidden" name="hplan_cost" class="hplan_cost">
        <input type="hidden" name="hstart_date" class="hstart_date">
        <input type="hidden" name="hend_date" class="hend_date">
        <input type="hidden" name="hplan_id" class="hplan_id">
        <input type="hidden" name="radius_username" class="radius_username">
        <div class="col-md-6">
          <div class="form-group">
            <select name="attend_type" id="attend_type" required class="form-control">
            </select>
            <span class="text-danger attend_type"><?= form_error('attend_type');?></span>
          </div>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="checkbox">
            <input type="checkbox" name="sms" value="1">&nbsp Sms
            <!-- </div> -->&nbsp&nbsp
            <!-- <div class="checkbox"> -->
            <input type="checkbox" name="email" value="1">&nbsp Email
          </div>
        </div>
        <input type="hidden" name="bill" class="bill_reciept">
        <div class="col-md-12">
          <div class="form-group" align="center">
            <div class="col-sm-offset-4 col-sm-5">
              <button type="submit" class="btn btn-info button-color" align="center" onclick="validation();">Recharge Now</button>
            </div>
          </div>
        </div>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
// var ary = [];
var j=0;
var k=0;
var startDateNow= "<?= date('Y-m-d H:i:s') ?>";
$(document).ready(function(){
// console.log(startDate);
// console.log(d);
attend_type();
});
function searchResult() {
// $("#country").keyup(function () {
var searchkeyword = $('#search').val();
var min_length = 1;
if (searchkeyword.length >= min_length) {
$.ajax({
type: "POST",
url: "<?= base_url() ?>recharge/auto_suggestion_in_recharge_other",
data: {
search_query: searchkeyword
},
success: function (data) {
var obj=JSON.parse(data);
if(obj.length==0)
{
$('#show_search_result').hide();
}
else
{
var i,searchdata;
for(i=0;i<obj.length;i++)
{
searchdata+= '<tr onclick="getRow('+obj[i].id+')"><td>'+obj[i].name+' <br><div class="list_design">'+obj[i].contact_mobile+'&nbsp&nbsp caf id &nbsp'+obj[i].id+'&nbsp&nbsp username &nbsp'+obj[i].username+'</div><td></tr>';
}
$('#show_search_result').show();
$('#show_search_result').html(searchdata);
}
}
});
}
}
function getRow(cafid) {
$.ajax({
type: "POST",
url: "<?= base_url() ?>recharge/autofill",
data: {
id: cafid
},
success: function (data) {
// console.log(data);
var obj=JSON.parse(data);
$('.name').val(obj.name);
// $('#crn').val(obj[0].crn_id );
$('.mobile').val(obj.contact_mobile);
$('.username').val(obj.username);
$('.amount').val(obj.balance);
$('.last_recharge_date').val(obj.recharge_date);
$('.previous_plan').val(obj.plan_name);
$('.end_date_recharge').val(obj.end_date);
$('.radius_username').val(obj.radius_username);
$('.caf_id').val(obj.id);
$('.crn_number').val(obj.crn_number);
$('.search').val('last recharge date ' +obj.recharge_date);
$('.previous_balance_table').html('<tr><td>previous balance</td><td>'+obj.balance+'</td></tr>');
},
});
//  $.ajax({
//  type: "POST",
//  url: "<?= base_url() ?>recharge/autofill",
//  data: {
//   id: $id
// },
// });
}
$(document).click(function(){
$("#show_search_result").hide();
$("#show_search_result_plan").hide();
});
function copyData()
{
$('.payer_name').val($(".name").val());
$('.payer_mobile').val($(".mobile").val());
}
function attend_type()
{
$.ajax({
type: "GET",
url: "<?= base_url() ?>recharge/attend_type",
// data: {
//   search_query: searchkeyword
// },
success: function (data) {
// console.log(data);
var row,obj=JSON.parse(data);
for(var i=0;i<obj.length;i++)
{
row+='<option value="'+obj[i].id+'">'+obj[i].name+'</option>';
}
$('#attend_type').html('<option value="">--Attend type--</option>'+row);
},
});
}
function addPanel()
{
j++;
k++;
var item=$('.item').val();
var usercost=$('.usercost').val();
var planId=$('.pid').val();
var totalprice= calculateTax(usercost);
var day=$('.plan_validity').val();
console.log('plan id=>'+planId);
if(item!='' && usercost !='')
{
// console.log($('.planId').val());
var newrow='<tr id="row'+j+'" ><td class="plan_id" style="display:none" >'+planId+'</td><td class="plan">'+item+'</td><td class="base_rate">'+usercost+'</td><td class="total_rate">'+totalprice+'</td><td><select name="activator" id="selectDate' + j + '" onchange="planActivator(' + j +','+ day + ')"><option value="1">auto</option><option value="2">now</option><option value="manual">manual</option></select></td><td class="start_date'+k+'"></td><td class="end_date'+k+'"></td><td class="remove" data-row="row'+j+'">x</td></tr>';
$('.table_row').append(newrow);
$('.table_row').show();
var tAmount= ($('.amount').val() =='') ? 0 : $('.amount').val();
var countTotal=parseInt(tAmount)+parseInt(totalprice);
$('.amount').val(countTotal);
}

planActivator(j,day);
clearField();
}
$(document).on('click', '.remove', function(){
var delete_row = $(this).data("row");
$('#' + delete_row).remove();
});
function planActivator(count,day)
{
var id=$('#selectDate'+count).val();
// var day=$('.plan_validity').val();
// console.log("validity"+day);
console.log(id);
//for now
if(id==2)
{
// var time=generateCurrentDateTime();
console.log('day='+day);
console.log(startDateNow);
$('.start_date'+count).html(startDateNow);
var endDate=getEndDate(startDateNow,day);
// console.log('end date'+endDate);
$('.end_date'+count).html(endDate);
// exit();
}
//for now
if(count==1)
{
if(id==1)
{
var startDate=$('.end_date_recharge').val();
if(!startDate)
{
$('.start_date'+count).html(startDateNow);
// var test='2018-10-10 07:11:11';
var endDate=getEndDate(startDateNow,day);
$('.end_date'+count).html(endDate);
}
else
{
// console.log(startDate);
$('.start_date'+count).html(startDate);
// get_end_date(startDate,6);
var endDate= getEndDate(startDate,day);
// console.log(endDate);
$('.end_date'+count).html(endDate);
}
}
}
else
{
var counter=count;
var previous_count=counter-1;
var c1EndDate=$('.end_date'+previous_count).text();
console.log("c1 end date"+ c1EndDate);
if(!c1EndDate)
{
var previous_count=counter-2;
var c1EndDate=$('.end_date'+previous_count).text();
if(!c1EndDate)
{
var previous_count=counter-3;
var c1EndDate=$('.end_date'+previous_count).text();
if(!c1EndDate)
{
var previous_count=counter-4;
var c1EndDate=$('.end_date'+previous_count).text();
}
}
// $('.start_date'+counter).html(c1EndDate);
//  $('.end_date'+counter).html(endDate2);
}
$('.start_date'+counter).html(c1EndDate);
var endDate2=getEndDate(c1EndDate,day);
// console.log('endDate2'+endDate2)
$('.end_date'+counter).html(endDate2);
}
var k=1;
var ary =[];
var hcost=[];
var hplanName=[];
var hstart_date=[];
var hend_date=[];
var hplan_id=[];
// for(k;k<=count;k++)
// {
$('.table_row tr').each(function (a,b) {
var plan_id = $('.plan_id', b).text();
var plan_name = $('.plan', b).text();
var base_rate = $('.base_rate', b).text();
var mode = $('#selectDate', b).val();
var total_rate = $('.total_rate',b).text();
var sDate = $('.start_date'+k).text();
var eDate = $('.end_date'+k).text();
ary.push({plan_name:plan_name,base_rate:base_rate,total_rate:total_rate,start_date:sDate,end_date:eDate});
hplanName.push(plan_name);
hcost.push(base_rate);
hstart_date.push(sDate);
hend_date.push(eDate);
hplan_id.push(plan_id)
// console.log('a='+a);
// console.log(b);
// console.log(hplan_id);
k++;
});
// }
$('.hplan_name').val(hplanName);
$('.hplan_cost').val(hcost);
$('.hstart_date').val(hstart_date);
$('.hend_date').val(hend_date);
$('.hplan_id').val(hplan_id);
// $('.schedule').val(ary);
var jsonData=(JSON.stringify(ary));
// console.log(ary);
$('.bill_reciept').val(jsonData);
}
function calculateTax(amount)
{
var tax=amount*0.18;
var total=parseInt(amount)+parseInt(tax);
return total;
}
function planSearchResult()
{
var searchkeyword = $('.search_plan').val();
var min_length = 2;
if (searchkeyword.length >= min_length) {
$.ajax({
type: "POST",
url: "<?= base_url() ?>plan/searchPlan",
data: {
search_query: searchkeyword
},
success: function (data) {
// console.log(data);
var obj=JSON.parse(data);
// console.log(obj);
if(obj.length==0)
{
$('#show_search_result_plan').hide();
}
else
{
var i,searchdata,validity;
// var validity=0;
// console.log(obj[0].validity_actual);
for(i=0;i<obj.length;i++)
{
switch(1)
{
case 1:
validity=(obj[i].validity_actual);
break;
case 2:
validity=(obj[i].validity_actual) +'&nbsp week';
break;
case 3:
validity=(obj[i].validity_actual) +'&nbsp month';
break;
validity=(obj[i].validity_actual) +'&nbsp year';
}
// console.log(validity);
searchdata+= '<tr onclick="getPlan('+obj[i].plan_id+','+obj[i].amount+','+validity+',\''+obj[i].name+'\');"><td>'+obj[i].name+'  '+obj[i].amount+'&#8377  '   +validity +'</td> </tr>';
}
$('#show_search_result_plan').show();
$('#show_search_result_plan').html(searchdata);
}
},
});
}
}
function generateCurrentDateTime()
{
var a = new Date();
var year = a.getFullYear();
var month = a.getMonth()+1;
var date = a.getDate();
var hour = a.getHours();
var min = a.getMinutes();
var sec = a.getSeconds();
// var time = date + '/' + month + '/' + year + ' ' + hour + ':' + min;
var time = year + '-' + month + '-' + date + ' ' + hour + ':' + min + ':' +sec;
return time;
}
function getPlan(plan_id,cost,validity,name) {
$('.plan_validity').val(validity);
$('.pid').val(plan_id);

$('.item').val(name);
$('.usercost').val(cost);
}
function balanceGenerate()
{
var total_amount = ($('.amount').val() == '') ? 0 : $('.amount').val();
var discount = ($('.discount').val() == '') ? 0 : $('.discount').val();
var paid_amount = ($('.paid_amount').val() == '') ? 0 : $('.paid_amount').val();
// console.log(paid_amount);
// console.log(balance);
var current_balance= (total_amount-paid_amount);
$('.balance').val(current_balance);
}
function formvalidation()
{
$('.username_error').hide();
$('.name_error').hide();
$('.mobile_error').hide();
if($('.username').val()=='')
{
// console.log('hiii');
$('.username_error').show();
$('.username_error').html('username field is required');
return false;
}
if($('.name').val()=='')
{
$('.name_error').show();
$('.name_error').html('name field is required');
return false;
}
if($('.mobile').val()=='')
{
$('.mobile_error').show();
$('.mobile_error').html('mobile field is required');
return false;
}
// return false;
}
function timeConverter(UNIX_timestamp) {
var a = new Date(UNIX_timestamp * 1000);
var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var year = a.getFullYear();
var month = months[a.getMonth()];
var date = a.getDate();
var hour = a.getHours();
var min = a.getMinutes();
var time = date + '/' + month + '/' + year + ' ' + hour + ':' + min;
return time;
}
function getEndDate(startDate,day)
{
var result=false;
$.ajax({
type: "POST",
url: "<?= base_url() ?>recharge/get_end_date",
data: {validity:day,start_date:startDate},
success: function (data) {
result=data.trim();
},
async: false,
error: function ()
{
alert('Error occured');
}
});
return result;
// console.log(result);
}
function clearField()
{
$('.item').val('');
$('.usercost').val('');
}
function changeDateUser(data)
{
}
</script>