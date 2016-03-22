<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class Imagenes {


	public  function almacena()
	{

		if(isset($_FILES['imagen']))
		{

			//Valida el formato de archivo enviadp
			$type = Imagenes::valida_type($_FILES['imagen']['type']);

			if($type)
			{
				
				//Procesa la imagen enviada

				$imagen = Imagenes::imagen($_FILES['imagen'],$_POST['tipo']);

				//Genera el arreglo para insertar en la base de datos
				$dato = array(
						'id_usuario'=>$_POST['id_usuario'],
						'id_tipo'=>$_POST['tipo'],
						'id_nota'=>$_POST['id_nota'],
						'ruta'=>$imagen[0],
						'imagen'=>$imagen[1],
						'creacion'=>date('Ymd'),
						'status'=>1,

					);

				$id=$this->imagenes_model->inserta($dato);	

				$result = array(
					'result'=>200,
					'msg'=>'Imagen guardad satisfactoriamente',
					'id_img'=>$id
				);				
			}
			else
			{
				$result = array(
					'result'=>300,
					'msg'=>'Solo se permiten archivos con extension JPG, PNG, GIF',
					'id_img'=>''
				);
			}

		}
		else
		{
			$result = array(
				'result'=>300,
				'msg'=>'No se cuenta con la imagen',
				'id_img'=>''
			);	
		}

		return json_encode($result);
	}

	public static  function valida_type($type)
	{

		if($type == "image/jpeg")
		{
			$result = true;
		}
		elseif($type == "image/png")
		{
			$result = true;
		}
		elseif($type == "image/gif")
		{
			$result = true;
		}
		else
		{
			$result = false;
		}

		return $result;
		
	}



	public static  function imagen($imagen,$tipo)
	{

		$imageFileType = pathinfo($imagen['name'],PATHINFO_EXTENSION);

		//Genera un nombre unico
		$nombre =  md5(date('Ymd-H:s'));

		//Genera nombre completo
		$full = $nombre.".".$imageFileType;

		//Se indica el directorio destino
		$target_dir = "uploads/";

		//Se da el nombre y la ruta final
		$file = $target_dir.$full;

		//Se general la imagen
		if(move_uploaded_file($imagen['tmp_name'], $file))
		{
			$check = getimagesize($file);
			$medidas['imagen']=$nombre;
			$medidas['w'] = $check[0];
			$medidas['h'] = $check[1];
			$medidas['mime'] = $imageFileType;

			switch ($tipo) {
				case '1':
					$final = imagenes::recortar($medidas,200,200,'perfil');
					break;
				case '2':
					$final = imagenes::recortar($medidas,300,300,'mediano');
					break;
				case '3':
					$final = imagenes::recortar($medidas,600,600,'nota');
					break;							
			}
			$dato = explode("/", $final);

			return $dato;			
		}

	}

	static function recortar($medidas,$nw_ancho,$nw_alto,$destino)
	{


		$img = "uploads/".$medidas['imagen'].".".$medidas['mime'];
		$nwImg = "uploads/".$medidas['imagen']."_".$destino.".".$medidas['mime'];

		$proporcion_imagen = $medidas['w'] / $medidas['h'];
		$proporcion_miniatura = $nw_ancho / $nw_alto;

		if ( $proporcion_imagen > $proporcion_miniatura ){

			$miniatura_ancho = $nw_ancho;
			$miniatura_alto = $nw_alto / $proporcion_imagen;

		} else if ( $proporcion_imagen < $proporcion_miniatura ){

			$miniatura_ancho = $nw_ancho * $proporcion_imagen;
			$miniatura_alto = $nw_alto;

		} else {

			$miniatura_ancho = $nw_ancho;
			$miniatura_alto = $nw_alto;
		}

		$x = ( $miniatura_ancho - $nw_ancho ) / 2;
		$y = ( $miniatura_alto - $nw_alto ) / 2;


		switch ( $medidas['mime'] ){
			case "jpg":
			case "jpeg":
				$imagen = imagecreatefromjpeg( $img );
				break;
			case "png":
				$imagen = imagecreatefrompng( $img );
				break;
			case "gif":
				$imagen = imagecreatefromgif( $img );
				break;
		}


		$lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto);

		imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $medidas['w'], $medidas['h']);

		imagejpeg($lienzo, $nwImg, 65);

		imagedestroy($imagen);

		return $nwImg;
	}

	static function ruta($base)
	{

		$ruta = explode('/',$base);

		for($i = 0; $i < count($ruta); $i++)
		{
			if(is_dir($ruta[$i]))
			{
				chdir($ruta[$i]);
			}
			else
			{
				mkdir($ruta[$i]);				
				chdir($ruta[$i]);
			}

		}
		chdir('./uploads');
		return getcwd();
	}

	public function inserta($dato)
	{
		$this->db->insert('registros',$dato);
		return $this->db->insert_id();
	}

	function recupera()
	{

		$sql = "SELECT ruta,imagen FROM registros where id_registro ='".$_POST['id_registro']."' and id_usuario = '".$_POST['id_usuario']."' and id_tipo='".$_POST['tipo']."'";
		
		$resultado = $this->db->query($sql);

		if($resultado->num_rows()>0)
		{
			foreach ($resultado->result() as $row) {
				$dato = array(
						'result'=>200,
						'msg'=>'Consulta exitosa',
						'ruta'=>$row->ruta,
						'imagen'=>$row->ruta."/".$row->imagen
					);
			}
			Imagenes_model::cache($_POST['id_registro'],$dato['imagen']);
		}
		else
		{
				$dato = array(
						'result'=>300,
						'msg'=>'No existe la imagen',
						'ruta'=>'',
						'imagen'=>''
					);		
		}
	
	  return $dato;
	}

	static function cache($id,$imagen)
	{
		$dir = base_url().$imagen;
		$this->load->driver('cache');
		$this->cache->memcache->save($id,$dir,300);

		echo $dir;
	}
}