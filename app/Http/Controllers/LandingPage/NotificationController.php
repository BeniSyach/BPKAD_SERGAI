<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\PublicService;
use App\Models\Service;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
  /** Ambil data untuk dikirim ke homepage */
  public function getForHomepage(): \Illuminate\Support\Collection
  {
      return Notification::active()
          ->latest()
          ->take(20)
          ->get()
          ->map(fn($n) => $n->toFrontendArray());
  }

  /** Tandai satu notifikasi sudah dibaca */
  public function markRead($id)
  {
      Notification::find($id)?->update(['is_read' => true]);
      return response()->json(['ok' => true]);
  }

  /** Tandai semua sudah dibaca */
  public function markAllRead()
  {
      Notification::where('is_read', false)->update(['is_read' => true]);
      return response()->json(['ok' => true]);
  }

  /** Hapus (dismiss) satu notifikasi */
  public function dismiss($id)
  {
      Notification::find($id)?->delete();
      return response()->json(['ok' => true]);
  }
}
