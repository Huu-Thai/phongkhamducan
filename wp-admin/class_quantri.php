<?php
require_once "class_db.php";
class quantri extends db
{
	   //----------------- Công Dụng -----------------------------//
	public function ListCD(&$totalRows, $pageNum, $pageSize, $TieuDe)
	{
		$startRow = ($pageNum-1)*$pageSize;
		if ($TieuDe != ""){
			$sql="	SELECT * FROM  chude
			WHERE TieuDe like '%$TieuDe%' ORDER BY idChuDe DESC
			LIMIT $startRow , $pageSize
			";
			$kq = mysql_query($sql) or die (mysql_error());
			$sql="SELECT count(*)
			FROM  chude
			WHERE TieuDe like '%$TieuDe%' ";
		}else{
			$sql="	SELECT * FROM  chude
			ORDER BY idChuDe DESC
			LIMIT $startRow , $pageSize
			";
			$kq = mysql_query($sql) or die (mysql_error());
			$sql="SELECT count(*)
			FROM  chude";
		}
		$rs= mysql_query($sql) or die(mysql_error());;
		$row_rs = mysql_fetch_row($rs);
		$totalRows = $row_rs[0];
		return $kq;
	}
	public function ChiTietCD($idSP){
		$sql = "SELECT * FROM chude WHERE idChuDe=$idSP";
		$kq = mysql_query($sql) or die (mysql_error());
		return $kq;
		}// xem chi tiết thể loại để chỉnh sữa

		public function SuaCD($idSP)
		{
			$TieuDe = $_POST['TieuDe'];
			$MoTa = $_POST['TomTat'];

			$NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);

			//Cập nhật vào db
			$sql="UPDATE chude
			SET TieuDe = '$TieuDe',
			MoTa = '$MoTa'
			WHERE idChuDe = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function XoaCD($idDM)
		{
			settype($idDM,"int");
			$sql="DELETE FROM chude WHERE idChuDe='$idDM'";
			mysql_query($sql) or die(mysql_error());
		}
		public function ThemCD()
		{
			$TieuDe= $_POST['TieuDe'];
			$MoTa = $_POST['TomTat'];

			$sql="INSERT INTO chude (TieuDe, MoTa)
			VALUES ('$TieuDe', '$MoTa')";
			mysql_query($sql) or die (mysql_error());
		}


		//



		public function ListPA(&$totalRows, $pageNum, $pageSize, $TieuDe)
		{
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				$sql="	SELECT * FROM  pages
				WHERE TieuDe like '%$TieuDe%' ORDER BY idPage DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  pages
				WHERE TieuDe like '%$TieuDe%' ";
			}else{
				$sql="	SELECT * FROM  pages
				ORDER BY idPage DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  pages";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		public function ThemPA()
		{
			$TieuDe= $_POST['TieuDe'];
            // $idGroup= $_POST['idGroup'];
			$NoiDung = $_POST['NoiDung'];
			$UrlHinh = $_POST['UrlHinh'];
			$TomTat = $_POST['TomTat'];
			$Title = $_POST['Title'];
			$Des = $_POST['Des'];
			$Keyword = $_POST['Keyword'];

			$TieuDe = parent::XoaDinhDang($TieuDe);
			$Title = parent::XoaDinhDang($Title);
			$Des = parent::XoaDinhDang($Des);
			$Keyword = parent::XoaDinhDang($Keyword);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			$H1 = parent::XoaDinhDang($_POST['H1']);
			$H2 = parent::XoaDinhDang($_POST['H2']);
			$H3 = parent::XoaDinhDang($_POST['H3']);
			$H4 = parent::XoaDinhDang($_POST['H4']);
			$H5 = parent::XoaDinhDang($_POST['H5']);
			$H6 = parent::XoaDinhDang($_POST['H6']);

			//$UrlHinh = parent::stripUnicode($UrlHinh);

			// $NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);

			//Chèn dữ liệu vào database
			$sql="INSERT INTO pages (TieuDe, TieuDeKD, NoiDung, Des, Title, Keyword, UrlHinh, TomTat, H1, H2, H3, H4, H5, H6)
			VALUES ('$TieuDe', '$TieuDeKD', '$NoiDung', '$Des', '$Title', '$Keyword', '$UrlHinh', '$TomTat', '$H1', '$H2', '$H3', '$H4', '$H5', '$H6')";
			mysql_query($sql) or die (mysql_error());
		}
		public function ChiTietPA($idSP){
			$sql = "SELECT * FROM pages WHERE idPage=$idSP";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}// xem chi tiết thể loại để chỉnh sữa
		public function SuaPA($idSP)
		{
			$TieuDe= $_POST['TieuDe'];
			// $idGroup= $_POST['idGroup'];
			$NoiDung = $_POST['NoiDung'];
			$Title = $_POST['Title'];
			$UrlHinh = $_POST['UrlHinh'];
			$TomTat = $_POST['TomTat'];
			$Des = $_POST['Des'];
			$Keyword = $_POST['Keyword'];

			$TieuDe = parent::XoaDinhDang($TieuDe);
			$Title = parent::XoaDinhDang($Title);
			$Des = parent::XoaDinhDang($Des);
			$Keyword = parent::XoaDinhDang($Keyword);
			$TieuDeKD = parent::stripUnicode($TieuDe);
			//$UrlHinh = parent::stripUnicode($UrlHinh);

			// $NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);

			$H1 = parent::XoaDinhDang($_POST['H1']);
			$H2 = parent::XoaDinhDang($_POST['H2']);
			$H3 = parent::XoaDinhDang($_POST['H3']);
			$H4 = parent::XoaDinhDang($_POST['H4']);
			$H5 = parent::XoaDinhDang($_POST['H5']);
			$H6 = parent::XoaDinhDang($_POST['H6']);



			//Cập nhật vào db
			$sql="UPDATE pages
			SET TieuDe = '$TieuDe',
			Title = '$Title',
			Des = '$Des',
			UrlHinh = '$UrlHinh',
			TomTat = '$TomTat',
			Keyword = '$Keyword',
			NoiDung = '$NoiDung',
			TieuDeKD = '$TieuDeKD',
			H1 = '$H1',
			H2 = '$H2',
			H3 = '$H3',
			H4 = '$H4',
			H5 = '$H5',
			H6 = '$H6'
			WHERE idPage = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function XoaPA($idDM)
		{
			settype($idDM,"int");
			$sql="DELETE FROM pages WHERE idPage='$idDM'";
			mysql_query($sql) or die(mysql_error());
		}

		//----------------- Thiết Bị -----------------------------//
		public function ListTB(&$totalRows, $pageNum, $pageSize, $TieuDe){
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				$sql="	SELECT idPa, TieuDe, TomTat, AnHien, UrlHinh
				FROM  pages
				WHERE TieuDe like '%$TieuDe%' AND idGroup=2
				ORDER BY idPa DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  pages
				WHERE TieuDe like '%$TieuDe%' AND idGroup=2
				";
			}else{
				$sql="	SELECT idPa, TieuDe, TomTat, AnHien, UrlHinh
				FROM  pages
				WHERE idGroup=2
				ORDER BY idPa DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  pages
				WHERE idGroup=2
				";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		public function ThemTB()
		{
			$TieuDe= $_POST['TieuDe'];
			$NoiDung = $_POST['NoiDung'];
			$UrlHinh = $_POST['UrlHinh'];
			$TomTat = $_POST['TomTat'];
			$Title = $_POST['Title'];
			$Des = $_POST['Des'];
			$Keyword = $_POST['Keyword'];

			$TieuDe = parent::XoaDinhDang($TieuDe);
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$Title = parent::XoaDinhDang($Title);
			$Des = parent::XoaDinhDang($Des);
			$Keyword = parent::XoaDinhDang($Keyword);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			$NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);

			//Chèn dữ liệu vào database
			$sql="INSERT INTO pages (TieuDe, TieuDeKD, NoiDung, Des, idGroup, NgayDang, Title, TomTat, UrlHinh, Keyword)
			VALUES ('$TieuDe', '$TieuDeKD', '$NoiDung', '$Des', '2', '$NgayDang', '$Title',  '$TomTat', '$UrlHinh', '$Keyword')";
			mysql_query($sql) or die (mysql_error());
		}
		public function SuaTB($idSP)
		{
			$TieuDe= $_POST['TieuDe'];
			$NoiDung = $_POST['NoiDung'];
			$UrlHinh = $_POST['UrlHinh'];
			$TomTat = $_POST['TomTat'];
			$Title = $_POST['Title'];
			$Des = $_POST['Des'];
			$Keyword = $_POST['Keyword'];

			$TieuDe = parent::XoaDinhDang($TieuDe);
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$Title = parent::XoaDinhDang($Title);
			$Des = parent::XoaDinhDang($Des);
			$Keyword = parent::XoaDinhDang($Keyword);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			$NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);

			//Cập nhật vào db
			$sql="UPDATE pages
			SET TieuDe = '$TieuDe',
			Title = '$Title',
			Des = '$Des',
			Keyword = '$Keyword',
			NoiDung = '$NoiDung',
			NgayDang = '$NgayDang',
			UrlHinh = '$UrlHinh',
			TomTat = '$TomTat',
			TieuDeKD = '$TieuDeKD'
			WHERE idPa = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}

		// cau hinh chung
		public function ListCauHinhChung(){
			$sql="	SELECT * FROM  cauhinhchung";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}
		public function CauHinhChungChiTiet($idSP){
			$sql = "SELECT * FROM cauhinhchung WHERE idCauHinhChung=$idSP";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}// xem chi tiết thể loại để chỉnh sữa

		public function SuaCauHinhChung($idSP)
		{
			$URL= parent::XoaDinhDang($_POST['URL']);
			$Facebook= parent::XoaDinhDang($_POST['Facebook']);
			$Twitter= parent::XoaDinhDang($_POST['Twitter']);
			$GooglePlus= parent::XoaDinhDang($_POST['GooglePlus']);
			$DiaChi= parent::XoaDinhDang($_POST['DiaChi']);
			$Map= parent::XoaDinhDang($_POST['Map']);
			$DienThoai= parent::XoaDinhDang($_POST['DienThoai']);
			$Hotline= parent::XoaDinhDang($_POST['Hotline']);

			$TitleTrangChu= parent::XoaDinhDang($_POST['TitleTrangChu']);
			$DesTrangChu= parent::XoaDinhDang($_POST['DesTrangChu']);
			$KeywordTrangChu= parent::XoaDinhDang($_POST['KeywordTrangChu']);

			$H1= parent::XoaDinhDang($_POST['H1']);
			$H2= parent::XoaDinhDang($_POST['H2']);
			$H3= parent::XoaDinhDang($_POST['H3']);
			$H4= parent::XoaDinhDang($_POST['H4']);
			$H5= parent::XoaDinhDang($_POST['H5']);
			$H6= parent::XoaDinhDang($_POST['H6']);

			//Cập nhật vào db
			$sql="UPDATE `cauhinhchung` 
			SET `URL`='$URL',
			`Facebook`='$Facebook',
			`Twitter`='$Twitter',
			`GooglePlus`='$GooglePlus',
			`DiaChi`= '$DiaChi',
			`Map`= '$Map',
			`DienThoai`='$DienThoai',
			`Hotline`= '$Hotline',
			`TitleTrangChu`='$TitleTrangChu',
			`DesTrangChu`='$DesTrangChu',
			`KeywordTrangChu`= '$KeywordTrangChu',
			`H1` = '$H1',
			`H2` = '$H2',
			`H3` = '$H3',
			`H4` = '$H4',
			`H5` = '$H5',
			`H6` = '$H6'
			WHERE `idCauHinhChung`='$idSP'
			";
			mysql_query($sql) or die(mysql_error());
		}

		// --------------------------------  menu ------------------------
		public function ListMenu(&$totalRows, $pageNum, $pageSize, $TieuDe,$idCha=-1){
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				$sql="	SELECT * FROM  menu
				WHERE ($idCha = -1 OR idCapCha = $idCha ) and TieuDe like '%$TieuDe%'
				ORDER BY idMenu DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  menu
				WHERE ($idCha = -1 OR idCapCha = $idCha ) and TieuDe like '%$TieuDe%'
				";
			}else{
				$sql="	SELECT * FROM  menu
				WHERE ($idCha = -1 OR idCapCha = $idCha ) 
				ORDER BY idMenu DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  menu
				WHERE ($idCha = -1 OR idCapCha = $idCha ) 
				";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}

		public function XoaMenu($idDM)
		{
			settype($idDM,"int");
			$sql="DELETE FROM menu WHERE idMenu=$idDM";
			mysql_query($sql) or die(mysql_error());
		}
		public function LayTenMenu($idLoai){
			$sql="SELECT TieuDe FROM menu WHERE idMenu = '$idLoai'";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['TieuDe'];
		}
		public function ThemMenu()
		{
			$TieuDe= $_POST['TieuDe'];
			$idCapCha= $_POST['idCapCha'];

			settype($idCapCha, "int");
			$TieuDe = parent::XoaDinhDang($TieuDe);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			//Chèn dữ liệu vào database
			$sql="INSERT INTO menu (TieuDe, TieuDeKD, idCapCha, LoaiMenu)
			VALUES ('$TieuDe', '$TieuDeKD', '$idCapCha','1')";
			mysql_query($sql) or die (mysql_error());
		}

		public function SuaMenu($idSP)
		{
			$TieuDe= $_POST['TieuDe'];
			$idCapCha = $_POST['idCapCha'];

			settype($idCapCha, "int");
			$TieuDe = parent::XoaDinhDang($TieuDe);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			//Cập nhật vào db
			$sql="UPDATE menu
			SET TieuDe = '$TieuDe',
			TieuDeKD = '$TieuDeKD',
			idCapCha = '$idCapCha'
			WHERE idMenu = $idSP";
			mysql_query($sql) or die(mysql_error());
		}

		public function ChiTietMenu($idSP){
			$sql = "SELECT * FROM menu WHERE idMenu=$idSP";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}// xem chi tiết thể loại để chỉnh sữa

		//----------------- Danh Mục -----------------------------//
		public function ListDM(&$totalRows, $pageNum, $pageSize, $TieuDe,$idCha=-1){
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				$sql="	SELECT * FROM  loaitin
				WHERE ($idCha = -1 OR idLoaiCha = $idCha ) and TieuDe like '%$TieuDe%'
				ORDER BY idLoaiTin DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  loaitin
				WHERE ($idCha = -1 OR idLoaiCha = $idCha ) and TieuDe like '%$TieuDe%'
				";
			}else{
				$sql="	SELECT * FROM  loaitin
				WHERE ($idCha = -1 OR idLoaiCha = $idCha ) 
				ORDER BY idLoaiTin DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  loaitin
				WHERE ($idCha = -1 OR idLoaiCha = $idCha ) 
				";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		public function ThemDM()
		{
			$TieuDe= $_POST['TieuDe'];
			$UrlHinh= $_POST['UrlHinh'];
			$Title= $_POST['Title'];
			$Des= $_POST['Des'];
			$Parent= $_POST['Parent'];
			$Keyword= $_POST['Keyword'];
			$TomTat= $_POST['TomTat'];

			settype($Parent, "int");
			$TieuDe = parent::XoaDinhDang($TieuDe);
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$Title = parent::XoaDinhDang($Title);
			$Keyword = parent::XoaDinhDang($Keyword);
			$Des = parent::XoaDinhDang($Des);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			$H1 = parent::XoaDinhDang($_POST['H1']);
			$H2 = parent::XoaDinhDang($_POST['H2']);
			$H3 = parent::XoaDinhDang($_POST['H3']);
			$H4 = parent::XoaDinhDang($_POST['H4']);
			$H5 = parent::XoaDinhDang($_POST['H5']);
			$H6 = parent::XoaDinhDang($_POST['H6']);


			//Chèn dữ liệu vào database
			$sql="INSERT INTO loaitin (TieuDe, TieuDeKD, UrlHinh, Title, Des, idLoaiCha, Keyword, TomTat, ThuTu, H1, H2, H3, H4, H5, H6)
			VALUES ('$TieuDe', '$TieuDeKD', '$UrlHinh', '$Title', '$Des', '$Parent', '$Keyword', '$TomTat', '99', '$H1', '$H2', '$H3', '$H4', '$H5', '$H6')";
			mysql_query($sql) or die (mysql_error());
		}
		public function ChiTietDM($idSP){
			$sql = "SELECT * FROM loaitin WHERE idLoaiTin=$idSP";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}// xem chi tiết thể loại để chỉnh sữa
		public function SuaDM($idSP)
		{
			$TieuDe= $_POST['TieuDe'];
			$UrlHinh= $_POST['UrlHinh'];
			$Title= $_POST['Title'];
			$Des= $_POST['Des'];
			$Parent= $_POST['Parent'];
			$Keyword= $_POST['Keyword'];
			$TomTat= $_POST['TomTat'];

			settype($Parent, "int");
			$TieuDe = parent::XoaDinhDang($TieuDe);
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$Title = parent::XoaDinhDang($Title);
			$Keyword = parent::XoaDinhDang($Keyword);
			$Des = parent::XoaDinhDang($Des);
			$TieuDeKD = parent::stripUnicode($TieuDe);


			$H1 = parent::XoaDinhDang($_POST['H1']);
			$H2 = parent::XoaDinhDang($_POST['H2']);
			$H3 = parent::XoaDinhDang($_POST['H3']);
			$H4 = parent::XoaDinhDang($_POST['H4']);
			$H5 = parent::XoaDinhDang($_POST['H5']);
			$H6 = parent::XoaDinhDang($_POST['H6']);

			//Cập nhật vào db
			$sql="UPDATE loaitin
			SET TieuDe = '$TieuDe',
			UrlHinh = '$UrlHinh',
			TomTat = '$TomTat',
			Title = '$Title',
			Des = '$Des',
			idLoaiCha = '$Parent',
			Keyword = '$Keyword',
			TieuDeKD = '$TieuDeKD',
			H1 = '$H1',
			H2 = '$H2',
			H3 = '$H3',
			H4 = '$H4',
			H5 = '$H5',
			H6 = '$H6'
			WHERE idLoaiTin = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function XoaDM($idDM)
		{
			settype($idDM,"int");
			$sql="DELETE FROM loaitin WHERE idLoaiTin=$idDM";
			mysql_query($sql) or die(mysql_error());
		}
		//---------------------------- Dang Ky Kham --------------------------------//

		public function ListDK(&$totalRows, $pageNum, $pageSize, $sdt, $IP){
			$startRow = ($pageNum-1)*$pageSize;
			$where="";//khanh sửa lại, code cũ ghê quá
			if ($sdt != ""){
				if($where==""){
					$where = "where sdt like '%$sdt%' ";
				}else
				{
					$where = $where." and sdt like '%$sdt%' ";
				}
			}
			if ($IP != ""){
				if($where==""){
					$where = "where IP like '%$IP%' ";
				}else
				{
					$where = $where." and IP like '%$IP%' ";
				}
				
			}
			$sql="	SELECT *
			FROM  sodienthoai
			{$where}
			ORDER BY id_sdt DESC
			LIMIT $startRow , $pageSize
			";
			$kq = mysql_query($sql) or die (mysql_error());
			$sql="SELECT count(*)
			FROM  sodienthoai
			{$where} 
			";
			
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		
		public function SuaDK($idSDT){
			
			$Ghichu = $_POST['Ghichu'];

			//chèn vào db
			$sql="UPDATE sodienthoai
			SET Ghichu = '$Ghichu' 
			WHERE id_sdt = $idSDT
			";
			mysql_query($sql) or die(mysql_error());
		}
		//---------------------------- Tin Tức --------------------------------//

		public function ListTT(&$totalRows, $pageNum, $pageSize, $TieuDe)
		{
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				$sql="	SELECT * FROM  tintuc
				WHERE TieuDe like '%$TieuDe%'
				ORDER BY idTinTuc DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  tintuc
				WHERE TieuDe like '%$TieuDe%'
				";
			}else{
				$sql="	SELECT * FROM  tintuc
				ORDER BY idTinTuc DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  tintuc
				";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;			
		}
		public function XoaTT($idSP){
			settype($idSP, "int");
			if ($idSP<=0) return;
			$sql="DELETE FROM tintuc WHERE idTinTuc=$idSP";
			mysql_query($sql) or die(mysql_error());
		}

		public function Preview($id){
			//Tiếp nhận dữ liệu từ form
			$UrlHinh = $_POST['UrlHinh'];
			$TieuDe = $_POST['TieuDe'];
			$Des = $_POST['Des'];
			$Keyword = $_POST['Keyword'];
			$Title = $_POST['Title'];
			$NoiDung = $_POST['NoiDung'];
			$TomTat = $_POST['TomTat'];
			$idLoaiTin = $_POST['idLoaiTin'];
			$idChude = $_POST['Chudetag'];


			//Kiểm tra dữ liệu đã nhận
			settype($idLoai,"int");
			settype($idCL,"int");
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$TieuDe = parent::XoaDinhDang($TieuDe);
			$Des = parent::XoaDinhDang($Des);
			$Keyword = parent::XoaDinhDang($Keyword);
			$Title = parent::XoaDinhDang($Title);
			$TieuDe1 = str_replace('-', '', $TieuDe);
			$TieuDe1 = str_replace(':', '', $TieuDe1);
			$TieuDe1 = str_replace('|', '', $TieuDe1);
			$TieuDeKD = parent::stripUnicode($TieuDe1);
			$TieuDeKD = $TieuDeKD."-1";
			$NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);

			//chèn vào db
			$sql="UPDATE tintuc
			SET TieuDe = '$TieuDe',
			UrlHinh = '$UrlHinh',
			Des = '$Des',
			Keyword = '$Keyword',
			Title = '$Title',
			TomTat = '$TomTat',
			NoiDung = '$NoiDung',
			idLoaiTin = '$idLoaiTin',
			idChude = '$idChude'
			WHERE idTinTuc = '$id'
			";
			mysql_query($sql) or die(mysql_error());
		}
		
		public function ThemTT(){
			//Tiếp nhận dữ liệu từ form
			$UrlHinh = $_POST['UrlHinh'];
			$TieuDe = $_POST['TieuDe'];
			$Des = $_POST['Des'];
			$Keyword = $_POST['Keyword'];
			$Title = $_POST['Title'];
			$NoiDung = $_POST['NoiDung'];
            // html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $_POST['NoiDung']), ENT_NOQUOTES, 'UTF-8');
			$TomTat = $_POST['TomTat'];
            // html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $_POST['TomTat']), ENT_NOQUOTES, 'UTF-8');
			$idLoaiTin = $_POST['idLoaiTin'];
			$idChuDe = $_POST['Chudetag'];
            // $idCL = $_POST['idCL'];
            // $idCon = $_POST['idCon'];


			//Kiểm tra dữ liệu đã nhận
			settype($idLoai,"int");
			settype($idCL,"int");
			settype($idCon,"int");
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$TieuDe = parent::XoaDinhDang($TieuDe);
			$Des = parent::XoaDinhDang($Des);
			$Keyword = parent::XoaDinhDang($Keyword);
			$Title = parent::XoaDinhDang($Title);
			$TieuDe1 = str_replace('-', '', $TieuDe);
			$TieuDe1 = str_replace(':', '', $TieuDe1);
			$TieuDe1 = str_replace('|', '', $TieuDe1);
			$TieuDeKD = parent::stripUnicode($TieuDe1);

			$H1 = parent::XoaDinhDang($_POST['H1']);
			$H2 = parent::XoaDinhDang($_POST['H2']);
			$H3 = parent::XoaDinhDang($_POST['H3']);
			$H4 = parent::XoaDinhDang($_POST['H4']);
			$H5 = parent::XoaDinhDang($_POST['H5']);
			$H6 = parent::XoaDinhDang($_POST['H6']);

			// $NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);


			//chèn vào db
			$sql="INSERT INTO   tintuc (idLoaiTin, idChuDe, TieuDe, TieuDeKD, TomTat, NoiDung, Title, Keyword, Des, UrlHinh, AnHien, H1, H2, H3, H4, H5, H6)
			VALUES ('$idLoaiTin', '$idChuDe', '$TieuDe', '$TieuDeKD', '$TomTat', '$NoiDung', '$Title', '$Keyword', '$Des', '$UrlHinh', '1', '$H1','$H2','$H3','$H4','$H5','$H6')";
			mysql_query($sql) or die(mysql_error());
			// $idTT = mysql_insert_id();
			// $TieuDeKD = $TieuDeKD."-".$idTT;
			// $sql="UPDATE tintuc
   //          SET TieuDeKD = '$TieuDeKD'
   //          WHERE idTinTuc = $idTT
   //          ";
   //          mysql_query($sql) or die(mysql_error());
		}
		public function ChiTietTT($idSP){
			$sql = "SELECT * FROM tintuc WHERE idTinTuc=$idSP";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}// xem chi tiết thể loại để chỉnh sữa
		public function SuaTT($idSP){
			//Tiếp nhận dữ liệu từ form
			$UrlHinh = $_POST['UrlHinh'];
			$TieuDe = $_POST['TieuDe'];
			$Des = $_POST['Des'];
			$Keyword = $_POST['Keyword'];
			$Title = $_POST['Title'];
			$NoiDung = $_POST['NoiDung'];
			$TomTat = $_POST['TomTat'];
			$idLoaiTin = $_POST['idLoaiTin'];
			$idChude = $_POST['Chudetag'];
   			//$idCL = $_POST['idCL'];
			// $idCon = $_POST['idCon'];


			//Kiểm tra dữ liệu đã nhận
			settype($idLoaiTin,"int");
            // settype($idCL,"int");
            // settype($idCon,"int");
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$TieuDe = parent::XoaDinhDang($TieuDe);
			$Des = parent::XoaDinhDang($Des);
			$Keyword = parent::XoaDinhDang($Keyword);
			$Title = parent::XoaDinhDang($Title);
			$TieuDe1 = str_replace('-', '', $TieuDe);
			$TieuDe1 = str_replace(':', '', $TieuDe1);
			$TieuDe1 = str_replace('|', '', $TieuDe1);
			$TieuDeKD = parent::stripUnicode($TieuDe1);
			$TieuDeKD = $TieuDeKD."-".$idSP;

			$H1 = parent::XoaDinhDang($_POST['H1']);
			$H2 = parent::XoaDinhDang($_POST['H2']);
			$H3 = parent::XoaDinhDang($_POST['H3']);
			$H4 = parent::XoaDinhDang($_POST['H4']);
			$H5 = parent::XoaDinhDang($_POST['H5']);
			$H6 = parent::XoaDinhDang($_POST['H6']);

			// $NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);

			//chèn vào db
			$sql="UPDATE tintuc
			SET TieuDe = '$TieuDe',
			UrlHinh = '$UrlHinh',
			Des = '$Des',
			Keyword = '$Keyword',
			Title = '$Title',
			TomTat = '$TomTat',
			NoiDung = '$NoiDung',
			idLoaiTin = '$idLoaiTin',
			idChude = '$idChude',
			H1 = '$H1',
			H2 = '$H2',
			H3 = '$H3',
			H4 = '$H4',
			H5 = '$H5',
			H6 = '$H6'
			WHERE idTinTuc = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}
		//----------------- Tài Khoản -----------------------------//
		public function ListTK(&$totalRows, $pageNum, $pageSize, $TieuDe){
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				$sql="	SELECT idUser, User, idGroup
				FROM  users
				WHERE User like '%$TieuDe%'
				ORDER BY idUser DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  users
				WHERE User like '%$TieuDe%'
				";
			}else{
				$sql="	SELECT idUser, User, idGroup
				FROM  users
				ORDER BY idUser DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  users
				";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		public function ThemTK()
		{
			$User= $_POST['User'];
			$Pass = $_POST['Pass'];
			$idGroup = $_POST['idGroup'];

			$User = parent::XoaDinhDang($User);
			$Pass = parent::XoaDinhDang($Pass);
			$Pass = md5($Pass);
			settype($idGroup,"int");

			//Chèn dữ liệu vào database
			$sql="INSERT INTO users (User, Pass, idGroup)
			VALUES ('$User', '$Pass', '$idGroup')";
			mysql_query($sql) or die (mysql_error());
		}
		public function ChiTietTK($idSP){
			$sql = "SELECT * FROM users WHERE idUser=$idSP";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}// xem chi tiết thể loại để chỉnh sữa
		public function SuaTKMK($idSP)
		{
			$Pass = $_POST['Pass'];
			$Pass = parent::XoaDinhDang($Pass);
			$Pass = md5($Pass);

			$sql="UPDATE users
			SET Pass = '$Pass'
			WHERE idUser = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function SuaTKCV($idSP)
		{
			$idGroup = $_POST['idGroup'];
			settype($idGroup,"int");

			//Cập nhật vào db
			$sql="UPDATE users
			SET idGroup = '$idGroup'
			WHERE idUser = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function XoaTK($idDM)
		{
			settype($idDM,"int");
			$sql="DELETE FROM users WHERE idUser=$idDM";
			mysql_query($sql) or die(mysql_error());
		}
		//----------------- Slider -----------------------------//
		public function ListSL(&$totalRows, $pageNum, $pageSize, $TieuDe){
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				$sql="	SELECT idSlider, TieuDe, UrlHinh, AnHien, ThuTu
				FROM  quangcao
				WHERE TieuDe like '%$TieuDe%'
				ORDER BY idSlider DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  quangcao
				WHERE TieuDe like '%$TieuDe%'
				";
			}else{
				$sql="	SELECT idSlider, TieuDe, UrlHinh, AnHien, ThuTu
				FROM  quangcao
				ORDER BY idSlider DESC
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  quangcao
				";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		public function ThemSL()
		{
			$TieuDe= $_POST['TieuDe'];
			$UrlHinh = $_POST['UrlHinh'];
			$Link = $_POST['Link'];
			$idLoai = $_POST['idLoai'];

			$TieuDe = parent::XoaDinhDang($TieuDe);
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$Link = parent::XoaDinhDang($Link);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			//Chèn dữ liệu vào database
			$sql="INSERT INTO quangcao (TieuDe, Link, UrlHinh, TieuDeKD,idLoai)
			VALUES ('$TieuDe', '$Link', '$UrlHinh', '$TieuDeKD','$idLoai')";
			mysql_query($sql) or die (mysql_error());
		}
		public function ChiTietSL($idSP){
			$sql = "SELECT * FROM quangcao WHERE idSlider=$idSP";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}// xem chi tiết thể loại để chỉnh sữa
		public function SuaSL($idSP)
		{
			$TieuDe= $_POST['TieuDe'];
			$UrlHinh = $_POST['UrlHinh'];
			$Link = $_POST['Link'];
			$idLoai = $_POST['idLoai'];

			$TieuDe = parent::XoaDinhDang($TieuDe);
			$UrlHinh = parent::XoaDinhDang($UrlHinh);
			$Link = parent::XoaDinhDang($Link);
			$TieuDeKD = parent::stripUnicode($TieuDe);

			//Cập nhật vào db
			$sql="UPDATE quangcao
			SET TieuDe = '$TieuDe',
			UrlHinh = '$UrlHinh',
			TieuDeKD = '$TieuDeKD',
			Link = '$Link',
			idLoai = '$idLoai'
			WHERE idSlider = $idSP
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function XoaSL($idDM)
		{
			settype($idDM,"int");
			$sql="DELETE FROM quangcao WHERE idSlider =$idDM";
			mysql_query($sql) or die(mysql_error());
		}
		//-----------------------------An Hien ---------------------//
		public function LayAnHien($bang, $ma, $id){
			$sql="SELECT AnHien FROM $bang WHERE $ma = '$id'";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['AnHien'];
		}
		public function DoiAnHien($bang, $ma, $id, $AnHien){
			$sql="UPDATE $bang
			SET AnHien = '$AnHien'
			WHERE $ma = $id
			";
			mysql_query($sql) or die(mysql_error());
		}
		//----------------------------- Menu ---------------------//
		public function LayMenu($bang, $ma, $id){
			$sql="SELECT Menu FROM $bang WHERE $ma = '$id'";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Menu'];
		}
		public function DoiMenu($bang, $ma, $id, $doi){
			$sql="UPDATE $bang
			SET Menu = '$doi'
			WHERE $ma = $id
			";
			mysql_query($sql) or die(mysql_error());
		}
		// --------------------------- câu hỏi ---------------------------//
        //Quản Lý câu hỏi
		public function ListCauHoi(&$totalRows, $pageNum, $pageSize)
		{				
			$startRow = ($pageNum-1)*$pageSize;
			$sql="	SELECT *
			FROM  cauhoi
			ORDER BY idCH DESC 
			LIMIT $startRow , $pageSize
			";
			$kq = mysql_query($sql) or die (mysql_error());	
			$sql="SELECT count(*)
			FROM  cauhoi
			";
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		public function XoaCauHoi($idSP){
			settype($idSP, "int");
			if ($idSP<=0) return; 
			$sql="DELETE FROM cauhoi WHERE idCH=$idSP";
			mysql_query($sql) or die(mysql_error());		
		}
		public function ThemCauHoi(){
			$idLoai = $_POST["idLoai"];
			$Noidungcauhoi = $_POST["Noidungcauhoi"]; 
			$Noidungtraloi = $_POST["Noidungtraloi"]; 
			$sql="INSERT INTO `cauhoi` (`idCL`, `TieuDeCH`, `TieuDeCHKD`, `KeywordCH`, `DescriptionCH`, `HoTen`, `Email`, `DienThoai`, `NoiDungCH`, `AnHien`, `NgayTao`, `TongTL`) VALUES ('$idLoai', '', '', '', '', '', '', '', '$Noidungcauhoi', '0', '', '0');";
			mysql_query($sql) or die(mysql_error());
			
			$idCH = mysql_insert_id();		
			$sql="INSERT INTO  `traloi` (`idCH` ,`NoiDungTL` ,`AnHien`)VALUES ('$idCH',  '$Noidungtraloi',  '0');";
			mysql_query($sql) or die(mysql_error());
		}
		public function ChiTietCauHoi($idDH)
		{	
			$sql="SELECT *
			FROM cauhoi
			WHERE idCH = $idDH
			";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}
		public function CapNhatCauHoi($idSP){
			//Tiếp nhận dữ liệu từ form	
			
			$TieuDeCH = $_POST['TieuDeCH'];         
			$NoiDungCH = $_POST['NoiDungCH'];
			$KeywordCH = $_POST['KeywordCH'];
			$AnHien = $_POST['AnHien'];
			$idCL = $_POST['idCL'];			
			
			//Kiểm tra dữ liệu đã nhận
			settype($AnHien,"int");
			settype($idCL,"int");
			
			$TieuDeCH = trim(strip_tags($TieuDeCH));
			$KeywordCH = trim(strip_tags($KeywordCH));
			$DescriptionCH = trim(strip_tags($NoiDungCH));
			
			if (get_magic_quotes_gpc()== false) {				
				$TieuDeCH = mysql_real_escape_string($TieuDeCH);
				$KeywordCH = mysql_real_escape_string($KeywordCH);
				$DescriptionCH = mysql_real_escape_string($DescriptionCH);
			}
			
			$TieuDeCHKD = parent::stripUnicode($TieuDeCH);
			$DescriptionCH = parent::RutGon($DescriptionCH,100,150);

			//chèn vào db
			$sql="UPDATE cauhoi
			SET TieuDeCH = '$TieuDeCH', 
			NoiDungCH = '$NoiDungCH',                
			DescriptionCH = '$DescriptionCH', 
			TieuDeCHKD = '$TieuDeCHKD', 
			KeywordCH = '$KeywordCH',
			AnHien = $AnHien,
			idCL = $idCL
			WHERE idCH = $idSP
			";		
			mysql_query($sql) or die(mysql_error());	
		}

        // --------------------------- trả lời câu hỏi ---------------------------//
        //Quản Lý Khám  Bệnh
		public function ListTraLoi($idCH)
		{	
			$sql="SELECT *
			FROM traloi WHERE idCH = $idCH
			ORDER BY idTL desc
			";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}

		public function XoaTraLoi($idSP){
			settype($idSP, "int");
			if ($idSP<=0) return; 
			$sql="DELETE FROM traloi WHERE idTL=$idSP";
			mysql_query($sql) or die(mysql_error());		
		}
		public function ChiTietTraLoi($idDH)
		{	
			$sql="SELECT *
			FROM traloi
			WHERE idTL = $idDH
			";
			$kq = mysql_query($sql) or die (mysql_error());
			return $kq;
		}

		public function CapNhatTraLoi($idSP){
			//Tiếp nhận dữ liệu từ form	
			
			$NoiDungTL = $_POST['NoiDungTL'];  
			$AnHien = $_POST['AnHien'];
			
			//Kiểm tra dữ liệu đã nhận
			settype($AnHien,"int");
			
			
			

			//chèn vào db
			$sql="UPDATE traloi
			SET NoiDungTL = '$NoiDungTL',  
			AnHien = $AnHien
			WHERE idTL = $idSP
			";		
			mysql_query($sql) or die(mysql_error());	
		}
		//----------------- Option -----------------------------//
		public function ListOP(&$totalRows, $pageNum, $pageSize, $TieuDe){
			$startRow = ($pageNum-1)*$pageSize;
			if ($TieuDe != ""){
				echo $sql="	SELECT idOp, NameOp, ValueOp
				FROM  option
				WHERE NameOp like '%$TieuDe%'
				ORDER BY idOp
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  option
				WHERE NameOp like '%$TieuDe%'
				";
			}else{
				echo $sql="	SELECT idOp, NameOp, ValueOp
				FROM  option
				ORDER BY idOp
				LIMIT $startRow , $pageSize
				";
				$kq = mysql_query($sql) or die (mysql_error());
				$sql="SELECT count(*)
				FROM  option
				";
			}
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}
		public function SuaOP($id, $doi){
			$sql="UPDATE option
			SET ValueOp = '$doi'
			WHERE idOp = $id
			";
			mysql_query($sql) or die(mysql_error());
		}
		//----------------------------- Home ---------------------//
		public function LayHome($bang, $ma, $id){
			$sql="SELECT Home FROM $bang WHERE $ma = '$id'";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Home'];
		}
		public function DoiHome($bang, $ma, $id, $doi){
			$sql="UPDATE $bang
			SET Home = '$doi'
			WHERE $ma = $id
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function SuaThuTu($bang, $ma, $id, $doi){
			$sql="UPDATE $bang
			SET ThuTu = '$doi'
			WHERE $ma = $id
			";
			mysql_query($sql) or die(mysql_error());
		}
		public function LayTenDM($idLoai){
			$sql="SELECT TieuDe FROM loaitin WHERE idLoaitin = '$idLoai'";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['TieuDe'];
		}

		//----------------------------- Thống Kê ---------------------//
		public function TongPages(){
			$sql="SELECT count(*) as Tong FROM pages WHERE idGroup = '1'";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Tong'];
		}
		public function TongTB(){
			$sql="SELECT count(*) as Tong FROM pages WHERE idGroup = '2'";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Tong'];
		}
		public function TongTT(){
			$sql="SELECT count(*) as Tong FROM tintuc";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Tong'];
		}
		public function TongDM(){
			$sql="SELECT count(*) as Tong FROM loai";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Tong'];
		}
		public function TongCH(){
			$sql="SELECT count(*) as Tong FROM cauhoi";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Tong'];
		}
		public function TongSL(){
			$sql="SELECT count(*) as Tong FROM quangcao";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Tong'];
		}
		public function TongTK(){
			$sql="SELECT count(*) as Tong FROM users";
			$kq = mysql_query($sql,$this->conn);
			$row_trang = mysql_fetch_assoc($kq);
			return $row_trang['Tong'];
		}
		public function ListGY(&$totalRows, $pageNum, $pageSize, $sdt, $IP){
			$startRow = ($pageNum-1)*$pageSize;
			$where =""; // khanh sua lai
			if ($sdt != ""){
				if($where==""){
					$where = "where sdt like '%$sdt%' ";
				}else
				{
					$where = $where." and sdt like '%$sdt%' ";
				}
			}
			if ($IP != ""){
				if($where==""){
					$where = "where IP like '%$IP%' ";
				}else
				{
					$where = $where." and IP like '%$IP%' ";
				}
				
			}

			$sql="	SELECT *
			FROM  gopy
			{$where} 
			ORDER BY idGY DESC
			LIMIT $startRow , $pageSize
			";
			$kq = mysql_query($sql) or die (mysql_error());
			$sql="SELECT count(*)
			FROM  gopy
			{$where} 
			";
			
			$rs= mysql_query($sql) or die(mysql_error());;
			$row_rs = mysql_fetch_row($rs);
			$totalRows = $row_rs[0];
			return $kq;
		}

		public function getComment(){
			$sql = "SELECT bl.*, tt.TieuDe, tt.idTT FROM binhluan AS bl
			INNER JOIN tintuc AS tt ON tt.idTT = bl.idBaiViet
			";

			$kq = mysql_query($sql, $this->conn);
			if(is_resource($kq) && mysql_num_rows($kq) > 0){
				return $kq;
			}
			return false;
		}

		public function checkComment(){
			$AnHien = $_POST['AnHien'];
			$idBL = $_POST['idBL'];
			if($AnHien == 0){
				$AnHien = 1;
			}
			else{
				$AnHien = 0;
			}
			$sql = "UPDATE `binhluan` SET AnHien = $AnHien WHERE idBL = $idBL";

			if(mysql_query($sql, $this->conn)){
				echo 'true';
			}
			else
				echo 'false';
		}

	}
	?>