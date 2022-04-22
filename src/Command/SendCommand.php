<?php

namespace App\Command;

use App\Repository\ContactRepository;
use App\Service\ContactService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendCommand extends Command
{
    protected static $defaultName = 'app:send-contact';

    public function __construct(
        private ContactRepository $contactRepository,
        private MailerInterface   $mailer,
        private ContactService    $contactService,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $toSend = $this->contactRepository->findBy(['isSent' => false]);
        $address = 'h.lauric@outlook.com';

        foreach ($toSend as $message) {
            $email = (new Email())
                ->from($message->getEmail())
                ->to($address)
                ->subject('Nouveau message lauric.app')
                ->text($message->getMessage());

            $this->mailer->send($email);

            $this->contactService->isSent($message);
        }
        return Command::SUCCESS;
    }
}
