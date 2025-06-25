<?php

namespace App\Http\Controllers;

use App\Models\CompetitionsUser;
use App\Services\CompetitionsUserService;
use Illuminate\Http\Request;
use App\Http\Requests\Api\StoreCompetitionsUserRequest;

class CompetitionsUserController extends Controller
{
    protected $competitionsUserService;

    public function __construct(CompetitionsUserService $competitionsUserService)
    {
        $this->competitionsUserService = $competitionsUserService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['competition_id', 'user_id']);
        $perPage = $request->get('per_page', 10);
        
        $participants = $this->competitionsUserService->getParticipants($filters, $perPage);
        
        return response()->json($participants);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetitionsUserRequest $request)
    {
        $result = $this->competitionsUserService->registerUserToCompetition(
            $request->competition_id,
            $request->user_id
        );

        if (!$result['success']) {
            return response()->json([
                'message' => $result['message'],
                'error' => $result['error_code']
            ], $result['status_code']);
        }

        return response()->json([
            'message' => $result['message'],
            'data' => $result['data'],
            'competition_status' => $result['competition_status']
        ], $result['status_code']);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompetitionsUser $competitionsUser)
    {
        $result = $this->competitionsUserService->getParticipationDetails($competitionsUser);
        
        return response()->json([
            'data' => $result['data']
        ], $result['status_code']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompetitionsUser $competitionsUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompetitionsUser $competitionsUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompetitionsUser $competitionsUser)
    {
        $result = $this->competitionsUserService->unregisterUser($competitionsUser);
        
        return response()->json([
            'message' => $result['message'],
            'competition_status' => $result['competition_status']
        ], $result['status_code']);
    }

    /**
     * Obtenir les statistiques d'une compétition
     */
    public function getCompetitionStats(Request $request, int $competitionId)
    {
        $result = $this->competitionsUserService->getCompetitionStats($competitionId);
        
        return response()->json($result['data'], $result['status_code']);
    }

    public function checkExistingParticipation(Request $request)
    {
        $userId = auth()->id();
        $competitionId = $request->query('competition_id');

        if (!$competitionId) {
            return response()->json([
                'exists' => false,
                'message' => 'Paramètre competition_id manquant.'
            ], 400);
        }

        $participation = CompetitionsUser::where('competition_id', $competitionId)
            ->where('user_id', $userId)
            ->first();

        if (!$participation) {
            return response()->json([
                'exists' => false,
                'message' => 'Aucune participation trouvée.'
            ]);
        }

        return response()->json([
            'exists' => true,
            'message' => 'L’utilisateur est déjà inscrit.',
            'data' => $participation
        ]);
    }
}