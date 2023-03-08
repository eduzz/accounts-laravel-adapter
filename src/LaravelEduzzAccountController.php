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

        /*
         * Check if the response is valid
         */
        if (isset($response?->user)) {
            $eduzzUser = User::where(config('eduzz-account.tableColumn'), $response->user->eduzzIds[0])->first();
            $tableColumn = config('eduzz-account.tableColumn');

            if (! $eduzzUser) {
                $eduzzUser = User::create([
                    'name' => $response->user->name,
                    'email' => $response->user->email,
                    $tableColumn => $response->user->eduzzIds[0],
                ]);

                if (config('eduzz-account.hasTeams')) {
                    $eduzzUser->ownedTeams()->save(\App\Models\Team::forceCreate([
                        'user_id' => $eduzzUser->id,
                        'name' => __('Time de ').explode(' ', $eduzzUser->name, 2)[0],
                        'personal_team' => true,
                    ]));
                }
            } else {
                $user = User::where('email', $response->user->email)->first();

                if ($user) {
                    $user->{$tableColumn} = $response->user->eduzzIds[0];
                    $user->save();
                }
            }

            session()->flush();

            auth()->login($user);

            return redirect(url(config('eduzz-account.redirect_to')));
        }
    }
}
