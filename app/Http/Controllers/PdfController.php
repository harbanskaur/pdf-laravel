<?php

namespace App\Http\Controllers;
use TCPDF;//inbuild class 
use Illuminate\Http\Request;
use App\Models\Student;
class PdfController extends Controller
{   //view function
    public function index(){
        $student=Student::all();
        return view('pdf',compact('student'));
    }

    public function generatePDF(Request $request){
        $data=Student::all();
        $pdf=new TCPDF();//object
        $pdf->AddPage();//inbuild method
        $pdf->SetFont('dejavusans', '', 10);//optional
        // Add column headings
        $pdf->Cell(30, 10, 'Id', 1);        
        $pdf->Cell(30, 10, 'Name', 1);
        $pdf->Cell(30, 10, 'Gender', 1);
        $pdf->Cell(50, 10, 'Department', 1);
        $pdf->Ln(); // next line inbuild function

        foreach ($data as $row) {
            $pdf->Cell(30, 10, $row->id, 1);
            $pdf->Cell(30, 10, $row->name, 1);
            $pdf->Cell(30, 10, $row->gender, 1);
            $pdf->Cell(50, 10, $row->department, 1);
            $pdf->Ln(); 
        }
         return $pdf->Output('employee.pdf','I');
        // return $pdf->Output('employee.pdf','D');//inbuild function
    }
}
