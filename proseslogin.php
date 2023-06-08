<?php
	//menghubungkan file php yg lain
	include 'koneksi.php';
	session_start();
	//mendekelarisakn kelas, extends=melakukan pewarisan
	class login extends koneksi{
	//deklarasi variable
	public $Username;
	public $Password;
	public $Query;
	//membuat function dengan parameter untuk menerima data post
	function getPost($Username,$Password){
		$this->Username=$Username; //mengeset variable username
		$this->Password=$Password;	//mengeset variable password
	}

	//membuat function utk login
	function setLogin(){
		
		$sql="select * from tbkasir where Username='{$this->Username}' and Password='{$this->Password}'";
		$this->Query=mysql_query($sql);	
	}
	function getSession(){
		
			$data=mysql_fetch_array($this->Query);
			$_SESSION['Level']=$data['Level'];
			$_SESSION['IdKasir']=$data['IdKasir'];
			$_SESSION['Status']=$data['Status'];
			$_SESSION['NamaLengkap']=$data['NamaLengkap'];
			return $_SESSION;
		
	}
	function __destruct()
	{
			if(mysql_num_rows($this->Query)){
		echo "<script>
			alert('Selamat Datang');
			location.href='utama.php';
		</script>";
		}
		else
		{
		echo "<script>
			alert('Login Ggal');
			location.href='login.php';
		</script>";
		}
	}

}
$Username=$_POST['Username'];//mengambil data dari form
$Password=$_POST['Password'];//mengambil data dari form
$login=new login;//mendekelarasikan objek baru
$login->getPost($Username,$Password);//memanggil function getpost dan mengset parameternya
$login->setLogin();//memanggil function setlogin
$login->getSession();//memanggil function membuatsession

?>

