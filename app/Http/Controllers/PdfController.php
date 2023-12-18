<?php

namespace App\Http\Controllers;
use TCPDF;
use Illuminate\Http\Request;
use App\Models\Student;
class PdfController extends Controller
{
    public function index(){
        $student=Student::all();
        return view('pdf',compact('student'));
    }

    public function generatePDF(Request $request){
        $data=Student::all();
        $pdf=new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', '', 12);//optional
        // Add column headings
        $pdf->Cell(30, 10, 'Id', 1);
        $pdf->Cell(30, 10, 'First Name', 1);
        $pdf->Cell(30, 10, 'Last Name', 1);
        $pdf->Cell(30, 10, 'Marks1', 1);
        $pdf->Cell(30, 10, 'Marks2', 1);
        $pdf->Ln(); 

        foreach ($data as $row) {
            $pdf->Cell(30, 10, $row->id, 1);
            $pdf->Cell(30, 10, $row->first_name, 1);
            $pdf->Cell(30, 10, $row->last_name, 1);
            $pdf->Cell(30, 10, $row->marks1, 1);
            $pdf->Cell(30, 10, $row->marks2, 1);
            $pdf->Ln(); 
        }
        return $pdf->Output('student.pdf','I');
    }

    public function Pdf()
    {
        $pdf = new TCPDF();
        $pdf->SetTitle('Sample PDF Document');
        
        // Add a page
        $pdf->AddPage();

        // Set some content
        $content = 'This is the content of the PDF document.';
        $pdf->writeHTML($content, true, false, true, false, '');

        // Output the PDF to the browser
        $pdf->Output('sample.pdf', 'I');
    }
}
