<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\ReadAuthorBookController;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(),
        new POST(),
        new GetCollection(
            uriTemplate: '/authors/{id}/books',
            controller: ReadAuthorBookController::class,
            shortName: 'Book',
            name: 'author_books'
        )
    ]
)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $lastName = null;

    #[ORM\Column(length: 32)]
    private ?string $firstName = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $patronymic = null;

    #[ORM\ManyToMany(targetEntity: Book::class, mappedBy: 'authors', cascade: ['persist'])]
    private Collection $books;

    public function __construct() {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): static
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): static
    {
        $this->books[] = $book;

        return $this;
    }

    public function removeBook(Book $book): static
    {
        $this->books->removeElement($book);

        return $this;
    }
}
