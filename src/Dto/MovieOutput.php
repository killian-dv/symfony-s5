<?php

namespace App\Dto;

use App\Entity\Movie;

final class MovieOutput
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public string $releaseDate,
        public string $category,
        public string $actors,
        public string $duration,
        public string $imageFile,
        public string $imageName,

    ) {
    }

    public static function createFromEntity(Movie $movie): self
    {
        return new self(
            id: $movie->getId(),
            title: $movie->getTitle(),
            description: $movie->getDescription(),
            releaseDate: $movie->getReleaseDate(),
            category: $movie->getCategory(),
            actors: $movie->getActors(),
            duration: $movie->getDuration(),
            imageFile: $movie->getImageFile(),
            imageName: $movie->getImageName(),
        );
    }
}
