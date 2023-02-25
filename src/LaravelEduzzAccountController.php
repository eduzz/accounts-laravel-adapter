<?php

namespace Eduzz\LaravelEduzzAccount;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Http;

class LaravelEduzzAccountController extends BaseController {

    public function __invoke(Request $request, $token)
    {
        $url = app()->environment('local')
            ? "https://accounts-api.qa.devzz.ninja/validate"
            : "https://accounts-api.eduzz.com/validate";

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
            $user = User::where(config('eduzz-account.table.column'), $response->user->eduzzIds[0])->first();

            if(! $user){
                $user = User::create([
                    'name' => $response->user->name,
                    'email' => $response->user->email,
                    config('eduzz-account.table.column') => $response->user->eduzzIds[0]
                ]);

                if(config('eduzz-account.has_teams')){
                    $user->ownedTeams()->save(Team::forceCreate([
                        'user_id' => $user->id,
                        'name' => __('Time de ') . explode(' ', $user->name, 2)[0],
                        'personal_team' => true,
                    ]));
                }
            }

            session()->flush();

            auth()->loginUsingId($user->id);

            return redirect(config('eduzz-account.redirect_to'));
        }
    }

}
