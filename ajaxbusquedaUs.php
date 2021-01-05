<HTML>
<DODY>

<h1>Actualizar datos de usuarios</h1>

<form action = "" method = "post">
<table border = "0">

<tr>
	<td>Correo</td>
	<td align = "center"><input types = "text" name = "txtCorreo3" size = "30" maxlength = "30" onkeyup="showHint(this.value)" /></td>
</tr>

</table>
</form>

<p><span id="txtHint"></span></p>

<script>
function showHint(str)
{
  var xhttp;
  if (str.length == 0)
  {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajaxUs.php? dato="+str, true);
  xhttp.send();
}
</script>

</BODY>
</HTML>

