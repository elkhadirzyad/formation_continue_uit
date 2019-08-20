<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MasterRepository")
 * @Vich\Uploadable
 */
class Master
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
    private $dateouverture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialite", inversedBy="masters")
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $specialite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="masters")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $descriptif;

    /**
     * @Vich\UploadableField(mapping="descripFileM", fileNameProperty="descriptif")
     * @var File|null
    */
    private $descripFile;

        

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContratM", mappedBy="master")
     */
    private $contratMs;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct()
    {
        $this->contratMs = new ArrayCollection();
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
        return $this->dateouverture;
    }

    public function setDateOuverture(string $date_ouverture): self
    {
        $this->dateouverture = $date_ouverture;

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

    public function setDescripFile(File $image = null)
    {
        $this->descripFile = $image;

        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
       return $this;
    }

    public function getDescripFile()
    {
        return $this->descripFile;
    }

    /**
     * @return Collection|ContratM[]
     */
    public function getContratMs(): Collection
    {
        return $this->contratMs;
    }

    public function addContratM(ContratM $contratM): self
    {
        if (!$this->contratMs->contains($contratM)) {
            $this->contratMs[] = $contratM;
            $contratM->setMaster($this);
        }

        return $this;
    }

    public function removeContratM(ContratM $contratM): self
    {
        if ($this->contratMs->contains($contratM)) {
            $this->contratMs->removeElement($contratM);
            // set the owning side to null (unless already changed)
            if ($contratM->getMaster() === $this) {
                $contratM->setMaster(null);
            }
        }

        return $this;
    }
}
