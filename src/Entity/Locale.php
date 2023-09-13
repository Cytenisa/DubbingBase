<?php

namespace App\Entity;

use App\Repository\LocaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocaleRepository::class)]
class Locale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lc_code = null;

    #[ORM\Column(length: 255)]
    private ?string $lc_label = null;

    #[ORM\OneToMany(mappedBy: 'locale', targetEntity: DubbingSerie::class)]
    private Collection $dubbingSerie;

    #[ORM\OneToMany(mappedBy: 'locale', targetEntity: DubbingMovie::class)]
    private Collection $dubbingMovie;

    public function __construct()
    {
        $this->dubbingSerie = new ArrayCollection();
        $this->dubbingMovie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLcCode(): ?string
    {
        return $this->lc_code;
    }

    public function setLcCode(string $lc_code): static
    {
        $this->lc_code = $lc_code;

        return $this;
    }

    public function getLcLabel(): ?string
    {
        return $this->lc_label;
    }

    public function setLcLabel(string $lc_label): static
    {
        $this->lc_label = $lc_label;

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
            $dubbingSerie->setLocale($this);
        }

        return $this;
    }

    public function removeDubbingSerie(DubbingSerie $dubbingSerie): static
    {
        if ($this->dubbingSerie->removeElement($dubbingSerie)) {
            // set the owning side to null (unless already changed)
            if ($dubbingSerie->getLocale() === $this) {
                $dubbingSerie->setLocale(null);
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
            $dubbingMovie->setLocale($this);
        }

        return $this;
    }

    public function removeDubbingMovie(DubbingMovie $dubbingMovie): static
    {
        if ($this->dubbingMovie->removeElement($dubbingMovie)) {
            // set the owning side to null (unless already changed)
            if ($dubbingMovie->getLocale() === $this) {
                $dubbingMovie->setLocale(null);
            }
        }

        return $this;
    }
}
