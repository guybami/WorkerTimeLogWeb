<?php

/**
 * Class PdfCustomGenerator
 * is used to generate customer invoice files
 * @author Guy Bami
 */
include_once  "../Lib/fpdf17/fpdf.php";

class PdfCustomGenerator {

    private $imgFileName = "../Resources/Images/ImagesTemplate.jpg";
    
    public function PdfCustomGenerator($imgFileName = "../Resources/Images/ImagesTemplate.jpg"){
        $this->imgFileName = $imgFileName;
    }
    /**
     * 
     * @param type $outputFileName
     * @param type $registrationDate
     * @param type $reference
     * @param type $label
     * @param type $customerName
     * @param type $packageTypeLabel
     * @param type $packageStateLabel
     * @param type $containerReference
     * @param type $advance
     * @param type $totalPrice
     * @param type $currency
     */
    public function generateInvoicePdfFile(
            $outputFileName
            , $registrationDate = null
            , $reference = null
            , $label = null
            , $customerName = null
            , $packageTypeLabel = null
            , $packageStateLabel = null
            , $containerReference = null
            , $advance = null
            , $totalPrice = null
            , $currency = null) {

        $lineSpace = 15;
        $widthInit = 40;
        $heightInit = 10;
        $lineGap = 5;
        $imgX = 150;
        $imgY = 25;
        $imgRatio = 50;

        $pdf = new FPDF();
        $pdf->AddPage();
        // Line break
        $pdf->Ln($lineGap);

        // Carug official address
        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell($widthInit, $heightInit, "CARUG SOLUTIONS");
        $pdf->Ln($lineGap);
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(40, 15, "Rue louis pasteur");
        $pdf->Ln($lineGap);
        $pdf->Cell(40, 15, "Courbevoie / Paris");
        $pdf->Ln($lineGap);
        $pdf->Cell(40, 15, "Telefon : +33123456789");
        $pdf->Ln($lineGap);

        $pdf->Ln($lineSpace * 2 - 10);
        $pdf->Cell(10);

        // logo and title
        
        if(isset($this->imgFileName) && file_exists($this->imgFileName)){
            $pdf->Image($this->imgFileName, $imgX, $imgY, $imgRatio);
        }
        
        // registration date row
        //date_default_timezone_set('UTC');
        
        // add date time
        $currentDate = date('d/m/Y H:i:s');
        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(40);
        $pdf->Ln($lineSpace - 10);
        $pdf->Cell(10, 10, "Date: $currentDate");
        // Line break
        $pdf->Ln($lineSpace);

        // registration title header
        $pdf->SetFont('Times', 'B', 20); // set font for header
        $pdf->Cell(50); // Move to the right
        $pdf->Cell(10, 10, "Facture du Colis");

        // reset font for content
        $pdf->SetFont('Times');
        // Line break
        $pdf->Ln($lineSpace + 5);

        
        $pdf->SetFont('Times', '', 17); // set font for text content
        $pdf->Cell(10); // Move to the right
        $pdf->Cell(10, 10, "Date Enregistrement:");
        $pdf->Cell(80);
        $pdf->Cell(40, 10, $registrationDate);
        $pdf->Ln($lineSpace);

        // ref. package row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Numero Reference du Colis:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $reference);
        $pdf->Ln($lineSpace);

        // package name row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Nom du Colis:");  
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $label);
        $pdf->Ln($lineSpace);

        // customer name row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Nom du Client:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $customerName);
        $pdf->Ln($lineSpace);

        // package type row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Type de Colis:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $packageTypeLabel);
        $pdf->Ln($lineSpace);

        // pakage state row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Etat du Colis:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $packageStateLabel);
        $pdf->Ln($lineSpace);


        // ref. container row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Reference du Contenaire:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $containerReference);
        $pdf->Ln($lineSpace);

        // Money alredy paid row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Montant avance:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $advance);
        $pdf->Ln($lineSpace);

        // Total Money to paid row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Montant Total a payer:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $totalPrice);
        $pdf->Ln($lineSpace);
        
        // currency row
        $pdf->Cell(10);  // move right
        $pdf->Cell(10, 5, "Devise:");
        $pdf->Cell(80);
        $pdf->Cell(40, 5, $currency);
        $pdf->Ln($lineSpace * 2 - 10);

        // regirst. office   row
        $pdf->Cell(120);  // move right
        $pdf->Cell(10, 5, "CARUG SOLUTIONS");

        // display website link
        $pdf->SetFont('Times', '', 12);
        $pdf->Ln($lineSpace);

        $pdf->Cell(40);
        $pdf->Cell(10, 5, "Email: contact@carug.fr");

        $pdf->Cell(50);
        $pdf->SetTextColor(32, 72, 167);
        $pdf->Cell(40, 5, "Internet: www.carug.fr");
        $pdf->Ln($lineSpace);

        // create pdf file andd save into disk
        $pdf->Output($outputFileName, "F");
        return true;
    }

    

}
