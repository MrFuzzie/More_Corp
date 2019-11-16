<?php

namespace App\Listeners;

use App\Events\UniqueViewEvent;
use App\Product;
use App\ProductViews;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class UniqueViewListener
{

    /**
     * Handle the event.
     *
     * @param  UniqueViewEvent  $event
     * @return void
     */
    public function handle(UniqueViewEvent $event)
    {
        /** if not admin user run the event * unless we want to boost our own views ;D */

        if(!Auth::check() || Auth::user()->type == 0) {
            //Check if the visitor has viewed the product previously
            $productViews = $event->product->views->where('ip_address', request()->ip());
            if ($productViews->count() == 0) {

                ProductViews::create([
                    'product_id' => $event->product->id,
                    'ip_address' => request()->ip()
                ]);
            }
        }
    }
}
