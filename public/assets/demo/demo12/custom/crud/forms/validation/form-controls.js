// // var FormControls={init:function(){
// //         $("#m_form_2").validate({
// //             rules:{
// //                 name:{
// //                     required:!0,minlength:10
// //                 },
// //                 small_description:{
// //                     required:!0,minlength:10,maxlength:50
// //                 },
// //                 price:{
// //                   required:!0
// //                 },
// //                 category_id:{
// //                     required:!0
// //                 },
// //                 brand:{
// //                     required:!0
// //                 },
// //                 full_description:{required:!0,minlength:10,maxlength:100}
// //                 },invalidHandler:function(e,r){mUtil.scrollTo("m_form_2",-200)},submitHandler:function(e){}
// //         }),
// //             $("#m_form_4").validate({
// //         rules:{
// //             phone:{
// //                 required:!0
// //             },
// //             mobile:{
// //                 required:!0
// //             },
// //             fax:{
// //                 required:!0
// //             },
// //             hotline:{
// //                 required:!0
// //             },
// //             long:{
// //                 required:!0
// //             },
// //             lat:{
// //                 required:!0
// //             },
// //             facebook:{
// //                 required:!0
// //             },
// //             twitter:{
// //                 required:!0
// //             },
// //             instagram:{
// //                 required:!0
// //             },
// //             address:{
// //                 required:!0
// //             },
// //             mail:{
// //                 required:!0
// //             },
// //             website:{
// //                 required:!0
// //             },
// //
// //
// //             full_description:{required:!0,minlength:10,maxlength:100}
// //         },invalidHandler:function(e,r){mUtil.scrollTo("m_form_2",-200)},submitHandler:function(e){}
// //     })
// //
// //         }};
// // jQuery(document).ready(function(){FormControls.init()});
// $(document).ready(function(){
//
//
//
//     $("#basic_validate").validate({
//         rules:{
//             category_name:{
//                 required:true,
//             },
//             category_description:{
//                 required:true,
//             },
//             category_status:{
//                 required:true,
//             },
//         },
//         errorClass: "help-inline",
//         errorElement: "span",
//         highlight:function(element, errorClass, validClass) {
//             $(element).parents('.control-group').addClass('error');
//         },
//         unhighlight: function(element, errorClass, validClass) {
//             $(element).parents('.control-group').removeClass('error');
//             $(element).parents('.control-group').addClass('success');
//         }
//     });
//
//     $("#order_validate").validate({
//         rules:{
//             customer:{
//                 required:true,
//             },
//             products:{
//                 required:true,
//             },
//         },
//         errorClass: "help-inline",
//         errorElement: "span",
//         highlight:function(element, errorClass, validClass) {
//             $(element).parents('.control-group').addClass('error');
//         },
//         unhighlight: function(element, errorClass, validClass) {
//             $(element).parents('.control-group').removeClass('error');
//             $(element).parents('.control-group').addClass('success');
//         }
//     });
//
//     // $("#m_form_2").validate({
//     //     rules:{
//     //         name:{
//     //             required:true,
//     //         },
//     //         small_description:{
//     //             required:true,
//     //         },
//     //         full_description:{
//     //             required:true,
//     //         },
//     //         product_images:{
//     //             required:true,
//     //         },
//     //         category_id:{
//     //             required:true,
//     //         },
//     //         brand:{
//     //             required:true,
//     //         },
//     //         price:{
//     //             required:true,
//     //             number:true
//     //         },
//     //     },
//     //     errorClass: "help-inline",
//     //     errorElement: "span",
//     //     highlight:function(element, errorClass, validClass) {
//     //         $(element).parents('.control-group').addClass('error');
//     //     },
//     //     unhighlight: function(element, errorClass, validClass) {
//     //         $(element).parents('.control-group').removeClass('error');
//     //         $(element).parents('.control-group').addClass('success');
//     //     }
//     // });
//     $("#about_validate").validate({
//         rules:{
//             title:{
//                 required:true,
//             },
//             about:{
//                 required:true,
//             },
//             image:{
//                 required:true,
//             }
//         },
//         errorClass: "help-inline",
//         errorElement: "span",
//         highlight:function(element, errorClass, validClass) {
//             $(element).parents('.control-group').addClass('error');
//         },
//         unhighlight: function(element, errorClass, validClass) {
//             $(element).parents('.control-group').removeClass('error');
//             $(element).parents('.control-group').addClass('success');
//         }
//     });
//     //
//     //
//     //
//     $("#edit_imageSlider_validate").validate({
//         rules:{
//             text:{
//                 required:true,
//             },
//             description:{
//                 required:true,
//             },
//             order:{
//                 required:true,
//             }
//         },
//         errorClass: "help-inline",
//         errorElement: "span",
//         highlight:function(element, errorClass, validClass) {
//             $(element).parents('.control-group').addClass('error');
//         },
//         unhighlight: function(element, errorClass, validClass) {
//             $(element).parents('.control-group').removeClass('error');
//             $(element).parents('.control-group').addClass('success');
//         }
//     });
//     $("#imageSlider_validate").validate({
//         rules:{
//             text:{
//                 required:true,
//             },
//             description:{
//                 required:true,
//             },
//             image:{
//                 required:true,
//             },
//             order:{
//                 required:true,
//             }
//         },
//         errorClass: "help-inline",
//         errorElement: "span",
//         highlight:function(element, errorClass, validClass) {
//             $(element).parents('.control-group').addClass('error');
//         },
//         unhighlight: function(element, errorClass, validClass) {
//             $(element).parents('.control-group').removeClass('error');
//             $(element).parents('.control-group').addClass('success');
//         }
//     });
//     $("#brand_validate").validate({
//         rules:{
//             brand_name:{
//                 required:true,
//             },
//             brand_image:{
//                 required:true,
//             },
//         },
//         errorClass: "help-inline",
//         errorElement: "span",
//         highlight:function(element, errorClass, validClass) {
//             $(element).parents('.control-group').addClass('error');
//         },
//         unhighlight: function(element, errorClass, validClass) {
//             $(element).parents('.control-group').removeClass('error');
//             $(element).parents('.control-group').addClass('success');
//         }
//     });
//
//     $("#edit_brand_validate").validate({
//         rules:{
//             brand_name:{
//                 required:true,
//             },
//         },
//         errorClass: "help-inline",
//         errorElement: "span",
//         highlight:function(element, errorClass, validClass) {
//             $(element).parents('.control-group').addClass('error');
//         },
//         unhighlight: function(element, errorClass, validClass) {
//             $(element).parents('.control-group').removeClass('error');
//             $(element).parents('.control-group').addClass('success');
//         }
//     });
//
// });
