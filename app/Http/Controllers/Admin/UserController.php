<?php


namespace App\Http\Controllers\Admin;


use App\Models\Admin\UserRole;
use App\Services\SubscriptionService;
use App\User;
use Illuminate\Http\Request;

class UserController extends AdminCrudController
{

    /**
     * @var string
     */
    protected $view = 'admin.users';
    protected $route = 'admin.users';
    protected $trans = 'admin/users';

    /**
     * @var string
     */
    protected $model = \App\Models\Admin\UserAdmin::class;

    protected $subscriptionService;

    public $createAction = false;

    /**
     * CharacterController constructor.
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->filters = [
            'name',
            'referral_id',
        ];

        $this->subscriptionService = $subscriptionService;

        parent::__construct();
    }

    public function show(User $user)
    {
        $this->subscriptionService->user($user);
        $with = [
            'currency' => $user->currencySymbol(),
            'service' => $this->subscriptionService
        ];
        return $this->crudShow($user, $with);
    }

    public function boosterCount(Request $request, User $user)
    {
        $user->booster_count = $request->post('booster_count');
        $user->save();

        return redirect()->back()->with('success', 'User updated.');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRole(Request $request, User $user)
    {
        $userRole = UserRole::create([
            'user_id' => $user->id,
            'role_id' => $request->post('role_id')
        ]);
        return redirect()->back()->with('success', 'User role added.');
    }

    /**
     * @param User $user
     * @param UserRole $userRole
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function removeRole(Request $request, User $user)
    {
        $userRole = UserRole::where('user_id', $user->id)->where('role_id', $request->post('role_id'))->firstOrFail();
        $userRole->delete();
        return redirect()->back()->with('success', 'User role removed.');
    }

    public function removePatreon(Request $request, User $user)
    {
        // Clean up the user
        $user->update([
            'patreon_pledge' => '',
        ]);

        // Remove boosters
        foreach ($user->boosts as $boost) {
            $boost->delete();

            $boost->campaign->boost_count--;
            $boost->campaign->save();
        }

        // Remove the patreon role
        $userRole = UserRole::where('user_id', $user->id)->where('role_id', 5)->first();
        if (!empty($userRole)) {
            $userRole->delete();
        }

        return redirect()->back()->with('success', 'User patreon sync removed.');


    }
}
