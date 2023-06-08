<script language="javascript">
	function validasilogin()
	{
		var Username=formlogin.Username.value;
		var Password=formlogin.Password.value;
		
		if(Username="")
		{
			alert("Username Masih Kosong!!");
			formlogin.Username.focus();
			return false;
		}
		if(Password="")
		{
			alert("Password Masih Kosong!!");
			formlogin.Password.focus();
			return false;
		}		
	}
</script>


<html>
	<head>
    	<title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
    	<div id="kotak">
        	<div id="header"></div>
            <div id="topmenu">
            	<ul>
                	<li style="list-style-type:none;"><a href="#">Pencarian Buku</a></li>
                </ul>
            </div>
            <div id="konten">
            	<div id="kotakkecil">
                <h3 align="center" style="margin-top:20px">Silahkan Login terlebih dahulu</h3>
                <hr>
            	<form action="proseslogin.php" method="post" name="formlogin" onSubmit="return validasilogin();">
                	<table align="center" style="padding-top:20px;">
                        <tr>
                        	<td>Username :</td>
                            <td><input type="text" name="Username" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Password :</td>
                            <td><input type="text" name="Password" size="30"></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td><input type="submit" value="Login">
                            	<input type="reset" value="Batal">
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>