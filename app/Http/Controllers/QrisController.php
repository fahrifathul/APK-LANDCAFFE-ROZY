<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class QrisController extends Controller
{
    /**
     * Generate QRIS code for payment
     */
    public function generateQris(Order $order)
    {
        // Generate a unique payment ID
        $paymentId = 'QRIS-' . Str::upper(Str::random(8));
        
        // Calculate amount (in IDR, no decimals for QRIS)
        $amount = (int) ceil($order->total_amount - $order->paid_amount);
        
        // Generate QRIS data
        $qrisData = $this->generateQrisData($amount, $paymentId);
        
        // Generate QR Code
        $qrcode = QrCode::size(300)
            ->format('png')
            ->generate($qrisData);
            
        return response($qrcode)->header('Content-Type', 'image/png');
    }
    
    /**
     * Generate QRIS data string
     */
    private function generateQrisData($amount, $paymentId)
    {
        // This is a simplified version. You'll need to customize this according to
        // your QRIS provider's specifications
        
        // Merchant account information
        $merchantInfo = [
            '00' => 'com.qris',  // ID for Merchant Account Information
            '01' => 'ID' . config('qris.mid') . '.qris',  // Merchant ID
            '52' => '4111',  // Merchant Category Code (Restaurant)
            '53' => '360',   // Transaction Currency (IDR)
            '54' => $amount, // Transaction Amount
            '58' => 'ID',    // Country Code
            '59' => config('app.name'), // Merchant Name
            '60' => 'JAKARTA', // Merchant City
            '61' => '12345'  // Postal Code
        ];
        
        // Build the QRIS data string
        $qrisString = '';
        foreach ($merchantInfo as $id => $value) {
            $length = str_pad(strlen($value), 2, '0', STR_PAD_LEFT);
            $qrisString .= $id . $length . $value;
        }
        
        // Add CRC (checksum)
        $crc = strtoupper(hash('crc16', $qrisString . '6304'));
        $qrisString .= '6304' . $crc;
        
        return $qrisString;
    }
    
    /**
     * Process QRIS payment callback
     */
    public function callback(Request $request)
    {
        // Verify the callback is from your QRIS provider
        $signature = $request->header('X-Callback-Signature');
        
        // Verify the signature (implementation depends on your QRIS provider)
        if (!$this->verifySignature($request->all(), $signature)) {
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 401);
        }
        
        // Process the payment
        DB::beginTransaction();
        
        try {
            $order = Order::where('order_number', $request->reference_id)->firstOrFail();
            
            // Update payment status
            Payment::create([
                'order_id' => $order->id,
                'amount' => $request->amount,
                'payment_method' => 'qris',
                'payment_date' => now(),
                'transaction_id' => $request->transaction_id,
                'status' => 'completed'
            ]);
            
            // Update order status
            $order->update([
                'paid_amount' => $order->paid_amount + $request->amount,
                'status' => $order->total_amount <= ($order->paid_amount + $request->amount) ? 'paid' : $order->status,
                'payment_status' => 'completed'
            ]);
            
            DB::commit();
            
            return response()->json(['status' => 'success']);
            
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('QRIS Payment Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Payment processing failed'], 500);
        }
    }
    
    /**
     * Verify the callback signature
     */
    private function verifySignature($data, $signature)
    {
        // Implement signature verification based on your QRIS provider's documentation
        // This is a placeholder - you'll need to replace it with actual verification logic
        return true;
    }
}
