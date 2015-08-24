//########################## SWITCH STYLE THEME #########################

var style_cookie_name = "style" ;
var style_cookie_duration = 30 ;

function switch_style (css_title)
{
  var i, link_tag ;
  for (i = 0, link_tag = document.getElementsByTagName("link") ;
    i < link_tag.length ; i++ ) {
    if ((link_tag[i].rel.indexOf( "stylesheet" ) != -1) &&
      link_tag[i].title) {
      link_tag[i].disabled = true ;
      if (link_tag[i].title == css_title) {
        link_tag[i].disabled = false ;
      }
    }
      /*set_cookie( style_cookie_name, css_title,
      style_cookie_duration );*/
	  setCookie(style_cookie_name,css_title,style_cookie_duration);
  }

}

function set_style_from_cookie()
{
  var css_title = getCookie(style_cookie_name);
	if(css_title == undefined){
		css_title = 'classic';
		switch_style(css_title);
	}else{
		switch_style(css_title);
	}
    
}

function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}
