<?php

namespace App\Traits;

use App\Models\LogAktivitas;

trait LogsActivity
{
    public function logActivity($aksi, $model = null, $model_id = null)
    {
        LogAktivitas::create([
            'user_id' => auth()->id() ?? 0,
            'aksi' => $aksi,
            'model' => $model,
            'model_id' => $model_id,
        ]);
    }
}
