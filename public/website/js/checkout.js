$(document).on('change','#another',function(){
	
  if($('#another').is(':checked')) {
    $('#otheradd').show();
  }else{
    $('#otheradd').hide();
  }

});
$(document).on('change','#account',function(){
  if($('#account').is(':checked')) {
    $('#account_info').show();
  }else{
    $('#account_info').hide();
  }
  /*$('#account_info').each(function() {
        $(this).toggle();
        
                  });
}*/
});
/*var form = $('#Check').serialize();
        console.log(form);*/
        $(document).on('click','#checkSubmit',function(){

                            var form = $('#Check').serialize();
                              url = $('#Check').attr('action');
                            $.ajax({
                              url:url,
                              dataType:'json',
                              data:form,
                              type:'post',
                              beforeSend:function(){
                              	
                                    //$('.alert_error h1').empty();
                                    //$('.alert_error ul').empty();

                              },success: function(data){
                                if(data.status == true ){
                                	$("#checkSubmit").attr('disabled','disabled');
                                	$.each(data.id, function(index, v) {
                                	
									    $('#' + v.id).each(function() {
                                        		$(this).remove();
                                    		});
									}); 
 										 
									 
                                  //$('.woo-cart-count .shopping-bag.wcmenucart-count').html(data.count);
                                	$('.count').html(data.count);
                                	$('.pull-right.m-a0').html(data.total);
                                    //$('.alert-success h6').append(data.result);
                                    //$('#cart')[0].reset();
                                }
                              },error: function(data_error,exception){
                                if(exception == 'error')
                                {
                                    //$('.alert_error h4').html(data_error.responseJSON.message);
                                    console.log(data_error.responseJSON.message);
                                    console.log(data_error.responseJSON.errors);
                                    var error_list='';
                                    $.each(data_error.responseJSON.errors,function(index,v){
                                        error_list +='<li>' + v + '</li>';
                                        
                                    });
                                    $('.alert_error ul').html(error_list);
                                   // alert(data_error.responseJSON.message);
                                }
                              } 
                            });
                            return false;
                        });