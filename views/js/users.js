 

 $(document).on("click", ".btnActivate", function(){

	var userId = $(this).attr("userId");
	var userStatus = $(this).attr("userStatus");

	var datum = new FormData();
 	datum.append("activateId", userId);
  	datum.append("activateUser", userStatus);


  	$.ajax({
	  url:"ajax/user.ajax.php",
	  method: "POST",
	  data: datum,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(answer){
      		}

		 })
		if(userStatus == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Deactivated');
  		$(this).attr('userStatus',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activate');
  		$(this).attr('userStatus',0);

  	
		}
		
      })



 

$(document).ready(function(){
  
    $('#receipent').on('change', function() {

      if ( this.value == 'All Staff')
      {
        $("#staff").show();
        $("#student").hide();
        $("#parent").hide();

      }
       else if ( this.value == 'Students')
      {
        $("#staff").hide();
        $("#student").show();
        $("#parent").hide();
      }
      else if ( this.value == 'Parents')
      {
        $("#staff").hide();
         $("#student").hide();
        $("#parent").show();
      }
      else
      {
        $("#staff").hide();
        $("#student").hide();
        $("#parent").hide();
      }

    
    });
});