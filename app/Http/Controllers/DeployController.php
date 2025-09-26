<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeployController extends Controller
{
  public function handle(Request $request)
  {
    // Validasi signature dari GitHub (penting)
    $signature = $request->header('X-Hub-Signature-256');
    $payload   = $request->getContent();
    $secret    = env('GITHUB_WEBHOOK_SECRET');

    $hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);

    if (!hash_equals($hash, $signature)) {
      Log::warning('Invalid webhook signature');
      abort(403, 'Invalid signature');
    }

    Log::info('GitHub Webhook Triggered', $request->all());

    // Jalankan script deploy (asynchronous via queue / job lebih bagus)
    // shell_exec('/var/www/karimunkab/deploy.sh > /dev/null 2>&1 &');
    shell_exec('/var/www/karimunkab/deploy.sh >> /var/www/karimunkab/deploy.log 2>&1 &');

    return response()->json(['status' => 'deploy started']);
  }
}
