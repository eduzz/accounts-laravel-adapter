<?php

namespace EduzzLabs\LaravelEduzzAccount;

use App\Models\User;
use Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class LaravelEduzzAccountController extends BaseController
{
    public function __invoke(Request $request, $token)
    {
        $url = app()->environment('local')
            ? config('eduzz-account.testingApiUrl')
            : config('eduzz-account.productionApiUrl');

        $request = Http::asJson()->post($url, [
            'partner' => config('eduzz-account.id'),
            'secret' => config('eduzz-account.secret'),
            'token' => $token,
        ]);

        $response = json_decode($request->getBody()->getContents());
        $tableColumn = config('eduzz-account.tableColumn');

        /*
         * Check if the response is valid
         */
        if (isset($response?->user)) {
            $userByEduzzId = User::where(config('eduzz-account.tableColumn'), $response->user->eduzzIds[0])->first();
            $userByEmail = User::where('email', $response->user->email)->first();

            if ($userByEduzzId) {
                $user = $userByEduzzId;
            }

            if (! $userByEduzzId && ! $userByEmail) {
                $user = User::create([
                    'name' => $response->user->name,
                    'email' => $response->user->email,
                    $tableColumn => $response->user->eduzzIds[0],
                ]);

                if (config('eduzz-account.hasTeams')) {
                    $user->ownedTeams()->save(\App\Models\Team::forceCreate([
                        'user_id' => $user->id,
                        'name' => __('Time de ').explode(' ', $user->name, 2)[0],
                        'personal_team' => true,
                    ]));
                }
            }

            if ($userByEmail && ! $userByEduzzId) {
                $userByEmail->{$tableColumn} = $response->user->eduzzIds[0];
                $userByEmail->save();

                $user = $userByEmail;
            }

            session()->flush();

            auth()->login($user);

            return redirect(url(config('eduzz-account.redirect_to')));
        }
    }
}
