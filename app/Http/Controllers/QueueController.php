<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Service;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index() {
        $services = Service::all();
        $currentQueue = Queue::whereDate('created_at', today())
                            ->where('status', 'processing')
                            ->first();

        $totalWaiting = Queue::whereDate('created_at', today())
                            ->where('status', 'waiting')
                            ->count();

        return view('welcome', compact('services', 'currentQueue', 'totalWaiting'));
    }

    public function store(Request $request) {
        $lastQueue = Queue::whereDate('created_at', today())->max('queue_number');
        $newNumber = $lastQueue ? $lastQueue + 1 : 1;

        Queue::create([
            'customer_name' => $request->customer_name,
            'service_id' => $request->service_id,
            'queue_number' => $newNumber,
            'status' => 'waiting'
        ]);

        $formattedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        return redirect()->back()->with('success', 'Nomor antrian Anda: ' . $formattedNumber);
    }

    public function adminDashboard() {
        $queues = Queue::with('service')
                    ->whereDate('created_at', today())
                    ->orderBy('queue_number', 'asc')
                    ->get();

        return view('admin.dashboard', compact('queues'));
    }

    public function updateStatus($id, $status) {
        $queue = Queue::findOrFail($id);
        $queue->update(['status' => $status]);
        return redirect()->back()->with('status', 'Status antrian berhasil diperbarui!');
    }
}