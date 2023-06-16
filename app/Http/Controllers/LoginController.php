<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Models\User;
use App\Models\Client;
use App\Models\Vente;
use Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'sometimes|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password'));
            $user->active = true;
            $user->verified = true;
            $user->save();

        return view('pages.login');
    }

    public function index()
    {
        return view('pages.login');
    }

    public function forgotpassword()
    {
        return view('pages.forgot-password');
    }

    public function registe()
    {
        return view('pages.register');
    }



    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect(route('home'))->with([
                'message' => 'Successfully login.!',
                'alert-type' => 'success',
            ]);
        }
        return view('pages.login');
    }

    //==================================================clientreservation=====================================


    public function registerclient(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'sometimes|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password'));
            $user->active = true;
            $user->verified = true;
            $user->save();

            return view('client.login');
    }


    public function indexclient()
    {
        return view('client.login');
    }

    public function reservationindex()
    {
        $client = Client::latest()->get();
        $zonesiege = \DB::select("SELECT * FROM `zonesieges` WHERE status='vide';");
        $matchs = \DB::select("SELECT matchs.id,matchs.stade_id,matchs.champions_id,CONCAT(matchs.equipe_principale,' VS ', matchs.equipe_adverse) AS equipes,matchs.date_match,matchs.heure_match,stades.nom as stade,stades.emplacement,stades.photo,champions.name as championnat FROM matchs INNER JOIN stades on stades.id=matchs.stade_id INNER JOIN champions on champions.id=matchs.champions_id order by id desc;");
        return view('client.reservation', compact('client','matchs','zonesiege'));
    }

    public function clientlist()
    {
        return view('client.client');
    }

    public function registeclient()
    {
        return view('client.register');
    }

    public function match()
    {
        $match = \DB::select("SELECT matchs.id,matchs.stade_id,matchs.champions_id,CONCAT(matchs.equipe_principale,' VS ', matchs.equipe_adverse) AS equipes,matchs.date_match,matchs.heure_match,stades.nom as stade,stades.emplacement,stades.photo,champions.name as championnat,matchs.prix,matchs.devise FROM matchs INNER JOIN stades on stades.id=matchs.stade_id INNER JOIN champions on champions.id=matchs.champions_id order by id desc;");
        return view('client.match', compact('match'));
    }

    public function loginclient(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect(route('list.client'))->with([
                'message' => 'Successfully login.!',
                'alert-type' => 'success',
            ]);
        }
        return view('client.login');
    }

    public function reserveclient(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'mail' => 'sometimes|email',
        ]);

        $client = new Client;
        $client->nom = $request->input('nom');
        $client->adresse = $request->input('adresse');
        $client->telephone = $request->input('telephone');
        $client->mail = $request->input('mail');
        $client->save();

        return redirect(route('list.reservation'))->with([
            'message' => 'Successfully saved.!',
            'alert-type' => 'success',
        ]);
    }

    public function reservation(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'match_id' => 'required',
            'prix' => 'required',
            'place_id' => 'required',
        ]);

        // $vente = new Vente;
        // $vente->client_id = $request->input('client_id');
        // $vente->match_id = $request->input('match_id');
        // $vente->prix = $request->input('prix');
        // $vente->place_id = $request->input('place_id');
        // $vente->save();

        \DB::statement("CALL proc_vente(?,?,?,?)",[
            $request->client_id,
            $request->match_id,
            $request->prix,
            $request->place_id
        ]);
        // \DB::update("UPDATE zonesieges SET status='occuper' WHERE id=: ?", [$request->place_id]);
        return redirect(route('reservation.match'))->with([
            'message' => 'Successfully saved.!',
            'alert-type' => 'success',
        ]);
    }
}
