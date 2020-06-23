<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\SuperAdmin;
use App\Model\Faq;
use Session;

class FaqController extends Controller {
	
	
	public function __construct()
    {
        $this->middleware(SuperAdmin::class);		
		app('view')->composer('admin.layouts.sidebar', function ($view) {		
        $action = app('request')->route()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        $view->with(compact('controller', 'action'));
    });
    }


		// @ listing function
		public function index(){
		$title = "Faq";        
		$faq = DB::select('select * from faq');		 		 
		 return view('admin.faq.index',['faq'=>$faq,'title'=>$title]);

		}

		// @ add records function
		public function add(Request $request){
			$title = "Add Faq";    
			
			if(!empty( $request->except('_token') ) ){			
				$request->validate([		
			'question' => 'required',
			'answer' => 'required',
			],
			[
			'question.required' => 'The question is required.',
			'answer.required' => 'The answer is required.',
			
			]);
		
			$question = $request->input('question');		
			$answer = $request->input('answer');		
			
			DB::table('faq')->insert(
			[
			'question' =>$question,
			'answer' =>$answer,
			'status' =>1
			]);
			Session::flash('message', 'Faq Successfully Added!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/faq');			
		}else{
		
			return view('admin.faq.add',['title'=>$title]);
		}


		}
		
		// @ add records function
		public function edit(Request $request,$id){
			$title = "Edit Faq";    
			
			if(!empty( $request->except('_token') ) ){			
			$request->validate([		
			'question' => 'required',
			'answer' => 'required',
			],
			[
			'question.required' => 'The question is required.',
			'answer.required' => 'The answer is required.',
			
			]);
		
			$question = $request->input('question');		
			$answer = $request->input('answer');		
			
			
			DB::table('faq')
			->where('id', $id)				
			->update(
			[
			'question' =>$question,
			'answer' =>$answer,
			'status' =>1
			]);
			Session::flash('message', 'Faq Successfully Updated!');
			Session::flash('alert-class', 'alert-info'); 
			return redirect('/admin/faq');			
		}else{
		$faq = faq::where('id',$id)->first();
		return view('admin.faq.edit',['faq'=>$faq, 'title'=>$title]);
			
		}


		}
		


		// @ delete records function
		public function delete($id){
		$faq = faq::where('id', $id)->first();
		faq::where('id', $id)->delete();
		Session::flash('message', 'Faq Successfully deleted!');
		Session::flash('alert-class', 'alert-info'); 
		return redirect('/admin/faq');

		}
	 
 

}