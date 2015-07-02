/*get base url*/
var protocol = window.location.protocol;
var hostname = window.location.hostname;
var port = window.document.location.port;
var full_pathname = window.location.pathname;
var split_pathname = full_pathname.split( '/' );
var pathname = split_pathname[1];
var pagename = split_pathname[2];
var pagename_2 = split_pathname[3];
//alert(pagename_2);
/*Server path*/
//var base_url = protocol+"//"+hostname;
/*Server path*/

/*Local path*/
var base_url = protocol+"//"+hostname+"/"+pathname+"/"+pagename+"/"+pagename_2;
var base_url1 = protocol+"//"+hostname+"/"+pathname+"/"+pagename;
var base_url_main = protocol+"//"+hostname+"/"+pathname;
var js_base_home = protocol+"//"+hostname+"/"+pathname+"/"+pagename
/*Local path*/
//alert(base_url_main);

/*get base url*/

/*Define required paths*/
var theme_url = base_url+"/wp-content/themes/steppingstone_scholars";
var img_path = theme_url+"/includes/images";
var jspath = theme_url+"/includes/js";
var css_path = theme_url+"/includes/css";

//1623
var plugin_url_js =protocol+"//"+hostname+"/"+pathname+"/"+"wp-content/plugins";
//var plugin_url_cs =protocol+"//"+hostname+"/"+pathname+"/"+"wp-content/plugins";
//1623
//alert(plugin_url_cs);