<?php

namespace App\Service;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class ContactService
{
    public function __construct(
        private FlashBagInterface $flash,
        private EntityManagerInterface $manager
    ) {}

    public function persistContact(Contact $contact): void {
        $contact->setCreatedAt(new \DateTimeImmutable('now'))
                ->setIsSent(false);

        $this->manager->persist($contact);
        $this->manager->flush();

        $this->flash->add('success', 'Votre message a bien été envoyé');
    }

    public function isSent(Contact $contact): void
    {
        $contact->setIsSent(true);
        $this->manager->persist($contact);
        $this->manager->flush();
    }
}
