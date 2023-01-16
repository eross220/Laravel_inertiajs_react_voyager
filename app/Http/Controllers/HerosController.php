<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\MailSender;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
class HerosController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    // POST BRE(A)D
    public function store(Request $request)
    {
       
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
       
        // Check permission
        $this->authorize('add', app($dataType->model_name));

        //Validate fields
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
       
        $data = new $dataType->model_name();
        
        $this->insertUpdateData($request, $slug, $dataType->addRows, $data);

        //$data->permissions()->sync($request->input('permissions', []));
       //dd($request->name);

        $this->sendEmail(); 
      
        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
    }
    public function sendEmail()
    {               
            $this->name = "Admin"; //recipient name
            $this->email = "blacktigerbusinesswork@gmail.com"; //recipient email id
            /**
             *creating an empty object of of stdClass
             *
             */
            $emailParams = new \stdClass(); 
            $emailParams->usersName = $this->name;
            $emailParams->usersEmail = $this->email;
           
            $emailParams->subject = "Testing Email sending feature";
            
            Mail::to($emailParams->usersEmail)->send(new MailSender($emailParams));
    } 
   
   
    
}
