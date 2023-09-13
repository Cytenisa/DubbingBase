<?php

namespace App\Entity;

use App\Repository\DubbingMovieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DubbingMovieRepository::class)]
class DubbingMovie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'dubbingMovie')]
    private ?Locale $id_lc_code = null;

    #[ORM\ManyToOne(inversedBy: 'dubbingMovie')]
    private ?VoiceActor $id_vaidactor = null;

    #[ORM\Column]
    private ?int $tmdb_id_actor = null;

    #[ORM\Column]
    private ?int $tmdb_id_movie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTmdbIdActor(): ?int
    {
        return $this->tmdb_id_actor;
    }

    public function setTmdbIdActor(int $tmdb_id_actor): static
    {
        $this->tmdb_id_actor = $tmdb_id_actor;

        return $this;
    }

    public function getTmdbIdMovie(): ?int
    {
        return $this->tmdb_id_movie;
    }

    public function setTmdbIdMovie(int $tmdb_id_movie): static
    {
        $this->tmdb_id_movie = $tmdb_id_movie;

        return $this;
    }

    public function getIdLcCode(): ?Locale
    {
        return $this->id_lc_code;
    }

    public function setIdLcCode(?Locale $id_lc_code): static
    {
        $this->id_lc_code = $id_lc_code;

        return $this;
    }

    public function getIdVaidactor(): ?VoiceActor
    {
        return $this->id_vaidactor;
    }

    public function setVsetIdVaidactoraidActor (?VoiceActor $id_vaidactor): static
    {
        $this->id_vaidactor = $id_vaidactor;

        return $this;
    }
}
