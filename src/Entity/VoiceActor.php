<?php

namespace App\Entity;

use App\Repository\VoiceActorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoiceActorRepository::class)]
class VoiceActor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $va_lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $va_firstname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $va_birthdate = null;

    #[ORM\Column(length: 255)]
    private ?string $va_nationality = null;

    #[ORM\OneToMany(mappedBy: 'voiceActor', targetEntity: DubbingSerie::class)]
    private Collection $dubbingSerie;

    #[ORM\OneToMany(mappedBy: 'voiceActor', targetEntity: DubbingMovie::class)]
    private Collection $dubbingMovie;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $va_profilePicture;

    public function __construct()
    {
        $this->dubbingSerie = new ArrayCollection();
        $this->dubbingMovie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVaLastname(): ?string
    {
        return $this->va_lastname;
    }

    public function setVaLastname(string $va_lastname): static
    {
        $this->va_lastname = $va_lastname;

        return $this;
    }

    public function getVaFirstname(): ?string
    {
        return $this->va_firstname;
    }

    public function setVaFirstname(string $va_firstname): static
    {
        $this->va_firstname = $va_firstname;

        return $this;
    }

    public function getVaBirthdate(): ?\DateTimeInterface
    {
        return $this->va_birthdate;
    }

    public function setVaBirthdate(\DateTimeInterface $va_birthdate): static
    {
        $this->va_birthdate = $va_birthdate;

        return $this;
    }

    public function getVaNationality(): ?string
    {
        return $this->va_nationality;
    }

    public function setVaNationality(string $va_nationality): static
    {
        $this->va_nationality = $va_nationality;

        return $this;
    }

    /**
     * @return Collection<int, DubbingSerie>
     */
    public function getDubbingSerie(): Collection
    {
        return $this->dubbingSerie;
    }

    public function addDubbingSerie(DubbingSerie $dubbingSerie): static
    {
        if (!$this->dubbingSerie->contains($dubbingSerie)) {
            $this->dubbingSerie->add($dubbingSerie);
            $dubbingSerie->setVoiceActor($this);
        }

        return $this;
    }

    public function removeDubbingSerie(DubbingSerie $dubbingSerie): static
    {
        if ($this->dubbingSerie->removeElement($dubbingSerie)) {
            // set the owning side to null (unless already changed)
            if ($dubbingSerie->getVoiceActor() === $this) {
                $dubbingSerie->setVoiceActor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DubbingMovie>
     */
    public function getDubbingMovie(): Collection
    {
        return $this->dubbingMovie;
    }

    public function addDubbingMovie(DubbingMovie $dubbingMovie): static
    {
        if (!$this->dubbingMovie->contains($dubbingMovie)) {
            $this->dubbingMovie->add($dubbingMovie);
            $dubbingMovie->setVoiceActor($this);
        }

        return $this;
    }

    public function removeDubbingMovie(DubbingMovie $dubbingMovie): static
    {
        if ($this->dubbingMovie->removeElement($dubbingMovie)) {
            // set the owning side to null (unless already changed)
            if ($dubbingMovie->getVoiceActor() === $this) {
                $dubbingMovie->setVoiceActor(null);
            }
        }

        return $this;
    }

    public function getVaProfilePicture(): ?string
    {
        return $this->va_profilePicture;
    }

    public function setVaProfilePicture(string $va_profilePicture): static
    {
        $this->va_profilePicture = $va_profilePicture;

        return $this;
    }
}
