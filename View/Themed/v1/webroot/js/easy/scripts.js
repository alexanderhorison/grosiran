(function() {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({styler:"fb",cursorcolor:"#27cce4", cursorwidth: '5', cursorborderradius: '10px', background: '#424f63', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".left-side").niceScroll({styler:"fb",cursorcolor:"#27cce4", cursorwidth: '3', cursorborderradius: '10px', background: '#424f63', spacebarenabled:false, cursorborder: '0'});


    $(".left-side").getNiceScroll();
    if ($('body').hasClass('left-side-collapsed')) {
        $(".left-side").getNiceScroll().hide();
    }



    // Toggle Left Menu
   jQuery('.menu-list > a').click(function() {
      
      var parent = jQuery(this).parent();
      var sub = parent.find('> ul');
      
      if(!jQuery('body').hasClass('left-side-collapsed')) {
         if(sub.is(':visible')) {
            sub.slideUp(200, function(){
               parent.removeClass('nav-active');
               jQuery('.main-content').css({height: ''});
               mainContentHeightAdjust();
            });
         } else {
            visibleSubMenuClose();
            parent.addClass('nav-active');
            sub.slideDown(200, function(){
                mainContentHeightAdjust();
            });
         }
      }
      return false;
   });

   function visibleSubMenuClose() {
      jQuery('.menu-list').each(function() {
         var t = jQuery(this);
         if(t.hasClass('nav-active')) {
            t.find('> ul').slideUp(200, function(){
               t.removeClass('nav-active');
            });
         }
      });
   }

   function mainContentHeightAdjust() {
      // Adjust main content height
      var docHeight = jQuery(document).height();
      if(docHeight > jQuery('.main-content').height())
         jQuery('.main-content').height(docHeight);
   }

   //  class add mouse hover
   jQuery('.custom-nav > li').hover(function(){
      jQuery(this).addClass('nav-hover');
   }, function(){
      jQuery(this).removeClass('nav-hover');
   });


   // Menu Toggle
   jQuery('.toggle-btn').click(function(){
       $(".left-side").getNiceScroll().hide();
       
       if ($('body').hasClass('left-side-collapsed')) {
           $(".left-side").getNiceScroll().hide();
       }
      var body = jQuery('body');
      var bodyposition = body.css('position');

      if(bodyposition != 'relative') {

         if(!body.hasClass('left-side-collapsed')) {
            body.addClass('left-side-collapsed');
            jQuery('.custom-nav ul').attr('style','');

            jQuery(this).addClass('menu-collapsed');

         } else {
            body.removeClass('left-side-collapsed chat-view');
            jQuery('.custom-nav li.active ul').css({display: 'block'});

            jQuery(this).removeClass('menu-collapsed');

         }
      } else {

         if(body.hasClass('left-side-show'))
            body.removeClass('left-side-show');
         else
            body.addClass('left-side-show');

         mainContentHeightAdjust();
      }

   });
   

   searchform_reposition();

   jQuery(window).resize(function(){

      if(jQuery('body').css('position') == 'relative') {

         jQuery('body').removeClass('left-side-collapsed');

      } else {

         jQuery('body').css({left: '', marginRight: ''});
      }

      searchform_reposition();

   });

   function searchform_reposition() {
      if(jQuery('.searchform').css('position') == 'relative') {
         jQuery('.searchform').insertBefore('.left-side-inner .logged-user');
      } else {
         jQuery('.searchform').insertBefore('.menu-right');
      }
   }
})(jQuery);

// Dropdowns Script
$(document).ready(function() {
  $(document).on('click', function(ev) {
    ev.stopImmediatePropagation();
    $(".dropdown-toggle").dropdown("active");
  });
  $('#profile').parsley();
  $('#login').parsley();
  $('#products').parsley();
  $('#delivery').parsley();
  /*
  window.Parsley.on('form:error', function() {
      // This global callback will be called for any field that fails validation.
      //console.log('Validation failed for: ', this.$element);
      $('html, body').animate({scrollTop: $('.thatshit').offset().top +1300}, 'slow');
    });
    
    $('#products').parsley().on('form:error', function() {
        $('html, body').animate({scrollTop: $('#page-wrapper').offset().top -100}, 'slow');
    });
    */
    
    if($('#profile').length)
    {
        $('#profile').parsley().on('form:error', function() {
            $('html, body').animate({scrollTop: $('#page-wrapper').offset().top -100}, 'slow');
        });
        console.log('tae');
    }
    if($('#products').length)
    {
        $('#products').parsley().on('form:error', function() {
            $('html, body').animate({scrollTop: $('#page-wrapper').offset().top -100}, 'slow');
        });
        console.log('lu');
    }
    
    if($('#productsEdit').length)
    {
        $('#productsEdit').parsley().on('form:error', function() {
            $('html, body').animate({scrollTop: $('#productsEdit').offset().top +1300}, 'slow');
        });
        console.log('lu');
    }
    
    
    
});		

    
     
  /************** Search ****************/
		$(function() {
	    var button = $('#loginButton');
	    var box = $('#loginBox');
	    var form = $('#loginForm');
	    button.removeAttr('href');
	    button.mouseup(function(login) {
	        box.toggle();
	        button.toggleClass('active');
	    });
	    form.mouseup(function() { 
	        return false;
	    });
	    $(this).mouseup(function(login) {
	        if(!($(login.target).parent('#loginButton').length > 0)) {
	            button.removeClass('active');
	            box.hide();
	        }
	    });
	});
	new WOW().init();
    
    
    
    
//APPLICATION SCRIPT


//PRODUCTSSS ADD / EDIT
function defaultImage(name , idproduct)
{
    $.ajax({
        type: 'post' ,
        url: "/zenopati/dashboard/products/default-image",
        data: {'name' : name , 'idproduct' : idproduct} ,
    }).done(function() {
        location.href = "/zenopati/dashboard/products/edit/"+idproduct
    });
}
function deleteImage(id , idproduct)
{
    $.ajax({
        type: 'post' ,
        url: "/zenopati/dashboard/products/delete-image",
        data: {'id' : id , 'idproduct' : idproduct} ,
    }).done(function() {
        location.href = "/zenopati/dashboard/products/edit/"+idproduct
    });
}

function deleteAttachment(id , idproduct)
{
    $.ajax({
        type: 'post' ,
        url: "/zenopati/dashboard/products/delete-attachment",
        data: {'id' : id , 'idproduct' : idproduct} ,
    }).done(function() {
        location.href = "/zenopati/dashboard/products/edit/"+idproduct
    });
}

//PURCHASE ORDER
function onProgress(id)
{
    if(confirm('Are you sure?'))
    {
        $.ajax({
            type: 'post' ,
            url: "/zenopati/dashboard/purchase-order/progress",
            data: {'id' : id } ,
        }).done(function() {
            location.href = "/zenopati/dashboard/purchase-order"
        });
    }
    else
        return false
}

function completed(id)
{
    if(confirm('Are you sure?'))
    {
        $.ajax({
            type: 'post' ,
            url: "/zenopati/dashboard/purchase-order/completed",
            data: {'id' : id } ,
        }).done(function() {
            location.href = "/zenopati/dashboard/purchase-order"
        });
    }
    else
        return false
}


function reject(id)
{
    reason = $('textarea#reason-'+id).val();
    if (reason == '')
    {
        $('#error-reason-'+id).html('<li class="parsley-required">This value is required.</li>');
        $('#reason-'+id).focus();
    }
    else
    {
        $.ajax({
            type: 'post' ,
            url: "/zenopati/dashboard/purchase-order/reject",
            data: {'id' : id , 'reason' : reason} ,
        }).done(function() {
            location.href = "/zenopati/dashboard/purchase-order"
        });
    }
}

//PRODUCTS LIST

function deleteProduct(id)
{
    if(confirm('Are you sure want to delete?'))
    {
        $.ajax({
            type: 'post' ,
            url: "/zenopati/dashboard/products/delete",
            data: {'id' : id } ,
        }).done(function() {
            location.href = "/zenopati/dashboard/products"
        });
    }
    else
        return false
}

function changeStatus(id , status)
{
    var text ='';
    if(status == 'pending')
        text = 'Activate Product';
    else
        text = 'Pending Product';
        
    if(confirm('Are you sure want to '+text+'?'))
    {
        $.ajax({
            type: 'post' ,
            url: "/zenopati/dashboard/products/status",
            data: {'id' : id , 'status' : status} ,
        }).done(function() {
            location.href = "/zenopati/dashboard/products"
        }); 
    }
    else
        return false
}
