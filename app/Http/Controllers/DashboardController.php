<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class DashboardController extends Controller
{
    public function index()
    {
        $users = \DB::select("SELECT COUNT(*) as id from users");
        $client = \DB::select("SELECT COUNT(*) as id from clients");
        $vente = \DB::select("SELECT COUNT(*) as id from ventes");
        $stade = \DB::select("SELECT COUNT(*) as id from stades");
        return view('home', compact('users','client','vente','stade'));
    }

    public function billet($id)
    {
        $billet = \DB::select("SELECT paiements.id,paiements.montant,paiements.devise,paiements.datepaie,clients.nom as client,matchs.equipe_principale,matchs.equipe_adverse,matchs.date_match,matchs.heure_match,stades.nom as stade,champions.name as champions,zonesieges.numsiege,zonesieges.sectionstade from paiements INNER JOIN ventes on ventes.id=paiements.vente_id INNER JOIN clients on clients.id=ventes.client_id INNER JOIN matchs on matchs.id=ventes.match_id INNER JOIN stades on stades.id=matchs.stade_id INNER JOIN champions on champions.id=matchs.champions_id INNER JOIN zonesieges on zonesieges.id=ventes.place_id WHERE paiements.id= ?;",[$id]);
        return view('pages.billet',compact('billet'));
    }

    public function reportclient()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage();    
    
        $listeclient = \DB::select("SELECT * FROM clients"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(195,12,'LISTE DES CLIENTS',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(10,6,'ID',1,0,'C');
        $fpdf->Cell(50,6,'NOMS',1,0,'C');
        $fpdf->Cell(50,6,'ADRESSE',1,0,'C');
        
        $fpdf->Cell(35,6,'CONTACT',1,0,'C');
        $fpdf->Cell(50,6,'ADRESSE MAIL',1,0,'C');
        $fpdf->Ln();
        foreach($listeclient as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(10,8,$list->id,1,0,'C');
            $fpdf->Cell(50,8,$list->nom,1,0,'C');
            $fpdf->Cell(50,8,$list->adresse,1,0,'C');
            
            $fpdf->Cell(35,8,$list->telephone,1,0,'C');
            $fpdf->Cell(50,8,$list->mail,1,0,'C');
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;        
    }

    public function reportuser()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage();    
    
        $listeuser = \DB::select("SELECT * FROM users"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(190,12,'LISTE DES UTILISATEURS',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(10,6,'ID',1,0,'C');
        $fpdf->Cell(60,6,'USERNAME',1,0,'C');
        $fpdf->Cell(60,6,'EMAIL',1,0,'C');
        
        $fpdf->Cell(60,6,'CONTACT',1,0,'C');
        // $fpdf->Cell(30,6,'PASSWORD',1,0,'C');
        $fpdf->Ln();
        foreach($listeuser as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(10,8,$list->id,1,0,'C');
            $fpdf->Cell(60,8,$list->name,1,0,'C');
            $fpdf->Cell(60,8,$list->email,1,0,'C');
            
            $fpdf->Cell(60,8,$list->phone,1,0,'C');
            // $fpdf->Cell(30,8,$list->password,1,0,'C');
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;
    }

    public function reportstade()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage();    
    
        $listestade = \DB::select("SELECT * FROM stades"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(195,12,'LISTE DES STADES',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(80,6,'NOM',1,0,'C');
        $fpdf->Cell(35,6,'TAILLE',1,0,'C');        
        $fpdf->Cell(30,6,'PLACE',1,0,'C');
        $fpdf->Cell(50,6,'EMPLACEMENT',1,0,'C');
        $fpdf->Ln();
        foreach($listestade as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(80,8,$list->nom,1,0,'C');
            $fpdf->Cell(35,8,$list->taille,1,0,'C');
            
            $fpdf->Cell(30,8,$list->nbr_place,1,0,'C');
            $fpdf->Cell(50,8,$list->emplacement,1,0,'C');
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;
    }

    public function reportequipe()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage();    
    
        $listeequipe = \DB::select("SELECT * FROM equipes"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(190,12,'LISTE DES EQUIPES',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(30,6,'ID',1,0,'C');
        $fpdf->Cell(80,6,'NOM',1,0,'C');
        $fpdf->Cell(80,6,'DIVISION',1,0,'C');

        $fpdf->Ln();
        foreach($listeequipe as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(30,8,$list->id,1,0,'C');
            $fpdf->Cell(80,8,$list->name,1,0,'C');
            $fpdf->Cell(80,8,$list->device_name,1,0,'C');
            
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;
    }

    public function reportvente()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage("L");    
    
        $listevente = \DB::select("SELECT ventes.id,clients.nom,clients.telephone,CONCAT(matchs.equipe_principale,' vs ',matchs.equipe_adverse) AS matchs,ventes.prix,zonesieges.numsiege,ventes.datevente FROM ventes INNER JOIN clients ON clients.id=ventes.client_id INNER JOIN matchs ON matchs.id=ventes.match_id INNER JOIN zonesieges on zonesieges.id=ventes.place_id;"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(280,12,'LISTE DES VENTES DES BILLETS',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(75,6,'CLIENTS',1,0,'C');
        // $fpdf->Cell(50,6,'CONTACT',1,0,'C');
        $fpdf->Cell(100,6,'MATCH',1,0,'C');
        $fpdf->Cell(50,6,'PRIX',1,0,'C');
        $fpdf->Cell(55,6,'NUMERO PLACE',1,0,'C');
        // $fpdf->Cell(45,6,'DATE',1,0,'C');

        $fpdf->Ln();
        foreach($listevente as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(75,8,$list->nom,1,0,'C');
            // $fpdf->Cell(30,8,$list->telephone,1,0,'C');
            $fpdf->Cell(100,8,$list->matchs,1,0,'C');
            $fpdf->Cell(50,8,$list->prix,1,0,'C');
            $fpdf->Cell(55,8,$list->numsiege,1,0,'C');
            // $fpdf->Cell(45,8,$list->datevente,1,0,'C');
            
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;
    }

    public function reportchampions()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage();    
    
        $listechampion = \DB::select("SELECT * FROM champions"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(190,12,'LISTE DES CHAMPIONNATS',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(30,6,'ID',1,0,'C');
        $fpdf->Cell(80,6,'NAME',1,0,'C');
        $fpdf->Cell(80,6,'COUNTRY',1,0,'C');

        $fpdf->Ln();
        foreach($listechampion as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(30,8,$list->id,1,0,'C');
            $fpdf->Cell(80,8,$list->name,1,0,'C');
            $fpdf->Cell(80,8,$list->country,1,0,'C');
            
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;
    }

    public function reportpaiement()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage();    
    
        $listepaie = \DB::select("SELECT paiements.id,clients.nom,paiements.montant,paiements.devise,paiements.datepaie FROM paiements INNER JOIN ventes ON ventes.id=paiements.vente_id INNER JOIN clients ON clients.id=ventes.client_id;"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(190,12,'LISTE DES PAIEMENTS',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(20,6,'ID',1,0,'C');
        // $fpdf->Cell(60,6,'CLIENT',1,0,'C');
        $fpdf->Cell(60,6,'MONTANT',1,0,'C');
        $fpdf->Cell(30,6,'DEVISE',1,0,'C');
        $fpdf->Cell(80,6,'DATE PAIEMENT',1,0,'C');

        $fpdf->Ln();
        foreach($listepaie as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(20,8,$list->id,1,0,'C');
            // $fpdf->Cell(60,8,$list->nom,1,0,'C');
            $fpdf->Cell(60,8,$list->montant,1,0,'C');
            $fpdf->Cell(30,8,$list->devise,1,0,'C');
            $fpdf->Cell(80,8,$list->datepaie,1,0,'C');
            
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;
    }

    public function reportmatch()
    {
        $fpdf = new Fpdf;
        $fpdf->AddPage("L");    
    
        $listematch = \DB::select("SELECT matchs.id,stades.nom AS stade,champions.name AS champion,CONCAT(matchs.equipe_principale,' VS ', matchs.equipe_adverse) AS equipes,matchs.date_match,matchs.heure_match FROM matchs INNER JOIN stades ON stades.id=matchs.stade_id INNER JOIN champions ON champions.id=matchs.champions_id;"); 
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(285,12,'LISTE DES MATCHS',1,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(65,6,'STADE',1,0,'C');
        $fpdf->Cell(55,6,'CHAMPIONS',1,0,'C');
        $fpdf->Cell(95,6,'EQUIPES',1,0,'C');
        $fpdf->Cell(45,6,'DATE',1,0,'C');
        $fpdf->Cell(25,6,'HEURE',1,0,'C');

        $fpdf->Ln();
        foreach($listematch as $list){
            $fpdf->SetFont('Courier', 'B', 18);
    
            $fpdf->Cell(65,8,$list->stade,1,0,'C');
            $fpdf->Cell(55,8,$list->champion,1,0,'C');
            $fpdf->Cell(95,8,$list->equipes,1,0,'C');
            $fpdf->Cell(45,8,$list->date_match,1,0,'C');
            $fpdf->Cell(25,8,$list->heure_match,1,0,'C');
            
            $fpdf->Ln();       
        }
        $fpdf->Output();      
        exit;
    }
}
