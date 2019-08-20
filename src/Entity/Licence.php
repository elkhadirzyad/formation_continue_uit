<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LicenceRepository")
 * @Vich\Uploadable
 */
class Licence
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
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etablissement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date_ouverture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialite", inversedBy="licences")
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $specialite;

   /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="licences")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $descriptif;

    /**
     * @Vich\UploadableField(mapping="descripFileL", fileNameProperty="descriptif")
     * @var File|null
    */
    private $descripFileL;

  

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContratL", mappedBy="licence")
     */
    private $contratLs;

     /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct()
    {
        $this->contratLs = new ArrayCollection();
        $this->updatedAt=new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getEtablissement(): ?string
    {
        return $this->etablissement;
    }

    public function setEtablissement(string $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    public function getDateOuverture(): ?string
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(string $date_ouverture): self
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->specialite;
    }

    public function setSpecialite(?Specialite $id_s): self
    {
        $this->specialite = $id_s;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function setDescripFileL(File $image = null)
    {
        $this->descripFileL = $image;

        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
       return $this;
    }

    public function getDescripFileL()
    {
        return $this->descripFileL;
    }

    /**
     * @return Collection|ContratL[]
     */
    public function getContratLs(): Collection
    {
        return $this->contratLs;
    }

    public function addContratL(ContratL $contratL): self
    {
        if (!$this->contratLs->contains($contratL)) {
            $this->contratLs[] = $contratL;
            $contratL->setLicence($this);
        }

        return $this;
    }

    public function removeContratL(ContratL $contratL): self
    {
        if ($this->contratLs->contains($contratL)) {
            $this->contratLs->removeElement($contratL);
            // set the owning side to null (unless already changed)
            if ($contratL->getLicence() === $this) {
                $contratL->setLicence(null);
            }
        }

        return $this;
    }
}
