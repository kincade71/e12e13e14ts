// JavaScript Document
//user scripts
$(document).ready(function() {
     $('.edit_name_user').editable('script/update_user_name.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit name...',
		 name : 'name'
     });
 });
$(document).ready(function() {
     $('.edit_category_user').editable('script/update_user_category.php',  { 
  	     data   : " {'admin':'admin','contributor':'contributor'}",
       	 type   : 'select',
         submit    : 'OK',
		 name : 'category'
     });
 });
//end user
//faq
$(document).ready(function() {
     $('.edit_name_faq').editable('script/update_faq_name.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit name...',
		 name : 'name'
     });
 });


$(document).ready(function() {
     $('.edit_url_faq').editable('script/update_faq_url.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit body...',
		 name : 'url'
     });
 });


$(document).ready(function() {
     $('.edit_about_faq').editable('script/update_faq_about.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit about section...',
		 name : 'about'
     });
 });


$(document).ready(function() {
     $('.edit_comment_faq').editable('script/update_faq_comment.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit comment...',
		 name : 'comment'
     });
 });


$(document).ready(function() {
     $('.edit_category_faq').editable('script/update_faq_category.php',  { 
       	 type   : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
		 indicator : '<img src="images/loading.gif">',
		 tooltip   : 'Click to edit comment...',
		 name : 'category'
     });
 });
// end faq
//navigation
$(document).ready(function() {
     $('.edit_name_nav').editable('script/update_name.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit name...',
		 name : 'name'
     });
 });

$(document).ready(function() {
     $('.edit_url_nav').editable('script/update_url.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit url...',
		 name : 'url'
     });
 });

$(document).ready(function() {
     $('.edit_about_nav').editable('script/update_about.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit about section...',
		 name : 'about'
     });
 });

$(document).ready(function() {
     $('.edit_comment_nav').editable('script/update_comment.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit comment...',
		 name : 'comment'
     });
 });

//end navigation
//article

$(document).ready(function() {
     $('.edit_name_art').editable('script/update_article_name.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit name...',
		 name : 'name'
     });
 });


$(document).ready(function() {
     $('.edit_url_art').editable('script/update_article_url.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit body...',
		 name : 'url'
     });
 });


$(document).ready(function() {
     $('.edit_about_art').editable('script/update_article_about.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit about section...',
		 name : 'about'
     });
 });


$(document).ready(function() {
     $('.edit_comment_art').editable('script/update_article_comment.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit comment...',
		 name : 'comment'
     });
 });
//end article
//image 

$(document).ready(function() {
     $('.edit_name_img').editable('script/update_image_name.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit name...',
		 name : 'name'
     });
 });

$(document).ready(function() {
     $('.edit_url_img').editable('script/update_image_url.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit url...',
		 name : 'url'
     });
 });

$(document).ready(function() {
     $('.edit_about_img').editable('script/update_image_about.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit about section...',
		 name : 'about'
     });
 });

$(document).ready(function() {
     $('.edit_comment_img').editable('script/update_image_comment.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to edit comment...',
		 name : 'comment'
     });
 });

$(document).ready(function() {
     $('.edit_category_img').editable('script/update_image_category.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to change the page this image appears on...',
		 name : 'category'
     });
 });
 
 //caendar
 $(document).ready(function() {
     $('.edit_time').editable('script/update_time.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to change the page this image appears on...',
		 name : 'time'
     });
 });
 $(document).ready(function() {
     $('.edit_details').editable('script/update_details.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to change the page this image appears on...',
		 name : 'details'
     });
 });
 $(document).ready(function() {
     $('.edit_address').editable('script/update_address.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to change the page this image appears on...',
		 name : 'address'
     });
 });

//end image
//ecom
 $(document).ready(function() {
     $('.edit_title_ecom').editable('script/update_title_ecom.php', { 
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to change the page this image appears on...',
		 name : 'title'
     });
 });
 $(document).ready(function() {
     $('.edit_details_ecom').editable('script/update_details_ecom.php', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="images/loading.gif">',
         tooltip   : 'Click to change the description of this item...',
		 name : 'desc'
     });
 });

//end ecom