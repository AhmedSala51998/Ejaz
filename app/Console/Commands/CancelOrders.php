<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Biography;
use App\Services\SMS\MesgatSMS;

class CancelOrders extends Command
{
    use MesgatSMS;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel orders which have exceeded 48 hours without confirmation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ordersToCancel = Order::where('status', 'under_work')
            ->where('created_at', '<=', now()->subHours(48))
            ->get();

        foreach ($ordersToCancel as $order) {
            // تحديث حالة الطلب
            $order->update(['status' => 'canceled']);

            // إعادة حالة السيرة الذاتية
            Biography::where('id', $order->biography_id)
                ->update(['status' => 'new', 'admin_id' => null, 'user_id' => null]);

            // استخراج بيانات العميل
            $clientPhone = $order->user->phone ?? null;
            $workerName = $order->biography->cv_name ?? 'العاملة';

            // تأكيد وجود رقم الهاتف
            if ($clientPhone) {
                $msg = "انتهت مهلة الحجز المحددة للسيرة الذاتية: {$workerName}، وتم إلغاء الحجز تلقائيًا.";

                // حذف أي بادئة صفر وتحويل الرقم لصيغة دولية 966
                $cleanPhone = preg_replace('/^0/', '', $clientPhone);
                $saudiPhone = '966' . $cleanPhone;

                try {
                    $this->sendSMS($saudiPhone, $msg);
                    $this->info("✅ SMS sent to {$saudiPhone} for Order ID {$order->id}");
                } catch (\Exception $e) {
                    \Log::error("❌ SMS failed for Order ID {$order->id}: " . $e->getMessage());
                    $this->error("❌ Failed to send SMS to {$saudiPhone}");
                }
            } else {
                $this->warn("⚠️ No phone number for Order ID {$order->id}");
            }

            $this->info("✅ Order ID {$order->id} canceled successfully.");
        }

        return 0;
    }
}
