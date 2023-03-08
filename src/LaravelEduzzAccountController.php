<?php

namespace EduzzLabs\LaravelEduzzAccount;

use App\Models\User;
use Http;
use Illuminate\Routing\Controller as BaseController;

class LaravelEduzzAccountController extends BaseController
{
    public $user;

    public $userByEduzzId;

    public $userByEmail;

    public $eduzzUser;

    public $tableColumn;

    public $response;

    public function __construct()
    {
        $this->tableColumn = config('eduzz-account.tableColumn');
    }

    public function processRequest($token)
    {
        $this->callEduzzAccountApi($token);

        $this->setUser();

        $this->loginUser();

        return redirect(url(config('eduzz-account.redirect_to')));
    }

    public function setUser()
    {
        $this->userByEduzzId = User::where($this->tableColumn, $this->eduzzUser->eduzzIds[0])->first();

        if ($this->userByEduzzId) {
            $this->user = $this->userByEduzzId;

            return;
        } else {
            $this->userByEmail = User::where('email', $this->eduzzUser->email)->first();

            if ($this->userByEmail) {
                $this->user = $this->userByEmail;
                $this->user->{$this->tableColumn} = $this->eduzzUser->eduzzIds[0];
                $this->user->save();

                return;
            }
        }

        $this->createUser();
    }

    public function loginUser()
    {
        session()->flush();
        auth()->login($this->user);
    }

    public function callEduzzAccountApi($token)
    {
        $request = Http::asJson()->post($this->getApiUrl(), [
            'partner' => config('eduzz-account.id'),
            'secret' => config('eduzz-account.secret'),
            'token' => $token,
        ]);

        $response = json_decode($request->getBody()->getContents());

        $this->eduzzUser = $response?->user;

        if (! $this->eduzzUser) {
            abort(403, 'Eduzz user not found.');
        }

        return $response;
    }

    public function getApiUrl()
    {
        return config('eduzz-account.'.(app()->environment('production') ? 'production' : 'testing').'ApiUrl');
    }

    public function createUser()
    {
        $this->user = User::create([
            'name' => $this->eduzzUser->name,
            'email' => $this->eduzzUser->email,
            $this->tableColumn => $this->eduzzUser->eduzzIds[0],
        ]);

        if (config('eduzz-account.hasTeams')) {
            $this->user->ownedTeams()->save(\App\Models\Team::forceCreate([
                'user_id' => $this->user->id,
                'name' => __('Time de ').explode(' ', $this->user->name, 2)[0],
                'personal_team' => true,
            ]));
        }
    }
}
