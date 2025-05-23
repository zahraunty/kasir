<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class TransactionController extends Controller
{
    public function create()
    {
        $items = Item::all();
        return view('transaksi.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.discount' => 'nullable|numeric|min:0|max:100', // Validasi diskon per barang
        ]);

        $total = 0;
        $selectedItems = [];

        foreach ($request->items as $itemId => $input) {
            if (!isset($input['id']) || !isset($input['quantity'])) {
                continue; // Skip jika item tidak dipilih
            }

            $item = Item::findOrFail($input['id']);
            $quantity = $input['quantity'];
            $discountPercent = isset($input['discount']) ? $input['discount'] : 0;

            // Validasi stok
            if ($quantity > $item->stock) {
                return back()->withErrors(['items' => "Stok barang '{$item->name}' tidak mencukupi. Sisa stok: {$item->stock}"])
                             ->withInput();
            }

            $unitPrice = $item->price;
            $subtotal = $unitPrice * $quantity;
            $discountAmount = ($discountPercent / 100) * $subtotal;
            $subtotalAfterDiscount = $subtotal - $discountAmount;
            $total += $subtotalAfterDiscount;

            $selectedItems[] = [
                'item' => $item,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'discount' => $discountPercent,
                'subtotal' => $subtotalAfterDiscount,
            ];
        }

        // Simpan transaksi
        $transaction = Transaction::create([
            'customer_name' => $request->customer_name,
            'total_price' => $total,
        ]);

        // Simpan detail transaksi
        foreach ($selectedItems as $input) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $input['item']->id,
                'quantity' => $input['quantity'],
                'unit_price' => $input['unit_price'],
                'discount' => $input['discount'],
                'subtotal' => $input['subtotal'],
            ]);

            // Kurangi stok
            $input['item']->stock -= $input['quantity'];
            $input['item']->save();
        }

        return redirect()->route('transaksi.show', $transaction->id)
                         ->with('success', 'Transaksi berhasil disimpan!');
    }

    public function show($id)
    {
        $transaction = Transaction::with('items')->findOrFail($id);
        return view('transaksi.show', compact('transaction'));
    }

    public function history()
    {
        $transactionItems = TransactionItem::with(['transaction', 'item'])->get();
        return view('riwayat.index', compact('transactionItems'));
    }

    public function generatePDF($id)
    {
        $transaction = Transaction::with('items')->findOrFail($id);
        $pdf = FacadePdf::loadView('transaksi.show', compact('transaction'))
                        ->setPaper('a4', 'portrait');
        return $pdf->download('detail_transaksi_' . $transaction->id . '.pdf');
    }
}