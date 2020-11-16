<?php

namespace App\Entity;

use App\Repository\oeuvre_EXPOSEERepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=oeuvre_EXPOSEERepository::class)
 */
class oeuvre_EXPOSEE
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=5)
     */
    private $id_exposition;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=11)
     */
    private $id_photo;

    /**
     * @ORM\Column(type="integer", length=6)
     */
    private $prix;

   

    public function getIdExposition(): ?int
    {
        return $this->id_exposition;
    }
    public function getIdPhoto(): ?int
    {
        return $this->id_photo;
    }
    public function getPrix(): ?int
    {
        return $this->prix;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    
}
