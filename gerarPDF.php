<?php
    include ('fpdf/fpdf.php');
    include('conexaoSQL.php');

    $sql = "
              SELECT TOP 1
              NomeCli,
              Endereco,
              Complemento,
              Bairro,
              Telefone,
              Cidade,
              Estado,
              Nota,
              Pedido
          FROM 
            GS_ROMANEIO
          WHERE 
              --Pedido = ''
          
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
        /* inicio da pagina */
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'Relatório', 0, 0, 'C');
        $pdf->Ln(15);

        /* Cabeçalho da pagina */
        $pdf->SetFont('Arial', 'I', 10);
        $ddf->Cell(50, 7, "NomeCli", 0, 0, 'C');
        $ddf->Cell(50, 7, "Endereco", 0, 0, 'C');
        $ddf->Cell(50, 7, "Complemento", 0, 0, 'C');
        $ddf->Cell(50, 7, "Bairro", 0, 0, 'C');
        $ddf->Cell(50, 7, "Telefone", 0, 0, 'C');

        //link da video aula para continuar: https://youtu.be/aLIz_qgk5z4



