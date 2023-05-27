<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ClientRequest; 
use App\Models\Photo;
use Mail;
class ClientController extends Controller
{
    //


    public function index()
    {
        $clients = Client::all();
        return view('client.client-index', compact('clients'));
    }

    public function create()
    {
        return view('client.client-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  print_r($request);die();
              $alldata = new Client;

            if ($file = $request->file('reports')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('storage/report_img', $name);
                $alldata->reports = $name;
            }

                $alldata->name = $request->input('name');
                $alldata->phone = $request->input('phone');
                $alldata->message = $request->input('message');
                $alldata->sirvice_id = $request->input('sirvice_id');
                
                $alldata->save();

    // return $request;
        // $input = $request->all();
        // Client::create($input);
        
        $data =   Client::all()->last();
   // return $data['sirvice']->title;
        Mail::send('email', [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'subject' =>  $data['sirvice']->title,
                'comment' => $request['message']
                ],
               
            function ($message) {
                $message->from('contact@lucian.host');
                $message->to(['arpitchopra23@gmail.com','rdx8962501325@gmail.com','rdx.prabhatroniwal@gmail.com'], 'Arogya Hospital')
                ->subject('Your Website Contact Form one ');
        });
        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');
    }


    // ('sonusharma28375@gmail.com', 'Arogya Hospital')
    public function edit(Client $client)
    {
        return view('client.client-edit', compact('client'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $client->update($input);

        return back()->with('client_success','Client updated successfully!');
    }

    public function delete_client(Request $request, Client $client) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $clients = Client::findOrFail($request->checkbox_array);
            foreach ($clients as $client) {
                $client->delete();
            }
            return back()->with('clients_success','Client/s deleted successfully!');
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



}
