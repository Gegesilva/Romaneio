<!DOCTYPE html>

    <?php
        require('fpdf/fpdf.php');
        class testePDF extends FPDF
            {
        function header()
        {
            $this->image('media/logoAPNET.png');
            $this->Ln(70);
            $this->SetFont('Arial', '8','16');
            $this->Cell(520, 20, 'Teste PDF', 1, 0,'C');
            $this->Ln(40);
        }
    
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', '8', 8);
            $this->Cell(0, 10, 'Teste relatorio'.$this->PageNo().'/{nb}', 0, 0, '0');
        }
    
}
        $pdf = new testePDF('p', 'pt', 'A4');  
        
    ?>
