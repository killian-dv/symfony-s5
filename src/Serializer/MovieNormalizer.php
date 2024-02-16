<?php

namespace App\Serializer;

use App\Entity\Movie;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

final class MovieNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;
    private const ALREADY_CALLED = 'MOVIE_OBJECT_NORMALIZER_ALREADY_CALLED';

    public function __construct(protected UploaderHelper $uploaderHelper, protected UrlGeneratorInterface $urlGenerator)
    {
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool {
        return !isset($context[self::ALREADY_CALLED]) && $data instanceof Movie;
    }

    public function normalize($object, ?string $format = null, array $context = []) {
        $context[self::ALREADY_CALLED] = true;

        $baseUrl = $this->urlGenerator->generate('app_demo', [], UrlGeneratorInterface::ABSOLUTE_URL);

        // Supprimer 'index.php' de l'URL si présent
        $baseUrl = str_replace('index.php', '', $baseUrl);

        if ($object->getImageName() !== null) {
            $object->setImageName($baseUrl . $this->uploaderHelper->asset($object, 'imageFile'));
        }

        return $this->normalizer->normalize($object, $format, $context);
    }
}