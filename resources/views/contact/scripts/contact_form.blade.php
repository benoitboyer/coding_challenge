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

  window.Parsley.on('form:error', function() {  
    //check if the form with error was already submited with parsley
    if(!$(".parsley-alert").children("div").hasClass('alert-danger')) {
      $( "#collapseOne" ).collapse("toggle");
      $(".parsley-alert").append('<div class="alert alert-danger" role="alert"><p>Whoops there is errors, please fill the contact form again please... </p></div>');
    }
    else {
      $( "#collapseOne" ).collapse("toggle");
    }  
  });
});
</script>