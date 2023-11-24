<?php

namespace App\Models\it;

use App\Models\it\Perbaikan;
use App\Models\it\gudangIT;
use App\Models\Model;
class printer extends Model
{
    protected $guarded = [];

    protected $table = "printers";
    public function perbaikans()
    {
        return $this->morphMany(Perbaikan::class, 'hardwareable');
    }

    public function klien()
    {
        return $this->hasOne('App\Models\it\klien');
    }

    public function gudangitable()
    {
        return $this->morphOne('App\Models\it\gudangIT','gudangitable');
    }

    // Validasi Form
    public function handleStoreOrUpdate($request)
    {
        // dd($request->all());
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            $this->save();
            // $this->saveLogNotify();

            return $this->commitSaved();
        } catch (\Exception $e) {
            $this->rollBack($e);
        }
    }

    public function handleDestroy()
    {
        $this->beginTransaction();
        try {
            // $this->saveLogNotify();
            $this->delete();

            return $this->commitDeleted();
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }

    public function rollbackDeleted($e, $params = [])
	{
		\DB::rollback();
		$message = __('base.error.deleted');
		$errors = $e->getMessage();
		if ($e->getCode() == 23000) {
			$message = __('base.error.related');
			$errors = [];
		}
		$traces = $e->getTrace();
		return $this->responseError(array_merge(compact('message', 'errors', 'traces'), $params));
	}
}
