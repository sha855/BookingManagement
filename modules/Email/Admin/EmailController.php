<?php

    namespace Modules\Email\Admin;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Modules\AdminController;
    use Modules\Email\Emails\TestEmail;

    class EmailController extends AdminController
    {

        public function testEmail(Request $request)
        {
            if(is_demo_mode()){
                return response()->json(['error' => __("DEMO MODE: Disable update")], 200);
            }
            $to = $request->to;
         
            try {
                Mail::to($to)->send(new TestEmail());
                return response()->json(['error' => false], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'messages' => $e->getMessage()], 200);
            }
        }
    }
