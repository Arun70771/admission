<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentCompleteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id();

        // Retrieve the step status for the authenticated user
        $step_status = \App\Models\StepStatus::where('application_id', $userId)->first();

        // Check if payment is complete
        if (!$step_status || $step_status->payment_complate==1) {
            // Redirect to the payment route if not complete
            return redirect()->route('application-status');
        }

        return $next($request); // Proceed to the next middleware/request
    }
}
