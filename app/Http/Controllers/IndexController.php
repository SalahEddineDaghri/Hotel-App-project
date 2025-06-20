<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $room = Room::paginate(3);
        // dd(auth()->user());
        return view('index', compact('room'));
    }

    public function pesan()
    {
        $uri = Route::currentRouteName();
        // dd($uri);
        return view('pesan', compact('uri'));
    }

    public function room(Request $request)
    {
        $roomsCount = 0;

        // Initialisation de la requête
        $roomsQuery = Room::with(['type', 'status']);

        if ($request->filled('from') && $request->filled('to')) {
            // Récupère les IDs des chambres déjà réservées
            $occupiedRoomIds = $this->getOccupiedRoomIDs($request->from, $request->to);

            // Exclure les chambres occupées
            $roomsQuery->whereNotIn('id', $occupiedRoomIds);

            // Filtrer par capacité si 'adults' ou 'count' est fourni
            $requiredCapacity = $request->input('adults') ?? $request->input('count');
            if (!empty($requiredCapacity)) {
                $roomsQuery->where('capacity', '>=', $requiredCapacity);
            }

            // Paginer les résultats
            $rooms = $roomsQuery->orderBy('capacity')->paginate(10)->appends($request->all());
            $roomsCount = $rooms->total();
        } else {
            // Si aucune date n'est fournie, on retourne toutes les chambres
            $rooms = $roomsQuery->paginate(12);
            $roomsCount = $rooms->total();
        }

        return view('frontend.rooms', compact('rooms', 'roomsCount', 'request'));
    }



    public function facility()
    {
        return view('frontend.facilities');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function about()
    {
        $r = Room::count();
        $c = Customer::count();
        $t = Transaction::count();
        // dd($r);
        return view('frontend.about', compact('r', 'c', 't'));
    }



    private function getOccupiedRoomIDs($from, $to)
    {
        return Transaction::where(function ($query) use ($from, $to) {
            $query->whereBetween('check_in', [$from, $to])
                ->orWhereBetween('check_out', [$from, $to])
                ->orWhere(function ($q) use ($from, $to) {
                    $q->where('check_in', '<=', $from)
                        ->where('check_out', '>=', $to);
                });
        })->pluck('room_id')->toArray();
    }



    private function getUnocuppiedroom2($request)
    {
        $rooms = Room::with('type', 'status')->where('capacity', '>=', $request->count);
        $rooms = $rooms
            ->orderBy('capacity')
            ->paginate(10);
        return $rooms;
    }
    private function countUnocuppiedroom($request, $occupiedRoomId)
    {
        if ($request->count != null) {
            $roomsCount = Room::with('type', 'status')
                ->where('capacity', '>=', $request->count)
                ->whereNotIn('id', $occupiedRoomId)
                ->orderBy('price')
                ->orderBy('capacity')
                ->count();
        } else {
            $roomsCount =  Room::with('type', 'status')
                ->whereNotIn('id', $occupiedRoomId)
                ->orderBy('price')
                ->orderBy('capacity')
                ->count();
        }
        return $roomsCount;
    }
    private function countUnocuppiedroom2($request)
    {
        return Room::with('type', 'status')
            ->where('capacity', '>=', $request->count)
            ->orderBy('price')
            ->orderBy('capacity')
            ->count();
    }


    private function getOccupiedRoomID($stayfrom, $stayto)
    {
        $occupiedRoomId = Transaction::where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayto]])
            ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayto]])
            ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayto]])
            ->pluck('room_id');
        return $occupiedRoomId;
    }
}
