<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReminderController extends Controller
{
    /**
     * Tampilkan halaman daftar reminder.
     */
    public function index(Request $request): View
    {
        // Ambil data reminder milik user yang login
        $reminders = $request->user()->reminders()->latest()->get();

        return view('reminder', [
            'reminders' => $reminders,
        ]);
    }

    /**
     * Simpan reminder baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'media' => 'required|string',
            'status' => 'required|string',
        ]);

        $request->user()->reminders()->create($validated);

        return back()->with('status', 'reminder-added');
    }

    /**
     * Hapus reminder.
     */
    public function destroy(Request $request, Reminder $reminder): RedirectResponse
    {
        // Pastikan milik user sendiri
        if ($request->user()->id !== $reminder->user_id) {
            abort(403);
        }

        $reminder->delete();

        return back()->with('status', 'reminder-deleted');
    }
}