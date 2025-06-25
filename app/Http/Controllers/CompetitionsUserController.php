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
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CompetitionsUser::with(['competition', 'user']);
        
        // Filtrer par compétition si spécifié
        if ($request->has('competition_id')) {
            $query->where('competition_id', $request->competition_id);
        }
        
        // Filtrer par utilisateur si spécifié
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        
        $participants = $query->orderBy('created_at', 'desc')->paginate(10);
        
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
        return DB::transaction(function () use ($request) {
            $competition = Competition::findOrFail($request->competition_id);
            
            // Vérifier si l'utilisateur est déjà inscrit
            $existingParticipation = CompetitionsUser::where('competition_id', $request->competition_id)
                ->where('user_id', $request->user_id)
                ->first();
                
            if ($existingParticipation) {
                return response()->json([
                    'message' => 'L\'utilisateur est déjà inscrit à cette compétition',
                    'error' => 'already_registered'
                ], 409);
            }
            
            // Vérifier si la compétition est pleine
            if ($competition->status === 'full') {
                return response()->json([
                    'message' => 'Cette compétition est complète',
                    'error' => 'competition_full'
                ], 409);
            }
            
            // Vérifier si la compétition peut encore accepter des participants
            if ($competition->current_participants >= $competition->max_participants) {
                return response()->json([
                    'message' => 'Cette compétition a atteint le nombre maximum de participants',
                    'error' => 'max_participants_reached'
                ], 409);
            }
            
            // Créer l'inscription
            $competitionUser = CompetitionsUser::create([
                'competition_id' => $request->competition_id,
                'user_id' => $request->user_id,
                'points' => 0,
            ]);
            
            // Incrémenter le nombre de participants
            $competition->increment('current_participants');
            
            // Mettre à jour le statut si nécessaire
            if ($competition->status !== 'upcoming') {
                $competition->update(['status' => 'upcoming']);
            }
            
            // Vérifier si la compétition est maintenant pleine
            if ($competition->current_participants >= $competition->max_participants) {
                $competition->update(['status' => 'full']);
            }
            
            return response()->json([
                'message' => 'Inscription réussie',
                'data' => $competitionUser->load(['competition', 'user']),
                'competition_status' => $competition->fresh()->status
            ], 201);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(CompetitionsUser $competitionsUser)
    {
        return response()->json([
            'data' => $competitionsUser->load(['competition', 'user'])
        ]);
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
        return DB::transaction(function () use ($competitionsUser) {
            $competition = $competitionsUser->competition;
            
            // Supprimer l'inscription
            $competitionsUser->delete();
            
            // Décrémenter le nombre de participants
            $competition->decrement('current_participants');
            
            // Mettre à jour le statut si la compétition n'est plus pleine
            if ($competition->status === 'full' && $competition->current_participants < $competition->max_participants) {
                $competition->update(['status' => 'upcoming']);
            }
            
            return response()->json([
                'message' => 'Désinscription réussie',
                'competition_status' => $competition->fresh()->status
            ], 200);
        });
    }
}
