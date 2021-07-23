<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductInsertFormRequest; // validator
use Storage;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInsertFormRequest $request) // request => input data that user enter
    {
        // ==============================UPLOAD MULTIPLE IMAGES=============================================
        // ini_set('memory_limit', '-1');
        // dd($request->all());

        $files = $request->file('file');
        $fileArr = array();
        if(!empty($files)){
            foreach($files as $file){
                $filename = uniqid().'_'.$file->getClientOriginalName(); // insert in array entered names of image files and serialized and store img names in database with serialize array style
                array_push($fileArr,$filename);
                $file->move(public_path()."/uploads/",$filename);
            }
        }
        // foreach($fileArr as $eachFile){
        //     echo $eachFile."<br>";
        // }
        Product::create([ // can't insert data in array simultaniously
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => serialize($fileArr), 
            'price' => $request->get('price')
        ]);

        // START MAILGUN
        // $data = [
        //     'title' => 'New Lesson from BM',
        //     'content' => 'This is ice cool, Michael fight for the white goat',
        // ];
        // Mail::send('email.mail',$data,function($message){
        //     $email = 'moesandar213511@gmail.com';
        //     $username = 'Moe Lay';
        //     $subject = "Just Mail Testing";
        //     $message->to($email,$username)->subject($subject);
        // });
        // END MAILGUN

        return redirect('products/create')->with('status','Create Product Successfully.');
        
        //return $request->all();  
        

        // ==============================UPLOAD ONE IMAGE=============================================
        
        // this method is okay in laravel 8
        
        //*******************************laravel 8 upload image next method  
        // $filename = $request->file('file')->store('images'); 
        // $request->file->move(public_path('images/'), $filename);
        
        //*******************************laravel 8 upload image next method 
        
        // $filename = time().'_'.$request->file->extension();
        // $request->file->move(public_path('images/'), $filename);
        
        //******************************************************************

        // this method is okay in laravel 7
        // ******** store method image in public folder ******
        // unlink(public_path('/images/'.$request->file('file')));
        // $file = $request->file('file');
        // $filename = uniqid().'_'.$file->getClientOriginalName();
        // $file -> move(public_path().'/images/'.$filename);
        //return $file->getClientOriginalName();

        // ******** store method image in storage/app folder ********
        // $file = $request->file('file');
        // Storage::put('uploads/'.$file->getClientOriginalName(), file_get_contents($file));
        // need to declare storage in top of page
        // return $file->getClientOriginalName();
        

        // Product::create([ // can't insert data in array simultaniously
        //     'title' => $request->get('title'),
        //     'description' => $request->get('description'),
        //     'image' => $filename,
        //     'price' => $request->get('price')
        // ]);
        // return redirect('products/create')->with('status','Create Product Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
