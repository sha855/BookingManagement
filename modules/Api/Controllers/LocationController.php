<?php
namespace Modules\Api\Controllers;
use App\Http\Controllers\Controller;
use Modules\Location\Models\Location;

class LocationController extends Controller
{

    public function search(){
        
        $rows = Location::all();
        
       
        $total = count($rows);
        
        return $this->sendSuccess(
            [
                'total'=>$total,
                'data'=>$rows
            ]
        );
    }

    public function detail($id = '')    {
        if(empty($id)){
            return $this->sendError(__("Location ID is not available"));
        }
        $row = Location::find($id);
        if(empty($row))
        {
            return $this->sendError(__("Location not found"));
        }

        return $this->sendSuccess([
            'data'=>$row->dataForApi(true)
        ]);

    }
}
