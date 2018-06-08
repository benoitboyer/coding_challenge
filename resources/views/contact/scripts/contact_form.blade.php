<script type="text/javascript">
$(document).ready(function(){
  $( "#headingOne" ).click(function() {
      $( "#collapseOne" ).collapse("toggle");
  });
  $( "#headingTwo" ).click(function() {
      $( "#collapseTwo" ).collapse("toggle");
  });
  $( "#headingThree" ).click(function() {
      $( "#collapseThree" ).collapse("toggle");
  });

  //validation regexp
  var regx_name = new RegExp(/[a-zA-Z]{2,}[ _-]?[a-zA-z]{0,}/);
  var regx_phone = new RegExp(/^07\d{9}/);
  var regx_email = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
  var regx_phone = new RegExp(/^07[0-9]{9}/);

  //validation for part1
  $("#nextOne").click(function() {
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();

    var form_error = 0;
  
    //clear error feedback message
    $("#first_name").next('.invalid-feedback').remove();
    $("#last_name").next('.invalid-feedback').remove();
    $("#email").next('.invalid-feedback').remove();

    //first_name validation
    if(first_name.length < 2 ) {
      $("#first_name").after("<div class='invalid-feedback'>Your first name is too short</div>");
      $("#first_name").addClass("is-invalid");
      form_error ++;
    }
    else if(first_name.length > 50) {
      $("#first_name").after("<div class='invalid-feedback'>Your first name is too long</div>");
      $("#first_name").addClass("is-invalid");
      form_error ++;
    }
    else if(regx_name.test(first_name)== false){
      $("#first_name").after("<div class='invalid-feedback'>Your first name is not allowed</div>");
      $("#first_name").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#first_name").removeClass("is-invalid").addClass("is-valid");
    }

    //last_name validation
    if(last_name.length < 2 ) {
      $("#last_name").next('.invalid-feedback').remove();
      $("#last_name").after("<div class='invalid-feedback'>Your surname is too short</div>");
      $("#last_name").addClass("is-invalid");
      form_error ++;
    }
    else if(last_name.length > 50) {
      $("#last_name").after("<div class='invalid-feedback'>Your surname is too long</div>");
      $("#last_name").addClass("is-invalid");
      form_error ++;
    }
    else if(!regx_name.test(last_name)){
      $("#last_name").after("<div class='invalid-feedback'>Your surname is not allowed</div>");
      $("#last_name").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#last_name").removeClass("is-invalid").addClass("is-valid");
    }

    //email validation
    if(email=="" ) {
      $("#email").after("<div class='invalid-feedback'>Your email is empty</div>");
      $("#email").addClass("is-invalid");
      form_error ++;
    }
    else if(!regx_email.test(email)){
      $("#email").after("<div class='invalid-feedback'>Your email is in a wrong format</div>");
      $("#email").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#email").removeClass("is-invalid").addClass("is-valid");
    }

    // If this part is has no error show the next part of the form
    if(form_error == 0){
      $( "#collapseTwo" ).collapse("toggle");
      $("#last_name").removeClass("is-invalid");
      $("#last_name").removeClass("is-invalid");
      $("#last_name").removeClass("is-invalid");
    }
});


//validation for part 2
  $("#nextTwo").click(function(){

    var phone_number = $("#phone_number").val();
    var gender = $("#gender").val();
    var day = $("#day").val();
    var month = $("#month").val();
    var year = $("#year").val();

    var form_error = 0;
    
    //clear feedback error
    $("#phone_number").next('.invalid-feedback').remove();
    $("#gender").next('.invalid-feedback').remove();
    $("#day").next('.invalid-feedback').remove();
    $("#month").next('.invalid-feedback').remove();
    $("#year").next('.invalid-feedback').remove();
   

    //phone number validation
    if(phone_number.length < 11 ) {
      $("#phone_number").after("<div class='invalid-feedback'>Your phone number is too short</div>");
      $("#phone_number").addClass("is-invalid");
      form_error ++;
    }
    else if(phone_number.length > 11) {
      
      $("#phone_number").after("<div class='invalid-feedback'>Your phone number is too long</div>");
      $("#phone_number").addClass("is-invalid");
      form_error ++;
    }
    else if(regx_phone.test(phone_number)== false){
      $("#phone_number").after("<div class='invalid-feedback'>Your phone number is not allowed</div>");
      $("#phone_number").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#phone_number").removeClass("is-invalid").addClass("is-valid");

    }


    //gender validation
    if(gender!=0 && gender != 1) {
      $("#gender").after("<div class='invalid-feedback'>Please select a gender</div>");
      $("#gender").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#gender").removeClass("is-invalid").addClass("is-valid");
    }

    //day validation
    if(day == "" ) {
      $("#day").after("<div class='invalid-feedback'>Day is required</div>");
      $("#day").addClass("is-invalid");
      form_error ++;
    }
    else if(!/\d/.test(day)) {
      $("#day").after("<div class='invalid-feedback'>Day must be digits</div>");
      $("#day").addClass("is-invalid");
    }
    else if(parseInt(day) < 1 ) {
      $("#day").after("<div class='invalid-feedback'>Day must be greater than 0</div>");
      $("#day").addClass("is-invalid");
      form_error ++;
    }
    else if(parseInt(day) > 31){
      $("#day").after("<div class='invalid-feedback'>Day must be lower than 31 </div>");
      $("#day").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#day").removeClass("is-invalid").addClass("is-valid");
    }
    
    //month validation
    if(month == "" ) {
      $("#month").after("<div class='invalid-feedback'>Month is required</div>");
      $("#month").addClass("is-invalid");
      form_error ++;
    }
    else if(!/\d/.test(month)) {
      $("#month").after("<div class='invalid-feedback'>Month must be digits</div>");
      $("#month").addClass("is-invalid");
    }
    else if(parseInt(month) < 1 ) {
      $("#month").after("<div class='invalid-feedback'>Month must be greater than 0</div>");
      $("#month").addClass("is-invalid");
      form_error ++;
    }
   
    else if(parseInt(month) > 12){
      $("#month").after("<div class='invalid-feedback'>Month must be lower than 13 </div>");
      $("#month").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#month").removeClass("is-invalid").addClass("is-valid");
    }

    //year validation
    if(year == "" ) {
      $("#year").after("<div class='invalid-feedback'>Year is required</div>");
      $("#year").addClass("is-invalid");
      form_error ++;
    }
    else if(!/\d/.test(year)) {
      $("#year").after("<div class='invalid-feedback'>Year must be digits</div>");
      $("#year").addClass("is-invalid");
    }
    else if(parseInt(year) < 1900 ) {
      $("#year").after("<div class='invalid-feedback'>Year must be greater than 1900</div>");
      $("#year").addClass("is-invalid");
      form_error ++;
    }
    else if(parseInt(year) > 2018){
      $("#year").after("<div class='invalid-feedback'>Year can't be in the future </div>");
      $("#year").addClass("is-invalid");
      form_error ++;
    }
    else{
      $("#year").removeClass("is-invalid").addClass("is-valid");
    }


    //if the validation is ok show the next part of the form
    if(form_error == 0){
      $( "#collapseThree" ).collapse("toggle");
      $("#phone_number").removeClass("is-invalid");
      $("#gender").removeClass("is-invalid");
      $("#day").removeClass("is-invalid");
      $("#month").removeClass("is-invalid");
      $("#year").removeClass("is-invalid");
    }
  });

  //Check if the submited form is valid.(all required fields are not empty) if not show an alert div msg 
  $("#nextThree").click(function(){
    var form = $('#contact_form');
  
    var isValidForm = form[0].checkValidity();

    if(isValidForm == false){
      $( "#collapseOne" ).collapse("toggle");

      $("#js-form-alert").html('<div class="alert alert-danger" role="alert"><p>Whoops it looks like the form is not complete.. </p></div>');
    }
  });
});
</script>