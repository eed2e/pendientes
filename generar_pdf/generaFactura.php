<?php
	include "../conexion.php";
	require_once 'fpdf/fpdf.php';
	date_default_timezone_set('America/Mexico_City');
		//$area = $_POST['area'];
		$area = "Sistemas";
		$hoy = date("Y-m-d H:i:s");
		
		$consulta = mysqli_query($con, "SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` WHERE `area` = '$area'");
		$consulta1 = mysqli_query($con, "SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` WHERE `area` = '$area'");
		$resultado = mysqli_fetch_assoc($consulta);

		//***********************  INICIO DE CONSTRUCCION PDF  **********///////////
		
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetMargins(8, 0, 0);
		$pdf->SetTitle("Pedido");
        $pdf->SetFont('Arial', 'B', 13);
		$pdf->Cell(35, 8, " ", 0, 0, '');
		$pdf->Ln();
		$pdf->image("img/logo_ok.jpg", 70, 1, 65, 28, 'JPG');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 13);
		$pdf->Cell(65, 8, "Fecha: ", 0, 0, '');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(85, 8, "Nombre:", 0, 1, '');
		$pdf->SetFont('Arial', '', '');
		$pdf->Cell(1, 8, $hoy, 0, 0, 'L');
		$pdf->SetFont('Arial', '', '');
		$pdf->Cell(85, 8, $area, 0, 80, 'R');


        $pdf->SetFont('Arial', 'B', 17);
		$pdf->Cell(105, 20, "Pendientes", 0, 1, 'R');

        $pdf->SetTextColor(0, 0, 0);

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(5, 5, 'TITULO', 0, 0, 'L');
		$pdf->Cell(160, 5, 'DESCRIPCION', 0, 0, 'C');
		$pdf->Cell(26, 5, 'FECHA', 0, 1, 'R');
        $pdf->SetFont('Arial', '', 10);
        
		while ($row = mysqli_fetch_assoc($consulta1)) {
			$ff = date("d-m-Y", strtotime($row['fecha']));
		    $pdf->Cell(25, 5,$row['titulo'], 1, 0, 'L');
            $pdf->Cell(150, 5,utf8_decode($row['descripcion']), 1, 0, 'L');
            $pdf->Cell(25, 5,$ff, 1, 1, 'L');
            
		}

		
	    	$pdf->Output("compra.pdf", "I");
		

?>

