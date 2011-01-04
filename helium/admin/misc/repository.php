<?php include("../../config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../script/jquery.js" type="text/javascript"></script>
<style type="text/css" media="screen"> 
<!--
body { font: 1em "Trebuchet MS", verdana, arial, sans-serif; font-size: 100%; }
input, textarea { font-family: Arial; font-size: 125%; padding: 7px; }
label { display: block; } 
 
.infiniteCarousel {
  width: 550px;
  position: relative;
}
 
.infiniteCarousel .wrapper {
  width: 470px; /* .infiniteCarousel width - (.wrapper margin-left + .wrapper margin-right) */
  overflow: auto;
  min-height: 10em;
  margin: 0 40px;
  position: absolute;
  top: 0;
}
 
.infiniteCarousel ul img {
  width:90px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
}
 
.infiniteCarousel .wrapper ul {
  width: 9999px;
  list-style-image:none;
  list-style-position:outside;
  list-style-type:none;
  margin:0;
  padding:0;
  position: absolute;
  top: 0;
}
 
.infiniteCarousel ul li {
  display:block;
  float:left;
  padding: 10px;
  height: 85px;
  width: 85px;
}
 
.infiniteCarousel ul li img {
  display:block;
}
 
.infiniteCarousel .arrow {
  display: block;
  height: 36px;
  width: 37px;
  background: url(../images/arrow.png) no-repeat 0 0;
  text-indent: -999px;
  position: absolute;
  top: 37px;
  cursor: pointer;
}
 
.infiniteCarousel .forward {
  background-position: 0 0;
  right: 0;
}
 
.infiniteCarousel .back {
  background-position: 0 -72px;
  left: 0;
}
 
.infiniteCarousel .forward:hover {
  background-position: 0 -36px;
}
 
.infiniteCarousel .back:hover {
  background-position: 0 -108px;
}
 
 
 
-->
</style> 
<script type="text/javascript"> 
 
$.fn.infiniteCarousel = function () {
 
    function repeat(str, num) {
        return new Array( num + 1 ).join( str );
    }
  
    return this.each(function () {
        var $wrapper = $('> div', this).css('overflow', 'hidden'),
            $slider = $wrapper.find('> ul'),
            $items = $slider.find('> li'),
            $single = $items.filter(':first'),
            
            singleWidth = $single.outerWidth(), 
            visible = Math.ceil($wrapper.innerWidth() / singleWidth),
            currentPage = 1,
            pages = Math.ceil($items.length / visible);            
 
 
        // 1. Pad so that 'visible' number will always be seen, otherwise create empty items
        if (($items.length % visible) != 0) {
            $slider.append(repeat('<li class="empty" />', visible - ($items.length % visible)));
            $items = $slider.find('> li');
        }
 
        // 2. Top and tail the list with 'visible' number of items, top has the last section, and tail has the first
        $items.filter(':first').before($items.slice(- visible).clone().addClass('cloned'));
        $items.filter(':last').after($items.slice(0, visible).clone().addClass('cloned'));
        $items = $slider.find('> li'); // reselect
        
        // 3. Set the left position to the first 'real' item
        $wrapper.scrollLeft(singleWidth * visible);
        
        // 4. paging function
        function gotoPage(page) {
            var dir = page < currentPage ? -1 : 1,
                n = Math.abs(currentPage - page),
                left = singleWidth * dir * visible * n;
            
            $wrapper.filter(':not(:animated)').animate({
                scrollLeft : '+=' + left
            }, 500, function () {
                if (page == 0) {
                    $wrapper.scrollLeft(singleWidth * visible * pages);
                    page = pages;
                } else if (page > pages) {
                    $wrapper.scrollLeft(singleWidth * visible);
                    // reset back to start position
                    page = 1;
                } 
 
                currentPage = page;
            });                
            
            return false;
        }
        
        $wrapper.after('<a class="arrow back">&lt;</a><a class="arrow forward">&gt;</a>');
        
        // 5. Bind to the forward and back buttons
        $('a.back', this).click(function () {
            return gotoPage(currentPage - 1);                
        });
        
        $('a.forward', this).click(function () {
            return gotoPage(currentPage + 1);
        });
        
        // create a public interface to move to a specific page
        $(this).bind('goto', function (event, page) {
            gotoPage(page);
        });
    });  
};
 
$(document).ready(function () {
  $('.infiniteCarousel').infiniteCarousel();
});
</script> 
</head>
<body>
<?php
$result = mysql_query('SELECT * FROM `images` WHERE `category` = \'repository\' ');
if(mysql_num_rows($result) <= 0){
	echo"No images in repository.";
}else{
echo"<div class=\"infiniteCarousel\">
  <div class=\"wrapper\">
    <ul>";
while($row = mysql_fetch_array($result))
  {
  echo"<li>
  <img src=\"".$row['image']."\" height=\"50\"/>
  </li>";
  }
  echo "</ul>        
  </div>
</div>";
}
?>
</body>
</html>
