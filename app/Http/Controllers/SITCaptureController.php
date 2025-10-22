<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class SITCaptureController extends Controller
{

    public function generate(Request $request)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

         // 🔎 Debug text at top
        
        // CUSTOMIZE scenarios
        $scenarios = [
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains <= 140 char reject by signer",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains empty value or null",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains semicolon (;)",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains comma and period (, & .)",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains emoji (🏠)",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains non-Latin characters (Jakarta 東京)",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains quotes (' & \")",
        "CU upload file mass transfer kliring format .xlsx beneficiary address with line breaks",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains non-printable characters",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains HTML tags",
        "CU upload file mass transfer kliring format .xlsx beneficiary address contains SQL injection attempt",
        "CU upload file mass transfer kliring format .csv beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file mass transfer kliring format .csv beneficiary address contains <= 140 char reject by signer",
        "CU upload file mass transfer kliring format .csv beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file mass transfer kliring format .csv beneficiary address contains empty value or null",
        "CU upload file mass transfer kliring format .csv beneficiary address contains semicolon (;)",
        "CU upload file mass transfer kliring format .csv beneficiary address contains comma and period (, & .)",
        "CU upload file mass transfer kliring format .csv beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file mass transfer kliring format .csv beneficiary address contains HTML tags",
        "CU upload file mass transfer kliring format .csv beneficiary address contains SQL injection attempt",
        "CU upload file mass transfer kliring format .txt beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file mass transfer kliring format .txt beneficiary address contains <= 140 char reject by signer",
        "CU upload file mass transfer kliring format .txt beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file mass transfer kliring format .txt beneficiary address contains empty value or null",
        "CU upload file mass transfer kliring format .txt beneficiary address contains semicolon (;)",
        "CU upload file mass transfer kliring format .txt beneficiary address contains comma and period (, & .)",
        "CU upload file mass transfer kliring format .txt beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file mass transfer kliring format .txt beneficiary address contains HTML tags",
        "CU upload file mass transfer kliring format .txt beneficiary address contains SQL injection attempt",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains <= 140 char reject by signer",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains empty value or null",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains semicolon (;)",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains comma and period (, & .)",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains emoji (🏠)",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains non-Latin characters (Jakarta 東京)",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains quotes (' & \")",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address with line breaks",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains non-printable characters",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains HTML tags",
        "CU upload file BRICAMS kliring format .xlsx beneficiary address contains SQL injection attempt",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains <= 140 char reject by signer",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains empty value or null",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains semicolon (;)",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains comma and period (, & .)",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains HTML tags",
        "CU upload file BRICAMS kliring format .txt beneficiary address contains SQL injection attempt",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains <= 140 char reject by signer",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains empty value or null",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains semicolon (;)",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains comma and period (, & .)",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains HTML tags",
        "CU upload file BRICAMS kliring format .csv beneficiary address contains SQL injection attempt",
        "CU upload file PP kliring format .xlsx beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file PP kliring format .xlsx beneficiary address contains <= 140 char reject by signer",
        "CU upload file PP kliring format .xlsx beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file PP kliring format .xlsx beneficiary address contains empty value or null",
        "CU upload file PP kliring format .xlsx beneficiary address contains semicolon (;)",
        "CU upload file PP kliring format .xlsx beneficiary address contains comma and period (, & .)",
        "CU upload file PP kliring format .xlsx beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file PP kliring format .xlsx beneficiary address contains emoji (🏠)",
        "CU upload file PP kliring format .xlsx beneficiary address contains non-Latin characters (Jakarta 東京)",
        "CU upload file PP kliring format .xlsx beneficiary address contains quotes (' & \")",
        "CU upload file PP kliring format .xlsx beneficiary address with line breaks",
        "CU upload file PP kliring format .xlsx beneficiary address contains non-printable characters",
        "CU upload file PP kliring format .xlsx beneficiary address contains HTML tags",
        "CU upload file PP kliring format .xlsx beneficiary address contains SQL injection attempt",
        "CU upload file PP kliring format .txt beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file PP kliring format .txt beneficiary address contains <= 140 char reject by signer",
        "CU upload file PP kliring format .txt beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file PP kliring format .txt beneficiary address contains empty value or null",
        "CU upload file PP kliring format .txt beneficiary address contains semicolon (;)",
        "CU upload file PP kliring format .txt beneficiary address contains comma and period (, & .)",
        "CU upload file PP kliring format .txt beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file PP kliring format .txt beneficiary address contains HTML tags",
        "CU upload file PP kliring format .txt beneficiary address contains SQL injection attempt",
        "CU upload file PP kliring format .csv beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file PP kliring format .csv beneficiary address contains <= 140 char reject by signer",
        "CU upload file PP kliring format .csv beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file PP kliring format .csv beneficiary address contains empty value or null",
        "CU upload file PP kliring format .csv beneficiary address contains semicolon (;)",
        "CU upload file PP kliring format .csv beneficiary address contains comma and period (, & .)",
        "CU upload file PP kliring format .csv beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file PP kliring format .csv beneficiary address contains HTML tags",
        "CU upload file PP kliring format .csv beneficiary address contains SQL injection attempt",
        "CU upload file MT100 kliring format .txt beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file MT100 kliring format .txt beneficiary address contains <= 140 char reject by signer",
        "CU upload file MT100 kliring format .txt beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file MT100 kliring format .txt beneficiary address contains empty value or null",
        "CU upload file MT100 kliring format .txt beneficiary address contains semicolon (;)",
        "CU upload file MT100 kliring format .txt beneficiary address contains comma and period (, & .)",
        "CU upload file MT100 kliring format .txt beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file MT100 kliring format .txt beneficiary address contains HTML tags",
        "CU upload file MT100 kliring format .txt beneficiary address contains SQL injection attempt",
        "CU upload file MT100 kliring format .csv beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file MT100 kliring format .csv beneficiary address contains <= 140 char reject by signer",
        "CU upload file MT100 kliring format .csv beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file MT100 kliring format .csv beneficiary address contains empty value or null",
        "CU upload file MT100 kliring format .csv beneficiary address contains semicolon (;)",
        "CU upload file MT100 kliring format .csv beneficiary address contains comma and period (, & .)",
        "CU upload file MT100 kliring format .csv beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file MT100 kliring format .csv beneficiary address contains HTML tags",
        "CU upload file MT100 kliring format .csv beneficiary address contains SQL injection attempt",
        "CU upload file Alfaria kliring format .txt beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file Alfaria kliring format .txt beneficiary address contains <= 140 char reject by signer",
        "CU upload file Alfaria kliring format .txt beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file Alfaria kliring format .txt beneficiary address contains comma and period (, & .)",
        "CU upload file Alfaria kliring format .txt beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file Alfaria kliring format .txt beneficiary address contains HTML tags",
        "CU upload file Alfaria kliring format .txt beneficiary address contains SQL injection attempt",
        "CU upload file Alfaria kliring format .csv beneficiary address contains <= 140 char full transaction process book approval",
        "CU upload file Alfaria kliring format .csv beneficiary address contains <= 140 char reject by signer",
        "CU upload file Alfaria kliring format .csv beneficiary address contains > 140 char full transaction process book approval",
        "CU upload file Alfaria kliring format .csv beneficiary address contains comma and period (, & .)",
        "CU upload file Alfaria kliring format .csv beneficiary address contains multiple consecutive special characters (!!!, @@@, ###)",
        "CU upload file Alfaria kliring format .csv beneficiary address contains HTML tags",
        "CU upload file Alfaria kliring format .csv beneficiary address contains SQL injection attempt",
    ];


        // $section->addText('DEBUG: If you see this text, PhpWord is writing correctly!', ['bold' => true, 'color' => 'FF0000']);
        // $section->addText($scenarios[0]);

        // Define headers
        $headers = [
            'No. Test Case',
            'Function',
            'Scenario',
            'Input Data',
            'Steps',
            'Expected Result',
            'Results',
            'Screen Capture'
        ];

        $section->addText('DEBUG: If you see this text, PhpWord is writing correctly!', ['bold' => true, 'color' => 'FF0000']);

        $cleanScenario = $this->sanitizeScenario($scenarios[1]);
        $section->addText($cleanScenario);

        foreach ($scenarios as $index => $scenario) {
            $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);

            $table->addRow();
            $table->addCell(3000)->addText($headers[0], ['bold' => true]);
            $table->addCell(8000)->addText("TC" . str_pad($index + 1, 2, '0', STR_PAD_LEFT));

            $table->addRow();
            $table->addCell(2500)->addText($headers[1], ['bold' => true]);
            $table->addCell(8000)->addText("Enable address length Mass transfer (all format) Kliring 140 Max (without \";\")");

            $table->addRow();
            $table->addCell(2500)->addText($headers[2], ['bold' => true]);
            $cleanScenario = $this->sanitizeScenario($scenario);
            $table->addCell(8000)->addText($cleanScenario);

            $table->addRow();
            $table->addCell(2500)->addText($headers[3], ['bold' => true]);
            $cell = $table->addCell(8000);
            $cell->addText("Company Code");
            $cell->addText("Username");
            $cell->addText("Password");

            $table->addRow();
            $table->addCell(2500)->addText($headers[4], ['bold' => true]);
            $cell = $table->addCell(8000);
            $cell->addText("Given access addons.cms.dev.bri.co.id");
            $cell->addText("When login as CU maker");
            $cell->addText("And user access menu mass transfer create & upload file");
            $cell->addText("And user access menu maker confirmation & approve batch transaction");
            $cell->addText("When login as CU signer");
            $cell->addText("And user access menu transaction action & approve batch transaction");
            $cell->addText("And user access transfer inquiry & select batch transaction");
            $cell->addText("And user select transaction report & access bank details");
            $cell->addText("Then validate result address");
            
            $table->addRow();
            $table->addCell(2500)->addText($headers[5], ['bold' => true]);
            $cell = $table->addCell(8000);
            $cell->addText( "- Transaction Successfully");
            $cell->addText("- Beneficiery address displayed in bank details");
            
            $table->addRow();
            $table->addCell(2500)->addText($headers[6], ['bold' => true]);
            $cell = $table->addCell(8000);
            $textrun = $cell->addTextRun();
            $textrun->addText("PASS / ");
            $textrun->addText("FAILED", ['strikethrough' => true]);
            $cell->addText("\n\n*) coret salah satu melalui menu strikethrough pada toolbar confluence");

            $table->addRow();
            $table->addCell(2500)->addText($headers[7], ['bold' => true]);
            $table->addCell(8000)->addText("");

            $section->addTextBreak(2);
        }

        // Save file to temp
        $fileName = 'TestCases.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($tempFile, 'Word2007');

        return Response::download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    private function sanitizeScenario($text)
    {
       // Remove control chars except \t \n \r
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $text);

        // Replace multi-char operators first (order matters)
        $text = str_replace(['<=', '>='], ['≤', '≥'], $text);

        // Optional: normalize weird whitespace sequences (keep spaces/newlines)
        // $text = preg_replace('/[ \t]+/', ' ', $text);

        return trim($text);
    }

    private function addMultilineCell($cell, array $lines)
    {
        $count = count($lines);

    foreach ($lines as $i => $line) {
        // each addText() creates a new paragraph in the cell
        $cell->addText($line, [], ['spaceAfter' => 0]); // prevent extra spacing
        if ($i < $count - 1) {
            $cell->addTextBreak(); // real line break
        }
    }
    }
}
