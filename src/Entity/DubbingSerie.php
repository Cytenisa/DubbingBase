<?php

namespace App\Entity;

use App\Repository\DubbingSerieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DubbingSerieRepository::class)]
class DubbingSerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'dubbingSerie')]
    private ?Locale $id_lc_code = null;

    #[ORM\ManyToOne(inversedBy: 'dubbingSerie')]
    private ?VoiceActor $id_vaidactor = null;

    #[ORM\Column]
    private ?int $tmdb_id_actor = null;

    #[ORM\Column]
    private ?int $tmdb_id_serie = null;

    #[ORM\Column]
    private ?int $tmdb_season_number_start = null;

    #[ORM\Column]
    private ?int $tmdb_season_number_end = null;

    #[ORM\Column]
    private ?int $tmdb_episode_number_start = null;

    #[ORM\Column]
    private ?int $tmdb_episode_number_end = null;

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

    public function getTmdbIdSerie(): ?int
    {
        return $this->tmdb_id_serie;
    }

    public function setTmdbIdSerie(int $tmdb_id_serie): static
    {
        $this->tmdb_id_serie = $tmdb_id_serie;

        return $this;
    }

    public function getTmdbSeasonNumberStart(): ?int
    {
        return $this->tmdb_season_number_start;
    }

    public function setTmdbSeasonNumberStart(int $tmdb_season_number_start): static
    {
        $this->tmdb_id_season_start = $tmdb_id_season_start;

        return $this;
    }

    public function getTmdbSeasonNumberEnd(): ?int
    {
        return $this->tmdb_season_number_end;
    }

    public function setTmdbSeasonNumberEnd(int $tmdb_season_number_end): static
    {
        $this->tmdb_season_number_end = $tmdb_season_number_end;

        return $this;
    }

    public function getTmdbEpisodeNumberStart(): ?int
    {
        return $this->tmdb_episode_number_start;
    }

    public function setTmdbEpisodeNumberStart(int $tmdb_episode_number_start): static
    {
        $this->tmdb_episode_number_start = $tmdb_episode_number_start;

        return $this;
    }

    public function getTmdbEpisodeNumberEnd(): ?int
    {
        return $this->tmdb_episode_number_end;
    }

    public function setTmdbEpisodeNumberEnd(int $tmdb_episode_number_end): static
    {
        $this->tmdb_episode_number_end = $tmdb_episode_number_end;

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

    public function setIdVaidactor(?VoiceActor $id_vaidactor): static
    {
        $this->id_vaidactor = $id_vaidactor;

        return $this;
    }
}
