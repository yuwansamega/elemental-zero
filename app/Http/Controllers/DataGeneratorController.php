<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DataGeneratorController extends Controller
{

    public function 

    public function generate(Request $request)
    {
        // Validate inputs
        $data = $request->validate([
            'filename' => 'required|string',
            'cust_ref_no' => 'required|string',
            'instruction_code' => 'required|string',
            'value_date' => 'required|string',
            'debit_account' => 'required|string',
            'sender_name' => 'required|string',
            'ben_bank_identifier' => 'required|string',
            'credit_account' => 'required|string',
            'beneficiary_name' => 'required|string',
            'beneficiary_address' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'trx_remark' => 'required|string',
            'notification' => 'required|email',
            'charge_type' => 'required|string',
            'total_rows' => 'required|numeric',
        ]);

        $content = '';


        // Extract number part from reference if present
        preg_match('/(\d+)$/', $data['cust_ref_no'], $matches);
        $baseRef = $data['cust_ref_no'];
        $startNumber = 1;

        if (!empty($matches)) {
            $startNumber = (int)$matches[1];
            $baseRef = substr($data['cust_ref_no'], 0, -strlen($matches[1]));
        }

        // Loop to generate each row
        for ($i = 1; $i <= $data['total_rows']; $i++) {
            $currentRef = $baseRef . str_pad($startNumber + $i - 1, strlen($matches[1] ?? ''), '0', STR_PAD_LEFT);

            $content .= "{$i}|$currentRef|{$data['instruction_code']}|{$data['value_date']}|{$data['debit_account']}|{$data['sender_name']}|{$data['ben_bank_identifier']}|{$data['credit_account']}|{$data['beneficiary_name']}|{$data['beneficiary_address']}|{$data['amount']}|{$data['currency']}|{$data['trx_remark']}{$i}|{$data['notification']}|{$data['charge_type']}|ID||JAKARTA||||||||||||||||||";

            // Add a new line unless it's the last row
            if ($i < $data['total_rows']) {
                $content .= "\n";
            }
        }

        // Create filename
        $filename = $data['filename'] . ".txt";

        // Return as file download
        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }

    public function generateAlfaria(Request $request)
    {
        // Validate inputs
        $data = $request->validate([
            'filename' => 'required|string',
            'cust_ref_no' => 'required|string',
            'instruction_code' => 'required|string',
            'value_date' => 'required|string',
            'debit_account' => 'required|string',
            'sender_name' => 'required|string',
            // 'ben_bank_identifier' => 'required|string',
            'ben_bank_code' => 'required|numeric',
            'credit_account' => 'required|string',
            'beneficiary_name' => 'required|string',
            'beneficiary_address' => 'required|string',
            'city' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'trx_remark' => 'required|string',
            'notification' => 'required|email',
            'charge_type' => 'required|string',
            'total_rows' => 'required|numeric',
        ]);

        $content = '';


        // Extract number part from reference if present
        preg_match('/(\d+)$/', $data['cust_ref_no'], $matches);
        $baseRef = $data['cust_ref_no'];
        preg_match('/(\d+)$/', $data['trx_remark'], $matches);
        $baseRemark = $data['trx_remark'];
        $startNumber = 1;

        if (!empty($matches)) {
            $startNumber = (int)$matches[1];
            $baseRef = substr($data['cust_ref_no'], 0, -strlen($matches[1]));
            $baseRemark = substr($data['trx_remark'], 0, -strlen($matches[1]));
        }

        $total_amount = 0;

        for ($i = 1; $i <= $data['total_rows']; $i++){

            $total_amount += $data['amount'];
        }

        // Loop to generate each row
        for ($i = 1; $i <= $data['total_rows']; $i++) {
            $currentRef = $baseRef . str_pad($startNumber + $i - 1, strlen($matches[1] ?? ''), '0', STR_PAD_LEFT);
            $currentRemark = $baseRemark . str_pad($startNumber + $i - 1, strlen($matches[1] ?? ''), '0', STR_PAD_LEFT);

            if($i == 1){
                // Add header line once before details
                $content .= "P;{$data['value_date']};{$data['sender_name']};{$total_amount};\n";
            }

            // Always add transaction rows
            $content .= "{$data['credit_account']};{$data['beneficiary_name']};{$data['beneficiary_address']};;;{$data['currency']};{$data['amount']};$currentRemark;$currentRef;{$data['instruction_code']};{$data['ben_bank_code']};Jakarta;{$data['city']};;;ID;;{$data['notification']};;;Y;Y;;;;;;;;;;;;;;;;;{$data['charge_type']};;;;;";

            // Add new line unless last row
            if ($i < $data['total_rows']) {
                $content .= "\n";
            }
        }

        // Create filename
        $filename = $data['filename'] . ".txt";

        // Return as file download
        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }
}
