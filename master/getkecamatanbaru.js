var xmlHttp;
function getkecamatanbaru()
{

var  kabupaten= document.formData.kabupaten.value;


xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url="getkecamatanbaru.php";
url=url+"?kabupaten="+kabupaten;
//url=url+"&varbaris="+varbaris;
//url=url+"&kelompok="+kelompok;
//url=url+"&namaBekal="+namaBekal;

//url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged4a;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function stateChanged4a() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("getkecamatan").innerHTML=xmlHttp.responseText;
 } 
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
