 $(document).on('click','#add_product',function(){

                            var form = $('#cart').serialize(),
                            csrf =  $("#cart input[name=_token]").val();
                            method =  $("#cart input[name=_method]").val();
                            product_id =  $("#cart input[name=product_id]").val();
                            id = $(this).data('id'),
                            test ="_token="+csrf+"&_method="+method+"&product_id="+id;
                            url = $('#cart').attr('action');
                            $.ajax({
                              url:url,
                              dataType:'json',
                              data:test,
                              type:'post',
                              beforeSend:function(){
                                    $('#cart')[0].reset();
                                    $('.alert_error h4').empty();
                                    $('.alert_error ul').empty();
                                    $('.alert-success h6').empty();

                              },success: function(data){
                                // console.log(id);
                                if(data.status == true ){
                                    
                                    $('.cart-dropdown-item-wraper .nav-cart-content .nav-cart-items').append(data.carts);
                                    //$('.woo-cart-count .shopping-bag.wcmenucart-count').html(data.count);
                                    $('.count').html(data.count);
                                    $('.pull-right.m-a0').html(data.total);
                                    
                                    $('.alert-success h6').append(data.result);
                                    if(data.same)
                                    {
                                    //   console.log(data.quant);
                                    //   console.log(product_id);
                                      $('#q' + product_id).each(function() {
                                        $(this).html(data.quant);
                                       });
                                      $('#q'+id).html(data.quant);
                                      $('#cart')[0].reset();
                                    }
                                    $('#cart')[0].reset();
                                }
                              },error: function(data_error,exception){
                                if(exception == 'error')
                                {
                                    // console.log(data_error.responseJSON.message);
                                    // console.log(data_error.responseJSON.errors);
                                    $('.alert_error h4').html(data_error.responseJSON.message);
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
 $(document).on('click','#cartDel',function(){
              var id = $(this).data('id'),
                  form = $('#delCart').serialize(),
                  csrf =  $("#delCart input[name=_token]").val(),
                  method =  $("#delCart input[name=_method]").val(),
                  data ="_token="+csrf+"&_method="+method+"&product_id="+id,
                  url = $('#delCart').attr('action');
                    
                    $.ajax({
                              url:url,
                              dataType:'json',
                              data:data,
                              type:'POST',
                              beforeSend:function(){
                                

                                    

                              },success: function(data){
                                
                                if(data.status == true ){
                                    
                                    $('#' + id).each(function() {
                                        $(this).remove();
                                    });
                                    $('#' + id).remove();
                                    //$('.woo-cart-count .shopping-bag.wcmenucart-count').html(data.count);
                                    $('.count').html(data.count);
                                    $('.pull-right.m-a0').html(data.total);
                                    
                                }
                              },error: function(data_error,exception){
                                if(exception == 'error')
                                {
                                    
                                  
                                    
                                   
                                }
                              } 
                            });
                     return false;
 });
  $(document).on('change','#quantityUp',function(){

                            var form = $('#quantityUpd').serialize(),
                            csrf =  $("#quantityUpd input[name=_token]").val();
                            method =  $("#quantityUpd input[name=_method]").val();
                            //value =  $("#quantityUpd option[selected='selected']").val();
                            value =  $(this).children("option:selected").val();
                            id = $(this).children("option:selected").data('id'),
                            test ="_token="+csrf+"&_method="+method+"&product_id="+id+"&value="+value;
                            url = $('#quantityUpd').attr('action');
                            
                            $.ajax({
                              url:url,
                              dataType:'json',
                              data:test,
                              type:'post',
                              beforeSend:function(){
                                    
                                    

                              },success: function(data){
                                if(data.status == true ){
                                  
                                    
                                    $('#a' + id).html(data.total);
                                    $('#Total').html(data.subtotal);
                                    
                                    
                                }
                              },error: function(data_error,exception){
                                if(exception == 'error')
                                {
                                    // console.log(data_error.responseJSON.message);
                                    // console.log(data_error.responseJSON.errors);
                                    $('.alert_error h4').html(data_error.responseJSON.message);
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