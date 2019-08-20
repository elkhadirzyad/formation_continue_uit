<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialiteRepository")
 */
class Specialite
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
    private $titre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Master", mappedBy="id_s")
     */
    private $masters;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Licence", mappedBy="id_s") 
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $label): self
    {
        $this->titre = $label;

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
            $master->setIdS($this);
        }

        return $this;
    }

    public function removeMaster(Master $master): self
    {
        if ($this->masters->contains($master)) {
            $this->masters->removeElement($master);
            // set the owning side to null (unless already changed)
            if ($master->getIdS() === $this) {
                $master->setIdS(null);
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
            $licence->setIdS($this);
        }

        return $this;
    }

    public function removeLicence(Licence $licence): self
    {
        if ($this->licences->contains($licence)) {
            $this->licences->removeElement($licence);
            // set the owning side to null (unless already changed)
            if ($licence->getIdS() === $this) {
                $licence->setIdS(null);
            }
        }

        return $this;
    }


}
