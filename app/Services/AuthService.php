<?php

namespace App\Services;

use App\Models\User;
use App\Models\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class AuthService implements AuthServiceInterface
{
    /**
     * Creates new resource.
     *
     * @param array $params
     *
     * @return void
     */
    public function create(){
        $user = Auth()->user();
        Auth::create([
            'user_id' => $user->id,
        ]);
    }

    /**
     * Get the resource.
     *
     * @param int $id
     * @param array $params
     *
     * @return Collection
     */
    public function get(){
        $user = Auth()->user();
        $auths = $user->auths()->get();
        return $auths;
    }

    /**
     * Deletes the resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function delete(){
        $user = Auth()->user();
        Auth::destroy($user->id);
    }

    /**
     * Сhecks the ability to log in, 3 login attempts
     * @return true
     */
    public function isAllowedAuth(): bool
    {
        $user = Auth()->user();
        $auths = $this->get();
        if($auths->count() < 3 || $this->checkPeriodBetweenThreeLastAuth($user) > 60){
            return true;
        }
        return false;
    }

    /**
     * Check difference between two dates
     * @return int
     */
    public function checkPeriodBetweenThreeLastAuth($user): int
    {
        $auths = $user->auths->take(-3);
        if($auths->count() == 3){
            $start = Carbon::parse($auths->first()->created_at);
            $finish = Carbon::now();
            $diff = $finish->diffInMinutes($start);
            return $diff;
        }
        return 0;
    }

}
