<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Member;
use App\Models\Language;
use App\Models\Pricing;
use App\Models\PricingSetting;
use App\Models\ContactSetting;
use App\Models\Photo;
use App\Models\Gallery;
use App\Models\Client;
use App\Models\HomeSetting; 
use App\Models\AboutSetting;
use App\Models\PortfolioSetting;
use App\Models\ProjectCategory; 
use App\Models\HeaderFooterSetting; 
use App\Models\Blog;
use View;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Pagination\Paginator;
use Mail;
use Validator;
use DB;

class HomeController extends Controller
{

    public function changeLanguage($lang)
    {
        session()->put('lang', $lang);
        app()->setLocale($lang);


        return redirect()->back();
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();
       // $data['sliders'] = Slider::where('language_id', $lang_id)->get();
        $data['sliders'] = DB::table('sliders')
            ->join('photos', 'sliders.photo_id', '=', 'photos.id')
            ->where('sliders.language_id',$lang_id)
            ->select('sliders.*', 'photos.file')
            ->get();
        
        //print_r($data['sliders']);die();
        $data['menus'] = Menu::where('language_id', $lang_id)->get();
        $data['setting'] = Setting::find($lang_id);
        $data['headerfooter'] = HeaderFooterSetting::where('language_id', $lang_id)->get();
        $data['homesetting'] = HomeSetting::find($lang_id);
        $data['services'] = Service::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(12);
        $data['projects'] = Project::where('language_id', $lang_id)->get();
        $data['testimonials'] = Testimonial::where('language_id', $lang_id)->get();
        $data['posts'] = Post::where('language_id', $lang_id)->get();
        $data['blog'] = Blog::orderBy('id', 'ASC')->paginate(3);
        $data['aboutsetting'] = AboutSetting::find($lang_id);
        $data['service'] = Service::all();
        
        // return dd($data['sliders']);
        // print_r($data['aboutsetting']);die();
       // print_r($data['headerfooter']);die();
        return view('home', compact('langs'), $data);
    }
    
    
    
    public function delete_appoiment(Request $request, Client $client) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $clients = Client::findOrFail($request->checkbox_array);
            foreach ($clients as $client) {
                $client->delete();
            }
            return back()->with('services_success','Appointment deleted successfully!');
        } else {
            return back();
        }

        $clients = Client::findOrFail($request->checkbox_array);
        foreach ($clients as $client) {
            $client->delete();
        }

        return back();
        //return 'works';
    }
    
    function uploadTinyImage(Request $request){
        Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
    }
    
    
    function appoiment(){
        $data['appointment'] = Client::orderBy('id', 'DESC')->paginate(10);
        
        return view('appointment',$data);
    }
    
    function enquiry(){
        $data['contact'] = Contact::orderBy('id', 'DESC')->paginate(10);
        
        return view('enquiry',$data);
    }
    
    public function about()
    {   

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();


        $members = Member::all();
        $clients = Client::all();


        $data['testimonials'] = Testimonial::where('language_id', $lang_id)->get();
        $data['headerfooter'] = HeaderFooterSetting::find($lang_id);
        $data['setting'] = Setting::find($lang_id);
        $data['services'] = Service::where('language_id', $lang_id)->get();
        $data['aboutsetting'] = AboutSetting::find($lang_id);
        
        // print_r($data['aboutsetting']);die();
        $data['menus'] = Menu::where('language_id', $lang_id)->get();

        return view('about', $data, compact('members','clients', 'langs'));
    }

    public function show_slug_about($slug = 'home')
    {   
         
        $page = AboutSetting::whereSlug($slug)->first();
        if(!empty($page)) {
            return View::make('page')->with('page', $page);
        } else {
            abort(404);
        }
        
    }
    
    public function blog_detail($id){
        $blogslug = str_replace("-"," ",$id);
        //return $id;
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();
        $data['services'] = Service::where('language_id', $lang_id)->get();
        $data['media'] = Gallery::latest()->paginate(12);
        $data['blog'] = Blog::where('slug',$blogslug)->get();
        // return $data['blog']; 
        $data['recentPost'] = Blog::orderBy('id', 'DESC')->paginate(3);
        return view('blog_detail',$data);
    }
    
  

    public function portfolio()
    {

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();
        $data['services'] = Service::where('language_id', $lang_id)->get();

        $data['headerfooter'] = HeaderFooterSetting::find($lang_id);
        $data['setting'] = Setting::find($lang_id);
        $data['menus'] = Menu::where('language_id', $lang_id)->get();
        $data['projects'] = Project::where('language_id', $lang_id)->get();
        $data['portfoliosettings'] = PortfolioSetting::find($lang_id);
        $data['project_categories'] = ProjectCategory::where('language_id', $lang_id)->get();
        
        return view('portfolio', $data, compact('langs'));
    }
    public function blog()
    {   
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();
        $data['services'] = Service::where('language_id', $lang_id)->get();
        
        $data['blog'] = Blog::orderBy('id', 'DESC')->paginate(12);
        return view('blog', $data);
    }
    
    public function pricing()
    {   
        
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();
        $data['services'] = Service::where('language_id', $lang_id)->get();

        $data['headerfooter'] = HeaderFooterSetting::find($lang_id);
        $data['setting'] = Setting::find($lang_id);
        $data['menus'] = Menu::where('language_id', $lang_id)->get();
        $data['pricingsetting'] = PricingSetting::find($lang_id);
        $data['menus'] = Menu::where('language_id', $lang_id)->get();
        $data['pricings'] = Pricing::where('language_id', $lang_id)->get();

        return view('pricing', $data, compact('langs'));
    }

    public function contactPost(Request $request){


        $messages = [
            'g-recaptcha-response.required' => 'You must check the reCAPTCHA.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];
 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'budget' => 'required',
            'comment' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ], $messages);
 
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }


        Mail::send('email', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'budget' => $request->get('budget'),
                'comment' => $request->get('comment') ],
               
                function ($message) {
                        $message->from('contact@lucian.host');
                        $message->to('contact@lucian.host', 'Your Name')
                        ->subject('Your Website Contact Form');
        });
        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');
    }
    
    public function servicesDetails($id){
       $serviceslug = str_replace("-"," ",$id);
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;

        $lang_id = $currentLang->id; 

        $data['services'] = Service::where('language_id', '1')->get();
        $data['services_detail'] = Service::where('button_link', $serviceslug)->get();
        // return $data['services_detail'];
        $data['photo'] = Photo::where('id', $data['services_detail'][0]->photo_id)->get();
        $data['media'] = Gallery::latest()->paginate(12);
        //return $data['photo'];
        return view('services_details',$data);
    }

    public function contact()
    {
        $clients = Client::all();

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();
        $data['services'] = Service::where('language_id', $lang_id)->get();

        $data['headerfooter'] = HeaderFooterSetting::find($lang_id);
        $data['setting'] = Setting::find($lang_id);
        $data['menus'] = Menu::where('language_id', $lang_id)->get();
        $data['contactsetting'] = ContactSetting::find($lang_id);

        return view('contact', $data, compact('clients', 'langs'));
    }

    function contact_store(Request $request){
        // return $request['name'];
         $input = $request->all();
        Contact::create($input);
        Mail::send('email', [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'subject' => $request['subject'],
                'comment' => $request['message']
                ],
               
                function ($message) { 
                        $message->from('contact@lucian.host');
                        $message->to('sonusharma28375@gmail.com', 'Arogya Hospital')
                        ->subject('Your Website Contact Form one ');
        });
        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');
    }

    
    function images(){
        $data['media'] = Gallery::latest()->paginate(12);
        
        // return $data['media']; 
        return view('images',$data);
    }

    function about_story(){
        
        // print_r("check my page ");die();
        
         if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['currentLang'] = $currentLang;
        $lang_id = $currentLang->id;
        $langs = Language::all();


        $members = Member::all();
        $clients = Client::all();


        $data['testimonials'] = Testimonial::where('language_id', $lang_id)->get();
        $data['headerfooter'] = HeaderFooterSetting::find($lang_id);
        $data['setting'] = Setting::find($lang_id);
        $data['services'] = Service::where('language_id', $lang_id)->get();
        $data['aboutsetting'] = AboutSetting::find($lang_id);
        
        // print_r($data['aboutsetting']);die();
        $data['menus'] = Menu::where('language_id', $lang_id)->get();

        return view('about_story', $data, compact('members','clients', 'langs'));
    }


    public function servicesAll($id = null){
        $serviceslug = str_replace("","",$id);
           if (session()->has('lang')) {
             $currentLang = Language::where('code', session()->get('lang'))->first();
         } else {
             $currentLang = Language::where('is_default', 1)->first();
         }
         $data['currentLang'] = $currentLang;
    
        $lang_id = $currentLang->id;
        $data['services'] = Service::where('language_id', '1')->get();
        $data['services_detail'] = Service::get();

         return view('allservices', $data); 
     }


}
