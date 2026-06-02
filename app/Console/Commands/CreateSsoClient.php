<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Passport\ClientRepository;

class CreateSsoClient extends Command
{
    protected $signature = 'sso:create-client
                            {name : Nombre descriptivo del cliente (ej: Blog-App)}
                            {redirect_uri : URI de redirección OAuth (ej: https://blog.test/auth/callback)}
                            {--confidential : Crear cliente confidencial (requiere secret)}';

    protected $description = 'Crea un cliente SSO (Authorization Code Grant) para una aplicación externa';

    public function handle(ClientRepository $clients): int
    {
        $name = $this->argument('name');
        $redirect = $this->argument('redirect_uri');
        $confidential = $this->option('confidential');

        $client = $clients->create(
            userId: null,
            name: $name,
            redirect: $redirect,
            confidential: $confidential,
        );

        $this->newLine();
        $this->info('╔══════════════════════════════════════════════════╗');
        $this->info('║     SSO CLIENTE CREADO EXITOSAMENTE             ║');
        $this->info('╚══════════════════════════════════════════════════╝');
        $this->newLine();

        $this->line(" <fg=cyan;options=bold>Client ID:</>     <fg=green>{$client->id}</>");
        $this->line(" <fg=cyan;options=bold>Client Secret:</> <fg=yellow>{$client->plainSecret}</>");
        $this->newLine();

        $this->line(' <fg=gray>┌─────────────────────────────────────────────┐</>');
        $this->line(' <fg=gray>│</> <fg=white;options=bold>Configuración para la aplicación externa:</>  <fg=gray>│</>');
        $this->line(' <fg=gray>│</>                                               <fg=gray>│</>');
        $this->line(" <fg=gray>│</> <fg=cyan>APP_SSO_CLIENT_ID</fg>=<fg=green>{$client->id}</>                 <fg=gray>│</>");
        $this->line(" <fg=gray>│</> <fg=cyan>APP_SSO_CLIENT_SECRET</fg>=<fg=yellow>{$client->plainSecret}</> <fg=gray>│</>");
        $this->line(" <fg=gray>│</> <fg=cyan>APP_SSO_REDIRECT_URI</fg>=<fg=blue>{$redirect}</>  <fg=gray>│</>");
        $this->line(" <fg=gray>│</> <fg=cyan>APP_SSO_AUTHORIZE_URL</fg>=<fg=blue>" . config('app.url') . "/oauth/authorize</fg> <fg=gray>│</>");
        $this->line(" <fg=gray>│</> <fg=cyan>APP_SSO_TOKEN_URL</fg>=<fg=blue>" . config('app.url') . "/oauth/token</fg>         <fg=gray>│</>");
        $this->line(" <fg=gray>│</> <fg=cyan>APP_SSO_USERINFO_URL</fg>=<fg=blue>" . config('app.url') . "/api/user</fg>       <fg=gray>│</>");
        $this->line(' <fg=gray>│</>                                               <fg=gray>│</g>');
        $this->line(" <fg=gray>│</> Grant Type: <fg=magenta>authorization_code</>               <fg=gray>│</>");
        $this->line(' <fg=gray>└─────────────────────────────────────────────┘</>');

        return self::SUCCESS;
    }
}
