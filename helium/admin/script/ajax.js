/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
var id='';
var code='';
var thispage='';
var letter='';
function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_type = new ActiveXObject("Microsoft.XMLHTTP");
}else{
request_type = new XMLHttpRequest();
}
return request_type;
}

var http = createObject();
/* -------------------------- */
/* INSERT */
/* -------------------------- */
/* Required: var nocache is a random number to add to request. This value solve an Internet Explorer cache issue */
var nocache = 0;

//Individual Ajax functions for different purposes
//************************************************

//Search Function for AEC CCAF Codes
function showCourseCatalog(str) 
{
		//alert(id.length+' - '+code.length);
		// Optional: Show a waiting message in the layer with ID login_response
		document.getElementById('CourseLinks').innerHTML = "Loading Catalog  <img src=\'../../../images/ajax-loaderred.gif\' />"
		// Required: verify that all fileds is not empty. Use encodeURI() to solve some issues about character encoding.
		//var id=  encodeURI(id);
		//var code=  encodeURI(code);
		// Set te random number to add to URL request
		nocache = Math.random();
		var url = 'scripts/getlinks.php?q='+str+'&nocache = '+nocache;
		// Pass the login variables like URL variable
		http.open('get', url);
		http.onreadystatechange = returnLinks;
		http.send(null);
}

function returnLinks()
{
	if(http.readyState == 4)
		{ 
		response = http.responseText;
		//response holds the name and ID returned from 'insertFaculty.php'
		//and it is displayed on the page by the 'Go' button
		document.getElementById('CourseLinks').innerHTML = response;
		}
}