<?php

namespace App\Models\Traits;

trait ResponseTrait
{
    public function responseSuccess($params = [])
	{
        // dd($params);
        // return redirect()->route('admin.cmsIT.printers.index');
	}

	public function responseError($params = [])
	{
	    $default = [
	        'code'    => 500,
	        'status'  => false,
	        'message' => 'Error',
	    ];

	    if (is_string($params)) {
	        $default['message'] = $params;
	        $params = [];
	    }

	    $data = array_merge($default, $params);

	    if (!empty($data['errors']) && is_string($data['errors'])) {
	    	if (strpos($data['errors'], 'MESSAGE--', 0) !== false) {
	    		$data['message'] = trim(str_replace('MESSAGE--', '', $data['errors']));
	    		$data['errors'] = [];
	    	}
	    }
	    return response()->json($data, $data['code']);
	}

    public function beginTransaction()
	{
	    \DB::beginTransaction();
	}

    public function commitSaved($params = [])
	{
        // dd($params);
		\DB::commit();
		$message = __('base.success.saved');
		return $this->responseSuccess(array_merge(compact('message'), $params));
	}

    public function commitDeleted($params = [])
	{
		\DB::commit();
        return redirect()->route('it.printers.index');
	}
}
