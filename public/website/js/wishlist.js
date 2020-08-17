/*$(document).on('click','#watch_product',function(){
        
                            var form = $('#watchlist').serialize(),
                            csrf =  $("#watchlist input[name=_token]").val();
                            method =  $("#watchlist input[name=_method]").val();
                            product_id =  $("#watchlist input[name=product_id]").val();
                            id = $(this).data('id'),
                            test ="_token="+csrf+"&_method="+method+"&product_id="+id;
                            url = $('#watchlist').attr('action');
                            $.ajax({
                              url:url,
                              dataType:'json',
                              data:test,
                              type:'post',
                              beforeSend:function(){
                                   console.log(test);
                                   console.log(url);
                              },success: function(data){
                                console.log(id);
                                if(data.status == true ){
                                    
                                    $('.wish-dropdown-item-wraper .nav-cart-content .nav-cart-items').append(data.carts);
                                    //$('.woo-cart-count .shopping-bag.wcmenucart-count').html(data.count);
                                   
                                    
                                    $('.alert-success h6').append(data.result);
                                    if(data.same)
                                    {
                                      console.log(data.exist);
                                      console.log(product_id);
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
                                    console.log(data_error.responseJSON.message);
                                    console.log(data_error.responseJSON.errors);
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
                        });*/
                         $(document).on('click','#wishDel',function(){
              
              var id = $(this).data('id'),
                  form = $('#delWish').serialize(),
                  csrf =  $("#delWish input[name=_token]").val(),
                  method =  $("#delWish input[name=_method]").val(),
                  data ="_token="+csrf+"&_method="+method+"&product_id="+id,
                  url = $('#delWish').attr('action');
                    
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
                                   
                                    
                                }
                              },error: function(data_error,exception){
                                if(exception == 'error')
                                {
                                    
                                  console.log(data_error.responseJSON.message);
                                    
                                   
                                }
                              } 
                            });
                     return false;
 });
  /*$(document).on('change','#quantityUp',function(){

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
                                    console.log(data_error.responseJSON.message);
                                    console.log(data_error.responseJSON.errors);
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
                        });*/