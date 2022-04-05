<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatRepository::class)
 */
class Candidat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="candidat", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dispo;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $typeContrat = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $experience;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $competences = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $softSkills = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $hardSkills = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $workView = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $companyValues = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $teamSpirit = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $salaire;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="candidat", orphanRemoval=true)
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Diplome::class, mappedBy="candidat", orphanRemoval=true)
     */
    private $diplomes;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
        $this->diplomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDispo(): ?\DateTimeInterface
    {
        return $this->dispo;
    }

    public function setDispo(?\DateTimeInterface $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    public function getTypeContrat(): ?array
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?array $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getCompetences(): ?array
    {
        return $this->competences;
    }

    public function setCompetences(?array $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function getSoftSkills(): ?array
    {
        return $this->softSkills;
    }

    public function setSoftSkills(?array $softSkills): self
    {
        $this->softSkills = $softSkills;

        return $this;
    }

    public function getHardSkills(): ?array
    {
        return $this->hardSkills;
    }

    public function setHardSkills(?array $hardSkills): self
    {
        $this->hardSkills = $hardSkills;

        return $this;
    }

    public function getWorkView(): ?array
    {
        return $this->workView;
    }

    public function setWorkView(?array $workView): self
    {
        $this->workView = $workView;

        return $this;
    }

    public function getCompanyValues(): ?array
    {
        return $this->companyValues;
    }

    public function setCompanyValues(?array $companyValues): self
    {
        $this->companyValues = $companyValues;

        return $this;
    }

    public function getTeamSpirit(): ?array
    {
        return $this->teamSpirit;
    }

    public function setTeamSpirit(?array $teamSpirit): self
    {
        $this->teamSpirit = $teamSpirit;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(?int $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setCandidat($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCandidat() === $this) {
                $experience->setCandidat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Diplome>
     */
    public function getDiplomes(): Collection
    {
        return $this->diplomes;
    }

    public function addDiplome(Diplome $diplome): self
    {
        if (!$this->diplomes->contains($diplome)) {
            $this->diplomes[] = $diplome;
            $diplome->setCandidat($this);
        }

        return $this;
    }

    public function removeDiplome(Diplome $diplome): self
    {
        if ($this->diplomes->removeElement($diplome)) {
            // set the owning side to null (unless already changed)
            if ($diplome->getCandidat() === $this) {
                $diplome->setCandidat(null);
            }
        }

        return $this;
    }
}
