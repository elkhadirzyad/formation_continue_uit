<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResponsableRepository")
 */
class Responsable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Master", mappedBy="id_responsable")
     */
    private $masters;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Licence", mappedBy="id_responsable")
     */
    private $licences;

    public function __construct()
    {
        $this->masters = new ArrayCollection();
        $this->licences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Master[]
     */
    public function getMasters(): Collection
    {
        return $this->masters;
    }

    public function addMaster(Master $master): self
    {
        if (!$this->masters->contains($master)) {
            $this->masters[] = $master;
            $master->setIdResponsable($this);
        }

        return $this;
    }

    public function removeMaster(Master $master): self
    {
        if ($this->masters->contains($master)) {
            $this->masters->removeElement($master);
            // set the owning side to null (unless already changed)
            if ($master->getIdResponsable() === $this) {
                $master->setIdResponsable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Licence[]
     */
    public function getLicences(): Collection
    {
        return $this->licences;
    }

    public function addLicence(Licence $licence): self
    {
        if (!$this->licences->contains($licence)) {
            $this->licences[] = $licence;
            $licence->setIdResponsable($this);
        }

        return $this;
    }

    public function removeLicence(Licence $licence): self
    {
        if ($this->licences->contains($licence)) {
            $this->licences->removeElement($licence);
            // set the owning side to null (unless already changed)
            if ($licence->getIdResponsable() === $this) {
                $licence->setIdResponsable(null);
            }
        }

        return $this;
    }
}
