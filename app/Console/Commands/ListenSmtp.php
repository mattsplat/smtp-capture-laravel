<?php

namespace App\Console\Commands;

use App\Models\MailRecord;
use Illuminate\Console\Command;
use MattSplat\SmtpCapture\MailRequest;
use MattSplat\SmtpCapture\SMTPConnection;
use Ratchet\Server\IoServer;

class ListenSmtp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smtp:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $callback = function (MailRequest $mail_request) {
            MailRecord::create([
                'to' =>  "you@www.com",
                'from' => "Me@www.com",
                'subject' => $mail_request->subject,
                'content' => $mail_request->getContent()
            ]);
        };

        $server = IoServer::factory(
            new SMTPConnection($callback, true),
            1028 // use a port over 1024
        );

        $server->run();
        return 0;
    }
}