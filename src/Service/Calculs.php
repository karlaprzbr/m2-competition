<?php

namespace App\Service;

use App\Entity\Candidat;
use App\Repository\OffreRepository;

class Calculs
{
    const DIPLOMES = [
        3=>'CAP, BEP',
        4=>'Baccaleuréat, Bac Pro, BP',
        5=>'BTS, DUT, DEUG, DEUST',
        6=>'Licence, LP, Bachelor',
        7=>'Master, Dipôme d\'ingénieur',
        8=>'Doctorat'
    ];

    public function matching($candidat, $offres)
    {
        foreach($offres as $offre) {
            $cptGlobal = 0;
            $tags = [];
            //poste
            if($candidat->getTitre() && $offre->getTitre()) {
                if($candidat->getTitre() == $offre->getTitre()) {
                    $cptGlobal++;
                    array_push($tags, $offre->getTitre());
                }
            }
            //disponibilité
            if($candidat->getDispo() && $offre->getDateDebut()) {
                if($candidat->getDispo() <= $offre->getDateDebut()) {
                    $cptGlobal++;
                    array_push($tags, $offre->getDateDebut()->format('Y-m-d'));
                }
            }
            //type de contrat
            if($candidat->getTypeContrat() && $offre->getTypeContrat()) {
                foreach($candidat->getTypeContrat() as $typeContrat) {
                    if($typeContrat == $offre->getTypeContrat()) {
                        $cptGlobal++;
                        array_push($tags, $offre->getTypeContrat());
                    }
                }
            }
            //années d'expérience
            if($candidat->getExperience() && $offre->getExperience()) {
                if($candidat->getExperience() >= $offre->getExperience()) {
                    $cptGlobal++;
                    array_push($tags, $offre->getExperience()." ans");
                }
            }
            //soft skills
            if($offre->getSoftSkills() && $candidat->getSoftSkills()) {
                $nbSoftSkills = sizeof($offre->getSoftSkills());
                $softCpt = 0;
                foreach($offre->getSoftSkills() as $skill) {
                    foreach($candidat->getSoftSkills() as $soft) {
                        if($skill == $soft) {
                            $softCpt++;
                            array_push($tags, $skill);
                        }
                    }
                }
                $cptGlobal+=$softCpt/$nbSoftSkills;
            }
            //hard skills
            if($offre->getHardSkills() && $candidat->getHardSkills()) {
                $nbHardSkills = sizeof($offre->getHardSkills());
                $hardCpt = 0;
                foreach($offre->getHardSkills() as $skill) {
                    foreach($candidat->getHardSkills() as $hard) {
                        if($skill == $hard) {
                            $hardCpt++;
                            array_push($tags, $skill);
                        }
                    }
                }
                $cptGlobal+=$hardCpt/$nbHardSkills;
            }
            //salaire minimum
            if($candidat->getSalaire() && $offre->getSalaire()) {
                if($candidat->getSalaire() <= $offre->getSalaire()) {
                    $cptGlobal++;
                    array_push($tags, $offre->getSalaire()."€/an");
                }
            }
            //niveau diplome
            if($candidat->getDiplomes() && $offre->getNiveauDiplome()) {
                $niveau = 0;
                foreach($candidat->getDiplomes() as $diplome) {
                    if((int)$diplome->getNiveau() > $niveau) {
                        $niveau = (int)$diplome->getNiveau();
                    }
                }
                if($niveau == (int)$offre->getNiveauDiplome()) {
                    $cptGlobal++;
                }
                if($niveau >= (int)$offre->getNiveauDiplome()) {
                    $cptGlobal+=0.5;
                }
                foreach(self::DIPLOMES as $key => $value) {
                    if((int)$offre->getNiveauDiplome() == $key) {
                        array_push($tags, $value);
                    }
                }
            }
            //localisation ???
            $taux = $cptGlobal/8*100;
            $offre->taux = $taux;
            $offre->tags = $tags;
            if($offre->taux < 50) {
                if($key = array_search($offre, $offres)) {
                    unset($offres[$key]);
                }
            }
            // dd($offre);
        }
        return $offres;
    }
}
