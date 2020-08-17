$(document).ready(function () {
        var url = window.location;
        $('#navbar li a[href="'+ url +'"]').parent().addClass('active').siblings().removeClass('active');
        $('#navbar li a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });

/*$(document).ready(function(){
        $('#news').click(function(){
        	$('#news').addClass('tests').siblings().removeClass('tests');
            $('#new-products').show();
            
            $('#top-seller').hide();
        })
        $('#tops').click(function(){
        	$('#tops').addClass('tests').siblings().removeClass('tests');
            $('#top-seller').show();
            
            $('#new-products').hide();
        })
    });*/
$(document).ready(function(){
    $('#newPTitle').click(function(){
      $('#new_act_sep').show();
      $('#top_act_sep').hide();
      $('#newProduct').show();
      $('#topSeller').hide();

    });
    $('#topSTitle').click(function(){
      $('#top_act_sep').show();
      $('#new_act_sep').hide();
      $('#topSeller').show();
      $('#newProduct').hide();
    });
});


$(document).on('click', '#review_this', function(e) {
    $("#our_reviews").trigger('click');
});


 $(document).on('click','#newSubmit',function(){
                            var form = $('#newsletter').serialize(),
                            url = $('#newsletter').attr('action');
                            $.ajax({
                              url:url,
                              dataType:'json',
                              data:form,
                              type:'post',
                              beforeSend:function(){
                                $('.invalid-feedback strong').empty();
                                    $('#successNew').empty();    
                                    $('#newsletter')[0].reset();
                              },success: function(data){
                                if(data.status == true ){

                                   $('#successNew').append(data.success);
                                    
                                }
                              },error: function(data_error,exception){
                                if(exception == 'error')
                                {
                                   

                                    var error_list='';
                                    $.each(data_error.responseJSON.errors,function(index,v){
                                        error_list +=$('.invalid-feedback strong').html(v);
                                        
                                    });
                                    
                                   // alert(data_error.responseJSON.message);
                                }
                              } 
                            });
                            return false;
                        });
 $(document).on('click','#reviewsubmit',function(){
      var form = $('#reviewform').serialize(),
                            url = $('#reviewform').attr('action');
                            $.ajax({
                              url:url,
                              dataType:'json',
                              data:form,
                              type:'post',
                              beforeSend:function(){
                                    $('#successNew').empty(); 
                                    $('#reviewform')[0].reset();
                              },success: function(data){
                                if(data.status == true ){

                                  $('#successNew').append(data.success);
                                   
                                    
                                }
                              },error: function(data_error,exception){
                                
                                   // console.log(data_error.responseJSON.message);
                                    //console.log(data_error.responseJSON.errors);

                                    var error_list='';
                                    $.each(data_error.responseJSON.errors,function(index,v){
                                      // console.log(v);
                                        
                                    });
                                    
                                   // alert(data_error.responseJSON.message);
                                
                              } 
                            });
                            return false;
 });
  $(document).ready(function(){
    $('#city').change(function(){
      var shipping    = $(this).find(':selected').data("shipping");
      $('#shipping_price').html(shipping+" EGP");
      $('#cart_total').html(+$('#cart_subtotal').data("subtotal") + +shipping +" EGP");

$('#cart_total').attr({"data-total":+$('#cart_subtotal').data("subtotal") + +shipping });
    });
 });

  $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}